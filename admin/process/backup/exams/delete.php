<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $table = 'exams';
    $user = $_SESSION['is_logined'];
    $table2 = 'exam_block';
    $result2 = $h->softDeleteBy($table2, " where exam_id = $id", $user['id']);
    $result = $h->softDeleteBy($table, " where id = $id", $user['id']);    
    if ($result)
        echo '1;success';
    else 
        echo '2;error';
?>