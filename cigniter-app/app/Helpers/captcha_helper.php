<?php

function generate_captcha()
{
    $captcha_width = 200;
    $captcha_height = 50;
    $num_characters = 6;
    $font_size = 20;
    $font = 'monofont.ttf'; // Asigură-te că ai fontul 'monofont.ttf' disponibil în directorul tău

    // Generare cod CAPTCHA
    $captcha_code = '';
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    for ($i = 0; $i < $num_characters; $i++) {
        $captcha_code .= $characters[rand(0, strlen($characters) - 1)];
    }

    // Stocare cod CAPTCHA în sesiune
    session()->set('captcha', $captcha_code);

    // Creare imagine CAPTCHA
    $image = imagecreatetruecolor($captcha_width, $captcha_height);
    $bg_color = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 0, 0, 0);

    // Umplere fundal cu culoare albă
    imagefilledrectangle($image, 0, 0, $captcha_width, $captcha_height, $bg_color);

    // Adăugare text CAPTCHA
    imagettftext($image, $font_size, 0, 10, $captcha_height - 15, $text_color, $font, $captcha_code);

    // Adăugare linii de zgomot
    for ($i = 0; $i < 10; $i++) {
        imageline($image, rand(0, $captcha_width), rand(0, $captcha_height), rand(0, $captcha_width), rand(0, $captcha_height), $text_color);
    }

    // Adăugare puncte de zgomot
    for ($i = 0; $i < 100; $i++) {
        imagesetpixel($image, rand(0, $captcha_width), rand(0, $captcha_height), $text_color);
    }

    // Setare antet HTTP pentru imaginea CAPTCHA
    header('Content-type: image/png');
    imagepng($image);

    // Eliberare resurse
    imagedestroy($image);
}
