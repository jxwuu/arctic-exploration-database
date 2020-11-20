-- SELECTION QUERY --

-- Select query from Persons --
/* $attribute1, $attribute 2, $attribute3 can be PersonId, Age, Name, Gender, Weight, Height
   $condition, $condition2 can be >, >=, =, <=, <
   $number, $number2 is a number (or string) the user submits to be compared to */
SELECT $attribute1 
FROM Person 
WHERE $attribute2 $condition $number 
AND $attribute3 $condition2 $number2

-- INSERT QUERY -- 

-- Insert query from Persons -- 
/*  Allows the user to indicate a unique $PID (PersonID), $Age, $Name, 
    $Gender, $Weight, and $Height of a person that they would like to add
    to the database, where $PID is the primary key of the Person table */
INSERT INTO Person 
VALUES($PID, $AGE, $NAME, $GENDER, $WEIGHT, $HEIGHT)

-- UPDATE OPERATION --

-- Update plant age --
/*$newPlantAge is set by user to indicate new age of plant. $plantID is primary key of plant
table which is also specified by user to determine which plant to update.*/
UPDATE plants 
SET age=$newPlantAge 
WHERE plantID=$plantID

-- DELETION QUERY --

-- Delete lost or broken cargo --
/*$idDelete is the cargoID specified by the user to delete
  Tuples with the cargoID is deleted in relevant tables: 
  Cargo, Food, ScientificEquipment, transportedBy, eats*/
DELETE FROM Cargo
WHERE CargoID = $idDelete


-- PROJECTION QUERY --

-- Project from persons --
/*$attributeK where K is 1, 2, ... , 5 is specificed by user to indicate
which attributes from Person table to select. The user must indicate at
least 3 and at most 5 attributes.*/
SELECT $attribute1, $attribute2, $attribute2, $attribute5, $attribute4
FROM Person

-- JOIN QUERY -- 

--Join Persons and TravelsTo -- 
/* Finds the names of people who are $condition $age, where $condition is 
  >,=,<,<> and $age is a number specified by the user, who have went to $coordinates where coordinates is 
  is a list that the user can choose from. */
  SELECT p.Name 
  FROM Person p, travelsTo t
  WHERE t.Longitude = $coordinate 
  AND p.PersonID = t.PersonID
  AND p.age $condition $age

-- AGGREGATION WITH GROUP BY QUERY --

-- Finds the (minimum, maximum or average) Age of People who have Taken out a vehicle for each vehicle type --
/*$minMaxAvg is specified by the user, whether they want the minimum, maximum or average age*/

SELECT ev.VehicleType, $minMaxAvg
FROM Person p, takesOut t, explorationVehicle3 ev
WHERE p.PersonID = t.PersonID 
AND t.VehicleID = ev.VehicleID
GROUP BY ev.VehicleType

-- AGGREGATION WITH HAVING QUERY -- 

-- Find the Foods that have been Eaten by more than x people -- 
/* Finds the names of foods that have been eaten by more than 
  $number people, where $number is specified by user input */

SELECT f.FoodType, count(*)
FROM Food f, eats e
WHERE e.CargoID = f.CargoID
GROUP BY f.FoodType
HAVING count(*) >= $number


-- NESTED AGGREGATION WITH GROUP BY --

-- Find Researcher(s) Who is Studying every Animal on Record --
/*$groupBy, $table is specified by user. $table must be chosen first by user, which then prompts another drop down menu 
to appear which presents $groupBy attributes which corresponds only to that current table. This query returns all groups
of plants by age which are greater than the average age of all plants*/

SELECT $groupBy, count(*)
FROM $table
GROUP BY $groupBy
HAVING $groupby > (SELECT avg(age)
                     FROM plants)


-- DIVISION --

-- Find count of research items --
/*Finds all researchers which are currently studying every animal in the database. Note: there is another query which
finds the name of the Researcher given the personID afterwards, but that is separate from the division query itself*/

SELECT r.PersonID 
FROM Researcher r 
WHERE not exists ( SELECT a.animalID
                    FROM animal a 
                    WHERE not exists ( SELECT s.PersonID
                                        FROM Studies s
                                        Where r.PersonID = s.PersonID 
                                        AND a.AnimalID = s.AnimalID))

-- EXTRA FUNCTIONS --

-- Display all the tuples inside a table --
/* $table can be: Person, Researcher, Crew, PersonalItem, Plants, Animal,
                 Cargo, Food, ScientificEquipment, Weather1, Weather2, 
                 Weather3, location, maxDist, arrivalDate, shipModel, ship,
                 explorationVehicle1, explorationVehicle2,explorationVehicle3,
                 uses, travelsTo, takesOut, Studies, consumes, transportedBy, eats*/
SELECT * FROM $table

-- Count the number of tuples in the Person table --
SELECT Count(*) FROM Person

-- show Plant IDS / age --
SELECT plantID, age
FROM plants