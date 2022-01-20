<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $data['name'] = trim($_POST['name']);
    $old_name = trim($_POST['old_name']);
    $text_old = $id.'-'.$old_name;
    $text_new = $id.'-'.$data['name'];
    if ($text_new != $text_old) {
        $table = 'knowledges';
        $user = $_SESSION['is_logined'];
        $result = $h->updateDataBy($data, $table, "where id = $id", $user['id']);
        if ($result) {
            $h->updateKnowledgeQandas($text_old, $text_new);
            $h->updateKnowledgeConstructExam($text_old, $text_new);
            echo '1;success';
        } else 
            echo '2;error';
    } else
        echo '1;success';
        
?>