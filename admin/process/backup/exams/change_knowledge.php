<?php
    include("../../../require_inc.php");
    foreach ($_REQUEST['knowledge'] as $kn) {
        $knowledge .= "'".$kn."'".',';
    }
    $knowledge = substr($knowledge, 0, -1);
    $result = $h->getKnowledgeNotIn($knowledge);
    $msg = '';
    if (count($result) > 0) {
        foreach ($result as $r) {
            $msg .= '<option value="'.$r['name'].'">'.$r['name'].'</option>';
        }
    }
    echo "'".$msg."'";
?>