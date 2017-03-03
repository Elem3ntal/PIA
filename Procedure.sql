CREATE PROCEDURE GetInventario (IN id INT)
BEGIN
	USE PIA;
	SELECT Bought_id, Bought_descrip, Inventory_Cant, Bought_Sold
	FROM Bought
	INNER JOIN Inventory
	ON Bought.Bought_id = Bought_Bought_id
	WHERE Bought.Users_Users_id=id;
END