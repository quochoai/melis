<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $data['block_id'] = $_POST['block_id'];
    $data['department_id'] = $_POST['department_id'];
    $data['title_id'] = $_POST['title_id'];
    $data['profile_code'] = trim($_POST['profile_code']);
    $data['fullname'] = trim($_POST['name']);
    $data['birthday'] = trim($_POST['birthday']);
    $data['email'] = trim($_POST['email']);
    $data['phone'] = trim($_POST['phone']);
    $data['role'] = $_POST['role'];
    $table = 'profiles';
    $user = $_SESSION['is_logined'];
    if ($user['role'] == $def['role_organizer']) {
        if (isset($_POST['active']))
            $data['active'] = $def['actived'];
        else 
            $data['active'] = $def['inactive'];
        if (isset($_POST['active_exam']))
            $data['active_exam'] = $def['actived'];
        else 
            $data['active_exam'] = $def['inactive'];
    }
    $n = $h->profileExistId($data['profile_code'], $id);
    if ($n)
        echo '3;error';
    else {
        $result = $h->updateDataBy($data, $table, "where id = $id", $user['id']);
        if ($result)
            echo '1;success';
        else 
            echo '2;error';
    }
?>