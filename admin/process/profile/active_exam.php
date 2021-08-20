<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $result = $h->profileActiveExam($id);
    echo $result;
?>