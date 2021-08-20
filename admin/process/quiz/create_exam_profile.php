<?php
    include("../../../require_inc.php");
    
    $profile = $_SESSION['is_logined'];
    
    $exam_id = $_POST['exam_id'];
    $profile_id = $_POST['profile_id'];
    $examBDT = $h->getExamBlockById($exam_id);
    $exam_info = $h->getExamById($examBDT['exam_id']);
    $exam_time = $exam_info['exam_time'];
    
    $time_exam = date("H:i");
    
    $end_time = date("H:i", strtotime("+$exam_time minutes", strtotime($time_exam)));
    $dataep['exam_id'] = $exam_id;
    $dataep['profile_id'] = $profile_id;
    $dataep['exam_date'] = strtotime(date("Y/m/d"));
    $dataep['start_time'] = strtotime(date("H:i"));
    $dataep['end_time'] = strtotime($end_time);
    $dataep['created_at'] = strtotime(date("Y/m/d H:i:s"));
    $nep = $h->checkExistExamProfile($exam_id, $profile_id);
    if(!$nep)
        $ep = $h->insert($dataep, "exam_profile");
    $neq = $h->checkExistExamQuestions($exam_id, $profile_id);
    if (!$neq) {
        $tt_id = $profile['title_id'];
        $title = $h->getTitleById($tt_id);
        $ttss = $title['id'].'-'.$title['name'];
        $ce = $h->getConstructExamByExamIdAndTitleId($examBDT['exam_id'], $ttss);
        $cons = explode(";cee;", $ce[0]['construct']);
        if (count($cons) > 0) {
            foreach ($cons as $con) {
                $c_e = explode(";kn;", $con);
                $list_questions = $h->getQuestionKnowledgeLimit($c_e[0], $c_e[1]);
                if (count($list_questions) > 0) {
                    foreach ($list_questions as $lq) {
                        $dataeq['exam_id'] = $exam_id;
                        $dataeq['profile_id'] = $profile_id;
                        $dataeq['question_id'] = $lq['id'];
                        $dataeq['knowledge'] = $lq['knowledge'];
                        $eq = $h->insert($dataeq, "exam_questions");
                    }
                }
            }
        }
    }
    $nr = $h->checkExistResultEP($exam_id, $profile_id);
    if (!$nr) {
        $datar['exam_id'] = $exam_id;
        $datar['block_id'] = $profile['block_id'];
        $datar['department_id'] = $profile['department_id'];
        $datar['profile_id'] = $profile_id;
        $datar['number_questions'] = $exam_info['number_questions'];
        $datar['number_answer_right'] = 0;
        $datar['point'] = 0;
        $er = $h->insertDataBy($datar, "results", $profile_id);    
    }
    echo '1;success';
    