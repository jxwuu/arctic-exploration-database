<html>
    <head>
        <title>CPSC 304 PHP/Oracle Demonstration</title>
    </head>

    <body>

        <form method="POST" action="ArcticExpedition.php">
            <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
            <input type="hidden" id="gotoArcticExpeditionResearcher" name="gotoArcticExpeditionResearcher">
            <p><input type="submit" value="Main Tab" name="gotoArcticExpeditionResearcher"></p>
        </form>

        <hr />

        <h2>Display the Tuples in Person Table</h2>
        <form method="GET" action="ArcticExpeditionResearcher.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTupleRequest" name="displayTupleRequest">
            <input type="submit" name="displayTuples"></p>
        </form>

        <h2>Find Researcher(s) Who is Studying every Animal on Record</h2>
        <form method="GET" action="ArcticExpeditionResearcher.php"> <!--refresh page when submitted-->
            <input type="hidden" id="findResearcherStudyingAllAnimalsRequest" name="findResearcherStudyingAllAnimalsRequest">
            <input type="submit" value="Find" name="findResearcherStudyingAllAnimals"></p>
        </form>

        <h2>Find count of research items</h2>
        <form method="GET" action="ArcticExpeditionResearcher.php"> <!--refresh page when submitted-->
            <label>Select:
                <select name="mainMenu" id="mainMenu" onchange="displayAccordingly()">
                    <option value="">--</option>
                    <option value="animal">Animal(s) on Record</option>
                    <option value="plants">Plant(s) on Record</option>
                    <option value="scientificEquipment">Scientific Equipment</option>
                </select>
                <br>
            </label>
            <label>Group: 
                <select name="aggregationGroupBy" id="aggregationGroupBy"></select>
                

            <input type="hidden" id="findCountResearchItemsRequest" name="findCountResearchItemsRequest">
            <input type="submit" value="Find" name="findCountResearchItems"></p>
        </form>

        <!--<form method="POST" action="oracle-test.php">
        <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
            Old Name: <input type="text" name="oldName"> <br /><br />
            New Name: <input type="text" name="newName"> <br /><br />

            <input type="submit" value="Update" name="updateSubmit"></p>
        </form>-->

        <h2>Update Plant Age</h2>
        <form method="GET" action="ArcticExpeditionResearcher.php"> <!--refresh page when submitted-->
            <input type="hidden" id="showPlantIDsRequest" name="showPlantIDsRequest">
            <input type="submit" value="show Plant IDs / age" name="showPlantIDs"></p>
        </form>
        <form method="POST" action="ArcticExpeditionResearcher.php"> <!--refresh page when submitted-->
            PlantID: <input type="number" name="plantID"> <br>
            new Age: <input type="number" name="age"> <br>
            <input type="hidden" id="updatePlantAgeSubmit" name="updatePlantAgeSubmit">
            <input type="submit" value="Update" name="updatePlantAge"></p>
        </form>

        <hr/>
        <h2> RESULT OF QUERY: </h2>

        <script type="text/javascript">
            var created = 0;

            function displayAccordingly() {
                removeDrop();
                //Call mainMenu the main dropdown menu
                var mainMenu = document.getElementById('mainMenu');

                //Create the new dropdown menu
                var whereToPut = document.getElementById('aggregationGroupBy');

                if (mainMenu.value == "animal") {
                    //Add an option called "Vertebrate"
                    var optionVertebrate=document.createElement("option");
                    optionVertebrate.text="is Vertebrate";
                    optionVertebrate.value="Vertebrate";
                    whereToPut.appendChild(optionVertebrate);

                    //Add an option called "diet type"
                    var optionDiet=document.createElement("option");
                    optionDiet.text="Diet Type";
                    optionDiet.value="diet";
                    whereToPut.appendChild(optionDiet);

                } else if (mainMenu.value == "plants") { 
                    //Add an option called "2 years or older"
                    var optionTwoYearsOrOlder=document.createElement("option");
                    optionTwoYearsOrOlder.text="of same age";
                    optionTwoYearsOrOlder.value="age";
                    whereToPut.appendChild(optionTwoYearsOrOlder);
                } else 
                if (mainMenu.value == "scientificEquipment") { 
                    //Add an option called "Fragile"
                    var optionFragile=document.createElement("option");
                    optionFragile.text="is Fragile";
                    optionFragile.value="Fragile";
                    whereToPut.appendChild(optionFragile);
                }

                created = 1
            }

            function removeDrop() {
                var d = document.getElementById('aggregationGroupBy');
                while(d.options.length > 0) {
                    d.remove(0);
                }
            }
            
        </script>

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

        function findResearcherStudyingAllAnimals() {
            global $db_conn;
            
            $result = executePlainSQL("SELECT p.name
                                        FROM Person p
                                        WHERE p.personID in (
                                                    SELECT r.PersonID 
                                                    FROM Researcher r 
                                                    WHERE not exists ( SELECT a.animalID
                                                                        FROM animal a 
                                                                        WHERE not exists ( SELECT s.PersonID
                                                                                            FROM Studies s
                                                                                            Where r.PersonID = s.PersonID 
                                                                                            AND a.AnimalID = s.AnimalID)))
                                       ");
            
            echo "Researcher(s): <br>";

            while ($row = OCI_Fetch_Array($result)) {
                
                echo "<tr><td>" . $row[0] . "<br></td></tr>";
            }
        }

        function findCountResearchItems() {
            global $db_conn;

            $table = $_GET['mainMenu'];
            $groupBy = $_GET['aggregationGroupBy'];

            $total = executePlainSQL("SELECT count(*)
                                        FROM $table");

            $result = executePlainSQL("SELECT $groupBy, count(*)
                                        FROM $table
                                        GROUP BY $groupBy");

            // only one row since entire table aggregation
            $rowTotal = OCI_Fetch_Array($total);
            echo "Total count in $table: " . $rowTotal[0] . "<br>";

            if ($groupBy == "Vertebrate" || $groupBy == "Fragile") {
                while ($row = OCI_Fetch_Array($result)) {
                    if ($row[0] == 0) {
                        $currGroup = "not $groupBy";
                    } else if ($row[0] == 1) {
                        $currGroup = $groupBy;
                    }
                    
                    echo "<tr><td> All which are $currGroup: $row[1] items<br></td></tr>";
                }
            } else if ($groupBy == "age" && $table == "plants") {
                while ($row = OCI_Fetch_Array($result)) {
                    echo "<tr><td> Number of plants age $row[0]: $row[1]<br></td></tr>";
                }
            } else if ($groupBy == "diet" && $table == "animal") {
                while ($row = OCI_Fetch_Array($result)) {
                    echo "<tr><td> Number of animals with diet type of $row[0]: $row[1]<br></td></tr>";
                }
            }
            //echo "<br> All which are $groupBy is $result items <br>";

        }

        function handleUpdatePlantAgeSubmit() {
            global $db_conn;

            $plantID = $_POST['plantID'];
            $newPlantAge = $_POST['age'];

            echo "Updating plantID: $plantID to age $newPlantAge";
            executePlainSQL("UPDATE plants SET age=$newPlantAge WHERE plantID=$plantID");
            OCICommit($db_conn);
        }

        function showPlantIDs() {
            global $db_conn;

            $result = executePlainSQL("SELECT plantID, age
                                        FROM plants");
            
            while ($row = OCI_Fetch_Array($result)) {
                echo "PlantID: $row[0] Age: $row[1] <br>";
            }
            
        }

        
        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
    function handleGETRequest() {
        if (connectToDB()) {
            if (array_key_exists('displayTuples', $_GET)) {
                handleDisplayRequest();
            } else if (array_key_exists('findResearcherStudyingAllAnimals', $_GET)) {
                findResearcherStudyingAllAnimals();
            } else if (array_key_exists('findCountResearchItems', $_GET)) {
                findCountResearchItems();
            } else if (array_key_exists('showPlantIDs', $_GET)) {
                showPlantIDs();
            }

            disconnectFromDB();
        }
    }

    /**
     * 
     */
    function handlePOSTRequest() {
        if (connectToDB()) {
            if (array_key_exists('updatePlantAge', $_POST)) {
                handleUpdatePlantAgeSubmit();
            }
            disconnectFromDB();
        }
    }

    if (isset($_POST['updatePlantAgeSubmit'])) {
        handlePOSTRequest();
    } else if (isset($_GET['displayTupleRequest']) || isset($_GET['findResearcherStudyingAllAnimalsRequest']) || isset($_GET["findCountResearchItemsRequest"]) || ISSET(($_GET["showPlantIDsRequest"]))) {
        handleGETRequest();
    }
		?>
	</body>
</html>
