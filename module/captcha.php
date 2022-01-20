<?php 
  session_start(); 
  $code = getCaptcha(4);
  $_SESSION['captcha_code'] = $code;
  echo $code;
