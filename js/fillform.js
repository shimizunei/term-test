window.onload = function () {
    var texts = document.querySelectorAll('.text');
    var textareas = document.querySelectorAll('.textarea');
    var textareasinner=new Array();
    for (var i = 0; i < textareas.length; i++) {
        textareasinner.push(textareas[i-1].innerText);
        setInterval(function () {
            textareas[i-1].previousElementSibling.innerText = textareas[i-1].innerText;
        }, 300);
    }
}