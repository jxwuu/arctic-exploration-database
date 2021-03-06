CREATE TABLE Person(
	PersonID integer, 
	Age integer,
	Name char(50) NOT NULL,
	Gender char(50),
	Weight integer,
	Height integer, 
	PRIMARY KEY (PersonID)
)

CREATE TABLE Researcher(
	PersonID integer,
	AreaOfStudy char(50) NOT NULL,
	PRIMARY KEY (PersonID),
	FOREIGN KEY (PersonID) REFERENCES Person
		ON DELETE CASCADE
)

CREATE TABLE Crew(
	PersonID integer,
	Job char(50) NOT NULL,
	PRIMARY KEY (PersonID),
	FOREIGN KEY (PersonID) REFERENCES Person
		ON DELETE CASCADE
)

CREATE TABLE PersonalItem (
	Weight integer,
	PersonID integer,
	PersonalItemID integer,
	Description char(50),
	PRIMARY KEY (PersonalItemID, PersonID),
	FOREIGN KEY (PersonID) REFERENCES Person
		ON DELETE CASCADE
)
CREATE TABLE Plants (
	PlantID integer,
	Species char(50),
	Colour char(50),
	Age integer,
	Height integer,
	Description char(100),
	PRIMARY KEY (PlantID)
)

CREATE TABLE Animal(
	AnimalID integer, 
	Diet char(50), 
	Description char(100), 
	Species char(50), 
	Name char(50) UNIQUE, 
	Vertebrate integer, 
	PRIMARY KEY(AnimalID)
)

CREATE TABLE Cargo (
	CargoID integer,
	PRIMARY KEY (CargoID)
)

CREATE TABLE Food (
	CargoID integer,
	FoodType char(50),
	PreparationDate date,	
	ExpirationDate date,
	Calories integer,
	PRIMARY KEY (CargoID),
	FOREIGN KEY (CargoID) REFERENCES Cargo
		ON DELETE CASCADE
)

CREATE TABLE ScientificEquipment (
	CargoID integer,
	ScientificEquipmentID integer,
	Description char(50),
	Fragile integer, 
	Name char(50), 
	PRIMARY KEY(CargoID, equipmentID),
	FOREIGN KEY(CargoID) REFERENCES Cargo
		ON DELETE CASCADE
)

-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> WEATHER  >>>>>>>>>>>>>>>>>>>>>>>>>>

CREATE TABLE weather1(
	Temperature integer, 
	rain decimal(3, 2),			
	Humidity decimal(3, 2),
	PRIMARY KEY (Temperature, rain)
)
CREATE TABLE weather2 (
	Cloud decimal(3, 2),
	rain decimal(3, 2), 
	PRIMARY KEY (Cloud)
)
CREATE TABLE weather3 (
	Temperature integer,
	WindSpeed integer,
	Date date,
	Cloud decimal(3, 2),
	Latitude integer,
	Longitude integer,
	PRIMARY KEY (date, latitude, longitude),
	FOREIGN KEY (Latitude, Longitude) REFERENCES Location
		ON DELETE CASCADE
)
-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
CREATE TABLE location(
	Longitude integer, 
	Latitude integer,
	Climate char(50), 
	PRIMARY KEY(longitude, latitude) 
)
-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> SHIP  >>>>>>>>>>>>>>>>>>>>>>>>>>

CREATE TABLE maxDist (
TopSpeed integer,
CurrentFuel integer,
MaximumDistance integer,
PRIMARY KEY(TopSpeed, CurrentFuel)
)

CREATE TABLE arrivalDate(
DepartureDate DATE,
ShipModel char(50),
arrivalDate DATE,
PRIMARY KEY(DepartureDate, ShipModel),
)

CREATE TABLE shipModel (
	shipModel char(50),
	Capacity integer,
	topSpeed integer,
	PRIMARY KEY (shipModel), 
)

CREATE TABLE ship (
SignalFlagID char(50),
Name char(50),
DepartureDate DATE,
CurrentFuel integer,
shipModel char(50),
	weightOnBoard integer,
	distanceTravelled integer,
PRIMARY KEY(SignalFlagID)
)

-- >>>>>>>>>>>>>>>>>>>>>>>>>EXPLORATION VEHICLE>>>>>>>>>>>>>>>>>>>>>>

