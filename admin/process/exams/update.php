<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $data['exam_code'] = trim($_POST['exam_code']);
    $data['name'] = trim($_POST['name']);
    $sd = explode("/", $_POST['start_date']);
    $ssd = $sd[2].'/'.$sd[1].'/'.$sd[0];
    $data['start_date'] = strtotime($ssd);
    $ed = explode("/", $_POST['end_date']);
    $eed = $ed[2].'/'.$ed[1].'/'.$ed[0];
    $data['end_date'] = strtotime($eed);
    $data['exam_time'] = trim($_POST['exam_time']);
    $data['number_questions'] = trim($_POST['number_questions']);
    $data['point'] = trim($_POST['point']);
    $table = 'exams';
    $user = $_SESSION['is_logined'];
    $result = $h->updateDataBy($data, $table, "where id = $id", $user['id']);
    if ($result)
        echo '1;success';
    else 
        echo '2;error';
?>