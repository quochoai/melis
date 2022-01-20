<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $data['name'] = trim($_POST['name']);
    $table = 'departments';
    $user = $_SESSION['is_logined'];
    $result = $h->updateDataBy($data, $table, "where id = $id", $user['id']);
    if ($result)
        echo '1;success';
    else 
        echo '2;error';
?>