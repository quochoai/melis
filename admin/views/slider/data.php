<?php
    include("../../../require_inc.php");
    
    $options = array(
        'draw' => $_REQUEST['draw'],
        'search_value' => $_REQUEST['search'],
        'limit' => $_REQUEST['length'],
        'offset' => $_REQUEST['start'],
        'order' => 0,
        'dir' => $_REQUEST['order.0.dir'],
    );
    $search = $_REQUEST["search"];
    $hc_id = $_REQUEST['hc_id'];
    if ($hc_id == 1)
        $folder = $def['upload_slider_home'];
    elseif ($hc_id == 2)
        $folder = $def['upload_slider_about'];
    else
        $folder = $def['upload_slider_branch'];
    $table = "sliders";
    if ($search['value'] != '')
        $w = "and (alt_vi like '%".$search['value']."%' or alt_en like '%".$search['value']."%')";
    else
        $w = "";
    $sliderss = $h->getAll("id, image, alt_vi, active", $table, "hc_id = $hc_id and deleted_at is null $w", "id asc");
    if (count($sliderss) > 0) {
        $totalData = count($sliderss);
        $totalFiltered = $totalData;
        $sliders = $h->getAll("id, alt_vi, image, sort, active", $table, "hc_id = $hc_id and deleted_at is null $w", "sort desc, id desc limit ".$options['offset'].", ".$options['limit']);
        foreach ($sliders as $kc => $slider) {
            $no = $kc + 1;
            if ($slider['active'] == 1) {
                $fontawesome = 'eye';
                $tte = $lang['hidden'];
            } else {
                $fontawesome = 'eye-slash';
                $tte = $lang['active'];
            }
            if ($slider['image'] != '')
                $img = '<img src="'.$folder.$slider['image'].'" style="width: 100px" />';
            else
                $img = '';
            $a[] = array(
                "DT_RowId" => 'slider'.$slider['id'],
                //"DT_RowClass" => "category",
                "active" => $slider['active'],
                "no" => $no,
                "id" => $slider['id'],  
                "alt" => $slider['alt_vi'], 
                "image" => $img, 
                'sort' => "<input type='number' value='".$slider['sort']."' class='text-center sort_slider' id='".$slider['id']."' style='width: 60px' min='1' step='1' />"
            );
        }
    } else {
        $totalFiltered = 0;
        $a = array();
    }
    
    $json_data = array(
        "draw"            => $options['draw'],
        "recordsTotal"    => $totalData,
        "recordsFiltered" => $totalFiltered,
        "data"            => $a
    );
    _e(json_encode($json_data));
    