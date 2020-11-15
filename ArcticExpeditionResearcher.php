<html>
    <head>
        <title>CPSC 304 PHP/Oracle Demonstration</title>
    </head>

    <body>
        <hr />

        <h2>Display the Tuples in DemoTable</h2>
        <form method="GET" action="ArcticExpeditionResearcher.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTupleRequest" name="displayTupleRequest">
            <input type="submit" name="displayTuples"></p>
        </form>

        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

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

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection. 
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }
        

        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example, 
			// ora_platypus is the username and a12345678 is the password.
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

        /**
         * DISPLAY REQUEST FUNCTIONS
         */

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

        // TODO: show all tuples -> id and name
        function showTuplesRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT id, name FROM demoTable");

            printResult($result);
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
            } else if (array_key_exists('projection', $_GET)) {
                handleProjectionRequest();
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
            } else if (array_key_exists('selection2', $_POST)) {
                handleSelectionRequest2();
            }

            disconnectFromDB();
        }
    }

    if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) || isset($_POST['initializeTables']) || isset($_POST['selectionDropDown'])) {
        handlePOSTRequest();
    } else if (isset($_GET['displayTupleRequest'])) {
        handleGETRequest();
    }
		?>
	</body>
</html>
