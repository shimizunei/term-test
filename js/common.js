window.onload = function () {
    var sidevar = document.querySelector('.sidevar');
    var sideTurn = sidevar.querySelector('.turn');
    var tables = sidevar.querySelector('.tables');
    var logout = sidevar.querySelector('.logout');
    var tablesDivs = tables.children;
    var sideopens = sidevar.querySelectorAll('.sideopen');
    var contain=document.querySelector('.contain');
    var turnI = sideTurn.querySelector('i');
    var sideTurnFlag = true;
    turnI.addEventListener('click', function () {
        if (sideTurnFlag) {
            sidevar.style.width = "52px";
            sideTurn.style.width = "52px";
            logout.style.width = "52px";
            logout.querySelector('h4').style.display = "none";
            this.innerHTML = "";
            for (i = 0; i < tablesDivs.length; i++) {
                var h4=tablesDivs[i].querySelector('h4');
                tablesDivs[i].style.width = "52px";
                h4.style.display = "none";
            }
            contain.style.left='52px';
            sideopens[0].style.left = "52px";
            sideopens[1].style.left = "52px";
            sideTurnFlag = false;
        } else {
            sidevar.style.width = "160px";
            sideTurn.style.width = "160px";
            logout.style.width = "160px";
            logout.querySelector('h4').style.display = "";
            this.innerHTML = "";
            for (i = 0; i < tablesDivs.length; i++) {
                var h4=tablesDivs[i].querySelector('h4');
                tablesDivs[i].style.width = "160px";
                h4.style.display = "";
            }
            contain.style.left='160px';
            sideopens[0].style.left = "160px";
            sideopens[1].style.left = "160px";
            sideTurnFlag = true;
        }
    })
    

}