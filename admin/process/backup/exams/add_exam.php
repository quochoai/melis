<?php
    include("../../../require_inc.php");
    $data['exam_id'] = trim($_POST['exam_id']);
    $data['block_id'] = trim($_POST['block_id']);
    $sd = explode("/", $_POST['start_date']);
    $ssd = $sd[2].'/'.$sd[1].'/'.$sd[0];
    $data['start_date'] = $ssd;
    /*$ed = explode("/", $_POST['end_date']);
    $eed = $ed[2].'/'.$ed[1].'/'.$ed[0];
    $data['end_date'] = strtotime($eed);*/
    $data['time_exam'] = trim($_POST['time_exam']);
    $dp_id = $_POST['department_id'];
    if (count($dp_id) > 0) {
        $data['department_id'] = implode(";", $dp_id);
    }
    $tt_id = $_POST['title_id'];
    if (count($tt_id) > 0) {
        $data['title_id'] = implode(";", $tt_id);
    }
    $table = 'exam_block';
    $user = $_SESSION['is_logined'];
    $result = $h->insertDataBy($data, $table, $user['id']);
    if ($result)
        echo '1;success';
    else 
        echo '2;error';
?>