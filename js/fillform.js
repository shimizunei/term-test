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
            this.parentElement.parentElement.style.display = "none";
        })
    }
    var additems=document.querySelectorAll('.additem');
    for(i=0;i<additems.length;i++){
        additems[i].addEventListener('click',function(){
            var tr =document.createElement('tr');
            tr.setAttribute('class','col');

            var table =document.createElement('table');


            var form=document.createElement('form');
            form.setAttribute('action','/form_temp.php');
            form.setAttribute('method','get');
            form.setAttribute('target','_blank');
            form.appendChild(table);
            var td=document.createElement('td');
            var input=document.createElement('input');
            input.setAttribute('type','text');
            input.setAttribute('value','社区（村）属地单位负责');
            td.appendChild(input);
            tr.appendChild(td);

            td=document.createElement('td');
            input=document.createElement('input');
            input.setAttribute('type','text');
            input.setAttribute('value','1 ');
            td.appendChild(input);
            tr.appendChild(td);
            td=document.createElement('td');
            input=document.createElement('input');
            input.setAttribute('type','submit');
            input.setAttribute('name','change');
            input.setAttribute('value','修改');
            td.appendChild(input);
            tr.appendChild(td);
            table.appendChild(tr);

            
            // console.log(this.previousElementSibling.querySelector('tbody'));
            this.previousElementSibling.querySelector('tbody').insertBefore(form,this.previousElementSibling.querySelector('tbody').querySelector('.last'))
        })
    }

}