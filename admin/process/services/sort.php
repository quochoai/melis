<?php
    include("../../../require_inc.php");
    if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
        if (isset($_SESSION['is_logined']))
            $user_id = $_SESSION['is_logined'];
        else
            $user_id = $_COOKIE['islogined'];
        $id = $_POST['id'];
        $sapxep = $_POST['sapxep'];
        foreach($id as $k=>$v){
            $data['sort'] = $sapxep[$k];
            $s = $h->updateDataBy($data,"services"," where id = $v", $user_id);
        }
        echo '1';
    } else
        echo '5';
