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

    if ($search['value'] != '')
        $w = "and (name_vi like '%".$search['value']."%' or name_en like '%".$search['value']."%')";
    else
        $w = "";
    $catess = $h->getAll("id, name_vi, name_en, active", "services", "cm = 1 and deleted_at is null $w", "id asc");
    if (count($catess) > 0) {
        $totalData = count($catess);
        $totalFiltered = $totalData;
        $cates = $h->getAll("id, name_vi, name_en, sort, active", "services", "cm = 1 and deleted_at is null $w", "id asc limit ".$options['offset'].", ".$options['limit']);
        foreach ($cates as $kc => $cate) {
            $no = $kc + 1;
            if ($cate['active'] == 1) {
                $fontawesome = 'eye';
                $tte = $lang['hidden'];
            } else {
                $fontawesome = 'eye-slash';
                $tte = $lang['active'];
            }
            $a[] = array(
                "DT_RowId" => 'cate_service'.$cate['id'],
                //"DT_RowClass" => "category",
                "active" => $cate['active'],
                "no" => $no,
                "id" => $cate['id'],  
                "name_vi" => $cate['name_vi'], 
                "name_en" => $cate['name_en'], 
                'update_sort' => "<input type='number' class='sort_cs text-center' id='".$cate['id']."' name='sort[".$no."]' value='".$cate['sort']."' style='width: 60px' min='1' step='1' />"
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
