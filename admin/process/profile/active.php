<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $result = $h->profileActive($id);
    echo $result;
?>