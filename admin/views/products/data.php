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
    $pid = $_SESSION['pid'];
    if ($search['value'] != '')
        $w = "and (name_vi like '%".$search['value']."%' or name_en like '%".$search['value']."%')";
    else
        $w = "";
    $productss = $h->getAll("id, name_vi, name_en, active", "products", "cm = 0 and product_id = $pid and deleted_at is null $w", "id asc");
    if (count($productss) > 0) {
        $totalData = count($productss);
        $totalFiltered = $totalData;
        $products = $h->getAll("id, name_vi, name_en, sort, active", "products", "cm = 0 and product_id = $pid and deleted_at is null $w", "id asc limit ".$options['offset'].", ".$options['limit']);
        foreach ($products as $kc => $product) {
            $no = $kc + 1;
            if ($product['active'] == 1) {
                $fontawesome = 'eye';
                $tte = $lang['hidden'];
            } else {
                $fontawesome = 'eye-slash';
                $tte = $lang['active'];
            }
            $a[] = array(
                "DT_RowId" => 'product'.$product['id'],
                //"DT_RowClass" => "category",
                "no" => $no,
                "id" => $product['id'],  
                "name_vi" => $product['name_vi'], 
                "name_en" => $product['name_en'], 
                "manage_product" => "<a href='".$def['link_product']."/".$product['id']."' title='".$lang['manage_product']."'>".$lang['manage']."</a>", 
                "actions" => "<a data-id='".$product['id']."' rel='".$product['active']."' class='btn btn-success btn-sm active' id='ht".$product['id']."' title='".$tte."'><i id='hs".$product['id']."' class='fas fa-".$fontawesome."'></i></a> | <a href='javascript:void(0)' rel='".$product['id']."' class='btn btn-success btn-sm update' title='".$lang['update']."'><i class='fas fa-edit'></i></a> | <a href='javascript:void(0)' rel='".$product['id']."' class='btn btn-danger btn-sm delete' title='".$lang['delete']."'><i class='fas fa-trash'></i></a>"
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
    echo json_encode($json_data);
    