<?php
	include("../../../require_inc.php");
	include("../../../phpexcel/Classes/PHPExcel.php");
	
	$file = $_FILES['file']['tmp_name'];

	$objReader = PHPExcel_IOFactory::createReaderForFile($file);
	// get name all sheet in file excel
	$listWorkSheets = $objReader->listWorksheetNames($file);
	
	$objReader->setLoadSheetsOnly('Sheet1');

	$objExcel = $objReader->load($file);
	$sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);

	$getHighestColumn = $objExcel->setActiveSheetIndex()->getHighestColumn();
	$getHighestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
	// get name all sheet in file excel
	//$loadAllSheetNames = $objExcel->setActiveSheetIndex()->listWorksheetNames($file);
	for ($i = 2; $i <= $getHighestRow; $i++) {
		$block_name = $sheetData[$i]['A'];
		$block = $h->getBlockByName($block_name);
		$data['block_id'] = $block['id'];
		$department_name = $sheetData[$i]['B'];
		$dp = $h->getDepartmentByName($block['id'], $department_name);
		$data['department_id'] = $dp['id'];
		$title_name = $sheetData[$i]['C'];
		$title = $h->getTitleByName($title_name);
		$data['title_id'] = $title['id'];
		
		$data['profile_code'] = $sheetData[$i]['D'].'.bvhv';
		$data['password'] = $h->mahoa('12345');
		if ($sheetData[$i]['E'] != 'null')
			$data['fullname'] = $sheetData[$i]['E'];
		else
			$data['fullname'] = '';
		if ($sheetData[$i]['F'] != 'null')
			$data['birthday'] = $sheetData[$i]['F'];
		else
			$data['birthday'] = '';
		if ($sheetData[$i]['G'] != 'null')
			$data['email'] = $sheetData[$i]['G'];
		else
			$data['email'] = '';
		if ($sheetData[$i]['H'] != 'null')
			$data['phone'] = '0'.$sheetData[$i]['H'];
		else
			$data['phone'] = '';
		$data['role'] = $def['role_candidate'];
		$data['active'] = $def['actived'];
		$data['active_exam'] = $def['actived'];
		$table = 'profiles';
		$user = $_SESSION['is_logined'];
		$n = $h->getNumberProfileByCode($data['profile_code']);
		if ($n)
			continue;
		else
			$result = $h->insertDataBy($data, $table, $user['id']);
	}
	echo '1;success';
?>