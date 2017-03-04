-- MySQL Script generated by MySQL Workbench
-- vie 03 mar 2017 16:07:24 CLST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema PIA
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `PIA` ;

-- -----------------------------------------------------
-- Schema PIA
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PIA` DEFAULT CHARACTER SET utf8 ;
USE `PIA` ;

-- -----------------------------------------------------
-- Table `PIA`.`Users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PIA`.`Users` ;

CREATE TABLE IF NOT EXISTS `PIA`.`Users` (
  `Users_id` INT NOT NULL AUTO_INCREMENT,
  `Users_name` VARCHAR(45) NOT NULL,
  `Users_pass` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Users_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PIA`.`ExtraData`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PIA`.`ExtraData` ;

CREATE TABLE IF NOT EXISTS `PIA`.`ExtraData` (
  `ExtraData_id` INT NOT NULL AUTO_INCREMENT,
  `ExtraData_webSite` VARCHAR(45) NULL,
  `ExtraData_email` VARCHAR(45) NULL,
  `ExtraData_RecomenderPrice` FLOAT NULL,
  `Users_Users_id` INT NOT NULL,
  PRIMARY KEY (`ExtraData_id`),
  INDEX `fk_ExtraData_Users1_idx` (`Users_Users_id` ASC),
  CONSTRAINT `fk_ExtraData_Users1`
    FOREIGN KEY (`Users_Users_id`)
    REFERENCES `PIA`.`Users` (`Users_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PIA`.`Bought`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PIA`.`Bought` ;

