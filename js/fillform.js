window.onload = function () {
    var texts = document.querySelectorAll('.text');
    var textarea = document.querySelectorAll('.textarea');
    for (var i = 0; i < textarea.length; i++) {
        setInterval(function () {
            textarea[i-1].previousElementSibling.innerText = textarea[i-1].innerText;
        }, 300);
    }
}