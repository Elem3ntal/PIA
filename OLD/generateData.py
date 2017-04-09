import datetime
import random
###########################Generate Config######################################################
Users=3 #Cant of users
#INSERT INTO Bought (Bought_descrip, Bought_cost, Bought_cant, Bought_Sold, Bought_date, Users_Users_id) VALUES ('Lentes de Sol', 10000, 50, 20000, '2017-02-01',1);
PPM=2 #productos por mes
#INSERT INTO Inventory (Inventory_ArrivalDate, Inventory_Cant, Users_Users_id,Bought_Bought_id) VALUES ('2017-03-02', 49, 1, 1);
MiMS = 0 #minimum amount of months to ingresate the sale
#INSERT INTO Sold (Users_Users_id, Clients_Clients_id, Sold_Price, Sold_Units, Sold_Date, Bought_Bought_id) VALUES (1, 1, 20000,1,'2017-03-02',1);
MaMS = 3 #Maximun amount ofmonths to ingresate the sale
MiSR =0.6 #cantidad de productos minimos a vender por mes
MaSR =1 #cantidad maxima de producos a vender por mes
MER = 15 #meses de registro hacia atras
day = 5#day when all operations all register
##################################functions######################################################
def fechaAnt():
  global month
  global year
  if month==1:
    month=12
    year-=1
  else:
    month-=1
def fechaGet():
  return str(year)+"-"+str(month)+"-"+str(day)
def fechaEstimate(cant):
  monthLocal=month
  yearLocal=year
  while(cant!=0):
    if monthLocal==int(datetime.datetime.now().strftime("%m")) and yearLocal==int(datetime.datetime.now().strftime("%Y")):
      return str(yearLocal)+"-"+str(monthLocal)+"-"+str(day)
    if monthLocal==12:
      monthLocal=1
      yearLocal+=1
    else:
      monthLocal+=1
    cant-=1
  return str(yearLocal)+"-"+str(monthLocal)+"-"+str(day)
############################global variable####################################################
month = int(datetime.datetime.now().strftime("%m"))
year = int(datetime.datetime.now().strftime("%Y"))
products=["telefono","computador","notebook","pelota","raqueta","mesa","silla","casa","bicicleta","teclado","notebook","peineta","dataShow","telon","puerta","pendrive","torta","pan","bebida","bidon"]
commands=[[],[],[]]
#############################################program###########################################
BoughtID=1
##se generan
for i in range(MER):
  for j in range(Users):
    for k in range(PPM):
      description=random.choice(products)
      cost = random.randint(1,15)
      price = 0
      while(price<=cost):
        price = random.randint(10,25)
      cost=str(cost*1000)
      price=str(price*1000)
      cant = random.randint(10,100)
      cantSell = int(cant*(random.uniform(MiSR,MaSR)));
      MTDS=random.randint(MiMS,MaMS)
      commandB = "'"+description+"',"+cost+","+str(cant)+","+price+",'"+fechaGet()+"',"+str(j+1)
      commandS = str(j+1)+",1,"+str(price)+","+str(cantSell)+",'"+fechaEstimate(MTDS)+"',"+str(BoughtID)
      commandI="'"+fechaGet()+"',"+str(cant-cantSell)+","+str(j+1)+","+str(BoughtID)
      commands[0].append(commandB)
      commands[1].append(commandS)
      commands[2].append(commandI)
      BoughtID+=1
  fechaAnt()
##se escribe el archivo
file = open("PopulateBigDataBase.sql","w");
vuelta=0
file.write("USE PIA;\n")
file.write("delimiter ;\n")
for i in commands:
    if vuelta==0:
         file.write("INSERT INTO Bought (Bought_descrip, Bought_Cost, Bought_cant, Bought_Sold, Bought_date, Users_Users_id)\nVALUES ")
    elif vuelta==180:
         file.write("INSERT INTO Inventory (Inventory_ArrivalDate, Inventory_Cant, Users_Users_id, Bought_Bought_id)\nVALUES ")
    elif vuelta==90:
         file.write("INSERT INTO Sold (Users_Users_id, Clients_Clients_id,Sold_Price, Sold_Units, Sold_date, Bought_Bought_id)\nVALUES ")
    for j in i:
        vuelta+=1
        if vuelta%90==0:
            file.write("("+j+");\n\n")
        else:
            file.write("("+j+"),\n")

##close the file, at the end
file.close()
print "Finish"
