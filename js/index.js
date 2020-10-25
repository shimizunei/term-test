window.onload = function () {
    var password = document.querySelector('.password');
    var i = password.querySelector('i');
    var flag_password = true;
    i.addEventListener("click", function () {
        if (flag_password) {

            this.innerHTML = "";
            this.previousElementSibling.type = "text";
            flag_password = false;
        } else {
            this.innerHTML = "";
            this.previousElementSibling.type = "password";
            flag_password = true;
        }
    })

    var code = document.querySelector('.code');
    var codeInput = code.querySelector('input');
        var codeImg = code.querySelector('img');
    codeImg.addEventListener("click", function () {
        // 刷新验证码 通过刷新src 加后缀浏览器才会刷新
        codeImg.src = 'image_code.php' + '?nowtime=' + new Date().getTime();
    });
    codeInput.addEventListener("blur",function(){
       var codeId =$.cookie("codeId");
       console.log(this.value);
       if(codeId===this.value){
           code.className="code success";
       }
       else{
            code.className="code failure";
       }
    })
}