CREATE TABLE explorationVehicle1 (
	VehicleType char(50),
	Seats integer,
	PRIMARY KEY (VehicleType)
)

CREATE TABLE explorationVehicle2 (
	VehicleType char(50),
	DistanceTraveled integer,
	RequireMaintenance bool,
	PRIMARY KEY (VehicleType, DistanceTraveled)
)

CREATE TABLE explorationVehicle3 (
	VehicleID integer,
	VehicleType char(50),
	DistanceTraveled integer,
	PRIMARY KEY (VehicleID)
)

-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

--- relationships--- 

CREATE TABLE uses(
	PersonID integer,
	CargoID integer,
	ScientificEquipmentID integer,
	Purpose char(50),
	PRIMARY KEY (PersonID, CargoID, ScientificEquipmentID),
	FOREIGN KEY (PersonID) REFERENCES researcher
		ON DELETE CASCADE,
	FOREIGN KEY (CargoID, ScientificEquipmentID) REFERENCES ScientificEquipment
		ON DELETE CASCADE
)

CREATE TABLE travelsTo(
	PersonID integer,
	Longitude integer,
	Latitude integer,
	Date date,
	PRIMARY KEY(PersonID, Longitude, Latitude),
	FOREIGN KEY (PersonID) REFERENCES Person
		ON DELETE CASCADE,
	FOREIGN KEY (Longitude, Latitude) REFERENCES Location
		ON DELETE CASCADE
)

CREATE TABLE takesOut(
	PersonID integer,
	VehicleID integer,
	Destination char(50), 
	Date DATE,
	PRIMARY KEY (PersonID, VehicleID, Destination, Date),	
	FOREIGN KEY (PersonID) REFERENCES Person
		ON DELETE CASCADE,
	FOREIGN KEY (VehicleID) REFERENCES ExplorationVehicle3
		ON DELETE CASCADE
)

CREATE TABLE Studies(
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
)

CREATE TABLE consumes(
	AnimalID1 integer,
	AnimalID2 integer,
	PRIMARY KEY (AnimalID1, AnimalID2),
	FOREIGN KEY (AnimalID1) REFERENCES Animal
		ON DELETE CASCADE,
	FOREIGN KEY (AnimalID2) REFERENCES Animal
		ON DELETE CASCADE
)

CREATE TABLE transportedBy (
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
)


CREATE TABLE eats (
    CargoID integer,
    PersonID integer,
    date date,
    PRIMARY KEY (CargoID, PersonID),
    FOREIGN KEY (CargoID) REFERENCES Cargo
        ON DELETE CASCADE,
    FOREIGN KEY (PersonID) REFERENCES Person
        ON DELETE CASCADE
)

-- Animal Table --

INSERT INTO Animal
VALUES(8910209, 'carnivore', 'third-largest rorqual after the blue whale and the fin whale', 'sei whale', 'Bert', 1) 

INSERT INTO Animal
VALUES(2342123, 'carnivore', 'orca,largest member of oceanic dolphin family', 'killer whale', 'Ernie', 1) 

INSERT INTO Animal
VALUES(7028311, 'carnivore', 'can produce a song that lasts 10 to 20 minutes, also apart of rorqual', 'humpback whale', 'Elmo', 1) 

INSERT INTO Animal
VALUES(8234812, 'carnivore', 'largest animal to ever exist', 'blue whale', 'Big Bird', 1) 

INSERT INTO Animal
VALUES(3333333, 'carnivore', 'formerly known as herring whale or razorback whale', 'fin whale', 'Kermit', 1) 

INSERT INTO Animal 
VALUES(4343434, 'herbivore', 'zzz', 'arctic cod', 'Small Fry', 1)

INSERT INTO Animal 
VALUES(4123122, 'herbivore', 'zzz', 'snailfish', 'Marina', 1)

-- Plants Table --

INSERT INTO Plants
VALUES(2323111, 'Deschampsia antarctica', 'green', 2, 2, 'fully grown Antarctic hair grass')

INSERT INTO Plants
VALUES(1111111, 'Colobanthus quitensis', 'yellow and green' , 1, 2, 'Antarctic pearlwort, mosslike with yellow flowers')

INSERT INTO Plants
VALUES(3123411, 'Deschampsia antarctica', 'green', 1, 1,'still relatively short antarctic hair grass')

