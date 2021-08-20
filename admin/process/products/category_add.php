<?php
    include("../../../require_inc.php");
    if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
        if (isset($_SESSION['is_logined']))
            $user_id = $_SESSION['is_logined'];
        else
            $user_id = $_COOKIE['islogined'];
        $data = $_POST['data'];
        $data['cm'] = 1;
        $table = "products";
        $max = $h->getMax("id", $table, "deleted_at is null");
        $data['sort'] = $max['maxs'] + 1;
        $data['active'] = 1; 
        $res = $h->insertDataBy($data, $table, $user_id);
        if ($res)
            echo '1';
        else
            echo '2';
    } else
        echo '5';
