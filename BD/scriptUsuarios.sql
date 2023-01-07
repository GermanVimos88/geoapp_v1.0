CREATE SCHEMA IF NOT EXISTS `usuarios` DEFAULT CHARACTER SET utf8 ;
USE `usuarios` ;

-- -----------------------------------------------------
-- Table `usuarios`.`datos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios`.`datos` (
  `usr_codigo_usuario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `usr_usuario` VARCHAR(20) NOT NULL,
  `usr_password` VARCHAR(45) NULL,
  `usr_idpersonal` VARCHAR(45) NULL,
  `usr_tipo` INT NULL,
  `usr_nombres` VARCHAR(45) NULL,
  `usr_apellidos` VARCHAR(45) NULL,
  `usr_idpersonal` VARCHAR(45) NULL,
  
  PRIMARY KEY (`usr_codigo_usuario`, `usr_idpersonal`),
  UNIQUE INDEX `usr_id_UNIQUE` (`usr_codigo_usuario` ASC),
  INDEX `pro_ruc_idx` (`usr_usuario` ASC))
ENGINE = InnoDB;

INSERT INTO datos (usr_codigo_usuario,usr_usuario,usr_password,usr_idpersonal,usr_tipo,usr_nombres,usr_apellidos,usr_idpersonal) VALUES 
(1,'usuario','1234569824','1234569824',10,'Usuario','DePrueba');