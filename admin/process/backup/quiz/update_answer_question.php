<?php
    include("../../../require_inc.php");
    $exam_id = $_POST['exam_id'];
    $profile_id = $_POST['profile_id'];
    $question_id = $_POST['idq'];
    $data['profile_answer'] = $_POST['pa'];
    $data['token'] = $_COOKIE['token_login'];
    $id = $_POST['eq_id'];
    $table = "exam_questions";
    $where = " where id = $id";
    $s = $h->update($data, $table, $where);
    $q = $h->getQuestionById($question_id);
    $right_answer = $q['right_answer'];
    $list_ids = array();
    $list_eqs = $h->getQuestionsProfileExam($exam_id, $profile_id);
    foreach ($list_eqs as $k=>$v) {
        array_push($list_ids, $list_eqs[$k]['question_id']);
    }
    // update result
    if (count($list_ids) > 0)
        $h->getNumberRightAnswer($list_ids, $exam_id, $profile_id);
    // other login or not
    $num_login = $h->getNumberLoginQuiz($exam_id, $profile_id);
    if ($num_login > 1) {
        echo '2;error';
    }
    
     