INSERT INTO Plants
VALUES(1020304, 'Colobanthus quitensis', 'green', 1, 2, 'antarctic pearlwort, no flowers yet')

INSERT INTO Plants
VALUES(1991203, 'Colobanthus quitensis', 'yellow and green', 10, 12, 'antarctic pearlwort, has abundant amount of flowers' )

-- Weather tables -

INSERT INTO weather1
VALUES(-25, 0.55, 0.04) 

INSERT INTO weather1
VALUES(-35, 0.43, 0.88) 

INSERT INTO weather1
VALUES(-42, 0.23, 0.92) 

INSERT INTO weather1
VALUES(-44, 0.33, 0.11) 

INSERT INTO weather1
VALUES(-26, 0.01, 0.69) 

INSERT INTO weather2
VALUES(0.55, 0.88)

INSERT INTO weather2
VALUES(0.43, 0.23)

INSERT INTO weather2
VALUES(0.23, 0.11)

INSERT INTO weather2
VALUES(0.33, 0.22)

INSERT INTO weather2
VALUES(0.03, 0.33)

INSERT INTO weather3
VALUES(-25, 28, '16-OCT-2020', 0.24, 85, 132)

INSERT INTO weather3
VALUES(-35, 50, '17-OCT-2020', 0.55, 87, 122)

INSERT INTO weather3
VALUES(-42, 43, '18-OCT-2020', 0.56, 89, 127)

INSERT INTO weather3
VALUES(-44, 55, '19-OCT-2020', 0.88, 85, 130)

INSERT INTO weather3
VALUES(-26, 22, '20-OCT-2020', 0.82, 86, 128)

-- Person table --

INSERT INTO Person 
VALUES(9119119, 28, 'John', 'male', 87, 188)

INSERT INTO Person 
VALUES(1191191, 25, 'Sally', 'female', 72, 158)

INSERT INTO Person 
VALUES(1111119, 36, 'Adam', 'male', 80, 162)

INSERT INTO Person 
VALUES(9999999, 38, 'Betty', 'female', 73, 174)

INSERT INTO Person 
VALUES(3729123, 42, 'Alex', 'nonbinary', 56, 142)

INSERT INTO Person 
VALUES(1234567, 28, 'Frankie', 'male', 87, 188)

INSERT INTO Person 
VALUES(1212121, 25, 'Boro', 'female', 72, 158)

INSERT INTO Person 
VALUES(2323232, 36, 'Tedd', 'male', 80, 162)

INSERT INTO Person 
VALUES(3434343, 38, 'Amanda', 'female', 73, 174)

INSERT INTO Person 
VALUES(4545454, 42, 'Alysha', 'nonbinary', 56, 142)

-- Researcher Table --

INSERT INTO researcher 
VALUES(9119119, 'biology') 

INSERT INTO researcher 
VALUES(1191191, 'chemistry')

INSERT INTO researcher 
VALUES(3729123, 'biology')

INSERT INTO researcher 
VALUES(1111119, 'botany')

INSERT INTO researcher 
VALUES(9999999, 'biology')

-- Crew table -- 

INSERT INTO crew 
VALUES(1234567, 'Ship Captain')

INSERT INTO crew 
VALUES(1212121, 'Janitor of Ship')

INSERT INTO crew 
VALUES(2323232, 'Engine Crew')

INSERT INTO crew 
VALUES(3434343, 'Engine Crew')

INSERT INTO crew 
VALUES(4545454, 'Exploration Vehicle Driver')

-- ScientificEquipment Table --

INSERT INTO scientificEquipment
VALUES(8972, 82731, 'couple of scratches', 1, 'erlenmeyer flask') 

INSERT INTO scientificEquipment
VALUES(3487, 23487, 'chipped', 0, 'bunsen burner') 

INSERT INTO scientificEquipment
VALUES(3232, 31203, 'new', 0, 'magnifying glass') 

INSERT INTO scientificEquipment
VALUES(1111, 48523, 'scratch on left hand side glass', 0, 'binoculars') 

INSERT INTO scientificEquipment
VALUES(9872, 48273, 'new', 1, 'erlenmeyer flask') 

-- PersonItem Table -- 

INSERT INTO personalItem 
VALUES(2, 9119119, 89713, 'journal')

