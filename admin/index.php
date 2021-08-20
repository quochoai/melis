<?php
    include("../require_inc.php");
    if(!isset($_SESSION['is_logined'])) //  && !isset($_COOKIE['islogined']) 
        include("login/index.php");
    else
        include("module/app.php");
