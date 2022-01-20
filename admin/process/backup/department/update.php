<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $data['block_id'] = $_POST['block_id'];
    $data['name'] = trim($_POST['name']);
    $old_name = trim($_POST['name_old']);
    $text_old = $id.'-'.$old_name;
    $text_new = $id.'-'.$data['name'];
    if ($text_new != $text_old) {
        $table = 'departments';
        $user = $_SESSION['is_logined'];
        $result = $h->updateDataBy($data, $table, "where id = $id", $user['id']);
        if ($result) {
            $h->updateDepartmentExamBlock($text_old, $text_new);
            echo '1;success';
        } else 
            echo '2;error';
    } else
        echo '1;success';
        
?>