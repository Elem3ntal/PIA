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
//SOURCE FILES
loadjscssfile("JS/currency.js","js");
loadjscssfile("JS/randomText.js","js");
loadjscssfile("Sources/icomoon/style.css","css");