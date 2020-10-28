window.onload = function () {
    var sidevar = document.querySelector('.sidevar');
    var sideTurn = sidevar.querySelector('.turn');
    var tables = sidevar.querySelector('.tables');
    var h4s = tables.querySelectorAll('h4');
    var tablesDivs = tables.children;
    var sideopens = sidevar.querySelector('.sideopen');
    var turnI = sideTurn.querySelector('i');
    var sideTurnFlag = true;
    turnI.addEventListener('click', function () {
        if (sideTurnFlag) {
            sidevar.style.width = "52px";
            sideTurn.style.width = "52px";
            this.innerHTML = "";
            for (i = 0; i < tablesDivs.length; i++) {
                tablesDivs[i].style.width = "52px";
                h4s[i].style.display = "none";
            }
            sideopens.style.left = "52px"
            sideTurnFlag = false;
        } else {
            sidevar.style.width = "160px";
            sideTurn.style.width = "160px";
            this.innerHTML = "";
            for (i = 0; i < tablesDivs.length; i++) {
                tablesDivs[i].style.width = "160px";
                h4s[i].style.display = "block";
            }
            sideopens.style.left = "160px"
            sideTurnFlag = true;
        }
    })
}