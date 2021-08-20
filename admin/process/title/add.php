<?php
    include("../../../require_inc.php");
    $data['name'] = trim($_POST['name']);
    $data['name_short'] = trim($_POST['name_short']);
    $table = 'titles';
    $user = $_SESSION['is_logined'];
    $result = $h->insertDataBy($data, $table, $user['id']);
    if ($result)
        echo '1;success';
    else 
        echo '2;error';
?>