<?php
    include("../../../require_inc.php");
    $s = $h->query("select max(id) as maxid from qandas");
    $r = $h->fetch_array($s);
    $maxid = $r['maxid']+1;
    $data['type_question'] = $_POST['type_question'];
    if ($data['type_question'] == 'image') {
        if($_FILES['file']['name'] != '') {
            $path = '../../views/question/img';
            move_uploaded_file($_FILES['file']['tmp_name'],$path."/".$maxid.'_'.chuoianh($_FILES['file']['name']));
            $data['image'] = $maxid.'_'.chuoianh($_FILES['file']['name']);
        } else {
            $data['image'] = '';
        }
    } else {
        $data['image'] = '';
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
    $result = $h->insertDataBy($data, $table, $user['id']);
    if ($result)
        echo '1;success';
    else 
        echo '2;error';
?>