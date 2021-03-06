-- MySQL Script generated by MySQL Workbench
-- Thu Dec  6 00:50:59 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema newDb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema newDb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `newDb` DEFAULT CHARACTER SET utf8 ;
USE `newDb` ;

-- -----------------------------------------------------
-- Table `newDb`.`Company_Listings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `newDb`.`Company_Listings` ;

CREATE TABLE IF NOT EXISTS `newDb`.`Company_Listings` (
  `Company_Id` INT NOT NULL AUTO_INCREMENT,
  `Title_Of_Job` VARCHAR(45) NULL,
  `Type_Of_Job` VARCHAR(45) NULL,
  `Location` VARCHAR(45) NULL,
  `Date_Posted` DATETIME NULL,
  PRIMARY KEY (`Company_Id`))
ENGINE = InnoDB;

INSERT IGNORE INTO `Company_Listings`(Title_Of_Job, Type_Of_Job, Location, Date_Posted) VALUES ('Database Administrator', 'Entry-Level','Rockville, MD', '2018-12-05'),('Data Scientist', 'Internship','Laurel, MD', '2018-12-01');

-- -----------------------------------------------------
-- Table `newDb`.`University`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `newDb`.`University` ;

CREATE TABLE IF NOT EXISTS `newDb`.`University` (
  `University_Id` INT NOT NULL AUTO_INCREMENT,
  `University_Name` VARCHAR(45) NULL,
  `Location` VARCHAR(45) NULL,
  PRIMARY KEY (`University_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `newDb`.`Student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `newDb`.`Student` ;

CREATE TABLE IF NOT EXISTS `newDb`.`Student` (
  `Student_Id` INT NOT NULL AUTO_INCREMENT,
  `Student_Name` VARCHAR(45) NULL,
  `Major` VARCHAR(45) NULL,
  `Year` INT NULL,
  `Company_Listings_Company_Id` INT ,
  `University_University_Id` INT ,
  PRIMARY KEY (`Student_Id`),
  INDEX `fk_Student_Company_Listings_idx` (`Company_Listings_Company_Id` ASC),
  INDEX `fk_Student_University1_idx` (`University_University_Id` ASC),
  CONSTRAINT `fk_Student_Company_Listings`
    FOREIGN KEY (`Company_Listings_Company_Id`)
    REFERENCES `newDb`.`Company_Listings` (`Company_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_University1`
    FOREIGN KEY (`University_University_Id`)
    REFERENCES `newDb`.`University` (`University_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `newDb`.`Links`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `newDb`.`Links` ;

CREATE TABLE IF NOT EXISTS `newDb`.`Links` (
  `Link_Id` INT NOT NULL AUTO_INCREMENT,
  `Link` TEXT NULL,
  PRIMARY KEY (`Link_Id`))
ENGINE = InnoDB;

INSERT IGNORE INTO `Links`(Link) VALUES ('https://resume-resource.com/before-after/ba-ex16.pdf'),
('https://resume-resource.com/pdf/exstu8.pdf');



-- -----------------------------------------------------
-- Table `newDb`.`Resources`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `newDb`.`Resources` ;

CREATE TABLE IF NOT EXISTS `newDb`.`Resources` (
  `Resource_Id` INT NOT NULL AUTO_INCREMENT,
  `Resource_Name` VARCHAR(45) NULL,
  `Type_Of_Resource` VARCHAR(45) NULL,
  `Links_Link_Id` INT ,
  PRIMARY KEY (`Resource_Id`),
  INDEX `fk_Resources_Links1_idx` (`Links_Link_Id` ASC),
  CONSTRAINT `fk_Resources_Links1`
    FOREIGN KEY (`Links_Link_Id`)
    REFERENCES `newDb`.`Links` (`Link_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



INSERT IGNORE INTO `Resources`(Resource_Name, Type_Of_Resource, Links_Link_Id) VALUES ('Database Administrator Sample Resume', 'Resume', 1),
('Internship Sample Resume', 'Resume', 2);




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
