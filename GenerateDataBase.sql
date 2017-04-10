-- MySQL Script generated by MySQL Workbench
-- vie 07 abr 2017 18:10:21 CLST
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
  `Users_type` VARCHAR(45) NOT NULL,
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
  `Clients_Contact` VARCHAR(45) NULL,
  PRIMARY KEY (`Clients_id`))
ENGINE = InnoDB;
INSERT INTO Clients (Clients_F_Name, Clients_L_Name, Clients_Contact)
VALUES ('Private','Sale','0');

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


-- -----------------------------------------------------
-- Table `PIA`.`UsageStatistics`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PIA`.`UsageStatistics` ;

CREATE TABLE IF NOT EXISTS `PIA`.`UsageStatistics` (
  `UsageStatistics_id` INT NOT NULL AUTO_INCREMENT,
  `UsageStatistics_User` INT NULL,
  `UsageStatistics_IP` VARCHAR(45) NULL,
  `UsageStatistics_Site` VARCHAR(45) NULL,
  `UsageStatistics_DateTime` VARCHAR(45) NULL,
  PRIMARY KEY (`UsageStatistics_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


USE `PIA` ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

USE `PIA`;
DROP procedure IF EXISTS `PIA`.`Login`;
-- -----------------------------------------------------
--  routine1
-- -----------------------------------------------------

DELIMITER //
#################################################################################################
#################################PROCEDIMIENTOS DE USUARIO
CREATE PROCEDURE Login(in _user varchar(45), in _pass varchar(45))
BEGIN
  SELECT Users_id
  FROM Users
  WHERE Users_name=_user AND Users_pass=_pass and Users_type=1;
END//
CREATE PROCEDURE checkUser(IN _user varchar(45))
BEGIN
  SELECT count(*)
  FROM PIA.Users
  WHERE Users_name = _user;
END//
CREATE PROCEDURE checkEmail(IN _email varchar(45))
BEGIN
  SELECT count(*)
  FROM PIA.ExtraData
    WHERE ExtraData_email = _email;
END//
#retorna el nombre de usuario, corrreo y Recomendador de precios en base al ID
CREATE PROCEDURE GetUserNameEmail(IN _ID INT)
BEGIN
  SELECT Users_name, ExtraData_email, ExtraData_RecomenderPrice
    FROM Users
    INNER JOIN ExtraData
    WHERE ExtraData.Users_Users_id = Users.Users_id
	AND Users.Users_id=_ID;
END//

CREATE PROCEDURE ExtraDataSet(IN _ID INT, IN _webSite VARCHAR(45), IN _Recomender FLOAT)
BEGIN
  UPDATE ExtraData SET ExtraData_webSite = _webSite, ExtraData_RecomenderPrice=_Recomender
    WHERE Users_Users_id = _ID;
END//
#################################################################################################
#################################PROCEDIMIENTOS DE INVENTARIO
CREATE PROCEDURE GetInventario (IN id INT)
BEGIN
  SELECT Inventory_id, Bought_descrip, Inventory_Cant, Bought_cost, Bought_Sold, Bought_date
  FROM Bought
  INNER JOIN Inventory
  ON Bought.Bought_id = Bought_Bought_id
  AND Bought.Users_Users_id=id
  AND Inventory_Cant>0
  ORDER BY Inventory_id ASC;
END//
#################################################################################################
#################################PROCEDIMIENTOS DE VENTAS
CREATE PROCEDURE GetVentas (IN id INT)
BEGIN
  SELECT Bought_descrip, Sold_Price, Sold_Units, Sold_Date
  FROM Bought
  INNER JOIN Sold
  ON Bought.Bought_id = Bought_Bought_id
  WHERE Sold.Users_Users_id=id
  ORDER BY Sold_id ASC;
END//

CREATE PROCEDURE GetVentasPorMes (IN id INT,IN anio INT,IN mes INT)
BEGIN
  SELECT Bought_descrip, Sold_Price, Sold_Units, Sold_Date
  FROM Bought
  INNER JOIN Sold
  ON Bought.Bought_id = Bought_Bought_id
  WHERE YEAR(Sold_Date) = anio AND MONTH(Sold_Date) = mes AND Sold.Users_Users_id=id
  ORDER BY Sold_id ASC;
