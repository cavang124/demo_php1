<?php
session_start();
//$string = md5(time());
//$string = substr($string, 0, 6);
 
$captcha_arr = array(
"A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
"a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
"0","1","2","3","4","5","6","7","8","9"); //Tạo một mảng các ký tự để chọn ra đưa vào trong captcha

$captcha_index = array_rand($captcha_arr,6); //Chọn ra ngẫu nhiên 6 ký tự từ mảng đã được tạo ra bên trên
$string = $captcha_arr[$captcha_index[0]].$captcha_arr[$captcha_index[1]].$captcha_arr[$captcha_index[2]].$captcha_arr[$captcha_index[3]].
$captcha_arr[$captcha_index[4]].$captcha_arr[$captcha_index[5]]; //Tạo 1 chuỗi captcha

$_SESSION['captcha'] = $string;//Tạo session captcha là string được tạo ra bên trên

//Tạo ảnh captcha
$img = imagecreate(150,50);
$background = imagecolorallocate($img, 0,0,0);
$text_color = imagecolorallocate($img, 255,255,255);
$line_color = imagecolorallocate($img, 255,255,0);
imageline($img, 0,23,150,23, $line_color);
//imageline($img, 0,25,150,25, $line_color);
imagestring($img, 4,40,15, $string, $text_color);
 
header("Content-type: image/png"); //Định nghĩa đây là 1 file hỉnh ảnh để chèn vào
imagepng($img);
imagedestroy($img);
?>