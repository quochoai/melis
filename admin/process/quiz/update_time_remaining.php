<?php
    include("../../../require_inc.php");
    $exam_id = $_POST['exam_id'];
    $profile_id = $_SESSION['is_logined']['id'];
    $ex = $h->getExamProfileExamIdProfileId($exam_id, $profile_id);
    //$time_pass = date("d/m/Y H:i:s", $ex['time_pass']);
    $data['time_pass'] = $ex['time_pass'] + 1;//strtotime(date("d/m/Y H:i:s", strtotime("+1 seconds", $ex['time_pass'])));
    $s = $h->update($data, "exam_profile", " where id = ".$ex['id']);
    
    