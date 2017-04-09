import random
import datetime

#############################CONFIGURATIONS#############################
users=3
PPU=2#Products Per User in one Moth
months=15#Amounts of moths created
MiSR=0.5 #Minimum Sell Ratio
MaSR=0.9 #Maximum Sell Raio
MiMS=0#Minimum Moth to Sell
MaMS=3#Maxmum Moth to Sell
########################################################################
anio=int(datetime.datetime.now().strftime("%Y"))
mes=int(datetime.datetime.now().strftime("%m"))

articulos=["Casco","Lentes","Guantes","Velocimetro","Telefono","Notebook","Pantalla","Teclado","Monitor","Jarron","Ruedas","Calculadora","Impresora","Carpetas","Zapatillas","Pizarra","Lampara","Ventilador","Calza","Mochila","Ampolleta LED", "Ipad", "Tablet", "Reloj", "Iman","Bandana","Gorro","Sombrero","Tuerca","Pan","Cartulinas","Bidones",'Torta','Manzana','platabi']

def fechaAnt():
	global mes
	global anio
	if mes==1:
		mes=12
		anio=anio-1
	else:
		mes=mes-1
	return
def dateSold():
	
print str()

##create the Bougth
for i in range(months):
		fecha=str(anio)+"-"+str(mes)+"-"+str(5)
		fechaAnt()
		for i in range(users):
			for j in range(PPU):
				costo=random.randint(1,20)
				canB=random.randint(5,10)
				canV=int(random.uniform(MiSR,MaSR)*canB)
				precioVenta=0
				usuario=random.randint(1,3)
				while(precioVenta<=costo):
					precioVenta=random.randint(costo,costo*4)
				costo=costo*1000
				precioVenta=precioVenta*1000
				print "Compra: "+str(canB)
				print "Vende: "+str(canV)
				print "('"+random.choice(articulos)+"',"+str(costo)+","+str(canB)+","+str(precioVenta)+",'"+fecha+"',"+str(i+1)+"),"
				

