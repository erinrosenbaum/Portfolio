-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema roseneri-db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema roseneri-db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `roseneri-db` DEFAULT CHARACTER SET utf8 ;
USE `roseneri-db` ;

-- -----------------------------------------------------
-- Table `roseneri-db`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roseneri-db`.`customers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `contact_person` VARCHAR(30) NULL,
  `email` VARCHAR(60) NULL,
  `street` VARCHAR(60) NULL,
  `city` VARCHAR(60) NULL,
  `state` CHAR(2) NULL,
  `zip` MEDIUMINT UNSIGNED NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roseneri-db`.`jobs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roseneri-db`.`jobs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `number` VARCHAR(45) NOT NULL,
  `map_directions` TEXT NULL,
  `start_date` DATE NULL,
  `description` VARCHAR(45) NULL,
  `completed` ENUM('Y', 'N') NULL,
  `customer_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_locations_customers1_idx` (`customer_id` ASC),
  CONSTRAINT `fk_locations_customers1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `roseneri-db`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roseneri-db`.`crews`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roseneri-db`.`crews` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roseneri-db`.`positions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roseneri-db`.`positions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roseneri-db`.`equipment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roseneri-db`.`equipment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `unit_number` INT NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_trailers_trailer_type1_idx` (`description` ASC),
  CONSTRAINT `fk_trailers_trailer_type1`
    FOREIGN KEY (`description`)
    REFERENCES `roseneri-db`.`trailer_type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roseneri-db`.`vehicles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roseneri-db`.`vehicles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `unit_number` INT NULL,
  `year` VARCHAR(45) NULL,
  `make` VARCHAR(45) NULL,
  `model` VARCHAR(45) NULL,
  `trailer_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vehicles_equipment1_idx` (`trailer_id` ASC),
  CONSTRAINT `fk_vehicles_equipment1`
    FOREIGN KEY (`trailer_id`)
    REFERENCES `roseneri-db`.`equipment` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roseneri-db`.`employees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roseneri-db`.`employees` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `crew_id` INT NULL,
  `position_id` INT NOT NULL,
  `truck_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_employees_crews1_idx` (`crew_id` ASC),
  INDEX `fk_employees_positions1_idx` (`position_id` ASC),
  INDEX `fk_employees_vehicles1_idx` (`truck_id` ASC),
  CONSTRAINT `fk_employees_crews1`
    FOREIGN KEY (`crew_id`)
    REFERENCES `roseneri-db`.`crews` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_positions1`
    FOREIGN KEY (`position_id`)
    REFERENCES `roseneri-db`.`positions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_vehicles1`
    FOREIGN KEY (`truck_id`)
    REFERENCES `roseneri-db`.`vehicles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roseneri-db`.`certifications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roseneri-db`.`certifications` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `employee_id` INT NOT NULL,
  `position_id` INT NOT NULL,
  `date` DATETIME GENERATED ALWAYS AS (NOW()),
  INDEX `fk_employees_have_positions_employees1_idx` (`employee_id` ASC),
  INDEX `fk_employees_have_positions_positions1_idx` (`position_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_employees_have_positions_employees1`
    FOREIGN KEY (`employee_id`)
    REFERENCES `roseneri-db`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_have_positions_positions1`
    FOREIGN KEY (`position_id`)
    REFERENCES `roseneri-db`.`positions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roseneri-db`.`crew_jobs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roseneri-db`.`crew_jobs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `job_id` INT NOT NULL,
  `crew_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_crew_jobs_jobs1_idx` (`job_id` ASC),
  INDEX `fk_crew_jobs_crews1_idx` (`crew_id` ASC),
  CONSTRAINT `fk_crew_jobs_jobs1`
    FOREIGN KEY (`job_id`)
    REFERENCES `roseneri-db`.`jobs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_crew_jobs_crews1`
    FOREIGN KEY (`crew_id`)
    REFERENCES `roseneri-db`.`crews` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
