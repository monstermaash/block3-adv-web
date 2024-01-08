Drinks
Americano
Cold Coffee
Cappucino
Expresso
Mocca
London Fog
Earl Grey
Green Tea
Water
Latte
Strawberry Smoothie
Kiwi Smoothie

drinkType
Coffee
Tea
Water
Smoothie

drinkTemp
Cold
Hot

drinkStrength
Smooth
Light
Medium
Strong

drinkSize
Small
Medium
Large



-- CREATE TABLE + INSERT
CREATE TABLE `avo_demo`. (`drinkTypeID` INT NOT NULL AUTO_INCREMENT , `drinkTypeName` VARCHAR(256) NOT NULL , PRIMARY KEY (`drinkTypeID`)) ENGINE = InnoDB;
INSERT INTO `drinkType` (`drinkTypeID`, `drinkTypeName`) VALUES (NULL, 'Coffee')
INSERT INTO `drinkType` (`drinkTypeID`, `drinkTypeName`) VALUES (NULL, 'Tea')
INSERT INTO `drinkType` (`drinkTypeID`, `drinkTypeName`) VALUES (NULL, 'Water')
INSERT INTO `drinkType` (`drinkTypeID`, `drinkTypeName`) VALUES (NULL, 'Smoothie')

CREATE TABLE `avo_demo`. (`drinkTempID` INT NOT NULL AUTO_INCREMENT , `drinkTempName` VARCHAR(256) NOT NULL , PRIMARY KEY (`drinkTempID`)) ENGINE = InnoDB;
INSERT INTO `drinkTemp` (`drinkTempID`, `drinkTempName`) VALUES (NULL, 'Hot')
INSERT INTO `drinkTemp` (`drinkTempID`, `drinkTempName`) VALUES (NULL, 'Cold')

CREATE TABLE `avo_demo`.`drinkStrength` (`drinkStrengthID` INT NOT NULL AUTO_INCREMENT , `drinkStrengthName` VARCHAR(256) NOT NULL , PRIMARY KEY (`drinkStrengthID`)) ENGINE = InnoDB;
INSERT INTO `drinkStrength` (`drinkStrengthID`, `drinkStrengthName`) VALUES (NULL, 'Smooth')
INSERT INTO `drinkStrength` (`drinkStrengthID`, `drinkStrengthName`) VALUES (NULL, 'Light')
INSERT INTO `drinkStrength` (`drinkStrengthID`, `drinkStrengthName`) VALUES (NULL, 'Medium')
INSERT INTO `drinkStrength` (`drinkStrengthID`, `drinkStrengthName`) VALUES (NULL, 'Strong')

CREATE TABLE `avo_demo`.`drinkSize` (`drinkSizeID` INT NOT NULL AUTO_INCREMENT , `drinkSizeName` VARCHAR(256) NOT NULL , PRIMARY KEY (`drinkSizeID`)) ENGINE = InnoDB;
INSERT INTO `drinkSize` (`drinkSizeID`, `drinkSizeName`) VALUES (NULL, 'Small')
INSERT INTO `drinkSize` (`drinkSizeID`, `drinkSizeName`) VALUES (NULL, 'Medium')
INSERT INTO `drinkSize` (`drinkSizeID`, `drinkSizeName`) VALUES (NULL, 'Large')

CREATE TABLE `avo_demo`.`drinks` (`drinkID` INT NOT NULL AUTO_INCREMENT , `drinkName` VARCHAR(256) , `drinkTypeID` INT NOT NULL , `drinkTempID` INT NOT NULL , `drinkStrengthID` INT NOT NULL , `drinkSizeID` INT NOT NULL , PRIMARY KEY (`drinkID`)) ENGINE = InnoDB;


-- SETTING UP FOREIGN KEYS
ALTER TABLE `drinks` ADD CONSTRAINT `drinkTypeID` FOREIGN KEY (`drinkTypeID`) REFERENCES `drinkType`(`drinkTypeID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `drinks` ADD CONSTRAINT `drinkTempID` FOREIGN KEY (`drinkTempID`) REFERENCES `drinkTemp`(`drinkTempID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `drinks` ADD CONSTRAINT `drinkStrengthID` FOREIGN KEY (`drinkStrengthID`) REFERENCES `drinkStrength`(`drinkStrengthID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `drinks` ADD CONSTRAINT `drinkSizeID` FOREIGN KEY (`drinkSizeID`) REFERENCES `drinkSize`(`drinkSizeID`) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- INSERTING DATA
INSERT INTO `drinks` (`drinkID`, `drinkName`, `drinkTypeID`, `drinkTempID`, `drinkStrengthID`, `drinkSizeID`) VALUES (NULL, 'Cappuccino', '1', '1', '1', '2'), (NULL, 'Expresso', '1', '1', '1', '1')
INSERT INTO `drinks` (`drinkID`, `drinkName`, `drinkTypeID`, `drinkTempID`, `drinkStrengthID`, `drinkSizeID`) VALUES (NULL, 'Cold Coffee', '1', '1', '2', '2'), (NULL, 'Green Tea', '2', '2', '2', '2')
INSERT INTO `drinks` (`drinkID`, `drinkName`, `drinkTypeID`, `drinkTempID`, `drinkStrengthID`, `drinkSizeID`) VALUES (NULL, 'Earl Grey', '2', '2', '2', '1'), (NULL, 'Water', '3', '1', '2', '2');
INSERT INTO `drinks` (`drinkID`, `drinkName`, `drinkTypeID`, `drinkTempID`, `drinkStrengthID`, `drinkSizeID`) VALUES (NULL, 'Strawberry Smoothie', '4', '1', '2', '3'), (NULL, 'Kiwi Smoothie', '4', '1', '2', '3');
INSERT INTO `drinks` (`drinkID`, `drinkName`, `drinkTypeID`, `drinkTempID`, `drinkStrengthID`, `drinkSizeID`) VALUES (NULL, 'Mocca', '1', '2', '1', '2');


-- SELECTING DATA
SELECT * FROM drinks NATURAL JOIN drinkType NATURAL JOIN drinkTemp NATURAL JOIN drinkStrength NATURAL JOIN drinkSize WHERE drinkSize.drinkSizeName = "small";


-- sql file + md file for the project