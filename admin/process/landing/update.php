<?php
    include("../../../require_inc.php");
    if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
        if (isset($_SESSION['is_logined']))
            $user_id = $_SESSION['is_logined'];
        else
            $user_id = $_COOKIE['islogined'];
        $id = $_POST['id'];
        $data = $_POST['data'];
        $ld_id = $_POST['ld_id'];
        $array_ext_image = array(".png", ".jpg", "jpeg", ".gif", ".bmp", ".PNG", ".JPG", ".JPEG", ".GIF", ".BMP");
        $path = '../../../upload/landing';
        if ($ld_id == 1)
            $path_avatar = $path.'/about';
        else
            $path_avatar = $path.'/branch';
        if ($_FILES['image']['name'] != '') {
            $image = $_FILES['image']['name'];
            $ext_i = substr($image, -4);
            if (in_array($ext_i, $array_ext_image)) {
                $width = 480;
                $height = 338;
                $data['image'] = resizeImage($width, $height, chuoianh($image), $path_avatar, $_FILES['image']['tmp_name'], time().'_'.chuoianh($image));
            }
        }
        
        $table = "landings";
        $res = $h->updateDataBy($data, $table, " where id = $id", $user_id);
        if ($res)
            echo '1';
        else
            echo '2';
    } else
        echo '5';
