<html>
    <body>
        <h1>304 Artic Expedition</h1>

        <!--  type of button? -->
        <form method="POST" action="ArcticExpedition.php"> <!-- action reloads page to this project again-->
            <input type="hidden" id="initializeTables" name="initializeTables">
            <p><input type="submit" value="INITIALIZE TABLE" name="initializeTables"></p>
            <!--     form button      text on button as        name of this object -->
        </form>

        <form method="POST" action="ArcticExpedition.php">
            <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
            <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
            <p><input type="submit" value="Reset" name="reset"></p>
        </form>

        <h2>Count the Tuples in DemoTable</h2>
        <form method="GET" action="ArcticExpedition.php"> <!--refresh page when submitted-->
            <input type="hidden" id="countTupleRequest" name="countTupleRequest">
            <input type="submit" name="countTuples"></p>
        </form>

        <h2>Display the Tuples in DemoTable</h2>
        <form method="GET" action="ArcticExpedition.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTupleRequest" name="displayTupleRequest">
            <input type="submit" name="displayTuples"></p>
        </form>

        <h2>Select from Persons</h2>
        <form method="GET" action="ArcticExpedition.php"> <!--refresh page when submitted-->
            <label for="Name"> Identifying Features: </label>
            <select name="attribute1" id="attribute1">
                <option value="personId">PersonID</option>
                <option value="age">Age</option>
                <option value="name">Name</option>
                <option value="gender">Gender</option>
                <option value="weight">Weight</option>
                <option value="height">Height</option>
            </select>
            <select name="attribute2" id="attribute2">
                <option value="personId">PersonID</option>
                <option value="age">Age</option>
                <option value="name">Name</option>
                <option value="gender">Gender</option>
                <option value="weight">Weight</option>
                <option value="height">Height</option>
            </select>
            <input type="hidden" id="selectionRequest" name="selectionRequest">
            <input type="submit" name="selection"></p>
        </form>

    </body>


	<?php
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

            echo "<br> inserting <br>";
            executePlainSQL("INSERT INTO Person 
            VALUES(9119119, 25, 'John', 'male', 87, 188) 
            ");

            OCICommit($db_conn);
        }

        function handleResetRequest() {
            global $db_conn;
            // Drop old table
            executePlainSQL("DROP TABLE Person");

            // Create new table
            echo "<br> creating new table <br>";
            executePlainSQL("CREATE TABLE Person (
                PersonID integer, 
                Age integer,
                Name char(50) NOT NULL,
                Gender char(50),
                Weight integer,
                Height integer, 
                PRIMARY KEY (PersonID)
            )");
            OCICommit($db_conn);
        }

        function handleCountRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT Count(*) FROM Person");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> The number of tuples in Person: " . $row[0] . "<br>";
            }
        }

        function handleDisplayRequest() {
            global $db_conn;

            displayPeopleHelper($db_conn);
        }

        function displayPeopleHelper($db_conn) {
            $result = executePlainSQL("SELECT * FROM Person");

                echo "<br> <b> PersonID </b>" . str_repeat('&nbsp;', 6) . "<b> Age </b>"
                                              . str_repeat('&nbsp;', 6) . "<b> Name </b>"
                                              . str_repeat('&nbsp;', 5) . "<b> Gender </b>"
                                              . str_repeat('&nbsp;', 5) . "<b> Weight </b>"
                                              . str_repeat('&nbsp;', 4) . "<b> Height </b> <br>";

            while (($row = oci_fetch_row($result)) != false) {
                echo "<br>" . $row[0] . str_repeat('&nbsp;', 10)
                            . $row[1] . str_repeat('&nbsp;', 10)
                            . $row[2] . str_repeat('&nbsp;', 10) 
                            . $row[3] . str_repeat('&nbsp;', 11) 
                            . $row[4] . str_repeat('&nbsp;', 13)
                            . $row[5] . "<br>";
            }
        }



        /**
         * QUERY FUNCTIONS
         */

        function handleSelectionRequest() {
            global $db_conn;

            $attribute1 = $_GET['attribute1'];
            $attribute2 = $_GET['attribute2'];

            $result = executePlainSQL("SELECT $attribute1, $attribute2
                                        FROM Person");
            
            echo "<br>Retrieved data from Person Table:<br>";
            echo "<table>";
            echo "<tr><th>$attribute1</th><th>$attribute2</th></tr>";
            
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>"; //or just use "echo $row[0]"
            }
            
            echo "</table>";
        }


        function printResult($result) { //prints results from a select statement
            echo "<br>DATA FROM TABLES:<br>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th></tr>";

            
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]"
            }
            
            echo "</table>";
        }

    // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
    function handleGETRequest() {
        if (connectToDB()) {
            if (array_key_exists('countTuples', $_GET)) {
                handleCountRequest();
            } else if (array_key_exists('displayTuples', $_GET)) {
                handleDisplayRequest();
            } else if (array_key_exists('selection', $_GET)) {
                handleSelectionRequest();
            }

            disconnectFromDB();
        }
    }

    /**
     * 
     */
    function handlePOSTRequest() {
        if (connectToDB()) {
            if (array_key_exists('initializeTables', $_POST)) {
                handleInitializeAllTables();
            } else if (array_key_exists('resetTablesRequest', $_POST)) {
                handleResetRequest();
            }

            disconnectFromDB();
        }
    }

    if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) || isset($_POST['initializeTables'])) {
        handlePOSTRequest();
    } else if (isset($_GET['countTupleRequest']) || isset($_GET['displayTupleRequest']) || isset($_GET['selectionRequest'])) {
        handleGETRequest();
    }
    ?>
</body>
</html>