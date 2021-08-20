<?php
    include("../../../require_inc.php");
    $exam_id = $_POST['exam_id'];
    $profile_id = $_POST['profile_id'];
    $table = "exam_profile";
    $s = $h->query("select end_quiz from $table where exam_id = $exam_id and profile_id = $profile_id");
    $r = $h->fetch_array($s);
    if ($r['end_quiz'] == 0) {
        $data['end_quiz'] = 1;        
        $where = " where exam_id = $exam_id and profile_id = $profile_id";
        $h->update($data, $table, $where);
    }
