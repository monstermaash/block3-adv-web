-- CREATE TABLE + INSERT
CREATE TABLE `petstore`.`species` (`speciesID` INT NOT NULL AUTO_INCREMENT , `speciesName` VARCHAR(256) NOT NULL , PRIMARY KEY (`speciesID`)) ENGINE = InnoDB;
INSERT INTO `species` (`speciesName`) VALUES ('Dog');
INSERT INTO `species` (`speciesName`) VALUES ('Cat');
INSERT INTO `species` (`speciesName`) VALUES ('Duck');

CREATE TABLE `petstore`.`breeds` (`breedID` INT NOT NULL AUTO_INCREMENT , `breedType` VARCHAR(256) NOT NULL , `breedDescription` TEXT NOT NULL , PRIMARY KEY (`breedID`)) ENGINE = InnoDB;
INSERT INTO `breeds` (`breedID`, `breedType`, `speciesID`, `breedDescription`) VALUES (NULL, 'pure', 'Purebred Cat');
INSERT INTO `breeds` (`breedID`, `breedType`, `speciesID`, `breedDescription`) VALUES (NULL, 'mixed', 'Mixed Breed Dog');
INSERT INTO `breeds` (`breedID`, `breedType`, `speciesID`, `breedDescription`) VALUES (NULL, 'pure', 'Purebred Dog');
INSERT INTO `breeds` (`breedID`, `breedType`, `speciesID`, `breedDescription`) VALUES (NULL, 'mixed', 'Mixed Breed Duck');

CREATE TABLE `petstore`.`size` (`sizeID` INT NOT NULL AUTO_INCREMENT , `sizeName` VARCHAR(256) NOT NULL , `sizeDescription` TEXT NOT NULL , PRIMARY KEY (`sizeID`)) ENGINE = InnoDB;
INSERT INTO `size` (`sizeID`, `sizeName`, `sizeDescription`) VALUES (NULL, 'Small', 'Suitable for apartment living');
INSERT INTO `size` (`sizeID`, `sizeName`, `sizeDescription`) VALUES (NULL, 'Medium', 'Adaptable to various environments');
INSERT INTO `size` (`sizeID`, `sizeName`, `sizeDescription`) VALUES (NULL, 'Large', 'Requires ample space and exercise');

CREATE TABLE `petstore`.`furTypes` (`furTypeID` INT NOT NULL AUTO_INCREMENT , `furTypeName` VARCHAR(256) NOT NULL , `furTypeDescription` TEXT NOT NULL , `sheddingLevel` VARCHAR(256) NOT NULL , PRIMARY KEY (`furTypeID`)) ENGINE = InnoDB;
INSERT INTO `furTypes` (`furTypeID`, `furTypeName`, `furTypeDescription`, `sheddingLevel`) VALUES (NULL, 'Short', 'Low maintenance, easy to groom', 'Low');
INSERT INTO `furTypes` (`furTypeID`, `furTypeName`, `furTypeDescription`, `sheddingLevel`) VALUES (NULL, 'Medium', 'Moderate-length, plush, soft coat.', 'Moderate');
INSERT INTO `furTypes` (`furTypeID`, `furTypeName`, `furTypeDescription`, `sheddingLevel`) VALUES (NULL, 'Long', 'Luxurious, requires regular brushing', 'High');

CREATE TABLE `petstore`.`pets` (`petID` INT NOT NULL AUTO_INCREMENT , `petName` VARCHAR(256) NOT NULL , `breedType` VARCHAR(256) NOT NULL , `speciesID` INT NOT NULL , `age` INT NOT NULL , `gender` VARCHAR(256) NOT NULL , `petDescription` TEXT NOT NULL , `adoptionPricingID` INT NOT NULL , `isVaccinated` VARCHAR(256) NOT NULL , `isTrained` VARCHAR(256) NOT NULL , `sizeID` INT NOT NULL , `furTypeID` INT NOT NULL , PRIMARY KEY (`petID`)) ENGINE = InnoDB;
INSERT INTO `pets` (`petID`, `petName`, `breedType`, `speciesID`, `age`, `gender`, `petDescription`, `adoptionPricingID`, `isVaccinated`, `isTrained`, `sizeID`, `furTypeID`) VALUES (NULL, 'Garfield', 'Pure', '', '12', 'Male', 'known for his love of lasagna', '', 'Yes', 'No', '', '');
INSERT INTO `pets` (`petID`, `petName`, `breedType`, `speciesID`, `age`, `gender`, `petDescription`, `adoptionPricingID`, `isVaccinated`, `isTrained`, `sizeID`, `furTypeID`) VALUES (NULL, 'Brian', 'Mixed', '', '14', 'Male', 'is always full of energy', '', 'No', 'Yes', '', '');
INSERT INTO `pets` (`petID`, `petName`, `breedType`, `speciesID`, `age`, `gender`, `petDescription`, `adoptionPricingID`, `isVaccinated`, `isTrained`, `sizeID`, `furTypeID`) VALUES (NULL, 'Scooby Doo', 'Pure', '', '9', 'Male', 'known for his love of snacks', '', 'Yes', 'Yes', '', '');
INSERT INTO `pets` (`petID`, `petName`, `breedType`, `speciesID`, `age`, `gender`, `petDescription`, `adoptionPricingID`, `isVaccinated`, `isTrained`, `sizeID`, `furTypeID`) VALUES (NULL, 'Snoopy', 'Pure', '', '6', 'Male', 'has a vivid imagination', '', 'Yes', 'Yes', '', '');
INSERT INTO `pets` (`petID`, `petName`, `breedType`, `speciesID`, `age`, `gender`, `petDescription`, `adoptionPricingID`, `isVaccinated`, `isTrained`, `sizeID`, `furTypeID`) VALUES (NULL, 'Daffy', 'Mixed', '', '100', 'Male', 'known for his animated antics', '', 'No', 'No', '', '');
INSERT INTO `pets` (`petID`, `petName`, `breedType`, `speciesID`, `age`, `gender`, `petDescription`, `adoptionPricingID`, `isVaccinated`, `isTrained`, `sizeID`, `furTypeID`) VALUES (NULL, 'Daisy', 'Pure', '', '5', 'Female', 'is playful and gentle', '', 'Yes', 'Yes', '', '');

