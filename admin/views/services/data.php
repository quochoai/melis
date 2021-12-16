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
    $table = "services";
    if ($search['value'] != '')
        $w = "and (name_vi like '%".$search['value']."%' or name_en like '%".$search['value']."%')";
    else
        $w = "";
    
    $servicess = $h->getAll("id, name_vi, name_en, active", $table, "service_id = $service_id and deleted_at is null $w", "id asc");
    if (count($servicess) > 0) {
        $totalData = count($servicess);
        $totalFiltered = $totalData;
        $services = $h->getAll("id, name_vi, name_en, sort, active", $table, "service_id = $service_id and deleted_at is null $w", "sort desc, id desc limit ".$options['offset'].", ".$options['limit']);
        foreach ($services as $kc => $service) {
            $no = $kc + 1;
            if ($service['active'] == 1) {
                $fontawesome = 'eye';
                $tte = $lang['hidden'];
            } else {
                $fontawesome = 'eye-slash';
                $tte = $lang['active'];
            }
            $a[] = array(
                "DT_RowId" => 'service'.$service['id'],
                //"DT_RowClass" => "category",
                "active" => $service['active'],
                "no" => $no,
                "id" => $service['id'],  
                "name_vi" => $service['name_vi'], 
                "name_en" => $service['name_en'], 
                'sort' => "<input type='number' value='".$service['sort']."' class='text-center sort_service' id='".$service['id']."' style='width: 60px' min='1' step='1' />"
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
    