CREATE TABLE IF NOT EXISTS `PIA`.`Bought` (
  `Bought_id` INT NOT NULL AUTO_INCREMENT,
  `Bought_descrip` VARCHAR(45) NOT NULL,
  `Bought_cost` INT NOT NULL,
  `Bought_cant` INT NOT NULL,
  `Bought_Sold` INT NULL,
  `Bought_date` DATE NULL,
  `Users_Users_id` INT NOT NULL,
  PRIMARY KEY (`Bought_id`),
  INDEX `fk_Bought_Users1_idx` (`Users_Users_id` ASC),
  CONSTRAINT `fk_Bought_Users1`
    FOREIGN KEY (`Users_Users_id`)
    REFERENCES `PIA`.`Users` (`Users_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PIA`.`Clients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PIA`.`Clients` ;

CREATE TABLE IF NOT EXISTS `PIA`.`Clients` (
  `Clients_id` INT NOT NULL AUTO_INCREMENT,
  `Clients_F_Name` VARCHAR(45) NULL,
  `Clients_L_Name` VARCHAR(45) NULL,
  `Clients_Phone` INT NULL,
  PRIMARY KEY (`Clients_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PIA`.`Sold`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PIA`.`Sold` ;

CREATE TABLE IF NOT EXISTS `PIA`.`Sold` (
  `Sold_id` INT NOT NULL AUTO_INCREMENT,
  `Users_Users_id` INT NOT NULL,
  `Clients_Clients_id` INT NULL,
  `Sold_Price` INT NULL,
  `Sold_Units` INT NULL,
  `Sold_Date` DATE NULL,
  `Bought_Bought_id` INT NOT NULL,
  PRIMARY KEY (`Sold_id`),
  INDEX `fk_Sold_Users1_idx` (`Users_Users_id` ASC),
  INDEX `fk_Sold_Clients1_idx` (`Clients_Clients_id` ASC),
  INDEX `fk_Sold_Bought1_idx` (`Bought_Bought_id` ASC),
  CONSTRAINT `fk_Sold_Users1`
    FOREIGN KEY (`Users_Users_id`)
    REFERENCES `PIA`.`Users` (`Users_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sold_Clients1`
    FOREIGN KEY (`Clients_Clients_id`)
    REFERENCES `PIA`.`Clients` (`Clients_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sold_Bought1`
    FOREIGN KEY (`Bought_Bought_id`)
    REFERENCES `PIA`.`Bought` (`Bought_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PIA`.`Inventory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PIA`.`Inventory` ;

CREATE TABLE IF NOT EXISTS `PIA`.`Inventory` (
  `Inventory_id` INT NOT NULL AUTO_INCREMENT,
  `Inventory_ArrivalDate` DATE NULL,
  `Inventory_Cant` INT NULL,
  `Users_Users_id` INT NOT NULL,
  `Bought_Bought_id` INT NOT NULL,
  PRIMARY KEY (`Inventory_id`),
  INDEX `fk_Inventory_Users1_idx` (`Users_Users_id` ASC),
  INDEX `fk_Inventory_Bought1_idx` (`Bought_Bought_id` ASC),
  CONSTRAINT `fk_Inventory_Users1`
    FOREIGN KEY (`Users_Users_id`)
    REFERENCES `PIA`.`Users` (`Users_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Inventory_Bought1`
    FOREIGN KEY (`Bought_Bought_id`)
    REFERENCES `PIA`.`Bought` (`Bought_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `PIA` ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- -----------------------------------------------------
--  routine1
-- -----------------------------------------------------
delimiter //
CREATE PROCEDURE GetInventario (IN id INT)
BEGIN
	SELECT Bought_id, Bought_descrip, Inventory_Cant, Bought_Sold, Bought_date
	FROM Bought
	INNER JOIN Inventory
	ON Bought.Bought_id = Bought_Bought_id
	WHERE Bought.Users_Users_id=id;
END//

CREATE PROCEDURE GetVentas (IN id INT)
BEGIN
	SELECT Bought_descrip, Sold_Price, Sold_Units, Sold_Date
	FROM Bought
	INNER JOIN Sold
	ON Bought.Bought_id = Bought_Bought_id
	WHERE Sold.Users_Users_id=id;
END//

CREATE PROCEDURE GetCompras (IN id INT)
BEGIN
	SELECT Bought_descrip, Bought_cost, Bought_cant, Bought_date
	FROM Bought
	WHERE Users_Users_id=id;
END//

CREATE PROCEDURE GetComprasPorFecha(IN id INT,IN anio INT,IN mes INT)
BEGIN
	SELECT Bought_descrip, Bought_cost, Bought_cant, Bought_date
	FROM Bought
	WHERE YEAR(Bought_date) = anio AND MONTH(Bought_date) = mes AND Users_Users_id = id;
END//
CREATE PROCEDURE vender(in produc_id int, in usuario int, in cant int, OUT hecho varchar(1))
begin
	select Inventory_Cant INTO @col1priv FROM Inventory WHERE Inventory_id = 1 and (Inventory_Cant - cant > 0);
	if ((@col1priv - cant )>0) then
		UPDATE Inventory set Inventory_Cant = Inventory_Cant - cant
		WHERE Users_Users_id = usuario AND Inventory_id = produc_id;
        set hecho = 'V';
	else
		set hecho = 'F';
    end if;
end//
delimiter ;

INSERT INTO Users (Users_name, Users_pass)
VALUES ('sebapini', '9e7520594c505e4cbb95f0ca8aa30063'),
('javier', '3c9c03d6008a5adf42c2a55dd4a1a9f2'),
('jonas', '9c5ddd54107734f7d18335a5245c286b'),
('gato', '70b783251225354e883a5bef3c011843'),
('perro', 'd44b121fc3524fe5cdc4f3feb31ceb78'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee'); 

INSERT INTO Bought (Bought_descrip, Bought_cost, Bought_cant, Bought_Sold, Bought_date, Users_Users_id)
VALUES ('Lentes de Sol', 10000, 50, 20000, '2017-02-01', 1),
('Lentes de Sol', 11000, 45, 20000, '2017-02-01', 2),
('Lentes Deportivos', 10000, 30, 20000, '2017-02-01', 3),
('Sol', 10000, 2, 20000, '2017-02-01', 4),
('Biblia', 10000, 100, 20000, '2017-02-01', 5),
('Agua', 10000, 50, 20000, '2017-02-01', 6),
('Lan Chile', 10000, 10, 20000, '2017-02-01', 1),
('Examar', 10000, 19, 20000, '2015-02-01', 1),
('TransBank', 1000000, 52, 9000000, '2014-06-07', 1),
('Notebook', 10000, 212, 20000, '2017-02-01', 2),
('Epson xp-211', 10000, 10, 20000, '2017-02-01', 3),
('Wifi', 10000, 10, 20000, '2017-02-01', 4);

INSERT INTO Inventory (Inventory_ArrivalDate, Inventory_Cant, Users_Users_id,Bought_Bought_id)
VALUES ('2017-03-02', 49, 1, 1),
('2017-03-02', 44, 2, 2),
('2017-03-02', 29, 3, 3),
('2017-03-02', 1, 4, 4),
('2017-03-02', 99, 5, 5),
('2017-03-02', 49, 6, 6),
('2017-03-02', 10, 1, 7),
('2017-03-02', 19, 1, 8),
('2017-03-02', 52, 1, 9),
('2017-03-02', 212, 2, 10),
('2017-03-02', 10, 3, 11),
('2017-03-02', 10, 4, 12);
--  `Inventory_id` INT NOT NULL AUTO_INCREMENT,
--  `Inventory_ArrivalDate` DATE NULL,
--  `Inventory_Cant` INT NULL,
--  `Users_Users_id` INT NOT NULL,
--  `Bought_Bought_id` INT NOT NULL,

INSERT INTO Sold (Users_Users_id, Clients_Clients_id, Sold_Price, Sold_Units, Sold_Date, Bought_Bought_id)
VALUES (1, NULL, 20000,1,'2017-03-02',1),
(2, NULL, 20000,1,'2017-03-02',2),
(3, NULL, 20000,1,'2017-03-02',3),
(4, NULL, 20000,1,'2017-03-02',4),
(5, NULL, 20000,1,'2017-03-02',5),
(6, NULL, 20000,1,'2017-03-02',6);
--  `Sold_id` INT NOT NULL AUTO_INCREMENT,
--  `Users_Users_id` INT NOT NULL,
--  `Clients_Clients_id` INT NULL,
--  `Sold_Price` INT NULL,
--  `Sold_Units` INT NULL,
--  `Sold_Date` DATE NULL,
--  `Bought_Bought_id` INT NOT NULL,