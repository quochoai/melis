<?php 
  session_start(); 
  function getCaptcha($length) {
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $max = strlen($codeAlphabet);
    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[random_int(0, $max-1)];
    }
    return $token;
  }
  $code = getCaptcha(4);
  $_SESSION['captcha_code'] = $code;
  echo $code;
