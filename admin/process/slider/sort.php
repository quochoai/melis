<?php
    include("../../../require_inc.php");
    if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
        if (isset($_SESSION['is_logined']))
            $user_id = $_SESSION['is_logined'];
        else
            $user_id = $_COOKIE['islogined'];
        $id = $_POST['id'];
        $data['sort'] = $_POST['sapxep'];
        $table = "sliders";
        $s = $h->updateDataBy($data,$table, " where id = $id", $user_id);
        if ($s)
            echo '1';
        else
            echo '2';
    } else
        echo '5';
