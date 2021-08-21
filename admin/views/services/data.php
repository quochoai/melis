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
    $catess = $h->getAll("id, name_vi, name_en, active", "products", "cm = 1 and deleted_at is null $w", "id asc");
    if (count($catess) > 0) {
        $totalData = count($catess);
        $totalFiltered = $totalData;
        $cates = $h->getAll("id, name_vi, name_en, active", "products", "cm = 1 and deleted_at is null $w", "id asc limit ".$options['offset'].", ".$options['limit']);
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
                "DT_RowId" => 'cate'.$cate['id'],
                //"DT_RowClass" => "category",
                "no" => $no,
                "id" => $cate['id'],  
                "name_vi" => $cate['name_vi'], 
                "name_en" => $cate['name_en'], 
                "manage_product" => "<a href='".$def['link_product']."/".$cate['id']."' title='".$lang['manage_product']."'>".$lang['manage']."</a>", 
                "actions" => "<a data-id='".$cate['id']."' rel='".$cate['active']."' class='btn btn-success btn-sm active' id='ht".$cate['id']."' title='".$tte."'><i id='hs".$cate['id']."' class='fas fa-".$fontawesome."'></i></a> | <a href='javascript:void(0)' rel='".$cate['id']."' class='btn btn-success btn-sm update' title='".$lang['update']."'><i class='fas fa-edit'></i></a> | <a href='javascript:void(0)' rel='".$cate['id']."' class='btn btn-danger btn-sm delete' title='".$lang['delete']."'><i class='fas fa-trash'></i></a>",
                "search_value" => $search_value
            );
        }
    } else {
        $totalFiltered = 0;
        $a = array();
        $b = 0;
    }
    
    $json_data = array(
        "draw"            => $options['draw'],
        "recordsTotal"    => $totalData,
        "recordsFiltered" => $totalFiltered,
        "data"            => $a
    );
    echo json_encode($json_data);
    