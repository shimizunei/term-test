window.onload = function () {
    // 侧边栏
    var sidevar = document.querySelector('.sidevar');
    // 展开收起标签
    var sideTurn = sidevar.querySelector('.turn');
    // 侧边标签
    var tables = sidevar.querySelector('.tables');
    // 登出标签
    var logout = sidevar.querySelector('.logout');
    // 侧边标签div
    var tablesDivs = tables.children;
    // 侧边悬浮栏
    var sideopens = sidevar.querySelectorAll('.sideopen');
    // 内容块
    var contain=document.querySelector('.contain');
    // 展开收起按钮
    var turnI = sideTurn.querySelector('i');
    // 展开收起标志
    var sideTurnFlag = true;
    // 展开收起侧边栏
    turnI.addEventListener('click', function () {
        if (sideTurnFlag) {
            // 缩短宽
            sidevar.style.width = "52px";
            sideTurn.style.width = "52px";
            logout.style.width = "52px";
            // 隐藏文字
            logout.querySelector('h4').style.display = "none";
            // 修改展开收起按钮的样式
            this.innerHTML = "";
            for (i = 0; i < tablesDivs.length; i++) {
                var h4=tablesDivs[i].querySelector('h4');
                tablesDivs[i].style.width = "52px";
                h4.style.display = "none";
            }
            contain.style.left='52px';
            sideopens[0].style.left = "52px";
            sideopens[1].style.left = "52px";
            // 更改展开收起按钮标志
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