INSERT INTO personalItem 
VALUES(4, 1191191, 23412, 'notebook')

INSERT INTO personalItem 
VALUES(1, 1111119, 37829, 'headphones')

INSERT INTO personalItem 
VALUES(3, 9999999, 49712, 'bag')

INSERT INTO personalItem 
VALUES(1, 3729123, 39084, 'journal')

-- Cargo Table -- 

INSERT INTO Cargo
VALUES(8972)

INSERT INTO Cargo
VALUES(3487)

INSERT INTO Cargo
VALUES(3232)

INSERT INTO Cargo
VALUES(1111)

INSERT INTO Cargo
VALUES(9872)

INSERT INTO Cargo
VALUES(1234)

INSERT INTO Cargo
VALUES(3434)

INSERT INTO Cargo
VALUES(1521)

INSERT INTO Cargo
VALUES(2142)

INSERT INTO Cargo
VALUES(1612)

INSERT INTO Cargo
VALUES(1999)

INSERT INTO Cargo
VALUES(2000)
-- Food Table -- 

INSERT INTO food 
VALUES(1234, 'Shin Ramyun Black', '01-JAN-2020','06-OCT-2020' , 280)

INSERT INTO food 
VALUES(3434, 'SPAM Classic', '20-NOV-2017', '28-SEP-2023', 174) 

INSERT INTO food 
VALUES(1521,'Premium Plus Salted Crackers', '17-JAN-2020', '29-JAN-2020', 90) 

INSERT INTO food 
VALUES(2142, 'Heinz Beans', '22-MAR-2019', '10-OCT-2024', 155) 

INSERT INTO food 
VALUES(1612, 'Green Giant Whole Kernel Sweet Corn', '10-JAN-2020', '01-JUN-2021', 130)   

INSERT INTO food 
VALUES(1999, 'Haitai Original Crackers', '22-MAR-2019', '10-OCT-2024', 140) 

INSERT INTO food 
VALUES(2000, 'Orion Kkobuk Corn Chips', '10-JAN-2020', '01-JUN-2021', 250)  
-- Location Table -- 

INSERT INTO location
VALUES(85, 132, 'desert')

INSERT INTO location
VALUES(87, 122, 'desert')

INSERT INTO location
VALUES(89, 127, 'desert')

INSERT INTO location
VALUES(85, 130, 'desert')

INSERT INTO location
VALUES(86, 128, 'desert')

-- shipModel Table -- 

INSERT INTO shipModel 
VALUES('Cruise Ship Model-AB', 1114, 12)

INSERT INTO shipModel 
VALUES('Research Ship Model-BC', 134, 20)

INSERT INTO shipModel 
VALUES('Bulk Carrier Model-HC', 130, 21)

INSERT INTO shipModel 
VALUES('Ferry Model-FS', 1121, 12)

INSERT INTO shipModel 
VALUES('Cruise Ship Model-BT', 2150, 15)

INSERT INTO shipModel 
VALUES('Luxury Steamship', 2435, 23)

-- maxDist Table -- 

INSERT INTO maxDist 
VALUES(23, 1679, 1800)

INSERT INTO maxDist 
VALUES( 12, 4587, 1765)

INSERT INTO maxDist 
VALUES(20, 4896, 1657)

INSERT INTO maxDist 
VALUES( 21, 5129, 1345)

INSERT INTO maxDist 
VALUES(15, 3104, 1300)

-- ArrivalDate table -- 

INSERT INTO arrivalDate
VALUES('01-JAN-2000', 'Cruise Ship Model-AB' ,'27-MAY-2000')

INSERT INTO arrivalDate
VALUES('10-DEC-2019', 'Research Ship Model-BC', '17-DEC-2019')

INSERT INTO arrivalDate
VALUES('14-AUG-2017', 'Cruise Ship Model-AB', '17-AUG-2017')

INSERT INTO arrivalDate
VALUES('12-MAR-2020', 'Ferry Model-FS', '17-APR-2020')

INSERT INTO arrivalDate
VALUES('19-MAR-2012', 'Bulk Carrier Model-HC', '29-APR-2012')

INSERT INTO arrivalDate
VALUES('10-APR-1912', 'Luxury Steamship', '15-APR-1912')

-- Ship Table -- 

INSERT INTO ship
VALUES('U6CH', 'RMS Titanic', '10-APR-1912', 1679, 'Luxury Steamship', 46328,  4546)

