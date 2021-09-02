<?php
    include("../../../require_inc.php");
    if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
        if (isset($_SESSION['is_logined']))
            $user_id = $_SESSION['is_logined'];
        else
            $user_id = $_COOKIE['islogined'];
        $id = $_POST['id'];
        $data['sort'] = $_POST['sapxep'];
        $table = "services";
        $s = $h->updateDataBy($data, $table, "where id = $id", $user_id);
        if ($s)
            _e('1');
        else
            _e('2');
    } else
        _e('5');
