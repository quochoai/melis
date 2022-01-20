<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $table = 'exam_block';
    $user = $_SESSION['is_logined'];
    $result = $h->softDeleteBy($table, " where id = $id", $user['id']);
    if ($result)
        echo '1;success';
    else 
        echo '2;error';
?>