INSERT INTO ship
VALUES('USMW', '50 Years of Victory', '14-AUG-2017', 4587, 'Cruise Ship Model-AB', 35319, 3829) 

INSERT INTO ship
VALUES('PCSUM', 'Ultramarine', '10-DEC-2019', 4896, 'Research Ship Model-BC', 32180, 4128)

INSERT INTO ship
VALUES('ISCS', 'Island Sky', '12-MAR-2020', 5129, 'Bulk Carrier Model-HC', 45928 , 5827)

INSERT INTO ship
VALUES('USON', 'Ocean Nova', '19-MAR-2012', 3104, 'Ferry Model-FS', 26321, 5827)

-- ExplorationVehicle Tables --

INSERT INTO explorationVehicle1
VALUES('jeep', 5) 

INSERT INTO explorationVehicle1
VALUES('snowmobile', 3) 

INSERT INTO explorationVehicle1
VALUES('landrover', 4) 

INSERT INTO explorationVehicle1
VALUES('truck', 3) 

INSERT INTO explorationVehicle1
VALUES('Snow Cruiser', 20)

INSERT INTO explorationVehicle2
VALUES('jeep', 45, 0) 

INSERT INTO explorationVehicle2
VALUES('snowmobile', 87, 0) 

INSERT INTO explorationVehicle2
VALUES('snowmobile', 66, 0) 

INSERT INTO explorationVehicle2
VALUES('landrover', 30, 0) 

INSERT INTO explorationVehicle2
VALUES('truck', 20, 1) 

INSERT INTO explorationVehicle3
VALUES(98127, 'jeep', 45) 

INSERT INTO explorationVehicle3
VALUES(57481, 'snowmobile', 87) 

INSERT INTO explorationVehicle3
VALUES(66273, 'snowmobile', 66) 

INSERT INTO explorationVehicle3
VALUES(34578, 'landrover', 30) 

INSERT INTO explorationVehicle3
VALUES(89723, 'truck', 20) 

-- Uses Table -- 

INSERT INTO uses 
VALUES(9119119, 8972, 82731, 'mix substances for a chemical compound') 

INSERT INTO uses
VALUES(1191191, 3487, 23487, 'heat up water')  

INSERT INTO uses 
VALUES(1111119, 3232, 31203, 'inspect plants up close')

INSERT INTO uses 
VALUES(9999999, 1111, 48523, 'whale watching')

INSERT INTO uses 
VALUES(3729123, 9872, 48273, 'look at insects up close')  
-- TravelsTo Table -- 

INSERT INTO travelsTo
VALUES(9119119, 85, 132, '28-JUN-2000')

INSERT INTO travelsTo
VALUES(1191191, 87, 122, '27-MAY-2000')

INSERT INTO travelsTo
VALUES(9999999, 85, 130, '25-MAR-2000')

INSERT INTO travelsTo
VALUES(9999999, 85, 130, '25-MAR-2000')

INSERT INTO travelsTo
VALUES(3729123, 86, 128, '26-OCT-2000')

-- Studies Table -- 

INSERT INTO Studies 
VALUES(9119119, 8910209, 2323111)

INSERT INTO studies 
VALUES(9119119, 2342123, 1111111)

INSERT INTO studies 
VALUES(9119119, 7028311, 3123411)

INSERT INTO studies 
VALUES(9119119, 8234812, 1020304)

INSERT INTO studies 
VALUES(9119119, 3333333, 1991203)

INSERT INTO studies 
VALUES(9119119, 4343434, 1991203)

INSERT INTO studies 
VALUES(9119119, 4123122, 1991203)

INSERT INTO studies 
VALUES(9999999, 3333333, 1991203)

INSERT INTO studies 
VALUES(1111119, 3333333, 1991203)

INSERT INTO Studies 
VALUES(1191191, 2342123,1111111)

INSERT INTO Studies 
VALUES(3729123, 7028311,3123411)

INSERT INTO Studies 
VALUES(2347192, 8234812,1020304)

INSERT INTO Studies 
VALUES(9871234, 3333333,1991203)


-- Consumes Table -- 

INSERT INTO consumes
VALUES(8910209, 3847212)

INSERT INTO consumes
VALUES(2342123, 4239847)

