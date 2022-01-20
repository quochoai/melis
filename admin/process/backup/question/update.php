<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $data['type_question'] = $_POST['type_question'];
    if ($data['type_question'] == 'image') {
        if($_FILES['file']['name'] != '') {
            $path = '../../views/question/img';
            move_uploaded_file($_FILES['file']['tmp_name'],$path."/".$id.'_'.chuoianh($_FILES['file']['name']));
            $data['image'] = $id.'_'.chuoianh($_FILES['file']['name']);
        }
    }
    $data['knowledge'] = trim($_POST['knowledge']);
    $data['question'] = trim($_POST['question']);
    $as = $_POST['answer'];
    $array_answer = array();
    if (count($as) > 0) {
        foreach ($as as $v) {
            if (trim($v) != '') {
                array_push($array_answer, trim($v));
            }
        }
        $data['answer'] = implode(";;;s_answer;;;", $array_answer);
    }
    $data['right_answer'] = trim($_POST['right_answer']);
    $table = 'qandas';
    $user = $_SESSION['is_logined'];
    $result = $h->updateDataBy($data, $table, "where id = $id", $user['id']);
    if ($result)
        echo '1;success';
    else 
        echo '2;error';
?>