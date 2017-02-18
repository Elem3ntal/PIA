//inventario y otros usuarios.
//0: puede ver inventario.
//1: puede ver inventario y usuarios.
//2: puede modificar inventario y ver usuarios.
//3: puede modificar inventario y usuarios.

var userLevel=0;
function login(){
    var user = parseInt(document.getElementById("loginUser").value);
    var pass = parseInt(document.getElementById("loginPass").value);
    if(user==pass){
        alert(user);
    }
}
