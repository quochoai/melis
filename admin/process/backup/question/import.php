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
        $data['type_question'] = $def['type_question_text'];
        $data['knowledge'] = $sheetData[$i]['A'];
        $data['question'] = $sheetData[$i]['B'];
        $ms_answer = '';
        $aa = array();
        if ($sheetData[$i]['C'] != '' && $sheetData[$i]['C'] != 'null')
            array_push($aa, 'A. '.$sheetData[$i]['C']);
        if ($sheetData[$i]['D'] != '' && $sheetData[$i]['D'] != 'null')
            array_push($aa, 'B. '.$sheetData[$i]['D']);
        if ($sheetData[$i]['E'] != '' && $sheetData[$i]['E'] != 'null')
            array_push($aa, 'C. '.$sheetData[$i]['E']);
        if ($sheetData[$i]['F'] != '' && $sheetData[$i]['F'] != 'null')
            array_push($aa, 'D. '.$sheetData[$i]['F']);
        if ($sheetData[$i]['G'] != '' && $sheetData[$i]['G'] != 'null')
            array_push($aa, 'E. '.$sheetData[$i]['G']);
        if ($sheetData[$i]['H'] != '' && $sheetData[$i]['H'] != 'null')
            array_push($aa, 'F. '.$sheetData[$i]['H']);
        if ($sheetData[$i]['I'] != '' && $sheetData[$i]['I'] != 'null')
            array_push($aa, 'G. '.$sheetData[$i]['I']);
        if ($sheetData[$i]['J'] != '' && $sheetData[$i]['J'] != 'null')
            array_push($aa, 'H. '.$sheetData[$i]['J']);
        if (count($aa) > 0) {
            $data['answer'] = implode(";;;s_answer;;;", $aa);
        } else 
            $data['answer'] = '';
        if ($sheetData[$i]['C'] == $sheetData[$i]['K'])
            $data['right_answer'] = 'A. '.$sheetData[$i]['K'];
        elseif ($sheetData[$i]['D'] == $sheetData[$i]['K'])
            $data['right_answer'] = 'B. '.$sheetData[$i]['K'];
        elseif ($sheetData[$i]['E'] == $sheetData[$i]['K'])
            $data['right_answer'] = 'C. '.$sheetData[$i]['K'];
        elseif ($sheetData[$i]['F'] == $sheetData[$i]['K'])
            $data['right_answer'] = 'D. '.$sheetData[$i]['K'];
        elseif ($sheetData[$i]['G'] == $sheetData[$i]['K'])
            $data['right_answer'] = 'E. '.$sheetData[$i]['K'];
        elseif ($sheetData[$i]['H'] == $sheetData[$i]['K'])
            $data['right_answer'] = 'F. '.$sheetData[$i]['K'];
        elseif ($sheetData[$i]['I'] == $sheetData[$i]['K'])
            $data['right_answer'] = 'G. '.$sheetData[$i]['K'];
        else
            $data['right_answer'] = 'H. '.$sheetData[$i]['K'];
        $table = 'qandas';
        $user = $_SESSION['is_logined'];
        if ($data['knowledge'] != 'null') {
            $n = $h->getNumberByQuestion(str_replace("'","\'",$data['question']));
            if ($n)
                continue;
            else
                $result = $h->insertDataBy($data, $table, $user['id']);
        }
    }
    echo '1;success';
