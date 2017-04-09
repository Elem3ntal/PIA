function NavBar(index)
{
    if(index == 0){//home
        $("#BodyInside").load("/PIA/Sites/Home.php");
    }
    else if (index == 1){//inventario
        $("#BodyInside").load("/PIA/Sites/Inventario.php");
    }
    else if (index == 2){//Ventas
        $("#BodyInside").load("/PIA/Sites/Ventas.php");
    }
    else if (index == 3){//Compras
        $("#BodyInside").load("/PIA/Sites/Compras.php");
    }
    else if (index == 4){//Resumen
        $("#BodyInside").load("/PIA/Sites/Resumen.php");
    }
}
