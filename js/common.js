window.onload = function () {
    // 侧边栏
    var sidevar = document.querySelector('.sidevar');
    // 展开收起标签
    var sideTurn = sidevar.querySelector('.turn');
    // 展开收起按钮
    var turnI = sideTurn.querySelector('i');
    // 展开收起标志
    var sideTurnFlag = true;
    var flexibles = document.querySelectorAll('.flexible');
    var flexibleTexts = document.querySelectorAll('.flexible-text')
    var flexibleLefts = document.querySelectorAll('.flexible-left')
    turnI.addEventListener('click', function () {
        if (sideTurnFlag) {
            // 修改展开收起按钮的样式
            this.innerHTML = "";
            // 缩短宽
            for (i = 0; i < flexibles.length; i++)
                flexibles[i].style.width = "52px";
            // 隐藏文字
            for (i = 0; i < flexibleTexts.length; i++)
                flexibleTexts[i].style.display = "none";
            for (i = 0; i < flexibleLefts.length; i++)
                flexibleLefts[i].style.left = "52px";
            // 更改展开收起按钮标志
            sideTurnFlag = false;
        } else {
            this.innerHTML = "";
            for (i = 0; i < flexibles.length; i++)
                flexibles[i].style.width = "160px";
            for (i = 0; i < flexibleTexts.length; i++)
                flexibleTexts[i].style.display = "";
            for (i = 0; i < flexibleLefts.length; i++)
                flexibleLefts[i].style.left = "160px";
            sideTurnFlag = true;
        }
    })
    var pathName = window.document.location.pathname;　
    var projectName = pathName.substring(1, pathName.substr(1).indexOf('.') + 1);
    console.log(projectName);
    var current =document.querySelector('.'+projectName).querySelector('.inner');
    current.className=current.className+" current";
}