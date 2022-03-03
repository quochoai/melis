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
	$gal_id = $_REQUEST['gal_id'];
	$table = "galleries";
	if ($search['value'] != '')
		$w = "and (name_vi like '%".$search['value']."%' or name_en like '%".$search['value']."%')";
	else
		$w = "";
	$galleriess = $h->getAll("id, name_vi, name_en, active", $table, "gal_id = $gal_id and deleted_at is null $w", "id asc");
	if (count($galleriess) > 0) {
		$totalData = count($galleriess);
		$totalFiltered = $totalData;
		$galleries = $h->getAll("id, name_vi, name_en, sort, active", $table, "gal_id = $gal_id and deleted_at is null $w", "sort desc, id desc limit ".$options['offset'].", ".$options['limit']);
		foreach ($galleries as $kc => $gallery) {
			$no = $kc + 1;
			if ($gallery['active'] == 1) {
				$fontawesome = 'eye';
				$tte = $lang['hidden'];
			} else {
				$fontawesome = 'eye-slash';
				$tte = $lang['active'];
			}
			$a[] = array(
				"DT_RowId" => 'gallery'.$gallery['id'],
				//"DT_RowClass" => "category",
				"active" => $gallery['active'],
				"no" => $no,
				"id" => $gallery['id'],  
				"name_vi" => $gallery['name_vi'], 
				"name_en" => $gallery['name_en'], 
				'sort' => "<input type='number' value='".$gallery['sort']."' class='text-center sort_gallery' id='".$gallery['id']."' style='width: 60px' min='1' step='1' />"
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
	