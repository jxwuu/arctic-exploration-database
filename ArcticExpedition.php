<html>
    <body>
        <h1>304 Artic Expedition</h1>

        <!--  type of button? -->
        <form method="POST" action="304project.php"> <!-- action reloads page to this project again-->
            <input type="hidden" id="initializeTables" name="initializeTables">
            <p><input type="submit" value="INITIALIZE TABLE" name="initializeTables"></p>
            <!--     form button      text on button as        name of this object -->
        </form>
    </body>


	<?php
        echo "Hello world <br>";
        /** SETTING UP OVERHEAD FOR ORACLE */
        
        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; //edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        /** ALERT MESSAGE FUNCTION */
        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        /** CALL THIS FUNCTION TO CREATE QUERIES 
         * RETURNS: QUERY
        */
        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr); 
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
		}

        function connectToDB() {
            global $db_conn;

            $db_conn = OCILogon("ora_benson0", "a28598183", "dbhost.students.cs.ubc.ca:1522/stu");


            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }


        /** BEGIN BUTTON FUNCTIONS */

        /**
         * CREATE TABLES
         */
        function handleInitializeAllTables() {
            global $db_conn;

            echo "<br> creating new person table <br>";
            executePlainSQL("CREATE TABLE Person (pid int PRIMARY KEY, age int, name char(50) NOT NULL, gender char(50), weight int, height int)");
            OCICommit($db_conn);
        }

        /**
         * 
         */
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('initializeTables', $_POST)) {
                    handleInitializeAllTables();
                }
            }
        }

        /**
         * Deals with buttons
         */
        function handleGETRequest() {
            if (connectToDB()) {
            }

        }



        /**
         * handles all requests (like a trampoline?)
         */
        if (isset($_POST['initializeTables'])) {
            handlePOSTRequest();
        } else {
            handleGETRequest();
        }

	?>
</html>