CREATE TABLE `petstore`.`adoptionPricing` (`adoptionPricingID` INT NOT NULL AUTO_INCREMENT , `adoptionPrice` FLOAT NOT NULL , PRIMARY KEY (`adoptionPricingID`)) ENGINE = InnoDB;
INSERT INTO `adoptionPricing` (`adoptionPricingID`, `adoptionPrice`) VALUES (NULL, '500 ');
INSERT INTO `adoptionPricing` (`adoptionPricingID`, `adoptionPrice`) VALUES (NULL, '600 ');
INSERT INTO `adoptionPricing` (`adoptionPricingID`, `adoptionPrice`) VALUES (NULL, '1350');
INSERT INTO `adoptionPricing` (`adoptionPricingID`, `adoptionPrice`) VALUES (NULL, '900 ');
INSERT INTO `adoptionPricing` (`adoptionPricingID`, `adoptionPrice`) VALUES (NULL, '200 ');
INSERT INTO `adoptionPricing` (`adoptionPricingID`, `adoptionPrice`) VALUES (NULL, '350 ');

CREATE TABLE `petstore`.`toys` (`toyID` INT NOT NULL AUTO_INCREMENT , `toyName` VARCHAR(256) NOT NULL , `toyDescription` TEXT NOT NULL , `applicableSpecies` VARCHAR(256) NOT NULL , `toyPricingID` INT NOT NULL , PRIMARY KEY (`toyID`)) ENGINE = InnoDB;
INSERT INTO `toys` (`toyID`, `toyName`, `toyDescription`, `applicableSpecies`, `toyPricingID`) VALUES (NULL, 'Ball', 'A classic ball for dogs', 'Dogs', '1');
INSERT INTO `toys` (`toyID`, `toyName`, `toyDescription`, `applicableSpecies`, `toyPricingID`) VALUES (NULL, 'Chewing Toy', 'Durable toy for chewing', 'Dogs', '2');
INSERT INTO `toys` (`toyID`, `toyName`, `toyDescription`, `applicableSpecies`, `toyPricingID`) VALUES (NULL, 'Laser Pointer', 'Provides interactive play', 'Cats', '3');
INSERT INTO `toys` (`toyID`, `toyName`, `toyDescription`, `applicableSpecies`, `toyPricingID`) VALUES (NULL, 'Squeaky Toy', 'Makes squeaky sounds', 'Dogs' '4');
INSERT INTO `toys` (`toyID`, `toyName`, `toyDescription`, `applicableSpecies`, `toyPricingID`) VALUES (NULL, 'Feather Wand', 'Stimulating feather toy', 'Cats', '5');


CREATE TABLE `petstore`.`toyPricing` (`toyPricingID` INT NOT NULL AUTO_INCREMENT , `toyPrice` FLOAT NOT NULL , PRIMARY KEY (`toyPricingID`)) ENGINE = InnoDB;
INSERT INTO `toyPricing` (`toyPricingID`, `toyPrice`) VALUES (NULL, '8');
INSERT INTO `toyPricing` (`toyPricingID`, `toyPrice`) VALUES (NULL, '14');
INSERT INTO `toyPricing` (`toyPricingID`, `toyPrice`) VALUES (NULL, '7 ');
INSERT INTO `toyPricing` (`toyPricingID`, `toyPrice`) VALUES (NULL, '13');
INSERT INTO `toyPricing` (`toyPricingID`, `toyPrice`) VALUES (NULL, '15');


-- SETTING UP FOREIGN KEYS
ALTER TABLE `breeds` ADD CONSTRAINT `speciesID` FOREIGN KEY (`speciesID`) REFERENCES `species`(`speciesID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `pets` ADD CONSTRAINT `breedID` FOREIGN KEY (`breedID`) REFERENCES `breeds`(`breedID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `pets` ADD CONSTRAINT `adoptionPricingID` FOREIGN KEY (`adoptionPricingID`) REFERENCES `adoptionPricing`(`adoptionPricingID`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `pets` ADD CONSTRAINT `speciesID` FOREIGN KEY (`speciesID`) REFERENCES `species`(`speciesID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `pets` ADD CONSTRAINT `sizeID` FOREIGN KEY (`sizeID`) REFERENCES `size`(`sizeID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `pets` ADD CONSTRAINT `furTypeID` FOREIGN KEY (`furTypeID`) REFERENCES `furTypes`(`furTypeID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `toys` ADD CONSTRAINT `toyPricingID` FOREIGN KEY (`toyPricingID`) REFERENCES `toyPricing`(`toyPricingID`) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- SELECTING DATA
SELECT * FROM pets NATURAL JOIN species NATURAL JOIN breeds NATURAL JOIN size NATURAL JOIN furTypes NATURAL JOIN adoptionPricing WHERE pets.petName = "Garfield";