USE PIA;
delimiter ;
/* Users_type 0 Nuevo, 1 verificado, 2cuenta suspendida*/
INSERT INTO Users (Users_name, Users_pass,Users_type)
VALUES ('sebapini', '9e7520594c505e4cbb95f0ca8aa30063',1),
('javier', '3c9c03d6008a5adf42c2a55dd4a1a9f2',1),
('jonas', '9c5ddd54107734f7d18335a5245c286b',1),
('juan', 'a94652aa97c7211ba8954dd15a3cf838',1);

INSERT INTO ExtraData(ExtraData_webSite, ExtraData_email,ExtraData_RecomenderPrice,Users_Users_id)
values('www.facebook.com/entregaencleta','javier08@hotmail.com',1.8,2),
('www.facebook.com/donJuan','javier08@hotmail.com',2,4);

INSERT INTO Bought (Bought_descrip, Bought_Cost, Bought_cant, Bought_Sold, Bought_date, Users_Users_id)
VALUES ('dataShow',5000,74,11000,'2017-4-5',1),
('bicicleta',6000,65,17000,'2017-4-5',1),
('dataShow',2000,55,11000,'2017-4-5',2),
('silla',9000,31,24000,'2017-4-5',2),
('pendrive',12000,88,24000,'2017-4-5',3),
('pelota',1000,65,16000,'2017-4-5',3),
('bidon',5000,48,20000,'2017-3-5',1),
('puerta',10000,45,16000,'2017-3-5',1),
('bicicleta',3000,13,10000,'2017-3-5',2),
('torta',2000,74,14000,'2017-3-5',2),
('bebida',2000,71,10000,'2017-3-5',3),
('notebook',6000,20,11000,'2017-3-5',3),
('telefono',15000,56,23000,'2017-2-5',1),
('bicicleta',1000,99,11000,'2017-2-5',1),
('dataShow',6000,75,18000,'2017-2-5',2),
('raqueta',10000,48,20000,'2017-2-5',2),
('silla',11000,40,12000,'2017-2-5',3),
('torta',4000,99,19000,'2017-2-5',3),
('notebook',10000,78,23000,'2017-1-5',1),
('torta',15000,94,23000,'2017-1-5',1),
('bicicleta',15000,27,25000,'2017-1-5',2),
('torta',9000,25,25000,'2017-1-5',2),
('torta',11000,80,20000,'2017-1-5',3),
('bidon',1000,46,19000,'2017-1-5',3),
('dataShow',2000,99,13000,'2016-12-5',1),
('pan',6000,72,20000,'2016-12-5',1),
('puerta',15000,50,21000,'2016-12-5',2),
('computador',1000,88,13000,'2016-12-5',2),
('teclado',9000,22,14000,'2016-12-5',3),
('computador',7000,99,18000,'2016-12-5',3),
('teclado',1000,23,14000,'2016-11-5',1),
('mesa',9000,52,21000,'2016-11-5',1),
('pendrive',14000,30,16000,'2016-11-5',2),
('bebida',13000,22,18000,'2016-11-5',2),
('notebook',4000,100,19000,'2016-11-5',3),
('bebida',3000,90,12000,'2016-11-5',3),
('dataShow',3000,22,15000,'2016-10-5',1),
('notebook',8000,52,20000,'2016-10-5',1),
('bidon',1000,28,23000,'2016-10-5',2),
('notebook',6000,29,21000,'2016-10-5',2),
('pendrive',4000,98,21000,'2016-10-5',3),
('peineta',1000,31,20000,'2016-10-5',3),
('pan',11000,37,25000,'2016-9-5',1),
('notebook',8000,56,17000,'2016-9-5',1),
('bidon',2000,48,25000,'2016-9-5',2),
('silla',3000,62,23000,'2016-9-5',2),
('mesa',7000,33,11000,'2016-9-5',3),
('notebook',7000,25,13000,'2016-9-5',3),
('notebook',11000,56,18000,'2016-8-5',1),
('bebida',10000,19,13000,'2016-8-5',1),
('bidon',9000,54,23000,'2016-8-5',2),
('notebook',8000,63,10000,'2016-8-5',2),
('silla',9000,20,17000,'2016-8-5',3),
('notebook',1000,52,18000,'2016-8-5',3),
('teclado',10000,68,19000,'2016-7-5',1),
('pan',1000,58,17000,'2016-7-5',1),
('raqueta',4000,77,12000,'2016-7-5',2),
('dataShow',3000,87,13000,'2016-7-5',2),
('notebook',6000,23,16000,'2016-7-5',3),
('bicicleta',11000,54,19000,'2016-7-5',3),
('pelota',7000,91,16000,'2016-6-5',1),
('raqueta',15000,68,25000,'2016-6-5',1),
('torta',1000,59,21000,'2016-6-5',2),
('silla',5000,12,20000,'2016-6-5',2),
('bidon',13000,86,22000,'2016-6-5',3),
('silla',4000,64,17000,'2016-6-5',3),
('pendrive',5000,12,10000,'2016-5-5',1),
('teclado',13000,94,19000,'2016-5-5',1),
('peineta',7000,60,24000,'2016-5-5',2),
('notebook',3000,44,23000,'2016-5-5',2),
('bidon',3000,24,19000,'2016-5-5',3),
('bebida',6000,76,23000,'2016-5-5',3),
('computador',15000,64,25000,'2016-4-5',1),
('pan',13000,10,23000,'2016-4-5',1),
('pelota',7000,100,18000,'2016-4-5',2),
('dataShow',8000,34,20000,'2016-4-5',2),
('bidon',7000,58,14000,'2016-4-5',3),
('bebida',11000,28,15000,'2016-4-5',3),
('bebida',4000,57,10000,'2016-3-5',1),
('telon',11000,44,17000,'2016-3-5',1),
('bicicleta',14000,60,22000,'2016-3-5',2),
('bebida',2000,32,17000,'2016-3-5',2),
('pan',13000,45,15000,'2016-3-5',3),
('telon',3000,19,10000,'2016-3-5',3),
('bebida',3000,75,15000,'2016-2-5',1),
('bidon',12000,38,23000,'2016-2-5',1),
('peineta',15000,78,24000,'2016-2-5',2),
('telefono',15000,33,17000,'2016-2-5',2),
('bicicleta',4000,21,11000,'2016-2-5',3),
('bidon',5000,27,25000,'2016-2-5',3);

