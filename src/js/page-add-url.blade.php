<script>
  alert("hii");
    //  document.getElementById("nameID").value = "hiii";

    // function msg(){
    //    return alert(this.value);
    // }
    document.getElementById("nameID").onchange = function() {
        var x = document.getElementById("nameID");
  x.value = x.value.toUpperCase();
    }


</script>