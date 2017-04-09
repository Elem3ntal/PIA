USE PIA;
delimiter ;
/* Users_type 0 Nuevo, 1 verificado, 2cuenta suspendida*/
INSERT INTO Users (Users_name, Users_pass,Users_type)
VALUES ('sebapini', '9e7520594c505e4cbb95f0ca8aa30063',1),
('javier', '3c9c03d6008a5adf42c2a55dd4a1a9f2',1),
('jonas', '9c5ddd54107734f7d18335a5245c286b',1);

INSERT INTO ExtraData(ExtraData_webSite, ExtraData_email,ExtraData_RecomenderPrice,Users_Users_id)
values('www.facebook.com/entregaencleta','javier08@hotmail.com',1.8,2);
/*
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

INSERT INTO Sold (Users_Users_id, Clients_Clients_id, Sold_Price, Sold_Units, Sold_Date, Bought_Bought_id)
VALUES (1, 1, 20000,1,'2017-03-02',1),
(2, 1, 20000,1,'2017-03-02',2),
(3, 1, 20000,1,'2017-03-02',3),
(4, 1, 20000,1,'2017-03-02',4),
(5, 1, 20000,1,'2017-03-02',5),
(6, 1, 20000,1,'2017-03-02',6);
*/
