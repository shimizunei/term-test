window.onload = function () {
    var texts = document.querySelectorAll('.text');
    var textareas = document.querySelectorAll('.textarea');
    var clears = document.querySelectorAll('.clear');
    var resets = document.querySelectorAll('.reset');
    for (var i = 0; i < texts.length; i++) {
        clears[i].addEventListener('click', function () {
            this.previousElementSibling.innerText = "";
        })
        resets[i].dataset.text = resets[i].previousElementSibling.previousElementSibling.innerText
        resets[i].addEventListener('click', function () {
            this.previousElementSibling.previousElementSibling.innerText = this.dataset.text;
        })
        setInterval(function c(i) {
            if (textareas[i].innerText !== texts[i].innerText)
                texts[i].innerText = textareas[i].innerText;
        }, 300, i);

    }
    var deletes = document.querySelectorAll('#delete');
    for (i = 0; i < deletes.length; i++) {
        deletes[i].addEventListener('click', function () {
            this.parentElement.style.display = "none";
        })
    }
    var additems=document.querySelectorAll('.additem');
    for(i=0;i<additems.length;i++){
        additems[i].addEventListener('click',function(){
            this.previousElementSibling.innerHTML+="<form action=''><label for=''>职务</label><input type='text' value='' id='' name=''><label for=''>姓名</label><input type='text' value='' id='' name=''><input class='hide' type='text' name='id' value='$arrxls[0]'> <input class='hide' type='text' name='formname' value='$arr[0]-$arr[3]'> <input type='submit' name='change' value='修改'> <input type='submit' id='delete' name='delete' value='删除'></form>";
        })
    }

}