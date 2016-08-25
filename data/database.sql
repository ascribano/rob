SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`users` ;

CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `status` ENUM('active','inactive') NULL,
  `type` ENUM('agency','candidate') NULL,
  `create_date` DATETIME NULL,
  `modified_date` DATETIME NULL,
  `id_agency` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`resume`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`resume` ;

CREATE TABLE IF NOT EXISTS `mydb`.`resume` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `filename` VARCHAR(45) NULL,
  `order` INT NULL,
  `description` VARCHAR(45) NULL,
  `creation_date` DATETIME NULL,
  `modified_date` DATETIME NULL,
  `user_id` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`candidate_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`candidate_user` ;

CREATE TABLE IF NOT EXISTS `mydb`.`candidate_user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL,
  `resume_id` INT NULL,
  `name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `mobile` VARCHAR(45) NULL,
  `profession` VARCHAR(45) NULL,
  `creation_date` DATETIME NULL,
  `modified_date` DATETIME NULL,
  `users_id` INT NOT NULL,
  `resume_id1` INT NOT NULL,
  PRIMARY KEY (`id`, `users_id`, `resume_id1`),
  CONSTRAINT `fk_candidate_user_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_candidate_user_resume1`
    FOREIGN KEY (`resume_id1`)
    REFERENCES `mydb`.`resume` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_candidate_user_users_idx` ON `mydb`.`candidate_user` (`users_id` ASC);

CREATE INDEX `fk_candidate_user_resume1_idx` ON `mydb`.`candidate_user` (`resume_id1` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`account`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`account` ;

CREATE TABLE IF NOT EXISTS `mydb`.`account` (
  `id` INT NOT NULL,
  `users` INT NULL,
  `assessments` INT NULL,
  `tool` BLOB NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`agency`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`agency` ;

CREATE TABLE IF NOT EXISTS `mydb`.`agency` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `account_id` INT NULL,
  `membership_id` INT NULL,
  `abn` VARCHAR(45) NULL,
  `account_type` INT NULL,
  `created_date` DATETIME NULL,
  `modified_date` DATE NULL,
  `name` VARCHAR(45) NULL,
  `website` VARCHAR(155) NULL,
  `account_id1` INT NOT NULL,
  PRIMARY KEY (`id`, `account_id1`),
  CONSTRAINT `fk_agency_account1`
    FOREIGN KEY (`account_id1`)
    REFERENCES `mydb`.`account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_agency_account1_idx` ON `mydb`.`agency` (`account_id1` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`agency_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`agency_user` ;

CREATE TABLE IF NOT EXISTS `mydb`.`agency_user` (
  `id` INT NOT NULL,
  `agency_id` INT NULL,
  `user_id` INT NULL,
  `name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `mobile` VARCHAR(45) NULL,
  `create_user` VARCHAR(45) NULL,
  `modified_user` VARCHAR(45) NULL,
  `agency_id` INT NOT NULL,
  PRIMARY KEY (`id`, `agency_id`),
  CONSTRAINT `fk_agency_user_agency1`
    FOREIGN KEY (`agency_id`)
    REFERENCES `mydb`.`agency` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_agency_user_agency1_idx` ON `mydb`.`agency_user` (`agency_id` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`assessments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`assessments` ;

CREATE TABLE IF NOT EXISTS `mydb`.`assessments` (
  `id` INT NOT NULL,
  `id_agency_user` INT NULL,
  `id_candidate_user` INT NULL,
  `skills_id` INT NULL,
  `name` VARCHAR(45) NULL,
  `status` BLOB NULL,
  `description` VARCHAR(255) NULL,
  `minutes_assigned` INT NULL,
  `creation_date` DATETIME NULL,
  `modified_date` DATETIME NULL,
  `candidate_user_id` INT NOT NULL,
  `candidate_user_users_id` INT NOT NULL,
  `candidate_user_resume_id1` INT NOT NULL,
  PRIMARY KEY (`id`, `candidate_user_id`, `candidate_user_users_id`, `candidate_user_resume_id1`),
  CONSTRAINT `fk_assessments_candidate_user1`
    FOREIGN KEY (`candidate_user_id` , `candidate_user_users_id` , `candidate_user_resume_id1`)
    REFERENCES `mydb`.`candidate_user` (`id` , `users_id` , `resume_id1`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_assessments_candidate_user1_idx` ON `mydb`.`assessments` (`candidate_user_id` ASC, `candidate_user_users_id` ASC, `candidate_user_resume_id1` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`questions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`questions` ;

CREATE TABLE IF NOT EXISTS `mydb`.`questions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_skills` INT NULL,
  `answer_id` INT NULL,
  `text` INT NULL,
  `time` INT NULL,
  `creation_date` DATETIME NULL,
  `modified_date` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`answers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`answers` ;

CREATE TABLE IF NOT EXISTS `mydb`.`answers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_question` VARCHAR(45) NULL,
  `value` INT NULL,
  `id_question` VARCHAR(45) NULL,
  `correct` DATETIME NULL,
  `html_type` DATETIME NULL,
  `creation_date` DATETIME NULL,
  `modified_date` DATETIME NULL,
  `questions_id` INT NOT NULL,
  PRIMARY KEY (`id`, `questions_id`),
  CONSTRAINT `fk_answers_questions1`
    FOREIGN KEY (`questions_id`)
    REFERENCES `mydb`.`questions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_answers_questions1_idx` ON `mydb`.`answers` (`questions_id` ASC);


-- -----------------------------------------------------
-- Table `mydb`.`answers_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`answers_users` ;

CREATE TABLE IF NOT EXISTS `mydb`.`answers_users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_user` INT NULL,
  `id_answer` INT NULL,
  `value` VARCHAR(45) NULL,
  `description` TEXT NULL,
  `time` INT NULL,
  `creation_date` DATETIME NULL,
  `modified_date` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`skills` ;

CREATE TABLE IF NOT EXISTS `mydb`.`skills` (
  `id` INT NOT NULL,
  `text` VARCHAR(45) NULL,
  `time` INT NULL,
  `answer_id` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
