-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema controledb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema controledb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `controledb` DEFAULT CHARACTER SET utf8 ;
USE `controledb` ;

-- -----------------------------------------------------
-- Table `controledb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controledb`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(30) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `senha_original` VARCHAR(20) NOT NULL,
  `nivel` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

ALTER TABLE `controledb`.`usuarios` 
ADD COLUMN `ativo` BIT NOT NULL DEFAULT 1 AFTER `nivel`;

-- -----------------------------------------------------
-- Table `controledb`.`eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controledb`.`eventos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `data` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  `capacidade` INT NOT NULL,
  `ativo` BIT NOT NULL DEFAULT 1,
  `usuarios_id` INT NOT NULL,
  PRIMARY KEY (`id`, `usuarios_id`),
  INDEX `fk_eventos_usuarios_idx` (`usuarios_id` ASC) ,
  CONSTRAINT `fk_eventos_usuarios`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `controledb`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
