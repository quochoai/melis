<?php
  if (!isset($_REQUEST['pqh']))
    include("module/home.php");
  else {
    $pqh = killInjection($_REQUEST['pqh']);
		$pqh = rtrim($pqh,"/");
		$mang = explode("/",$pqh);
    switch ($mang[1]) {
      
    }
  }