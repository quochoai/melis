<?php 
  session_start(); 
  $code = getCaptcha2(4);
  $_SESSION['captcha_code2'] = $code;
  echo $code;
