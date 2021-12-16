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
    $pid = $_REQUEST['product_id'];
    if ($search['value'] != '')
        $w = "and (name_vi like '%".$search['value']."%' or name_en like '%".$search['value']."%')";
    else
        $w = "";
    $table = "products";
    $productss = $h->getAll("id, name_vi, name_en, active", $table, "product_id = $pid and deleted_at is null $w", "id asc");
    if (count($productss) > 0) {
        $totalData = count($productss);
        $totalFiltered = $totalData;
        $products = $h->getAll("id, name_vi, name_en, sort, active", $table, "product_id = $pid and deleted_at is null $w", "sort desc, id desc limit ".$options['offset'].", ".$options['limit']);
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
                "active" => $product['active'],
                "id" => $product['id'],  
                "name_vi" => $product['name_vi'], 
                "name_en" => $product['name_en'], 
                'sort' => "<input type='number' name='sort[".$no."]' value='".$product['sort']."' class='text-center sort_product' id='".$product['id']."' style='width: 60px' min='1' step='1'/>"
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
    