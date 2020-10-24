window.onload = function(){
    var password = document.querySelector('.password');
    var i=password.querySelector('i');
    console.log(i);
    var flag_password=true;
    i.addEventListener("click",function(){
        if(flag_password){

            this.innerHTML="";
            this.previousElementSibling.type="text";
            flag_password=false;
        }
        else
        {
            this.innerHTML="";
            this.previousElementSibling.type="password";
            flag_password=true;
        }
    })
}
