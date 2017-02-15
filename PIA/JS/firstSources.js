function loadjscssfile(filename, filetype) {
    if (filetype == "js") { //if filename is a external JavaScript file
        // alert('called');
        var fileref = document.createElement('script')
        fileref.setAttribute("type", "text/javascript")
        fileref.setAttribute("src", filename)
    }
    else if (filetype == "css") { //if filename is an external CSS file
        var fileref = document.createElement("link")
        fileref.setAttribute("rel", "stylesheet")
        fileref.setAttribute("type", "text/css")
        fileref.setAttribute("href", filename)
    }
    if (typeof fileref != "undefined"){
        document.getElementsByTagName("head")[0].appendChild(fileref)
    }
}
//Master Source
loadjscssfile("JS/masterSource.js","js");

//SOURCE FILES
loadjscssfile("JS/language.js","js");
loadjscssfile("CSS/body.css","css");
loadjscssfile("CSS/sideNav.css","css");
loadjscssfile("CSS/footer.css","css");


/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

