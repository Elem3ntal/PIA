var id = 1;
var words = [
        //0 para Espa;ol
        //1 for english
        ['Bienvenido a PIA. \"Productos e Inventario Administrados\".','Welcome to PIA. \"Products and Inventory Administred\".'],
        ['Acerca','About'],
        ['Inventario','Inventary'],
        ['Otros Servicios','Other Services'],
        ['English','Español']
];

function setlenguage(){
        document.getElementById("H1Body").innerHTML = words[0][id];
        //SideNavMenu
        document.getElementById("sideNavAbout").innerHTML = words[1][id];
        document.getElementById("sideNavInventary").innerHTML = words[2][id];
        document.getElementById("sideNavOthers").innerHTML = words[3][id];
        document.getElementById("idiomaFlag").innerHTML = words[4][id];
        //idiomaFlag
        if(id==1){
                id=0;
        }
        else{
                id=1;
        }
}
setlenguage();
