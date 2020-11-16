-- SELECTION QUERY --

-- Select query from Persons --
/* $attribute1, $attribute 2, $attribute3 can be PersonId, Age, Name, Gender, Weight, Height
   $condition, $condition2 can be >, >=, =, <=, <
   $number, $number2 is a number (or string) the user submits to be compared to */
SELECT $attribute1 
FROM Person 
WHERE $attribute2 $condition $number 
AND $attribute3 $condition2 $number2


-- DELETION QUERY --

-- Delete lost or broken cargo --
/*$idDelete is the cargoID specified by the user to delete
  Tuples with the cargoID is deleted in relevant tables: 
  Cargo, Food, ScientificEquipment, transportedBy, eats*/
DELETE FROM Cargo
WHERE CargoID = $idDelete

-- AGGREGATION WITH GROUP BY QUERY --

-- Finds the (minimum, maximum or average) Age of People who have Taken out a vehicle for each vehicle type --
/*$minMaxAvg is specified by the user, whether they want the minimum, maximum or average age*/

SELECT ev.VehicleType, $minMaxAvg
FROM Person p, takesOut t, explorationVehicle3 ev
WHERE p.PersonID = t.PersonID 
AND t.VehicleID = ev.VehicleID
GROUP BY ev.VehicleType


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