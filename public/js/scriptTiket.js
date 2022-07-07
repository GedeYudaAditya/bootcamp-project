var jum = 1;
    var isi = document.getElementsByClassName("total");
    const value = isi[0].innerHTML;
    function plusmyFunction() {
        jum = jum + 1;
        var x = document.getElementsByClassName("jum");
        var y = document.getElementById("jums");
        x[0].innerHTML = jum;
        x[1].innerHTML = jum;
        y.value = jum;
        var total = document.getElementsByClassName("total");
        var totals = document.getElementById("totals");
        total[0].innerHTML = value*jum;
        total[1].innerHTML = value*jum;
        totals.value = value*jum;
    }
    function minusmyFunction() {
        var x = document.getElementsByClassName("jum");
        var y = document.getElementById("jums");
        if(jum > 1){
            jum = jum - 1;
            x[0].innerHTML = jum;
            x[1].innerHTML = jum;
            y.value = jum;
        }
        var total = document.getElementsByClassName("total");
        var totals = document.getElementById("totals");
        total[0].innerHTML = value*jum;
        total[1].innerHTML = value*jum;
        totals.value = value*jum;
    }