INSERT INTO Sold (Users_Users_id, Clients_Clients_id,Sold_Price, Sold_Units, Sold_date, Bought_Bought_id)
VALUES (1,1,11000,70,'2017-4-5',1),
(1,1,17000,57,'2017-4-5',2),
(2,1,11000,45,'2017-4-5',3),
(2,1,24000,25,'2017-4-5',4),
(3,1,24000,76,'2017-4-5',5),
(3,1,16000,55,'2017-4-5',6),
(1,1,20000,31,'2017-4-5',7),
(1,1,16000,44,'2017-3-5',8),
(2,1,10000,8,'2017-3-5',9),
(2,1,14000,53,'2017-3-5',10),
(3,1,10000,68,'2017-4-5',11),
(3,1,11000,14,'2017-3-5',12),
(1,1,23000,44,'2017-3-5',13),
(1,1,11000,88,'2017-2-5',14),
(2,1,18000,63,'2017-4-5',15),
(2,1,20000,31,'2017-3-5',16),
(3,1,12000,25,'2017-4-5',17),
(3,1,19000,61,'2017-4-5',18),
(1,1,23000,71,'2017-4-5',19),
(1,1,23000,71,'2017-2-5',20),
(2,1,25000,22,'2017-3-5',21),
(2,1,25000,19,'2017-1-5',22),
(3,1,20000,73,'2017-4-5',23),
(3,1,19000,43,'2017-1-5',24),
(1,1,13000,61,'2017-1-5',25),
(1,1,20000,60,'2016-12-5',26),
(2,1,21000,49,'2017-1-5',27),
(2,1,13000,64,'2016-12-5',28),
(3,1,14000,13,'2017-1-5',29),
(3,1,18000,94,'2017-2-5',30),
(1,1,14000,19,'2016-11-5',31),
(1,1,21000,37,'2016-12-5',32),
(2,1,16000,19,'2016-11-5',33),
(2,1,18000,21,'2017-1-5',34),
(3,1,19000,78,'2017-2-5',35),
(3,1,12000,86,'2016-11-5',36),
(1,1,15000,17,'2016-10-5',37),
(1,1,20000,39,'2017-1-5',38),
(2,1,23000,18,'2016-11-5',39),
(2,1,21000,20,'2017-1-5',40),
(3,1,21000,93,'2016-12-5',41),
(3,1,20000,25,'2016-11-5',42),
(1,1,25000,29,'2016-12-5',43),
(1,1,17000,33,'2016-10-5',44),
(2,1,25000,29,'2016-9-5',45),
(2,1,23000,51,'2016-12-5',46),
(3,1,11000,22,'2016-12-5',47),
(3,1,13000,19,'2016-12-5',48),
(1,1,18000,41,'2016-8-5',49),
(1,1,13000,12,'2016-8-5',50),
(2,1,23000,49,'2016-8-5',51),
(2,1,10000,43,'2016-11-5',52),
(3,1,17000,18,'2016-11-5',53),
(3,1,18000,51,'2016-9-5',54),
(1,1,19000,67,'2016-10-5',55),
(1,1,17000,36,'2016-7-5',56),
(2,1,12000,62,'2016-8-5',57),
(2,1,13000,73,'2016-10-5',58),
(3,1,16000,17,'2016-9-5',59),
(3,1,19000,41,'2016-8-5',60),
(1,1,16000,88,'2016-9-5',61),
(1,1,25000,49,'2016-6-5',62),
(2,1,21000,50,'2016-9-5',63),
(2,1,20000,9,'2016-8-5',64),
(3,1,22000,73,'2016-6-5',65),
(3,1,17000,47,'2016-6-5',66),
(1,1,10000,10,'2016-8-5',67),
(1,1,19000,81,'2016-5-5',68),
(2,1,24000,52,'2016-7-5',69),
(2,1,23000,27,'2016-6-5',70),
(3,1,19000,15,'2016-7-5',71),
(3,1,23000,71,'2016-6-5',72),
(1,1,25000,44,'2016-5-5',73),
(1,1,23000,9,'2016-5-5',74),
(2,1,18000,94,'2016-5-5',75),
(2,1,20000,28,'2016-4-5',76),
(3,1,14000,45,'2016-5-5',77),
(3,1,15000,23,'2016-7-5',78),
(1,1,10000,37,'2016-3-5',79),
(1,1,17000,37,'2016-4-5',80),
(2,1,22000,38,'2016-6-5',81),
(2,1,17000,24,'2016-4-5',82),
(3,1,15000,37,'2016-6-5',83),
(3,1,10000,12,'2016-3-5',84),
(1,1,15000,66,'2016-2-5',85),
(1,1,23000,27,'2016-4-5',86),
(2,1,24000,59,'2016-4-5',87),
(2,1,17000,31,'2016-3-5',88),
(3,1,11000,19,'2016-2-5',89),
(3,1,25000,18,'2016-3-5',90);

