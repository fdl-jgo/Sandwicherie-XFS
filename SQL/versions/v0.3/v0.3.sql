-- MySQL Script generated by MySQL Workbench
-- 09/26/17 18:49:31
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema projet_dev
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projet_dev
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projet_dev` DEFAULT CHARACTER SET utf8 ;
USE `projet_dev` ;

-- -----------------------------------------------------
-- Table `projet_dev`.`adresses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`adresses` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `code_postal` VARCHAR(20) NOT NULL,
  `ville` VARCHAR(100) NULL DEFAULT NULL,
  `rue` VARCHAR(255) NULL DEFAULT NULL,
  `numero` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`comment` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nom_UNIQUE` (`nom` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`personnes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`personnes` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `nom` VARCHAR(100) NOT NULL,
  `prenom` VARCHAR(100) NOT NULL,
  `date_naissance` DATE NOT NULL,
  `sexe` VARCHAR(20) NOT NULL,
  `deleted` BIT(1) NULL DEFAULT b'0',
  `email` VARCHAR(255) NOT NULL,
  `comment_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_comment_personnes_idx` (`comment_id` ASC),
  CONSTRAINT `fk_comment_personnes`
    FOREIGN KEY (`comment_id`)
    REFERENCES `projet_dev`.`comment` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`adresses_personnes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`adresses_personnes` (
  `personnes_id` BIGINT(20) UNSIGNED NOT NULL,
  `adresses_id` BIGINT(20) UNSIGNED NOT NULL,
  `role` VARCHAR(100) NOT NULL,
  `commentaire` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`personnes_id`, `adresses_id`),
  INDEX `fk_adresses_personnes_personnes1_idx` (`personnes_id` ASC),
  CONSTRAINT `fk_adresses_personnes_adresses1`
    FOREIGN KEY (`adresses_id`)
    REFERENCES `projet_dev`.`adresses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_adresses_personnes_personnes1`
    FOREIGN KEY (`personnes_id`)
    REFERENCES `projet_dev`.`personnes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`pains`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`pains` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  `prix` FLOAT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`sandwiches`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`sandwiches` (
  `id` INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `pains_id` INT(10) UNSIGNED NOT NULL,
  `taille_cm` INT(11) NULL DEFAULT NULL,
  `garniture_sandwich_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sandwiches_pains1_idx` (`pains_id` ASC),
  CONSTRAINT `fk_sandwiches_pains1`
    FOREIGN KEY (`pains_id`)
    REFERENCES `projet_dev`.`pains` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`catalogue`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`catalogue` (
  `id_sandwich` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sandwiches_id` INT(10) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`id_sandwich`),
  INDEX `fk_catalogue_sandwiches1_idx` (`sandwiches_id` ASC),
  CONSTRAINT `fk_catalogue_sandwiches1`
    FOREIGN KEY (`sandwiches_id`)
    REFERENCES `projet_dev`.`sandwiches` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`membres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`membres` (
  `personne_id` BIGINT(20) UNSIGNED NOT NULL,
  `login` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NULL DEFAULT NULL,
  `connecte` TINYINT(1) UNSIGNED NULL DEFAULT NULL,
  `newsletter` BIT(1) NOT NULL DEFAULT b'0',
  `date_inscription` DATE NULL DEFAULT NULL,
  `banned` BIT(1) NOT NULL DEFAULT b'0',
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  UNIQUE INDEX `token_UNIQUE` (`token` ASC),
  PRIMARY KEY (`personne_id`),
  CONSTRAINT `fk_membres_personnes1`
    FOREIGN KEY (`personne_id`)
    REFERENCES `projet_dev`.`personnes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`commandes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`commandes` (
  `id` INT(11) NOT NULL,
  `membres_personne_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `membres_personne_id`),
  INDEX `fk_commandes_membres1_idx` (`membres_personne_id` ASC),
  CONSTRAINT `fk_commandes_membres1`
    FOREIGN KEY (`membres_personne_id`)
    REFERENCES `projet_dev`.`membres` (`personne_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`connexions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`connexions` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_initiateur` VARCHAR(50) NULL DEFAULT NULL,
  `login_tente` VARCHAR(100) NULL DEFAULT NULL,
  `date` DATETIME NULL DEFAULT NULL,
  `aboutissement` BIT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`entites`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`entites` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nom_UNIQUE` (`nom` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`garnitures`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`garnitures` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  `prix` FLOAT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`garnitures_sandwich`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`garnitures_sandwich` (
  `id` INT(11) NOT NULL,
  `sandwiches_id` INT(10) UNSIGNED ZEROFILL NOT NULL,
  `garnitures_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`sandwiches_id`, `garnitures_id`, `id`),
  INDEX `fk_table1_garnitures1_idx` (`garnitures_id` ASC),
  CONSTRAINT `fk_table1_garnitures1`
    FOREIGN KEY (`garnitures_id`)
    REFERENCES `projet_dev`.`garnitures` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_table1_sandwiches1`
    FOREIGN KEY (`sandwiches_id`)
    REFERENCES `projet_dev`.`sandwiches` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`ligne_commandes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`ligne_commandes` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sandwiches_id` INT(10) UNSIGNED ZEROFILL NOT NULL,
  `quantite` INT(11) NULL DEFAULT NULL,
  `prix_unitaire` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ligne_commandes_sandwiches1_idx` (`sandwiches_id` ASC),
  CONSTRAINT `fk_ligne_commandes_sandwiches1`
    FOREIGN KEY (`sandwiches_id`)
    REFERENCES `projet_dev`.`sandwiches` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`ligne_commandes_has_commandes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`ligne_commandes_has_commandes` (
  `ligne_commandes_id` INT(10) UNSIGNED NOT NULL,
  `commandes_id` INT(11) NOT NULL,
  PRIMARY KEY (`ligne_commandes_id`, `commandes_id`),
  INDEX `fk_ligne_commandes_has_commandes_commandes1_idx` (`commandes_id` ASC),
  INDEX `fk_ligne_commandes_has_commandes_ligne_commandes1_idx` (`ligne_commandes_id` ASC),
  CONSTRAINT `fk_ligne_commandes_has_commandes_commandes1`
    FOREIGN KEY (`commandes_id`)
    REFERENCES `projet_dev`.`commandes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ligne_commandes_has_commandes_ligne_commandes1`
    FOREIGN KEY (`ligne_commandes_id`)
    REFERENCES `projet_dev`.`ligne_commandes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`operations_admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`operations_admin` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `membres_personne_id` BIGINT(20) UNSIGNED NOT NULL,
  `operation` BIT(4) NOT NULL,
  `nom_entite` VARCHAR(100) NOT NULL,
  `id_entite` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `membres_personne_id`),
  INDEX `fk_operations_admin_membres1_idx` (`membres_personne_id` ASC),
  CONSTRAINT `fk_operations_admin_membres1`
    FOREIGN KEY (`membres_personne_id`)
    REFERENCES `projet_dev`.`membres` (`personne_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`permissions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`permissions` (
  `permission` BIT(4) NOT NULL,
  `membres_personne_id` BIGINT(20) UNSIGNED NOT NULL,
  `entites_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`membres_personne_id`, `entites_id`),
  INDEX `fk_permissions_entites1_idx` (`entites_id` ASC),
  CONSTRAINT `fk_permissions_membres1`
    FOREIGN KEY (`membres_personne_id`)
    REFERENCES `projet_dev`.`membres` (`personne_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissions_entites1`
    FOREIGN KEY (`entites_id`)
    REFERENCES `projet_dev`.`entites` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`telephones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`telephones` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `numero` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`telephones_personnes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`telephones_personnes` (
  `personnes_id` BIGINT(20) UNSIGNED NOT NULL,
  `telephones_id` BIGINT(20) UNSIGNED NOT NULL,
  `role` VARCHAR(100) NOT NULL,
  `commentaire` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`personnes_id`, `telephones_id`),
  INDEX `fk_telephones_personnes_telephones1_idx` (`telephones_id` ASC),
  CONSTRAINT `fk_telephones_personnes_personnes1`
    FOREIGN KEY (`personnes_id`)
    REFERENCES `projet_dev`.`personnes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_telephones_personnes_telephones1`
    FOREIGN KEY (`telephones_id`)
    REFERENCES `projet_dev`.`telephones` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projet_dev`.`users_has_sandwiches`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_dev`.`users_has_sandwiches` (
  `sandwiches_id` INT(10) UNSIGNED ZEROFILL NOT NULL,
  `membres_personne_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`sandwiches_id`, `membres_personne_id`),
  INDEX `fk_users_has_sandwiches_sandwiches1_idx` (`sandwiches_id` ASC),
  INDEX `fk_users_has_sandwiches_membres1_idx` (`membres_personne_id` ASC),
  CONSTRAINT `fk_users_has_sandwiches_sandwiches1`
    FOREIGN KEY (`sandwiches_id`)
    REFERENCES `projet_dev`.`sandwiches` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_has_sandwiches_membres1`
    FOREIGN KEY (`membres_personne_id`)
    REFERENCES `projet_dev`.`membres` (`personne_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
