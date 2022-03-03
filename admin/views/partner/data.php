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
	$folder = $def['upload_partner'];
	$table = "partners";
	if ($search['value'] != '')
		$w = "and (name_vi like '%".$search['value']."%' or name_en like '%".$search['value']."%')";
	else
		$w = "";
	$partnerss = $h->getAll("id", $table, "deleted_at is null $w", "id asc");
	if (count($partnerss) > 0) {
		$totalData = count($partnerss);
		$totalFiltered = $totalData;
		$partners = $h->getAll("id, name_vi, name_en, image, sort, active", $table, "deleted_at is null $w", "sort desc, id desc limit ".$options['offset'].", ".$options['limit']);
		foreach ($partners as $kc => $partner) {
			$no = $kc + 1;
			if ($partner['active'] == 1) {
				$fontawesome = 'eye';
				$tte = $lang['hidden'];
			} else {
				$fontawesome = 'eye-slash';
				$tte = $lang['active'];
			}
			if ($partner['image'] != '')
				$img = '<img src="'.$folder.$partner['image'].'" style="width: 100px" />';
			else
				$img = '';
			$a[] = array(
				"DT_RowId" => 'partner'.$partner['id'],
				//"DT_RowClass" => "category",
				"active" => $partner['active'],
				"no" => $no,
				"id" => $partner['id'],  
				"name_vi" => $partner['name_vi'],
				"name_en" => $partner['name_en'],
				"image" => $img, 
				'sort' => "<input type='number' value='".$partner['sort']."' class='text-center sort_partner' id='".$partner['id']."' style='width: 60px' min='1' step='1' />"
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
	