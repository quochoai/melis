<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $arrayone = array(2, 3, 4);
    $arraytwo = array(5, 6, 7);
    if ($id == 1 || $id == 8) {
        if ($_FILES['noidung_vi']['name'] != '') {
            $html = $h->getById("noidung_vi", "htmls", $id);
            $link_img = URL."upload/".$html['noidung_vi'];
            if (file_exists($link_img))
                unlink($link_img);
            $path = "../../../upload/";
            uploadfile("noidung_vi", $path);
        }
        $data['noidung_vi'] = $_FILES['noidung_vi']['name'];
    } elseif (in_array($id, $arrayone))
        $data['noidung_vi'] = $_POST['noidung_vi'];
    else {
        $data['noidung_vi'] = $_POST['noidung_vi'];
        $data['noidung_en'] = $_POST['noidung_en'];
    }
    $s = $h->update($data, "htmls", " where id = $id");
    if ($s)
        echo '1';
    else
        echo '2';     
