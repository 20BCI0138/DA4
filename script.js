function responsive() {
    var y = document.getElementById("bars");
    if (y.className === "fa fa-bars") {
        y.className = "fa fa-close";
    }
    else {
        y.className = "fa fa-bars";
    }
    var x = document.getElementById("menu");
    if (x.className === "menu") {
        x.className += " res"
    }
    else {
        x.className = "menu"
    }
}