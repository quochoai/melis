<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $result = $h->examActiveResult($id);
    echo $result;
?>