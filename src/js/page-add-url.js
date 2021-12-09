document.getElementById("nameID").onchange = function () {
    var x = document.getElementById("nameID").value;
    y = x.replace(" ", "-").toLowerCase();
  
    document.getElementById("urlID").value = y;

}
