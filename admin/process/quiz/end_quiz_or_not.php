<?php
    include("../../../require_inc.php");
    $exam_id = $_POST['exam_id'];
    $profile_id = $_POST['profile_id'];
    $end_quiz = $_POST['end_quiz'];
    $table = "exam_profile";
    if ($end_quiz == 0)
        $data['end_quiz'] = 1;        
    else
        $data['end_quiz'] = 0;
    $where = " where id = $exam_id and profile_id = $profile_id";
    $e = $h->update($data, $table, $where);
    echo $end_quiz;