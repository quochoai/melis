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
	$rv_id = $_REQUEST['rv_id'];
	if ($rv_id == 1)
		$folder = $def['upload_review_customer'];
	else
		$folder = $def['upload_review_star'];
	$table = "reviews";
	if ($search['value'] != '')
		$w = "and (customer_vi like '%".$search['value']."%' or customer_en like '%".$search['value']."%')";
	else
		$w = "";
	$reviewss = $h->getAll("id", $table, "rv_id = $rv_id and deleted_at is null $w", "id asc");
	if (count($reviewss) > 0) {
		$totalData = count($reviewss);
		$totalFiltered = $totalData;
		$reviews = $h->getAll("id, customer_vi, customer_en, image, sort, active", $table, "rv_id = $rv_id and deleted_at is null $w", "sort desc, id desc limit ".$options['offset'].", ".$options['limit']);
		foreach ($reviews as $kc => $review) {
			$no = $kc + 1;
			if ($review['active'] == 1) {
				$fontawesome = 'eye';
				$tte = $lang['hidden'];
			} else {
				$fontawesome = 'eye-slash';
				$tte = $lang['active'];
			}
			if ($review['image'] != '')
				$img = '<img src="'.$folder.$review['image'].'" style="width: 100px" />';
			else
				$img = '';
			$a[] = array(
				"DT_RowId" => 'review'.$review['id'],
				//"DT_RowClass" => "category",
				"active" => $review['active'],
				"no" => $no,
				"id" => $review['id'],  
				"customer_vi" => $review['customer_vi'],
				"customer_en" => $review['customer_en'],
				"image" => $img, 
				'sort' => "<input type='number' value='".$review['sort']."' class='text-center sort_review' id='".$review['id']."' style='width: 60px' min='1' step='1' />"
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
	