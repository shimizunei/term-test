<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body></body>
    <form action="#" method="GET">
        <input type="text" name="code" >
        <img src='image_code.php' alt= >
        <input type="submit">
    </form>
    <script>
    var img = document.querySelector('img');
    console.log(img.src);
    img.addEventListener("click",function(){
        img.src= 'image_code.php' + '?nowtime=' + new Date().getTime();
    });
    </script>
</body>
</html>