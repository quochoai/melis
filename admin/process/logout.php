<?php
	include("../../require_inc.php");
	unset($_SESSION['is_logined']);
	setcookie("islogined", $_COOKIE['islogined'], time() - (86400 * 365), "/");
