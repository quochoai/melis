<?php
    include("../../require_inc.php");
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $remember = trim($_POST['remember']);
    $p = $h->mahoa($password);
    $result = $h->login_user($username, $p, $remember);
