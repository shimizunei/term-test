window.onload = function () {
    var texts = document.querySelectorAll('.text');
    var textareas = document.querySelectorAll('.textarea');
    var clears = document.querySelectorAll('.clear');
    var resets = document.querySelectorAll('.reset');
    var textsinner = new Array();
    for (var i = 0; i < texts.length; i++) {
        textsinner.push(texts[i].innerText);
        clears[i].addEventListener('click', function () {
            textareas[i - 1].innerText = "";
        })
        resets[i].addEventListener('click', function () {
            textareas[i - 1].innerText = textsinner[i - 1];
        })
        setInterval(function () {
            if (textareas[i - 1].innerText !== texts[i - 1].innerText)
                texts[i - 1].innerText = textareas[i - 1].innerText;
        }, 300);
    }
    var deletes = document.querySelectorAll('#delete');
    for (j = 0; j < deletes.length; j++) {
        deletes[j].addEventListener('click', function () {
            this.parentElement.parentElement.style.display = "none";
        })
    }
}