function NavBar(index)
{
    if(index == 0){//home
        $("#BodyInside").load("Sites/Home.php");
    }
    else if (index == 1){//inventario
        $("#BodyInside").load("Sites/Inventario.php");
    }
    else if (index == 2){//Ventas
        $("#BodyInside").load("Sites/Ventas.php");
    }
    else if (index == 3){//Compras
        $("#BodyInside").load("Sites/Compras.php");
    }
    else if (index == 4){//Resumen
        $("#BodyInside").load("Sites/Resumen.php");
    }
}
