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
	$ld_id = $_REQUEST['ld_id'];
	if ($ld_id == 1)
		$folder = $def['upload_landing_about'];
	else
		$folder = $def['upload_landing_branch'];
	$table = "landings";
	if ($search['value'] != '')
		$w = "and (name_vi like '%".$search['value']."%' or name_en like '%".$search['value']."%')";
	else
		$w = "";
	$landingss = $h->getAll("id", $table, "ld_id = $ld_id and deleted_at is null $w", "id asc");
	if (count($landingss) > 0) {
		$totalData = count($landingss);
		$totalFiltered = $totalData;
		$landings = $h->getAll("id, name_vi, name_en, image, sort, active", $table, "ld_id = $ld_id and deleted_at is null $w", "sort desc, id desc limit ".$options['offset'].", ".$options['limit']);
		foreach ($landings as $kc => $landing) {
			$no = $kc + 1;
			if ($landing['active'] == 1) {
				$fontawesome = 'eye';
				$tte = $lang['hidden'];
			} else {
				$fontawesome = 'eye-slash';
				$tte = $lang['active'];
			}
			if ($landing['image'] != '')
				$img = '<img src="'.$folder.$landing['image'].'" style="width: 100px" />';
			else
				$img = '';
			$a[] = array(
				"DT_RowId" => 'landing'.$landing['id'],
				//"DT_RowClass" => "category",
				"active" => $landing['active'],
				"no" => $no,
				"id" => $landing['id'],  
				"name_vi" => $landing['name_vi'],
				"name_en" => $landing['name_en'],
				"image" => $img, 
				'sort' => "<input type='number' value='".$landing['sort']."' class='text-center sort_landing' id='".$landing['id']."' style='width: 60px' min='1' step='1' />"
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
	