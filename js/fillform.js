window.onload = function () {
    var texts = document.querySelectorAll('.text');
    var textareas = document.querySelectorAll('.textarea');
    var clears = document.querySelectorAll('.clear');
    var resets = document.querySelectorAll('.reset');
    var subs = document.querySelectorAll('.sub');
    console.log(subs);
    for (var i = 0; i < texts.length; i++) {
        clears[i].addEventListener('click', function () {
            this.previousElementSibling.innerText = "";
        })
        resets[i].dataset.text = resets[i].previousElementSibling.previousElementSibling.innerText;
        resets[i].addEventListener('click', function () {
            this.previousElementSibling.previousElementSibling.innerText = this.dataset.text;
        })
        setInterval(function c(i) {
            if (textareas[i].innerText !== texts[i].innerText) {
                texts[i].innerText = textareas[i].innerText;
                subs[i].previousElementSibling.setAttribute('value',texts[i].innerText);
            }
        }, 300, i);
    }
    var deletes = document.querySelectorAll('#delete');
    for (i = 0; i < deletes.length; i++) {
        deletes[i].addEventListener('click', function () {
            this.parentElement.style.display = "none";
        })
    }
    var additems = document.querySelectorAll('.additem');
    for (i = 0; i < additems.length; i++) {
        additems[i].addEventListener('click', function () {
            if (this.previousElementSibling.lastElementChild.dataset.id) {
                var id = this.previousElementSibling.lastElementChild.dataset.id;
            } else {
                var id = 0;
            }
            id++;
            var out = "<form action='/form_temp.php' method='get' target='_blank' data-id='" + id + "'>";
            for (var i = 1; i < this.dataset.length; i++) {
                var temp = this.getAttribute("data-item" + i);
                out += "<label for=''>" + temp + "</label><input type='text' value='' id='' name='" + temp + "' autocomplete='off' spellcheck='false'>";
            }
            out += "<input class='hide' type='text' name='id' value='" + id + "'> <input class='hide' type='text' name='formname' value='" + this.dataset.formname + "'> <input type='submit' name='change' value='修改'> <input type='submit' id='delete' name='delete' value='删除'></form>"
            this.previousElementSibling.innerHTML += out;
        })
    }

}