END//

##Descuenta del inventario siempre y cuando la cantidad sea positiva, y luego lo registra en venta
CREATE PROCEDURE venderAnonimo(in produc_id int, in usuario int, in cant int, OUT hecho varchar(1))
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
#################################################################################################
#################################PROCEDIMIENTOS DE COMPRAS
CREATE PROCEDURE GetCompras (IN id INT)
BEGIN
  SELECT Bought_id, Bought_descrip, Bought_cost, Bought_Sold, Bought_cant, Bought_date
  FROM Bought
  WHERE Users_Users_id=id
  ORDER BY Bought_id ASC;
END//

CREATE PROCEDURE GetComprasPorMes(IN id INT,IN anio INT,IN mes INT)
BEGIN
  SELECT Bought_id, Bought_descrip, Bought_cost, Bought_Sold, Bought_cant, Bought_date
  FROM Bought
  WHERE YEAR(Bought_date) = anio AND MONTH(Bought_date) = mes AND Users_Users_id = id
  ORDER BY Bought_id ASC;
END//

CREATE PROCEDURE inventarioPorDescripcion(IN _User_ID INT,in _descripPartial varchar(45))
BEGIN
  SELECT Inventory_id, Bought_descrip, Inventory_Cant, Bought_Sold
  FROM Bought
  INNER JOIN Inventory
  WHERE Inventory.Users_Users_id = _User_ID
  AND Bought.Bought_id = Inventory.Bought_Bought_id
  AND instr(Bought.Bought_descrip, _descripPartial) > 0
  ORDER BY Inventory_id ASC;
END//
CREATE PROCEDURE productoPorID(IN _User_ID INT,IN _ProductID INT)
BEGIN
  SELECT Inventory_id, Bought_descrip, Inventory_Cant, Bought_Sold
  FROM Bought
  INNER JOIN Inventory
  WHERE Inventory.Users_Users_id = _User_ID
  AND Inventory_id=_ProductID
  AND Bought.Bought_id = Inventory.Bought_Bought_id
  ORDER BY Inventory_id ASC;
END//
#################################################################################################
#################################PROCEDIMIENTOS CON CLIENTES
#################################################################################################
#################################PROCECIDIMIENTOS DE RESUMEN
#################################################################################################
#################################PROCECIDIMIENTOS DE USUARIO

#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++#

DELIMITER $$
#################################################################################################
#################################FUNCIONES DE USUARIO
CREATE FUNCTION CrearUsuario (_user VARCHAR(45), _pass VARCHAR(45), _email varchar(45)) RETURNS INTEGER
BEGIN
  INSERT INTO PIA.Users (Users_name, Users_pass, Users_type) VALUES (_user, _pass, 0);
  SELECT Users_id into @IDUSER FROM PIA.Users where Users_name=_user;
  insert into PIA.ExtraData(ExtraData_webSite, ExtraData_email, ExtraData_RecomenderPrice, Users_Users_id)
  values ('',_email,0,@IDUSER);
  RETURN 1;
END$$

CREATE FUNCTION VerificarUsuario(_user varchar(45)) RETURNS INT UNSIGNED
BEGIN
  SELECT COUNT(*) into @salida from PIA.Users WHERE Users_name = _user;
    return @salida;
end$$

CREATE FUNCTION VerificarEmail(_email varchar(45)) RETURNS INT UNSIGNED
BEGIN
  SELECT Users_Users_id into @UserID From PIA.ExtraData WHERE ExtraData_email = _email;
    UPDATE PIA.Users SET Users_type = 1 Where Users_id = @UserID;
    RETURN 1;
END$$

