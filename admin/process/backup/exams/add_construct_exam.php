<?php
    include("../../../require_inc.php");
    $tt_id = $_POST['title_id'];
    if (count($tt_id) > 0) {
        $data['title_id'] = implode(";", $tt_id);
    }
    $data['exam_id'] = $exam_id = $_POST['exam_id'];
    $kns = $_POST['knowledge'];
    $nqs = $_POST['number_question'];
    $construct = '';
    if (count($kns)) {
        foreach ($kns as $kk => $kn) {
            if ($nqs[$kk] <= 0) 
                continue;
            else {
                $construct .= $kn.';kn;'.$nqs[$kk].';cee;';
            }            
        }
    }
    if ($construct != '')
        $data['construct'] = substr($construct, 0, -5);
    $table = 'construct_exam';
    $user = $_SESSION['is_logined'];
    $result = $h->insertDataBy($data, $table, $user['id']);
    if ($result)
        echo '1;'.$exam_id;
    else 
        echo '2;error';
?>