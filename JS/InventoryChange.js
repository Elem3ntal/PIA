function menuInventary(menuOption){
    $("#InventarySee").fadeOut();
    if(menuOption==1){
        $("#InventarySee").load("Sites/InventarySee.php");
    }
    else if(menuOption==2){
        $("#InventarySee").load("Sites/InventaryChange.php?q=0");
    }
    else if(menuOption==3){
        $("#InventarySee").load("Sites/InventaryChange.php?q=2");
    }
$("#InventarySee").fadeIn();
}
