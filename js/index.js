window.onload = function () {


    var clear = document.querySelectorAll('.clear');
    // 清空输入
    console.log(clear);
    clear.forEach(function (element) {
        element.addEventListener('click', function () {
            this.previousElementSibling.value = "";
        })
    });

    var dNSwithch = document.querySelector('.d-n-swithch');
    var passwordFlag = true;
    // 显示隐藏密码
    dNSwithch.addEventListener("click", function () {
        if (passwordFlag) {
            this.innerHTML = "";
            this.previousElementSibling.previousElementSibling.type = "text";
            passwordFlag = false;
        } else {
            this.innerHTML = "";
            this.previousElementSibling.previousElementSibling.type = "password";
            passwordFlag = true;
        }
    })
    var code = document.querySelector('.code');
    var codeInput = code.querySelector('input');
    var codeImg = code.querySelector('img');
    // 点击刷新验证码
    codeImg.addEventListener("click", function () {
        // 刷新验证码 通过刷新src 加后缀浏览器才会刷新
        codeImg.src = 'image_code.php' + '?nowtime=' + new Date().getTime();
        refreshCode();
        codeInput.placeholder = "请重新输入验证码";
    });
    // 自动刷新验证码
    setInterval(function () {
        codeImg.src = 'image_code.php' + '?nowtime=' + new Date().getTime();
        refreshCode();
        codeInput.placeholder = "验证码过期 请重新输入";
    }, 180000);
    // 离开验证码输入框 检测输入
    codeInput.addEventListener("blur", function () {
        if ($.cookie("codeId") === formatStr(codeInput.value)) {
            codeInput.style.borderBottom = "2px solid #38a1ff";
        } else {
            codeInput.value = "";
            codeInput.placeholder = "验证码错误 请重新输入";
            codeInput.style.borderBottom = "2px solid #bd2d30";
        }
    })
    // 格式化字符串
    function formatStr(str) {
        // 忽略大小写 前后空字符
        return str.trim().toLowerCase();
    }

    function refreshCode() {
        codeInput.value = "";
        codeInput.style.borderBottom = "2px solid #38a1ff";
    }

}