INSERT INTO Inventory (Inventory_ArrivalDate, Inventory_Cant, Users_Users_id, Bought_Bought_id)
VALUES ('2017-4-5',4,1,1),
('2017-4-5',8,1,2),
('2017-4-5',10,2,3),
('2017-4-5',6,2,4),
('2017-4-5',12,3,5),
('2017-4-5',10,3,6),
('2017-3-5',17,1,7),
('2017-3-5',1,1,8),
('2017-3-5',5,2,9),
('2017-3-5',21,2,10),
('2017-3-5',3,3,11),
('2017-3-5',6,3,12),
('2017-2-5',12,1,13),
('2017-2-5',11,1,14),
('2017-2-5',12,2,15),
('2017-2-5',17,2,16),
('2017-2-5',15,3,17),
('2017-2-5',38,3,18),
('2017-1-5',7,1,19),
('2017-1-5',23,1,20),
('2017-1-5',5,2,21),
('2017-1-5',6,2,22),
('2017-1-5',7,3,23),
('2017-1-5',3,3,24),
('2016-12-5',38,1,25),
('2016-12-5',12,1,26),
('2016-12-5',1,2,27),
('2016-12-5',24,2,28),
('2016-12-5',9,3,29),
('2016-12-5',5,3,30),
('2016-11-5',4,1,31),
('2016-11-5',15,1,32),
('2016-11-5',11,2,33),
('2016-11-5',1,2,34),
('2016-11-5',22,3,35),
('2016-11-5',4,3,36),
('2016-10-5',5,1,37),
('2016-10-5',13,1,38),
('2016-10-5',10,2,39),
('2016-10-5',9,2,40),
('2016-10-5',5,3,41),
('2016-10-5',6,3,42),
('2016-9-5',8,1,43),
('2016-9-5',23,1,44),
('2016-9-5',19,2,45),
('2016-9-5',11,2,46),
('2016-9-5',11,3,47),
('2016-9-5',6,3,48),
('2016-8-5',15,1,49),
('2016-8-5',7,1,50),
('2016-8-5',5,2,51),
('2016-8-5',20,2,52),
('2016-8-5',2,3,53),
('2016-8-5',1,3,54),
('2016-7-5',1,1,55),
('2016-7-5',22,1,56),
('2016-7-5',15,2,57),
('2016-7-5',14,2,58),
('2016-7-5',6,3,59),
('2016-7-5',13,3,60),
('2016-6-5',3,1,61),
('2016-6-5',19,1,62),
('2016-6-5',9,2,63),
('2016-6-5',3,2,64),
('2016-6-5',13,3,65),
('2016-6-5',17,3,66),
('2016-5-5',2,1,67),
('2016-5-5',13,1,68),
('2016-5-5',8,2,69),
('2016-5-5',17,2,70),
('2016-5-5',9,3,71),
('2016-5-5',5,3,72),
('2016-4-5',20,1,73),
('2016-4-5',1,1,74),
('2016-4-5',6,2,75),
('2016-4-5',6,2,76),
('2016-4-5',13,3,77),
('2016-4-5',5,3,78),
('2016-3-5',20,1,79),
('2016-3-5',7,1,80),
('2016-3-5',22,2,81),
('2016-3-5',8,2,82),
('2016-3-5',8,3,83),
('2016-3-5',7,3,84),
('2016-2-5',9,1,85),
('2016-2-5',11,1,86),
('2016-2-5',19,2,87),
('2016-2-5',2,2,88),
('2016-2-5',2,3,89),
('2016-2-5',9,3,90);

