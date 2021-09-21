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
    $service_id = $_REQUEST['service_id'];
    if ($search['value'] != '')
        $w = "and (name_vi like '%".$search['value']."%' or name_en like '%".$search['value']."%')";
    else
        $w = "";
    $table = "price_tables";
    $pricess = $h->getAll("id, name_vi, name_en, active", $table, "service_id = $service_id and deleted_at is null $w", "id asc");
    if (count($pricess) > 0) {
        $totalData = count($pricess);
        $totalFiltered = $totalData;
        $prices = $h->getAll("id, name_vi, name_en, sort, active", $table, "service_id = $service_id and deleted_at is null $w", "id asc limit ".$options['offset'].", ".$options['limit']);
        foreach ($prices as $kc => $price) {
            $no = $kc + 1;
            if ($price['active'] == 1) {
                $fontawesome = 'eye';
                $tte = $lang['hidden'];
            } else {
                $fontawesome = 'eye-slash';
                $tte = $lang['active'];
            }
            $a[] = array(
                "DT_RowId" => 'price_service'.$price['id'],
                //"DT_RowClass" => "pricegory",
                "active" => $price['active'],
                "no" => $no,
                "id" => $price['id'],  
                "name_vi" => $price['name_vi'], 
                "name_en" => $price['name_en'], 
                'update_sort' => "<input type='number' class='sort_price_service text-center' id='".$price['id']."' name='sort[".$no."]' value='".$price['sort']."' style='width: 60px' min='1' step='1' />"
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
