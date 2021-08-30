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
    $servicess = $h->getAll("id, name_vi, name_en, active", $table, "cm = 0 and service_id = $service_id and deleted_at is null $w", "id asc");
    if (count($servicess) > 0) {
        $totalData = count($servicess);
        $totalFiltered = $totalData;
        $services = $h->getAll("id, name_vi, name_en, sort, active", $table, "cm = 0 and service_id = $service_id and deleted_at is null $w", "sort desc, id desc limit ".$options['offset'].", ".$options['limit']);
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
                "no" => $no,
                "id" => $service['id'],  
                "name_vi" => $service['name_vi'], 
                "name_en" => $service['name_en'], 
                'banggia' => '<a class="banggia" rel="'.$service['id'].'" title="'.$lang['manage_price'].'">'.$lang['manage'].'</a>',
                'sort' => "<input type='text' name='sort[".$no."]' value='".$service['sort']."' size='3' class='text-center' /><input type='hidden' name='idd[".$no."]' value='".$service['id']."' />", 
                "actions" => "<a data-id='".$service['id']."' rel='".$service['active']."' class='btn btn-success btn-sm active_service mr-1' id='htservice".$service['id']."' title='".$tte."'><i id='hsservice".$service['id']."' class='fas fa-".$fontawesome."'></i></a> <a rel='".$service['id']."' class='btn btn-success btn-sm update_service mr-1' title='".$lang['update']."'><i class='fas fa-edit'></i></a> <a rel='".$service['id']."' class='btn btn-danger btn-sm delete_service' title='".$lang['delete']."'><i class='fas fa-trash'></i></a>"
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
    