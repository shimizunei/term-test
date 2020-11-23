window.onload = function () {
        // 像php那样用$_GET
        var $_GET = (function () {
            var url = window.document.location.href.toString();
            var u = url.split("?");
            if (typeof (u[1]) == "string") {
                u = u[1].split("&");
                var get = {};
                for (var i in u) {
                    var j = u[i].split("=");
                    get[j[0]] = j[1];
                }
                return get;
            } else {
                return {};
            }
        })();
    
        // 格式化字符串
        function formatStr(str) {
            // 忽略大小写 前后空字符
            return str.trim().toLowerCase();
        }
    
        function refreshCode() {
            codeInput.value = "";
            codeInput.style.borderBottom = "2px solid #38a1ff";
        }
    // clear按钮
    var clear = document.querySelectorAll('.clear');
    // 清空输入
    clear.forEach(function (element) {
        element.addEventListener('click', function () {
            this.previousElementSibling.value = "";
        })
    });
    // 眼睛 显示隐藏密码 按钮
    var dNSwithch = document.querySelector('.d-n-swithch');
    // 标识
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
    // 验证码div
    var code = document.querySelector('.code');
    // 验证码输入框
    var codeInput = code.querySelector('input');
    // 验证码图像
    var codeImg = code.querySelector('img');
    
    // 用户名输入框
    var username = document.querySelector('#user');
    if ($_GET['userExist'] === "false") {
        username.style.borderBottom = "2px solid #bd2d30";
        username.placeholder = "该用户不存在 请重新输入";
    } else {
        username.style.borderBottom = "2px solid #38a1ff";
        username.placeholder = "";
    }
    // 密码输入框
    var password = document.querySelector('#password');
    if ($_GET['passwordOk'] === "false") {
        password.style.borderBottom = "2px solid #bd2d30";
        password.placeholder = "密码错误 请重新输入";
    } else {
        password.style.borderBottom = "2px solid #38a1ff";
        password.placeholder = "";
    }
    // code输入框
    if ($_GET['codeOk'] === "false") {
        codeInput.placeholder = "验证码错误 请重新输入";
        codeInput.style.borderBottom = "2px solid #bd2d30";
        codeImg.src = 'image_code.php' + '?nowtime=' + new Date().getTime();
    } else {
        password.style.borderBottom = "2px solid #38a1ff";
        password.placeholder = "";
    }
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
    codeInput.addEventListener("mouseout", function () {
        if ($.cookie("codeId") === formatStr(codeInput.value)) {
            codeInput.style.borderBottom = "2px solid #38a1ff";
        } else {
            codeInput.value = "";
            codeInput.placeholder = "验证码错误 请重新输入";
            codeInput.style.borderBottom = "2px solid #bd2d30";
            codeImg.src = 'image_code.php' + '?nowtime=' + new Date().getTime();
        }
    })


}