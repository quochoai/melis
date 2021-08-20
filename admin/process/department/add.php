<?php
    include("../../../require_inc.php");
    $data['block_id'] = $_POST['block_id'];
    $data['name'] = trim($_POST['name']);
    $table = 'departments';
    $user = $_SESSION['is_logined'];
    $result = $h->insertDataBy($data, $table, $user['id']);
    if ($result)
        echo '1;success';
    else 
        echo '2;error';
?>