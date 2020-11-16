<!DOCTYPE html>
    <html>
        <head>  
            <title>304 ARCTIC EXPEDITION </title> 
        </head>

    <body>
        <h1>304 Arctic Expedition</h1>

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

        <hr />
        <h2>Insert Values into Person Table</h2>
        <form method="POST" action="ArcticExpedition.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            PersonID: <input type="text" name="PID"> <br /><br />
            Age: <input type="text" name="Age"> <br /><br />
            Name: <input type="text" name="Name"> <br /><br />
            Gender: <input type="text" name="Gender"> <br /><br />
            Weight: <input type="text" name="Weight"> <br /><br />
            Height: <input type="text" name="Height"> <br /><br />
            <input type="submit" value="Insert" name="insertSubmit"></p>
        </form>
        <hr />

        <h2>Count the Tuples in Persons</h2>
        <form method="GET" action="ArcticExpedition.php"> <!--refresh page when submitted-->
            <input type="hidden" id="countTupleRequest" name="countTupleRequest">
            <input type="submit" name="countTuples"></p>
        </form>
        <hr />

        <h2>Display the Tuples</h2>
        <form method="GET" action="ArcticExpedition.php"> <!--refresh page when submitted-->
            <label for="Name"> Display tuples in: </label>
            <select name="table" id="table">
                <option value="Person">Person</option>
                <option value="Researcher">Researcher</option>
                <option value="Crew">Crew</option>
                <option value="PersonalItem">PersonalItem</option>
                <option value="Plants">Plants</option>
                <option value="Animal">Animal</option>
                <option value="Cargo">Cargo</option>
                <option value="Food">Food</option>
                <option value="ScientificEquipment">ScientificEquipment</option>
                <option value="weather1">weather1</option>
                <option value="weather2">weather2</option>
                <option value="weather3">weather3</option>
                <option value="location">location</option>
                <option value="maxDist">maxDist</option>
                <option value="arrivalDate">arrivalDate</option>
                <option value="shipModel">shipModel</option>
                <option value="ship">ship</option>
                <option value="explorationVehicle1">explorationVehicle1</option>
                <option value="explorationVehicle2">explorationVehicle2</option>
                <option value="explorationVehicle3">explorationVehicle3</option>
                <option value="uses">uses</option>
                <option value="travelsTo">travelsTo</option>
                <option value="takesOut">takesOut</option>
                <option value="Studies">Studies</option>
                <option value="consumes">consumes</option>
                <option value="transportedBy">transportedBy</option>
                <option value="eats">eats</option>
            </select>
            <input type="hidden" id="displayTupleRequest" name="displayTupleRequest">
            <input type="submit" name="displayTuples"></p>
        </form>
        <hr />

        
        <h2>Join</h2>
        <form method="GET" action="ArcticExpedition.php"> <!--refresh page when submitted-->
        <label for="Name"> Find all the names of the people who have went to the coordinates </label>
            <select name="coordinate" id="coordinate">
                <option value="85">85,132</option>
                <option value="87">87,122</option>
                <option value="86">86,128</option>
                <option value="89">89,127</option>
                </select>
                <label> who are 
            <select name="condition" id="condition">
                <option value=">"> over </option>
                <option value="<"> under </option> 
                <option value="="> equal to </option>
                <option value="<>"> not </option>
            </select>
            <label> the age
                <input type="text" name="age"> <br /><br />
            <input type="hidden" id="joinRequest" name="joinRequest">
            <input type="submit" name="join"></p>
        </form>
        <hr />

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
        <hr />

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
                <option value="name">Name</option>
                <option value="gender">Gender</option>
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
            <label> and
            <select name="attribute3" id="attribute3">
                <option value="personId">PersonID</option>
                <option value="age">Age</option>
                <option value="name">Name</option>
                <option value="gender">Gender</option>
                <option value="weight">Weight</option>
                <option value="height">Height</option>
            </select>
            <label> is
            <select name="condition2" id="condition2">
                <option value="<">less than</option>
                <option value="<=">less than or equal to</option>
                <option value="=">equal to </option>
                <option value=">">greater than </option>
                <option value=">=">greater than or equal to</option>
            </select>
            <input type="text" name="insNo2"> <br /><br />

            <input type="hidden" id="selectionDropDown" name="selectionDropDown">
            <input type="submit" name="selection2"></p>
        </form>
        <hr />

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
        <hr />

        <h2>Delete lost or broken cargo</h2>
        <label> Delete cargo entry and corresponding entries on Scientific Equipment</label>
        <form method="POST" action="ArcticExpedition.php"> <!--refresh page when submitted-->
            ID of broken Scientific Equipment:
            <select name="deleteThis" id="deleteThis">
            <option value="">--- Select ---</option>
            <?php
            connectToDB();
            $result = executePlainSQL("SELECT CargoID FROM Cargo"); 
                while ($row = oci_fetch_row($result)) {
                    ?>
                    <option value="<?php echo $row[0];?>"><?php echo $row[0];?> </option>
                    <?php
                }
                ?>
            </select>
            <input type="hidden" id="deletionRequest" name="deletionRequest">
            <input type="submit" name="deletion"></p>
        </form>
        <hr />

        <h2>Find the Age of People who have Taken out a vehicle</h2>
        <form method="POST" action="ArcticExpedition.php"> <!--refresh page when submitted-->
        Give me the
            <select name="minMaxAvg" id="minMaxAvg">
                <option value="">--- Select ---</option>
                <option value="MIN(p.age)">Minimum</option>
                <option value="MAX(p.age)">Maximum</option>
                <option value="AVG(p.age)">Average</option>
            </select>
            age
            <input type="hidden" id="groupByRequest" name="groupByRequest">
            <input type="submit" name="groupBy"></p>
        </form>
        <hr />

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

            executePlainSQL("INSERT INTO Animal VALUES(8910209, 'carnivore', 'third-largest rorqual after the blue whale and the fin whale', 'sei whale', 'Bert', 1)");
            executePlainSQL("INSERT INTO Animal VALUES(2342123, 'carnivore', 'orca,largest member of oceanic dolphin family', 'killer whale', 'Ernie', 1)");
            executePlainSQL("INSERT INTO Animal VALUES(7028311, 'carnivore', 'can produce a song that lasts 10 to 20 minutes, also apart of rorqual', 'humpback whale', 'Elmo', 1)");
            executePlainSQL("INSERT INTO Animal VALUES(8234812, 'carnivore', 'largest animal to ever exist', 'blue whale', 'Big Bird', 1)");
            executePlainSQL("INSERT INTO Animal VALUES(3333333, 'carnivore', 'formerly known as herring whale or razorback whale', 'fin whale', 'Kermit', 1)");
            executePlainSQL("INSERT INTO Animal VALUES(4343434, 'herbivore', 'has a slender body, a deeply forked tail, a projecting mouth, and a small whisker on its chin', 'arctic cod', 'Small Fry', 1)");
            executePlainSQL("INSERT INTO Animal VALUES(4123122, 'herbivore', 'Their heads are large with small eyes; their bodies are slender tapering to very small tails', 'snailfish', 'Marina', 1)");
            executePlainSQL("INSERT INTO Plants VALUES(2323111, 'Deschampsia antarctica', 'green', 2, 2, 'fully grown Antarctic hair grass')");
            executePlainSQL("INSERT INTO Plants VALUES(1111111, 'Colobanthus quitensis', 'yellow and green' , 1, 2, 'Antarctic pearlwort, mosslike with yellow flowers')");
            executePlainSQL("INSERT INTO Plants VALUES(3123411, 'Deschampsia antarctica', 'green', 1, 1,'still relatively short antarctic hair grass')");
            executePlainSQL("INSERT INTO Plants VALUES(1020304, 'Colobanthus quitensis', 'green', 1, 2, 'antarctic pearlwort, no flowers yet')");
            executePlainSQL("INSERT INTO Plants VALUES(1991203, 'Colobanthus quitensis', 'yellow and green', 10, 12, 'antarctic pearlwort, has abundant amount of flowers')");
            executePlainSQL("INSERT INTO location VALUES(85, 132, 'desert')");
            executePlainSQL("INSERT INTO location VALUES(87, 122, 'desert')");
            executePlainSQL("INSERT INTO location VALUES(89, 127, 'desert')");
            executePlainSQL("INSERT INTO location VALUES(85, 130, 'desert')");
            executePlainSQL("INSERT INTO location VALUES(86, 128, 'desert')");
            executePlainSQL("INSERT INTO weather1 VALUES(-25, 0.55, 0.04)");
            executePlainSQL("INSERT INTO weather1 VALUES(-35, 0.43, 0.88)");
            executePlainSQL("INSERT INTO weather1 VALUES(-42, 0.23, 0.92)");
            executePlainSQL("INSERT INTO weather1 VALUES(-44, 0.33, 0.11)");
            executePlainSQL("INSERT INTO weather1 VALUES(-26, 0.01, 0.69)");
            executePlainSQL("INSERT INTO weather2 VALUES(0.55, 0.88)");
            executePlainSQL("INSERT INTO weather2 VALUES(0.43, 0.23)");
            executePlainSQL("INSERT INTO weather2 VALUES(0.23, 0.11)");
            executePlainSQL("INSERT INTO weather2 VALUES(0.33, 0.22)");
            executePlainSQL("INSERT INTO weather2 VALUES(0.03, 0.33)");
            executePlainSQL("INSERT INTO weather3 VALUES(-25, 28, '16-OCT-2020', 0.24, 85, 132)");
            executePlainSQL("INSERT INTO weather3 VALUES(-35, 50, '17-OCT-2020', 0.55, 87, 122)");
            executePlainSQL("INSERT INTO weather3 VALUES(-42, 43, '18-OCT-2020', 0.56, 89, 127)");
            executePlainSQL("INSERT INTO weather3 VALUES(-44, 55, '19-OCT-2020', 0.88, 85, 130)");
            executePlainSQL("INSERT INTO weather3 VALUES(-26, 22, '20-OCT-2020', 0.82, 86, 128)");
            executePlainSQL("INSERT INTO Person VALUES(9119119, 28, 'John', 'male', 87, 188)");
            executePlainSQL("INSERT INTO Person VALUES(1191191, 25, 'Sally', 'female', 72, 158)");
            executePlainSQL("INSERT INTO Person VALUES(1111119, 36, 'Adam', 'male', 80, 162)");
            executePlainSQL("INSERT INTO Person VALUES(9999999, 38, 'Betty', 'female', 73, 174)");
            executePlainSQL("INSERT INTO Person VALUES(3729123, 42, 'Alex', 'nonbinary', 56, 142)");
            executePlainSQL("INSERT INTO Person VALUES(1234567, 28, 'Frankie', 'male', 87, 188)");
            executePlainSQL("INSERT INTO Person VALUES(1212121, 25, 'Boro', 'female', 72, 158)");
            executePlainSQL("INSERT INTO Person VALUES(2323232, 36, 'Tedd', 'male', 80, 162)");
            executePlainSQL("INSERT INTO Person VALUES(3434343, 38, 'Amanda', 'female', 73, 174)");
            executePlainSQL("INSERT INTO Person VALUES(4545454, 42, 'Alysha', 'nonbinary', 56, 142)");
            executePlainSQL("INSERT INTO researcher VALUES(9119119, 'biology') ");
            executePlainSQL("INSERT INTO researcher VALUES(1191191, 'chemistry')");
            executePlainSQL("INSERT INTO researcher VALUES(3729123, 'biology')");
            executePlainSQL("INSERT INTO researcher VALUES(1111119, 'botany')");
            executePlainSQL("INSERT INTO researcher VALUES(9999999, 'biology')");
            executePlainSQL("INSERT INTO crew VALUES(1234567, 'Ship Captain')");
            executePlainSQL("INSERT INTO crew VALUES(1212121, 'Janitor of Ship')");
            executePlainSQL("INSERT INTO crew VALUES(2323232, 'Engine Crew') ");
            executePlainSQL("INSERT INTO crew VALUES(3434343, 'Engine Crew') ");
            executePlainSQL("INSERT INTO crew VALUES(4545454, 'Exploration Vehicle Driver')");
            executePlainSQL("INSERT INTO Cargo VALUES(8972)");
            executePlainSQL("INSERT INTO Cargo VALUES(3487)");
            executePlainSQL("INSERT INTO Cargo VALUES(3232)");
            executePlainSQL("INSERT INTO Cargo VALUES(1111)");
            executePlainSQL("INSERT INTO Cargo VALUES(9872)");
            executePlainSQL("INSERT INTO Cargo VALUES(1234)");
            executePlainSQL("INSERT INTO Cargo VALUES(3434)");
            executePlainSQL("INSERT INTO Cargo VALUES(1521)");
            executePlainSQL("INSERT INTO Cargo VALUES(2142)");
            executePlainSQL("INSERT INTO Cargo VALUES(1612)");
            executePlainSQL("INSERT INTO scientificEquipment VALUES(8972, 82731, 'couple of scratches', 1, 'erlenmeyer flask')"); 
            executePlainSQL("INSERT INTO scientificEquipment VALUES(3487, 23487, 'chipped', 0, 'bunsen burner')");
            executePlainSQL("INSERT INTO scientificEquipment VALUES(3232, 31203, 'new', 0, 'magnifying glass')");
            executePlainSQL("INSERT INTO scientificEquipment VALUES(1111, 48523, 'scratch on left hand side glass', 0, 'binoculars')");
            executePlainSQL("INSERT INTO scientificEquipment VALUES(9872, 48273, 'new', 1, 'erlenmeyer flask')");
            executePlainSQL("INSERT INTO personalItem VALUES(2, 9119119, 89713, 'journal')");
            executePlainSQL("INSERT INTO personalItem VALUES(4, 1191191, 23412, 'notebook')");
            executePlainSQL("INSERT INTO personalItem VALUES(1, 1111119, 37829, 'headphones')");
            executePlainSQL("INSERT INTO personalItem VALUES(3, 9999999, 49712, 'bag')");
            executePlainSQL("INSERT INTO personalItem VALUES(1, 3729123, 39084, 'journal')");
            executePlainSQL("INSERT INTO food VALUES(1234, 'Shin Ramyun Black', '01-JAN-2020','06-OCT-2020' , 280)");
            executePlainSQL("INSERT INTO food VALUES(3434, 'SPAM Classic', '20-NOV-2017', '28-SEP-2023', 174)");
            executePlainSQL("INSERT INTO food VALUES(1521,'Premium Plus Salted Crackers', '17-JAN-2020', '29-JAN-2020', 90)");
            executePlainSQL("INSERT INTO food VALUES(2142, 'Heinz Beans', '22-MAR-2019', '10-OCT-2024', 155)");
            executePlainSQL("INSERT INTO food VALUES(1612, 'Green Giant Whole Kernel Sweet Corn', '10-JAN-2020', '01-JUN-2021', 130)");    
            executePlainSQL("INSERT INTO shipModel VALUES('Cruise Ship Model-AB', 1114, 12)");
            executePlainSQL("INSERT INTO shipModel VALUES('Research Ship Model-BC', 134, 20)");
            executePlainSQL("INSERT INTO shipModel VALUES('Bulk Carrier Model-HC', 130, 21)");
            executePlainSQL("INSERT INTO shipModel VALUES('Ferry Model-FS', 1121, 12)");
            executePlainSQL("INSERT INTO shipModel VALUES('Cruise Ship Model-BT', 2150, 15)");
            executePlainSQL("INSERT INTO shipModel VALUES('Luxury Steamship', 2435, 23)");
            executePlainSQL("INSERT INTO maxDist VALUES(23, 1679, 1800)");
            executePlainSQL("INSERT INTO maxDist VALUES( 12, 4587, 1765)");
            executePlainSQL("INSERT INTO maxDist VALUES(20, 4896, 1657)");
            executePlainSQL("INSERT INTO maxDist VALUES( 21, 5129, 1345)");
            executePlainSQL("INSERT INTO maxDist VALUES(15, 3104, 1300)");
            executePlainSQL("INSERT INTO arrivalDate VALUES('01-JAN-2000', 'Cruise Ship Model-AB' ,'27-MAY-2000')");
            executePlainSQL("INSERT INTO arrivalDate VALUES('10-DEC-2019', 'Research Ship Model-BC', '17-DEC-2019')"); 
            executePlainSQL("INSERT INTO arrivalDate VALUES('14-AUG-2017', 'Cruise Ship Model-AB', '17-AUG-2017')");
            executePlainSQL("INSERT INTO arrivalDate VALUES('12-MAR-2020', 'Ferry Model-FS', '17-APR-2020')");
            executePlainSQL("INSERT INTO arrivalDate VALUES('19-MAR-2012', 'Bulk Carrier Model-HC', '29-APR-2012')");
            executePlainSQL("INSERT INTO arrivalDate VALUES('10-APR-1912', 'Luxury Steamship', '15-APR-1912')");
            executePlainSQL("INSERT INTO ship VALUES('U6CH', 'RMS Titanic', '10-APR-1912', 1679, 'Luxury Steamship', 46328,  4546)");
            executePlainSQL("INSERT INTO ship VALUES('USMW', '50 Years of Victory','14-AUG-2017', 4587, 'Cruise Ship Model-AB', 35319, 3829)"); 
            executePlainSQL("INSERT INTO ship VALUES('PCSUM', 'Ultramarine', '10-DEC-2019', 4896, 'Research Ship Model-BC', 32180, 4128)");
            executePlainSQL("INSERT INTO ship VALUES('ISCS', 'Island Sky', '12-MAR-2020', 5129, 'Bulk Carrier Model-HC', 45928 , 5827)");
            executePlainSQL("INSERT INTO ship VALUES('USON', 'Ocean Nova', '19-MAR-2012', 3104, 'Ferry Model-FS', 26321, 5827)");
            executePlainSQL("INSERT INTO explorationVehicle1 VALUES('jeep', 5)"); 
            executePlainSQL("INSERT INTO explorationVehicle1 VALUES('snowmobile', 3)"); 
            executePlainSQL("INSERT INTO explorationVehicle1 VALUES('landrover', 4)"); 
            executePlainSQL("INSERT INTO explorationVehicle1 VALUES('truck', 3)"); 
            executePlainSQL("INSERT INTO explorationVehicle1 VALUES('Snow Cruiser', 20)"); 
            executePlainSQL("INSERT INTO explorationVehicle2 VALUES('jeep', 45, 0)"); 
            executePlainSQL("INSERT INTO explorationVehicle2 VALUES('snowmobile', 87, 0)"); 
            executePlainSQL("INSERT INTO explorationVehicle2 VALUES('snowmobile', 66, 0)");  
            executePlainSQL("INSERT INTO explorationVehicle2 VALUES('landrover', 30, 0)"); 
            executePlainSQL("INSERT INTO explorationVehicle2 VALUES('truck', 20, 1)"); 
            executePlainSQL("INSERT INTO explorationVehicle3 VALUES(98127, 'jeep', 45)"); 
            executePlainSQL("INSERT INTO explorationVehicle3 VALUES(57481, 'snowmobile', 87)"); 
            executePlainSQL("INSERT INTO explorationVehicle3 VALUES(66273, 'snowmobile', 66)"); 
            executePlainSQL("INSERT INTO explorationVehicle3 VALUES(34578, 'landrover', 30)"); 
            executePlainSQL("INSERT INTO explorationVehicle3 VALUES(89723, 'truck', 20)");  
            executePlainSQL("INSERT INTO uses VALUES(9119119, 8972, 82731, 'mix substances for a chemical compound')");  
            executePlainSQL("INSERT INTO uses VALUES(1191191, 3487, 23487, 'heat up water')");  
            executePlainSQL("INSERT INTO uses VALUES(1111119, 3232, 31203, 'inspect plants up close')");  
            executePlainSQL("INSERT INTO uses VALUES(9999999, 1111, 48523, 'whale watching')");  
            executePlainSQL("INSERT INTO uses VALUES(3729123, 9872, 48273, 'look at insects up close')");  
            executePlainSQL("INSERT INTO travelsTo VALUES(9119119, 85, 132, '28-JUN-2000')");
            executePlainSQL("INSERT INTO travelsTo VALUES(1191191, 87, 122, '27-MAY-2000')");
            executePlainSQL("INSERT INTO travelsTo VALUES(1111119, 89, 127, '15-DEC-2000')");
            executePlainSQL("INSERT INTO travelsTo VALUES(1111119, 85, 132, '15-DEC-2000')");
            executePlainSQL("INSERT INTO travelsTo VALUES(9999999, 85, 132, '25-MAR-2000')");
            executePlainSQL("INSERT INTO travelsTo VALUES(3729123, 86, 128, '26-OCT-2000')");
            executePlainSQL("INSERT INTO travelsTo VALUES(1212121, 87, 122, '26-OCT-2000')");
            executePlainSQL("INSERT INTO travelsTo VALUES(2323232, 85, 132, '29-JUN-2000')");
            executePlainSQL("INSERT INTO travelsTo VALUES(3434343, 89, 127, '29-JUN-2000')");
            executePlainSQL("INSERT INTO travelsTo VALUES(4545454, 85, 132, '29-JUN-2000')");
            executePlainSQL("INSERT INTO studies VALUES(9119119, 8910209, 2323111)");
            executePlainSQL("INSERT INTO studies VALUES(9119119, 2342123, 1111111)");
            executePlainSQL("INSERT INTO studies VALUES(9119119, 7028311, 3123411)");
            executePlainSQL("INSERT INTO studies VALUES(9119119, 8234812, 1020304)");
            executePlainSQL("INSERT INTO studies VALUES(9119119, 3333333, 1991203)");
            executePlainSQL("INSERT INTO studies VALUES(9119119, 4343434, 1991203)");
            executePlainSQL("INSERT INTO studies VALUES(9119119, 4123122, 1991203)");
            executePlainSQL("INSERT INTO studies VALUES(9999999, 3333333, 1991203)");
            executePlainSQL("INSERT INTO studies VALUES(1111119, 3333333, 1991203)");
            executePlainSQL("INSERT INTO Studies VALUES(1191191, 2342123, 1111111)");
            executePlainSQL("INSERT INTO Studies VALUES(3729123, 7028311, 3123411)");
            executePlainSQL("INSERT INTO consumes VALUES(8910209, 4343434)");
            executePlainSQL("INSERT INTO consumes VALUES(2342123, 4343434)");
            executePlainSQL("INSERT INTO consumes VALUES(7028311, 4123122)");
            executePlainSQL("INSERT INTO consumes VALUES(8234812, 4343434)");
            executePlainSQL("INSERT INTO consumes VALUES(3333333, 4123122)");
            executePlainSQL("INSERT INTO takesOut VALUES(9119119, 98127, 'west of the abundance of shrubs', '27-MAY-2000')");
            executePlainSQL("INSERT INTO takesOut VALUES(1191191, 57481, 'east of the abundance of shrubs', '09-APR-2012')"); 
            executePlainSQL("INSERT INTO takesOut VALUES(1111119, 66273, 'near the edge with the sea lions ', '12-MAY-2018')"); 
            executePlainSQL("INSERT INTO takesOut VALUES(9999999, 34578, 'south of the abundance of shrubbery', '17-APR-2016')"); 
            executePlainSQL("INSERT INTO takesOut VALUES(3729123, 89723, 'near the west edge of the ice', '27-MAR-2017')");  
            executePlainSQL("INSERT INTO takesOut VALUES(1234567, 66273, 'North of the edge of the sea', '27-JUN-2005')");
            executePlainSQL("INSERT INTO takesOut VALUES(1212121, 98127, 'east of the beach of with flowers', '19-APR-2014')"); 
            executePlainSQL("INSERT INTO takesOut VALUES(2323232, 34578, 'near the cliff with the orca whales', '18-JUN-2015')"); 
            executePlainSQL("INSERT INTO takesOut VALUES(3434343, 89723, 'south of the edge of the larger iceberg', '21-APR-2019')"); 
            executePlainSQL("INSERT INTO takesOut VALUES(4545454, 98127, 'west of the highest cliff', '14-MAY-2007')");  
            executePlainSQL("INSERT INTO transportedBy VALUES('U6CH', 9119119, 8972)");
            executePlainSQL("INSERT INTO transportedBy VALUES('USMW', 1191191, 3487)");
            executePlainSQL("INSERT INTO transportedBy VALUES('PCSUM', 1111119, 3232)");
            executePlainSQL("INSERT INTO transportedBy VALUES('ISCS', 9999999, 1111)");
            executePlainSQL("INSERT INTO transportedBy VALUES('USON', 3729123, 9872)"); 
            executePlainSQL("INSERT INTO eats VALUES(1234, 9119119, '01-JUN-2010')");
            executePlainSQL("INSERT INTO eats VALUES(3434, 1191191, '19-AUG-2019')");
            executePlainSQL("INSERT INTO eats VALUES(1521, 1111119, '27-JUL-2007')");
            executePlainSQL("INSERT INTO eats VALUES(2142, 9999999, '01-OCT-2001')");
            executePlainSQL("INSERT INTO eats VALUES(1612, 3729123, '01-JUN-2001')");

            echo "<br> done inserting <br>";
            OCICommit($db_conn);
        }

        function handleResetRequest() {
            global $db_conn;
            // Drop old table
            executePlainSQL("DROP TABLE Studies");
            executePlainSQL("DROP TABLE uses");
            executePlainSQL("DROP TABLE Researcher");
            executePlainSQL("DROP TABLE Crew");
            executePlainSQL("DROP TABLE PersonalItem");
            executePlainSQL("DROP TABLE Food");
            executePlainSQL("DROP TABLE ScientificEquipment");
            executePlainSQL("DROP TABLE weather3");
            executePlainSQL("DROP TABLE travelsTo");
            executePlainSQL("DROP TABLE takesOut");
            executePlainSQL("DROP TABLE consumes");
            executePlainSQL("DROP TABLE transportedBy");
            executePlainSQL("DROP TABLE eats");
            executePlainSQL("DROP TABLE Plants");
            executePlainSQL("DROP TABLE Animal");
            executePlainSQL("DROP TABLE weather1");
            executePlainSQL("DROP TABLE weather2");
            executePlainSQL("DROP TABLE location");
            executePlainSQL("DROP TABLE maxDist");
            executePlainSQL("DROP TABLE arrivalDate");
            executePlainSQL("DROP TABLE shipModel");
            executePlainSQL("DROP TABLE ship");
            executePlainSQL("DROP TABLE explorationVehicle1");
            executePlainSQL("DROP TABLE explorationVehicle2");
            executePlainSQL("DROP TABLE explorationVehicle3");
            executePlainSQL("DROP TABLE Person");
            executePlainSQL("DROP TABLE Cargo");

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
                Description char(100),
                PRIMARY KEY (PlantID)
            )");
            executePlainSQL("CREATE TABLE Animal(
                AnimalID integer, 
                Diet char(50), 
                Description char(100), 
                Species char(50), 
                Name char(50) UNIQUE, 
                Vertebrate integer, 
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
                RequireMaintenance integer,
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

            echo "<br> Done creating tables <br>";

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

            $table = $_GET['table'];

            $result = executePlainSQL("SELECT * FROM $table");
            while ($row = oci_fetch_row($result)) {
                print "<pre>";
                print_r($row);
                print "</pre>";
            }

           // displayPeopleHelper($db_conn);
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

        function handleInsertRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['PID'],
                ":bind2" => $_POST['Age'],
                ":bind3" => $_POST['Name'],
                ":bind4" => $_POST['Gender'],
                ":bind5" => $_POST['Weight'],
                ":bind6" => $_POST['Height']
            );

            $alltuples = array (
                $tuple
            );
            executeBoundSQL("INSERT INTO Person VALUES (:bind1, :bind2, :bind3, :bind4, :bind5, :bind6)", $alltuples);
            OCICommit($db_conn);
        }

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
            $attribute3 = $_POST['attribute3'];
            $condition2 = $_POST['condition2'];
            $number2 = $_POST['insNo2'];
            
            $boolean = ctype_digit($number);
            $boolean2 = ctype_digit($number2);

            if (!$boolean) {
                $number= '\'' . $number . '\'';
            }

            if (!$boolean2) {
                $number2= '\'' . $number2 . '\'';
            }

            $result = executePlainSQL("SELECT $attribute1 FROM Person WHERE $attribute2 $condition $number AND $attribute3 $condition2 $number2");
            
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
        
        function handleJoinRequest() {
            global $db_conn;

            $x = $_GET['coordinate'];
            $cond = $_GET['condition'];
            $age = $_GET['age'];

            $result = executePlainSQL("SELECT p.Name 
                                        FROM Person p, travelsTo t
                                        WHERE t.Longitude = $x 
                                            AND p.PersonID = t.PersonID
                                            AND p.age $cond $age");

            echo "<table>";
            echo "<tr><th>Name</th></tr>";


            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]"
            }

            echo "</table>";
            
        }

        
        function handleDeletionRequest() {
            global $db_conn;

            $idDelete = $_POST['deleteThis'];
        
            executePlainSQL("DELETE FROM Cargo WHERE CargoID = $idDelete");
            echo "<br> Successfully Deleted <br>"; // for debugging 
            OCICommit($db_conn);
        }

        function handleGroupsByRequest() {
            global $db_conn;

            $minxMaxAvg = $_POST['minMaxAvg'];
            $result = executePlainSQL("SELECT ev.VehicleType, $minxMaxAvg
            FROM Person p, takesOut t, explorationVehicle3 ev
            WHERE p.PersonID = t.PersonID AND t.VehicleID = ev.VehicleID
            GROUP BY ev.VehicleType");

                $x = "";
            if($minxMaxAvg == "MIN(p.age)") {
                $x = "minimum";
            } else if ($minxMaxAvg == "MAX(p.age)") {
                $x = "maximum";
            } else if ($minxMaxAvg == "AVG(p.age)") {
                $x = "average";
            }
 
            while ($row = oci_fetch_row($result)) {
                $vehicleType = $row[0];
                $age = round($row[1], 2);

                echo "<br> The " . $x . " age of people who took out a " . $vehicleType . " is " . $age . "<br>";
            }
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
            } else if(array_key_exists('join', $_GET)){
                handleJoinRequest(); 
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
            } else if (array_key_exists('insertQueryRequest', $_POST)) {
                handleInsertRequest();
            } else if (array_key_exists('deletion', $_POST)) {
                handleDeletionRequest();
            } else if (array_key_exists('groupBy', $_POST)) {
                handleGroupsByRequest();
            }
            

            disconnectFromDB();
        }
    }

    if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) || isset($_POST['initializeTables']) || isset($_POST['selectionDropDown'])|| isset($_POST['deletionRequest']) ||
        isset($_POST['groupByRequest'])) {
        handlePOSTRequest();
    } else if (isset($_GET['countTupleRequest']) || isset($_GET['displayTupleRequest']) || isset($_GET['selectionRequest']) || isset($_GET['projectionRequest']) || isset($_GET['joinRequest'])) {
        handleGETRequest();
    }
    ?> 
</body>
</html>