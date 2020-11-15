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
	Description char(50),
	PRIMARY KEY (PlantID)
)

CREATE TABLE Animal(
	AnimalID integer, 
	Diet char(50), 
	Description char(100), 
	Species char(50), 
	Name char(50) UNIQUE, 
	Vertebrate bool, 
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
	Fragile bool, 
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
	FOREIGN KEY (VehicleID) REFERENCES ExplorationVehicle
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


CREATE TABLE  eats (
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
VALUES(8910209, 'carnivore', 'third-largest rorqual after the blue whale and the fin whale', 'sei whale', 'Bert', true) 

INSERT INTO Animal
VALUES(2342123, 'carnivore', 'orca,largest member of oceanic dolphin family', 'killer whale', 'Ernie', true) 

INSERT INTO Animal
VALUES(7028311, 'carnivore', 'can produce a song that lasts 10 to 20 minutes, also apart of rorqual', 'humpback whale', 'Elmo', true) 

INSERT INTO Animal
VALUES(8234812, 'carnivore', 'largest animal to ever exist', 'blue whale', 'Big Bird', true) 

INSERT INTO Animal
VALUES(3333333, 'carnivore', 'formerly known as herring whale or razorback whale', 'fin whale', 'Kermit', true) 

-- Plant Table --

INSERT INTO Plant
VALUES(2323111, 'Deschampsia antarctica', 'green', 2, 2, 'fully grown Antarctic hair grass')

INSERT INTO Plant
VALUES(1111111, 'Colobanthus quitensis', 'yellow and green' , 1, 2, 'Antarctic pearlwort, mosslike with yellow flowers')

INSERT INTO Plant
VALUES(3123411, 'Deschampsia antarctica', 'green', 1, 1,'still relatively short antarctic hair grass')

INSERT INTO Plant
VALUES(1020304, 'Colobanthus quitensis', 'green', 1, 2, 'antarctic pearlwort, no flowers yet')

INSERT INTO Plant
VALUES(1991203, 'Colobanthus quitensis', 'yellow and green', 10, 12, 'antarctic pearlwort, has abundant amount of flowers' )

-- Weather tables -

INSERT INTO weather1
VALUES(-25, 0.55, 0.04 ,16/10/2020) 

INSERT INTO weather1
VALUES(-35, 0.43, 0.88 ,17/10/2020) 

INSERT INTO weather1
VALUES(-42, 0.23, 0.92 ,18/10/2020) 

INSERT INTO weather1
VALUES(-44, 0.33, 0.11 ,19/10/2020) 

INSERT INTO weather1
VALUES(-26, 0.01, 0.69 ,20/10/2020) 

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
VALUES(-25, 28,16/10/2020, 0.24, 85, 132) 

INSERT INTO weather3
VALUES(-35, 50, 17/10/2020,0.55, 87, 122) 

INSERT INTO weather3
VALUES(-42, 43, 18/10/2020,0.56, 89, 127) 

INSERT INTO weather3
VALUES(-44, 55, 19/10/2020,0.88, 85, 130) 

INSERT INTO weather3
VALUES(-26, 22, 20/10/2020,0.82, 86, 128)

-- Person table --

INSERT INTO Person 
VALUES(9119119, 'John', 'male', 87, 188, 'biology', 'biologist') 

INSERT INTO Person 
VALUES(1191191, 'Sally', 'female', 72, 158, 'chemistry', 'chemist') 

INSERT INTO Person 
VALUES(1111119, 'Adam', 'male', 80, 162,'paleontology', 'paleontologist' ) 

INSERT INTO Person 
VALUES(9999999, 'Betty', 'female', 73, 174,'psychology','driver') 

INSERT INTO Person 
VALUES(3729123, 'Alex', 'nonbinary', 56, 142,'biology', 'biologist') 

-- Researcher Table --

INSERT INTO researcher 
VALUES(9119119, 'biology') 

INSERT INTO researcher 
VALUES(1191191, 'chemistry')

INSERT INTO researcher 
VALUES(3729123, 'biology')

INSERT INTO researcher 
VALUES(2347192, 'botany')

INSERT INTO researcher 
VALUES(9871234, 'biology')

-- Crew table -- 

INSERT INTO crew
VALUES(9999999, 2456371)

INSERT INTO crew
VALUES(9328712, 2382719) 

INSERT INTO crew
VALUES(2348791, 4328751) 

INSERT INTO crew
VALUES(3321879, 6668928) 

INSERT INTO crew
VALUES(3427212, 8971234) 

-- ScientificEquipment Table --

INSERT INTO scientificEquipment
VALUES(8972, 82731, 'couple of scratches', true, 'erlenmeyer flask') 

INSERT INTO scientificEquipment
VALUES(3487, 23487, 'chipped', false, 'bunsen burner') 

INSERT INTO scientificEquipment
VALUES(3232, 31203, 'new', false, 'magnifying glass') 

INSERT INTO scientificEquipment
VALUES(1111, 48523, 'scratch on left hand side glass', false, 'binoculars') 

INSERT INTO scientificEquipment
VALUES(9872, 48273, 'new', true, 'erlenmeyer flask') 

-- PersonItem Table -- 

INSERT INTO personalItem 
VALUES(2, 89713, 'journal', 9999999)

INSERT INTO personalItem 
VALUES(4, 23412, 'notebook', 1191191)

INSERT INTO personalItem 
VALUES(1, 37829, 'headphones', 9328712)

INSERT INTO personalItem 
VALUES(3, 49712, 'bag', 9871234)

INSERT INTO personalItem 
VALUES(1, 39084, 'journal', 3427212)

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

-- Food Table -- 

INSERT INTO food 
VALUES(3419, 'Shin Ramyun Black', 01/10/2020, 01/06/2020, 280)

INSERT INTO food 
VALUES(1424, 'SPAM Classic', 20/02/2017, 06/01/2023, 174)

INSERT INTO food 
VALUES(1963,'Premium Plus Salted Crackers', 17/01/2020, 06/10/2020, 90)

INSERT INTO food 
VALUES(1922, 'Heinz Beans', 22/03/2019, 10/10/2024, 155)

INSERT INTO food 
VALUES(1600, 'Green Giant Whole Kernel Sweet Corn', 10/01/2020, 06/01/2021, 130)	

-- Location Table -- 

INSERT INTO location
VALUES(82, 135, desert) 

INSERT INTO location
VALUES(90, 125, desert) 

INSERT INTO location
VALUES(83, 135, desert)

INSERT INTO location
VALUES(88, 121, desert)

INSERT INTO location
VALUES(89, 121, desert) 

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
VALUES(2000-01-01, 'Cruise Ship Model-AB' ,2000-05-27)

INSERT INTO arrivalDate
VALUES(2019-12-10, 'Research Ship Model-BC', 2019-12-17)

INSERT INTO arrivalDate
VALUES(2017-08-14, 'Cruise Ship Model-AB', 2017-08-17)

INSERT INTO arrivalDate
VALUES(2020-03-12, 'Ferry Model-FS', 2020-04-17)

INSERT INTO arrivalDate
VALUES(2012-03-19, 'Bulk Carrier Model-HC', 2012-04-29)

INSERT INTO arrivalDate
VALUES(1912-04-10, 'Luxury Steamship', 1912-04-15)

-- Ship Table -- 

INSERT INTO ship
VALUES('U6CH', 'RMS Titanic', 1912-04-10, 1679, 'Luxury Steamship', 46328,  4546)

INSERT INTO ship
VALUES('USMW', '50 Years of Victory', 2017-08-14, 4587, 'Cruise Ship Model-AB', 35319, 3829) 

INSERT INTO ship
VALUES('PCSUM', 'Ultramarine', 2019-12-10, 4896, 'Research Ship Model-BC', 32180, 4128)

INSERT INTO ship
VALUES('ISCS', 'Island Sky', 2012-03-19, 5129, 'Bulk Carrier Model-HC', 45928 , 5827)

INSERT INTO ship
VALUES('USON', 'Ocean Nova', 2020-03-12, 3104, 'Ferry Model-FS', 26321, 5827)

-- ExplorationVehicle Tables --

INSERT INTO explorationVehicle1
VALUES('jeep', 5) 

INSERT INTO explorationVehicle1
VALUES('snowmobile', 3) 

INSERT INTO explorationVehicle1
VALUES('landrover', 4) 

INSERT INTO explorationVehicle1
VALUES('truck', 3) 

INSERT INTO explorationVehicle2
VALUES('jeep', 45, false) 

INSERT INTO explorationVehicle2
VALUES('snowmobile', 87, false) 

INSERT INTO explorationVehicle2
VALUES('snowmobile', 66, false) 

INSERT INTO explorationVehicle2
VALUES('landrover', 30, false) 

INSERT INTO explorationVehicle2
VALUES('truck', 20, true) 

INSERT INTO explorationVehicle3
VALUES('jeep', 45, 98127) 

INSERT INTO explorationVehicle3
VALUES('snowmobile', 87, 57481) 

INSERT INTO explorationVehicle3
VALUES('snowmobile', 66, 66273) 

INSERT INTO explorationVehicle3
VALUES('landrover', 30, 34578) 

INSERT INTO explorationVehicle3
VALUES('truck', 20, 89723) 

-- Uses Table -- 

INSERT INTO uses
VALUES(9119119, 8972, 82731, 'mix substances for a chemical compound')  

INSERT INTO uses
VALUES(1191191, 3487, 23487, 'heat up water')  

INSERT INTO uses
VALUES(3729123, 3232, 31203, 'inspect plants up close')  

INSERT INTO uses
VALUES(2347192, 1111, 48523, 'whale watching')  

INSERT INTO uses
VALUES(9871234, 3232, 31203, 'look at insects up close')  

-- TravelsTo Table -- 

INSERT INTO travelsTo
VALUES(9119119, 83, 130, 2000-05-27)

INSERT INTO travelsTo
VALUES(1191191, 83, 130, 2000-05-27)

INSERT INTO travelsTo
VALUES(3729123, 83, 130, 2000-05-27)

INSERT INTO travelsTo
VALUES(2347192, 83, 130, 2000-05-27)

INSERT INTO travelsTo
VALUES(9871234, 83, 130, 2000-05-27)

-- Studies Table -- 

INSERT INTO Studies 
VALUES(9119119, 8910209,2323111)

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
VALUES(9999999, 98127, 'west of the abundance of shrubs', 2000-05-27)

INSERT INTO takesOut
VALUES(9328712, 57481, 'east of the abundance of shrubs', 2012-04-09) 

INSERT INTO takesOut
VALUES(2348791, 66273, 'near the edge with the sea lions ', 2018-05-12) 

INSERT INTO takesOut
VALUES(3321879, 34578, 'south of the abundance of shrubbery', 2016-04-17) 

INSERT INTO takesOut
VALUES(3427212, 89723, 'near the west edge of the ice', 2017-03-27)  

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
VALUES(3419, 9119119, 01/06/2021)

INSERT INTO eats
VALUES(1424, 1191191, 06/01/2023)

INSERT INTO eats
VALUES(1963, 1111119, 06/01/2021)

INSERT INTO eats
VALUES(1963, 9999999, 10-01-2020)

INSERT INTO eats
VALUES(3419, 3729123, 06/01/2022)
