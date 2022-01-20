<?php
    include("../../../require_inc.php");
    if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
        if (isset($_SESSION['is_logined']))
            $user_id = $_SESSION['is_logined'];
        else
            $user_id = $_COOKIE['islogined'];
        $data = $_POST['data'];
        $service_id = $data['service_id'];

        $table = "price_tables";
        $max = $h->getMax("sort", $table, "deleted_at is null and service_id = $service_id");
        $data['sort'] = $max['maxs'] + 1;
        $data['active'] = 1; 
        $res = $h->insertDataBy($data, $table, $user_id);
        if ($res)
            echo '1';
        else
            echo '2';
    } else
        echo '5';
