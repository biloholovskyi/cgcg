<?php
session_start();

$string = "";

for ($i = 0; $i < 5; $i++) { // Здесь задается количество символов на картинке
  $string = chr(rand(97, 122)); // вывод случайных символов от a до z, по html коду

  $case = rand(0, 2);

  if($case == 0) {
    $string = mb_convert_case($string, MB_CASE_UPPER, 'UTF-8');
  } elseif($case == 1) {
    $string = mb_convert_case($string, MB_CASE_UPPER, 'UTF-8');
  } else {
    $string = rand(0, 9);
  }

  $str .= $string;

}




$_SESSION['rand_code-subs'] = $str; // создаем сессию, в которой будут храниться отображаемые символы

$dir = "fonts/"; // подключаем папку со шрифтом

$width = 300;
$height = 80;

$image = imagecreatetruecolor($width,$height); // размер создаваемой картинки

$black = imagecolorallocate($image, 0, 0, 0); // выделение цвета для изображения

$bg = imagecolortransparent($image, $black);
$white = imagecolorallocate($image, 255, 255, 255);

imagefilledrectangle($image,0,0,399,99,$white); // рисует заполненный прямоугольник

imagettftext ($image, 24, rand(-10, 10), 20, 65, $black, $dir."verdana.ttf", $str[0]); // добавляем текст на изображение с использованием шрифтов TrueType, а так же сохраняем символы в данной сессии
imagettftext ($image, 24, rand(-10, 10), 75, 65, $black, $dir."verdana.ttf", $str[1]); // добавляем текст на изображение с использованием шрифтов TrueType, а так же сохраняем символы в данной сессии
imagettftext ($image, 24, rand(-10, 10), 125, 65,imagecolorallocate($image, 0, 0, 0), $dir."verdana.ttf", $str[2]); // добавляем текст на изображение с использованием шрифтов TrueType, а так же сохраняем символы в данной сессии
imagettftext ($image, 24, rand(-10, 10), 165, 65, imagecolorallocate($image, 0, 0, 0), $dir."verdana.ttf", $str[3]); // добавляем текст на изображение с использованием шрифтов TrueType, а так же сохраняем символы в данной сессии
imagettftext ($image, 24, rand(-10, 10), 215, 65, imagecolorallocate($image, 0, 0, 0), $dir."verdana.ttf", $str[4]); // добавляем текст на изображение с использованием шрифтов TrueType, а так же сохраняем символы в данной сессии

header("Content-type: image/png"); // объявляем тип страницы

imagepng($image);