#################################################################################################
#################################FUNCIONES DE COMPRA
CREATE FUNCTION ingresarCompra(_descrip VARCHAR(45), _cost INT, _cant INT, _Sold INT, _id INT) RETURNS INT UNSIGNED
BEGIN
  INSERT INTO PIA.Bought (Bought_descrip, Bought_cost, Bought_cant, Bought_Sold, Bought_date, Users_Users_id)
    VALUES (_descrip,_cost,_cant,_Sold,NOW(),_id);
    SELECT Bought_id INTO @productID FROM PIA.Bought ORDER BY Bought_id DESC LIMIT 1;
    INSERT INTO PIA.Inventory (Inventory_ArrivalDate,Inventory_Cant,Users_Users_id,Bought_Bought_id)
  VALUES (NOW(),_cant,_id,@productID);
  RETURN 1;
END$$

#################################################################################################
#################################FUNCIONES DE VENTA
CREATE FUNCTION venta(_UserID INT, _ClientID INT, _SoldID INT,_SoldCant INT) RETURNS INT UNSIGNED
BEGIN
  UPDATE Inventory set Inventory_Cant = Inventory_Cant - _SoldCant
  WHERE Users_Users_id = _UserID AND Inventory_id = _SoldID;
  SELECT Bought_id, Bought_Sold
  INTO @productID, @productPrice
  FROM Bought
  INNER JOIN Inventory
  ON Bought.Bought_id = Bought_Bought_id
  AND Bought.Users_Users_id = _UserID
  AND Inventory_id = _SoldID;
  INSERT INTO PIA.Sold(Users_Users_id, Clients_Clients_id, Sold_Price, Sold_Units, Sold_Date, Bought_Bought_id)
  VALUES(_userID, _ClientID, @productPrice, _SoldCant, NOW(), @productID);
  RETURN 1;
END$$
CREATE FUNCTION ventaCliente() RETURNS INT UNSIGNED
BEGIN
  RETURN 1;
END$$

#################################################################################################
#################################FUNCIONES DE INVENTARIO
#Con el Id del inventario, busca y cambia el producto en la tabla de compras
CREATE FUNCTION CambiarDescripcionPrecio(_IDInvProd INT, _descripNueva VARCHAR(45), _priceNew int) RETURNS INT UNSIGNED
BEGIN
	SELECT Inventory.Bought_Bought_id, Inventory_cant, Inventory.Users_Users_id INTO @BoughtID_OLD,@canActual, @usuario 
    FROM Inventory WHERE Inventory_id = _IDinvProd;
    UPDATE Bought SET Bought_cant = Bought_cant - @canActual WHERE Bought_id = @BoughtID_OLD;
    SELECT Bought_cost, Bought_date INTO @Cost, @fecha
    FROM Bought WHERE Bought_id = @BoughtID_OLD;
    INSERT PIA.Bought(Bought_descrip, Bought_Cost, Bought_cant, Bought_Sold, Bought_date, Users_Users_id)
    VALUES (_descripNueva, @Cost, @canActual,_priceNew,@fecha,@usuario);
    SELECT Bought_id INTO @_IDNueva FROM PIA.Bought ORDER BY Bought_id DESC LIMIT 1;
    UPDATE Inventory SET Bought_Bought_id = @_IDNueva
    WHERE Inventory_id = _IDInvProd;
	RETURN 1;
END$$
#################################################################################################
#################################FUNCIONES DE RESUMEN

#################################################################################################
#################################FUNCIONES DE CLIENTES
CREATE FUNCTION ClienteRegistrar(_First VARCHAR(45), _Last VARCHAR(45), _Contact VARCHAR(45)) RETURNS INT UNSIGNED
BEGIN
  INSERT INTO PIA.Clients (Clients_F_Name, Clients_L_Name, Clients_Contact)
    VALUES(_First,_Last,_Contact);
    SELECT Clients_id INTO @_IDclient FROM PIA.Clients ORDER BY Clients_id DESC LIMIT 1;
    RETURN @_IDclient;
END $$

#################################################################################################
#################################FUNCIONES DE USO ESTADISTICO
CREATE FUNCTION LogVisit(_id INT, _IP VARCHAR(45), _site VARCHAR(45)) RETURNS INT UNSIGNED
BEGIN
	INSERT INTO PIA.UsageStatistics(UsageStatistics_User, UsageStatistics_IP, UsageStatistics_Site, UsageStatistics_DateTime)
    VALUES(_id, _IP, _site, NOW());
	RETURN 1;
END $$
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++#
