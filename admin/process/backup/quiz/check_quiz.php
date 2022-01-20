<?php
    include("../../../require_inc.php"); 
    $exam_id = $_POST['exam_id'];
    $time_exam = $_POST['time_exam'];
    $examBDT = $h->getExamBlockById($exam_id);
    $exam_info = $h->getExamById($examBDT['exam_id']);
    
    $today = date("Y/m/d");
    $hours = date("H:i");
    $time_exam = $examBDT['time_exam'];
    $exam_time = $exam_info['exam_time'];
    $time_end = date("H:i", strtotime("+$exam_time minutes", strtotime($time_exam)));
    $msg = '';
    if ($examBDT['start_date'] == $today) {
        if ($time_exam <= $hours && $hours < $time_end) {
            $msg = '<button type="submit" id="submit_start_quiz" name="btnGui" class="btn btn-success">'.$lang['start_the_quiz'].' <i class="fas fa-save"></i></button>';
        }
        if ($hours < $time_exam) {
            $msg = '<button class="btn btn-danger">'.$lang['not_on_hour'].' <i class="fas fa-time"></i></button>';
        } if ($time_exam < $hours && $hours >= $time_end) {
            $msg = '<button class="btn btn-danger">'.$lang['end_on_hour'].' <i class="fas fa-time"></i></button>';
        }
    } elseif ($examBDT['start_date'] > $today) {
        $msg = '<button class="btn btn-danger">'.$lang['exam_for_you_not_start'].' <i class="fas fa-time"></i></button>';
    } else {
        $msg = '<button class="btn btn-danger">'.$lang['exam_for_you_end'].' <i class="fas fa-time"></i></button>';
    } 
    echo $msg;
    