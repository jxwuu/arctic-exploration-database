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

        <form method="POST" action="ArcticExpeditionResearcher.php">
            <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
            <input type="hidden" id="gotoArcticExpeditionResearcher" name="gotoArcticExpeditionResearcher">
            <p><input type="submit" value="Researcher Tab" name="gotoArcticExpeditionResearcher"></p>
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

        <h2>Select query from Persons</h2>
        <form method="POST" action="ArcticExpedition.php"> <!--refresh page when submitted-->
            <label for="Name"> Find me the: </label>
            <select name="attribute1" id="attribute1">
                <option value="personId">PersonID</option>
                <option value="age">Age</option>
                <option value="name">Name</option>
                <option value="gender">Gender</option>
                <option value="weight">Weight</option>
                <option value="height">Height</option>
            </select>
            <label> of the people whose
            <select name="attribute2" id="attribute2">
                <option value="personId">PersonID</option>
                <option value="age">Age</option>
                <option value="weight">Weight</option>
                <option value="height">Height</option>
            </select>
            <label> is
            <select name="condition" id="condition">
                <option value="<">less than</option>
                <option value="<=">less than or equal to</option>
                <option value="=">equal to </option>
                <option value=">">greater than </option>
                <option value=">=">greater than or equal to</option>
            </select>
            <input type="text" name="insNo"> <br /><br />
            <input type="hidden" id="selectionDropDown" name="selectionDropDown">
            <input type="submit" name="selection2"></p>
        </form>

        <h2>Project from Persons</h2>
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
            <select name="attribute3" id="attribute3">
                <option value="personId">PersonID</option>
                <option value="age">Age</option>
                <option value="name">Name</option>
                <option value="gender">Gender</option>
                <option value="weight">Weight</option>
                <option value="height">Height</option>
            </select>
            <select name="attribute4" id="attribute4">
                <option value="noOption">noOption</option>
                <option value="personId">PersonID</option>
                <option value="age">Age</option>
                <option value="name">Name</option>
                <option value="gender">Gender</option>
                <option value="weight">Weight</option>
                <option value="height">Height</option>
            </select>
            <select name="attribute5" id="attribute5">
                <option value="noOption">noOption</option>
                <option value="personId">PersonID</option>
                <option value="age">Age</option>
                <option value="name">Name</option>
                <option value="gender">Gender</option>
                <option value="weight">Weight</option>
                <option value="height">Height</option>
            </select>
            <input type="hidden" id="projectionRequest" name="projectionRequest">
            <input type="submit" name="projection"></p>
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

            executePlainSQL("INSERT INTO Person 
            VALUES(1191191, 27, 'Sally', 'female', 72, 158) 
            ");

            executePlainSQL("INSERT INTO Person 
            VALUES(1111119, 28, 'Adam', 'male', 80, 162) 
            ");

            executePlainSQL("INSERT INTO Person 
            VALUES(1234231, 20, 'Benson', 'male', 80, 210) 
            ");
            OCICommit($db_conn);
        }

        function handleResetRequest() {
            global $db_conn;
            // Drop old table
            // executePlainSQL("DROP TABLE Researcher");
            // executePlainSQL("DROP TABLE Crew");
            // executePlainSQL("DROP TABLE PersonalItem");
            // executePlainSQL("DROP TABLE Plants");
            // executePlainSQL("DROP TABLE Animal");
            // executePlainSQL("DROP TABLE Food");
            // executePlainSQL("DROP TABLE ScientificEquipment");
            // executePlainSQL("DROP TABLE weather1");
            // executePlainSQL("DROP TABLE weather2");
            // executePlainSQL("DROP TABLE weather3");
            // executePlainSQL("DROP TABLE location");
            // executePlainSQL("DROP TABLE maxDist");
            // executePlainSQL("DROP TABLE arrivalDate");
            // executePlainSQL("DROP TABLE shipModel");
            // executePlainSQL("DROP TABLE ship");
            // executePlainSQL("DROP TABLE explorationVehicle1");
            // executePlainSQL("DROP TABLE explorationVehicle2");
            // executePlainSQL("DROP TABLE explorationVehicle3");
            // executePlainSQL("DROP TABLE uses");
            // executePlainSQL("DROP TABLE travelsTo");
            // executePlainSQL("DROP TABLE takesOut");
            // executePlainSQL("DROP TABLE Studies");
            // executePlainSQL("DROP TABLE consumes");
            // executePlainSQL("DROP TABLE transportedBy");
            // executePlainSQL("DROP TABLE eats");

            /**
             * all tables referenced as foreign keys must be dropped last
             */ 
            // executePlainSQL("DROP TABLE Person");
            // executePlainSQL("DROP TABLE Cargo");

            /**
             * ALL THE TABLES W/O DEPENDENCIES
             */
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
            executePlainSQL("CREATE TABLE Plants (
                PlantID integer,
                Species char(50),
                Colour char(50),
                Age integer,
                Height integer,
                Description char(50),
                PRIMARY KEY (PlantID)
            )");
            executePlainSQL("CREATE TABLE Animal(
                AnimalID integer, 
                Diet char(50), 
                Description char(100), 
                Species char(50), 
                Name char(50) UNIQUE, 
                Vertebrate char(1), 
                PRIMARY KEY(AnimalID)
            )");
            executePlainSQL("CREATE TABLE Cargo (
                CargoID integer,
                PRIMARY KEY (CargoID)
            )");
            executePlainSQL("CREATE TABLE location(
                Longitude integer, 
                Latitude integer,
                Climate char(50), 
                PRIMARY KEY(longitude, latitude) 
            )");
            executePlainSQL("CREATE TABLE weather1(
                Temperature integer, 
                rain decimal(3, 2),			
                Humidity decimal(3, 2),
                PRIMARY KEY (Temperature, rain)
            )");
            executePlainSQL("CREATE TABLE weather2 (
                Cloud decimal(3, 2),
                rain decimal(3, 2), 
                PRIMARY KEY (Cloud)
            )");
            executePlainSQL("CREATE TABLE maxDist (
                TopSpeed integer,
                CurrentFuel integer,
                MaximumDistance integer,
                PRIMARY KEY(TopSpeed, CurrentFuel)
            )");
            executePlainSQL("CREATE TABLE arrivalDate(
                DepartureDate date,
                ShipModel char(50),
                arrivalDate date,
                PRIMARY KEY(DepartureDate, ShipModel)
            )");
            executePlainSQL("CREATE TABLE shipModel (
                shipModel char(50),
                Capacity integer,
                topSpeed integer,
                PRIMARY KEY (shipModel)
            )");
            executePlainSQL("CREATE TABLE ship (
                SignalFlagID char(50),
                Name char(50),
                DepartureDate date,
                CurrentFuel integer,
                shipModel char(50),
                weightOnBoard integer,
                distanceTravelled integer,
                PRIMARY KEY(SignalFlagID)
            )");
            executePlainSQL("CREATE TABLE explorationVehicle1 (
                VehicleType char(50),
                Seats integer,
                PRIMARY KEY (VehicleType)
            )");
            executePlainSQL("CREATE TABLE explorationVehicle2 (
                VehicleType char(50),
                DistanceTraveled integer,
                RequireMaintenance char(1),
                PRIMARY KEY (VehicleType, DistanceTraveled)
            )");
            executePlainSQL("CREATE TABLE explorationVehicle3 (
                VehicleID integer,
                VehicleType char(50),
                DistanceTraveled integer,
                PRIMARY KEY (VehicleID)
            )"); 



            /**
             * TABLES W/ DEPENDENCIES
             */
            executePlainSQL("CREATE TABLE Researcher(
                PersonID integer,
                AreaOfStudy char(50) NOT NULL,
                PRIMARY KEY (PersonID),
                FOREIGN KEY (PersonID) REFERENCES Person
                    ON DELETE CASCADE
            )
            ");
            executePlainSQL("CREATE TABLE Crew(
                PersonID integer,
                Job char(50) NOT NULL,
                PRIMARY KEY (PersonID),
                FOREIGN KEY (PersonID) REFERENCES Person
                    ON DELETE CASCADE
            )");
            executePlainSQL("CREATE TABLE PersonalItem (
                Weight integer,
                PersonID integer,
                PersonalItemID integer,
                Description char(50),
                PRIMARY KEY (PersonalItemID, PersonID),
                FOREIGN KEY (PersonID) REFERENCES Person
                    ON DELETE CASCADE
            )");
            executePlainSQL("CREATE TABLE Food (
                CargoID integer,
                FoodType char(50),
                PreparationDate date,	
                ExpirationDate date,
                Calories integer,
                PRIMARY KEY (CargoID),
                FOREIGN KEY (CargoID) REFERENCES Cargo
                    ON DELETE CASCADE
            )");
            executePlainSQL("CREATE TABLE ScientificEquipment (
                CargoID integer,
                ScientificEquipmentID integer,
                Description char(50),
                Fragile char(1), 
                Name char(50), 
                PRIMARY KEY(CargoID, ScientificEquipmentID),
                FOREIGN KEY(CargoID) REFERENCES Cargo
                    ON DELETE CASCADE
            )");
            executePlainSQL("CREATE TABLE weather3 (
                Temperature integer,
                WindSpeed integer,
                WeatherDate date,
                Cloud decimal(3, 2),
                Latitude integer,
                Longitude integer,
                PRIMARY KEY (WeatherDate, Latitude, Longitude),
                FOREIGN KEY (Latitude, Longitude) REFERENCES Location
                    ON DELETE CASCADE
            )");
            executePlainSQL("CREATE TABLE uses(
                PersonID integer,
                CargoID integer,
                ScientificEquipmentID integer,
                Purpose char(50),
                PRIMARY KEY (PersonID, CargoID, ScientificEquipmentID),
                FOREIGN KEY (PersonID) REFERENCES researcher
                    ON DELETE CASCADE,
                FOREIGN KEY (CargoID, ScientificEquipmentID) REFERENCES ScientificEquipment
                    ON DELETE CASCADE
            )"); 
            executePlainSQL("CREATE TABLE travelsTo(
                PersonID integer,
                Longitude integer,
                Latitude integer,
                TravelsToDate date,
                PRIMARY KEY(PersonID, Longitude, Latitude),
                FOREIGN KEY (PersonID) REFERENCES Person
                    ON DELETE CASCADE,
                FOREIGN KEY (Longitude, Latitude) REFERENCES Location
                    ON DELETE CASCADE
            )"); 
            executePlainSQL("CREATE TABLE takesOut(
                PersonID integer,
                VehicleID integer,
                Destination char(50), 
                TakesOutDate date,
                PRIMARY KEY (PersonID, VehicleID, Destination, TakesOutDate),	
                FOREIGN KEY (PersonID) REFERENCES Person
                    ON DELETE CASCADE,
                FOREIGN KEY (VehicleID) REFERENCES explorationVehicle3
                    ON DELETE CASCADE
            )"); 
            executePlainSQL("CREATE TABLE Studies(
                PersonID integer,
                AnimalID integer,
                PlantID integer,
                PRIMARY KEY (PersonID, AnimalID, PlantID),
                FOREIGN KEY (PersonID) references researcher
                    ON DELETE CASCADE,
                FOREIGN KEY (AnimalID) references Animal
                    ON DELETE CASCADE,
                FOREIGN KEY (PlantID) references Plants
                    ON DELETE CASCADE	
            )"); 
            executePlainSQL("CREATE TABLE consumes(
                AnimalID1 integer,
                AnimalID2 integer,
                PRIMARY KEY (AnimalID1, AnimalID2),
                FOREIGN KEY (AnimalID1) REFERENCES Animal
                    ON DELETE CASCADE,
                FOREIGN KEY (AnimalID2) REFERENCES Animal
                    ON DELETE CASCADE
            )"); 
            executePlainSQL("CREATE TABLE transportedBy (
                SignalFlagID char(50),
                PersonID integer,
                CargoID integer,
                PRIMARY KEY (PersonID, CargoID),
                FOREIGN KEY (PersonID) REFERENCES Person
                    ON DELETE CASCADE,
                FOREIGN KEY (SignalFlagID) REFERENCES Ship
                    ON DELETE CASCADE,
                FOREIGN KEY (CargoID) REFERENCES Cargo
                    ON DELETE CASCADE
            )");
            executePlainSQL("CREATE TABLE consumes(
                AnimalID1 integer,
                AnimalID2 integer,
                PRIMARY KEY (AnimalID1, AnimalID2),
                FOREIGN KEY (AnimalID1) REFERENCES Animal
                    ON DELETE CASCADE,
                FOREIGN KEY (AnimalID2) REFERENCES Animal
                    ON DELETE CASCADE
            )");      
            executePlainSQL("CREATE TABLE  eats (
                CargoID integer,
                PersonID integer,
                Eatsdate date,
                PRIMARY KEY (CargoID, PersonID),
                FOREIGN KEY (CargoID) REFERENCES Cargo
                    ON DELETE CASCADE,
                FOREIGN KEY (PersonID) REFERENCES Person
                    ON DELETE CASCADE
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

        function handleSelectionRequest2() {
            global $db_conn;

            $attribute1 = $_POST['attribute1'];
            $attribute2 = $_POST['attribute2'];
            $condition = $_POST['condition'];
            $number = $_POST['insNo'];

            $result = executePlainSQL("SELECT $attribute1 FROM Person WHERE $attribute2 $condition $number");
            
            echo "<br>Retrieved data from Person Table:<br>";
            echo "<table>";
            echo "<tr><th>$attribute1</th></tr>";
            
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td></tr>"; //or just use "echo $row[0]"
            }
            
            echo "</table>";
        }

        function handleProjectionRequest() {
            global $db_conn;

            $attribute1 = $_GET['attribute1'];
            $attribute2 = $_GET['attribute2'];
            $attribute3 = $_GET['attribute3'];
            $attribute4 = $_GET['attribute4'];
            $attribute5 = $_GET['attribute5'];

            if ($attribute4 == 'noOption') $attribute4 = '';
            if ($attribute5 == 'noOption') $attribute5 = '';

            if ($attribute4 == '' && $attribute5 == '') {
                $result = executePlainSQL("SELECT $attribute1, $attribute2, $attribute2
                                        FROM Person");
            } else if ($attribute4 == '') {
                $result = executePlainSQL("SELECT $attribute1, $attribute2, $attribute2, $attribute5
                                        FROM Person");
            } else if ($attribute5 == ''){
                $result = executePlainSQL("SELECT $attribute1, $attribute2, $attribute2, $attribute4
                                        FROM Person");
            } else {
                $result = executePlainSQL("SELECT $attribute1, $attribute2, $attribute2, $attribute5, $attribute4
                                        FROM Person");
            }
            
            echo "<br>Retrieved data from Person Table:<br>";
            echo "<table>";
            echo "<tr><th>$attribute1</th>
                    <th>$attribute2</th>
                    <th>$attribute3</th>
                    <th>$attribute4</th>
                    <th>$attribute5</th></tr>";
            
            while ($row = OCI_Fetch_Array($result)) {
                if ($attribute4 == '' && $attribute5 == '') {
                    echo "<tr><td>" . $row[0] . 
                    "</td><td>" . $row[1] . 
                    "</td><td>" . $row[2] . 
                    "</td></tr>";
                } else if ($attribute4 == '' || $attribute5 == '') {
                    echo "<tr><td>" . $row[0] . 
                    "</td><td>" . $row[1] . 
                    "</td><td>" . $row[2] . 
                    "</td><td>" . $row[3] . 
                    "</td></tr>";
                } else {
                    echo "<tr><td>" . $row[0] . 
                    "</td><td>" . $row[1] . 
                    "</td><td>" . $row[2] . 
                    "</td><td>" . $row[3] . 
                    "</td><td>" . $row[4] . 
                    "</td></tr>";
                } //or just use "echo $row[0]"
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
    } else if (isset($_GET['countTupleRequest']) || isset($_GET['displayTupleRequest']) || isset($_GET['selectionRequest']) || isset($_GET['projectionRequest'])) {
        handleGETRequest();
    }
    ?>
</body>
</html>