INSERT INTO consumes
VALUES(7028311, 5746384)

INSERT INTO consumes
VALUES(8234812, 5938412)

INSERT INTO consumes
VALUES(3333333, 5873923)

-- TakesOut Table --

INSERT INTO takesOut
VALUES(9119119, 98127, 'west of the abundance of shrubs', '27-MAY-2000')

INSERT INTO takesOut 
VALUES(1191191, 57481, 'east of the abundance of shrubs', '09-APR-2012')

INSERT INTO takesOut 
VALUES(1111119, 66273, 'near the edge with the sea lions ', '12-MAY-2018')

INSERT INTO takesOut 
VALUES(9999999, 34578, 'south of the abundance of shrubbery', '17-APR-2016')

INSERT INTO takesOut 
VALUES(3729123, 89723, 'near the west edge of the ice', '27-MAR-2017')

INSERT INTO takesOut 
VALUES(1234567, 66273, 'North of the edge of the sea', '27-JUN-2005')

INSERT INTO takesOut 
VALUES(1212121, 98127, 'east of the beach of with flowers', '19-APR-2014')

INSERT INTO takesOut 
VALUES(2323232, 34578, 'near the cliff with the orca whales', '18-JUN-2015')

INSERT INTO takesOut 
VALUES(3434343, 89723, 'south of the edge of the larger iceberg', '21-APR-2019')

INSERT INTO takesOut 
VALUES(4545454, 98127, 'west of the highest cliff', '14-MAY-2007')

-- TransportedBy Table --

INSERT INTO transportedBy
VALUES('U6CH', 9119119, 8972)

INSERT INTO transportedBy
VALUES('USMW', 1191191, 3487)

INSERT INTO transportedBy
VALUES('PCSUM', 1111119, 3232)

INSERT INTO transportedBy
VALUES('ISCS', 9999999, 1111)

INSERT INTO transportedBy
VALUES('USON',3729123, 9872) 

-- Eats Table -- 
INSERT INTO eats 
VALUES(3434, 1191191, '19-AUG-2019') 

INSERT INTO eats 
VALUES(2142, 1191191, '01-OCT-2001') 

INSERT INTO eats 
VALUES(1521, 1191191, '01-OCT-2001') 

INSERT INTO eats 
VALUES(1521, 1111119, '27-JUL-2007') 

INSERT INTO eats 
VALUES(2142, 9999999, '01-OCT-2001') 

INSERT INTO eats 
VALUES(1999, 9999999, '01-OCT-2001') 

INSERT INTO eats 
VALUES(1521, 9999999, '27-JUL-2007') 

INSERT INTO eats 
VALUES(1612, 3729123, '01-JUN-2001') 

INSERT INTO eats 
VALUES(2000, 3729123, '01-JUN-2001') 

INSERT INTO eats 
VALUES(1521, 3729123, '01-JUN-2001') 

INSERT INTO eats 
VALUES(1612, 1212121, '01-JUN-2001') 

INSERT INTO eats 
VALUES(2142, 1212121, '01-OCT-2001') 

INSERT INTO eats 
VALUES(1521, 1212121, '01-OCT-2001') 

INSERT INTO eats 
VALUES(1612, 1234567, '01-JUN-2001') 

INSERT INTO eats 
VALUES(1521, 1234567, '27-JUL-2007') 

INSERT INTO eats 
VALUES(2142, 1234567, '01-OCT-2001') 

INSERT INTO eats 
VALUES(3434, 9119119, '19-AUG-2019') 

INSERT INTO eats 
VALUES(1234, 9119119, '01-JUN-2010') 

INSERT INTO eats 
VALUES(1521, 9119119, '01-JUN-2010') 

INSERT INTO eats 
VALUES(2000, 9119119, '01-JUN-2010') 

INSERT INTO eats 
VALUES(1521, 2323232, '27-JUL-2007') 

INSERT INTO eats 
VALUES(2142, 2323232, '01-OCT-2001') 

INSERT INTO eats 
VALUES(1612, 2323232, '01-JUN-2001') 

INSERT INTO eats 
VALUES(3434, 2323232, '01-OCT-2001') 

INSERT INTO eats 
VALUES(1234, 2323232, '01-JUN-2001') 

INSERT INTO eats 
VALUES(2000, 2323232, '01-JUN-2001') 
