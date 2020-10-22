<?php
    header('Content-type:image/jpeg');
    $width = 120;
    $height = 40;
    $i=0;
    $a='a';
    while($a<='z'){
        $elment[$i++]=$a;
        $a = chr(ord($a) + 1);
    }
    $a= '0';
    while($a<='9'){
        $elment[$i++]=$a;
        $a = chr(ord($a) + 1);
    }
    $code="";
    for($i=0;$i<4;$i++){
        $code.=$elment[rand(0,count($elment)-1)];
    }
    $img = imagecreatetruecolor($width, $height);
    $colorBg = imagecolorallocate($img, rand(200, 255), rand(200, 255), rand(200, 255));
    $colorBoder = imagecolorallocate($img, 0, 0, 0);
    imagefill($img, 0, 0, $colorBg);
    imagerectangle($img, 0, 0, $width - 1, $height - 1, $colorBoder);
    for ($i = 0; $i < 200; $i++) {
        imagesetpixel($img, rand(0, $width - 1), rand(0, $height - 1), $colorBoder);
    }
    for($i=0;$i<5;$i++){
        imageline($img,rand(0,$width / 2), rand(0,$height / 2),rand($width/ 2,$width),rand($height/2,$height),$colorBoder);
    }
    imagettftext($img,30,rand(-10,10),rand(10,20),rand(30,35),$colorBoder,'D:\desktop\origin\font\Freezed.ttf',$code);
    imagejpeg($img);
    imagedestroy($img);


