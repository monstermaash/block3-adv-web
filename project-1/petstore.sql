CREATE TABLE `petstore`.`species` (`speciesID` INT NOT NULL AUTO_INCREMENT , `speciesName` VARCHAR(256) NOT NULL , PRIMARY KEY (`speciesID`)) ENGINE = InnoDB;
INSERT INTO `species` (`speciesID`, `speciesName`) VALUES (NULL, 'Cat'), (NULL, 'Dog'), (NULL, 'Duck')

CREATE TABLE `petstore`.`breeds` (`breedID` INT NOT NULL AUTO_INCREMENT , `breedType` VARCHAR(256) NOT NULL , `speciesID` INT NOT NULL , `Description` VARCHAR(256) NOT NULL , PRIMARY KEY (`breedID`)) ENGINE = InnoDB;

CREATE TABLE `petstore`.`pets` (`petID` INT NOT NULL AUTO_INCREMENT , `petName` VARCHAR(256) NOT NULL , `breedType` VARCHAR(256) NOT NULL , `speciesID` INT NOT NULL , `age` INT NOT NULL , `gender` VARCHAR(256) NOT NULL , `description` VARCHAR(256) NOT NULL , PRIMARY KEY (`petID`)) ENGINE = InnoDB;

CREATE TABLE `petstore`.`dogs` (`petID` INT NOT NULL , `size` INT NOT NULL ) ENGINE = InnoDB;CREATE TABLE `petstore`.`dogs` (`petID` INT NOT NULL , `size` INT NOT NULL ) ENGINE = InnoDB;

CREATE TABLE `petstore`.`cats` (`petID` INT NOT NULL , `furTypes` VARCHAR(256) NOT NULL ) ENGINE = InnoDB;

CREATE TABLE `petstore`.`ducks` (`petID` INT NOT NULL , `featherColor` VARCHAR(256) NOT NULL ) ENGINE = InnoDB;

CREATE TABLE `petstore`.`toys` (`toysID` INT NOT NULL AUTO_INCREMENT , `toyName` VARCHAR(256) NOT NULL , `description` VARCHAR(256) NOT NULL , `applicableSpecies` VARCHAR(256) NOT NULL , `toysPrice` VARCHAR(256) NOT NULL , PRIMARY KEY (`toysID`)) ENGINE = InnoDB;

CREATE TABLE `petstore`.`adoption` (`petID` INT NOT NULL , `isTrained` VARCHAR(256) NOT NULL , `isVaccinated` VARCHAR(256) NOT NULL , `adoptionPrice` VARCHAR(256) NOT NULL ) ENGINE = InnoDB;


-- SETTING UP FOREIGN KEYS
ALTER TABLE `breeds` ADD CONSTRAINT `speciesID` FOREIGN KEY (`speciesID`) REFERENCES `species`(`speciesID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `pets` ADD CONSTRAINT `speciesID` FOREIGN KEY (`speciesID`) REFERENCES `species`(`speciesID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `cats` ADD CONSTRAINT `petID` FOREIGN KEY (`petID`) REFERENCES `pets`(`petID`) ON DELETE RESTRICT ON UPDATE RESTRICT;



-- Error creating foreign key on speciesID (check data types)