<?php
    @session_start();    
    $langToSet = (!isset($_GET['set'])) ? 'vi' : $_GET['set'];    
    if(!in_array($langToSet, array('vi', 'en', 'no',))){
    	$langToSet = 'vi';
    }
    $_SESSION['lang'] = strtolower($langToSet);
    $m = $_SERVER['HTTP_REFERER'];
    header("Location: ".$_SERVER['HTTP_REFERER']);
