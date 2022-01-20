<?php
    include("../../../require_inc.php");
    include("../../../phpexcel/Classes/PHPExcel.php");
    $exam_id = $_POST['exam_id'];    
    $block_id = $_POST['block_id'];
    $department_id = $_POST['department_id'];
    $point = $def['point'];
    
    $count_dp = count($department_id);
   
    if ($block_id == '' && $count_dp == 0)
        $results = $h->getResultsPassedByExam($exam_id);
    if ($block_id != '' && $count_dp == 0)
        $results = $h->getResultsPassedByExamBlock($exam_id, $block_id);
    if ($block_id != '' && $count_dp > 0)
        $results = $h->getResultsPassedByExamDepartment($exam_id, $block_id, $department_id);

    $exam = $h->getExamById($exam_id);
    $title_export = $lang['excel_title_export_result'] . PHP_EOL . $exam['name']. PHP_EOL . $lang['result_passed'];
        
    
    $objExcel = new PHPExcel;
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle($lang['title_result_passed']);
    
    // set hospital name
    $sheet->mergeCells("A1:D1");
    $sheet->setCellValue("A1", $lang['hospital']);
    $sheet->getStyle("A1")->getFont()->setBold(true);
    $sheet->getStyle("A1")->getFont()->setSize(14);
    $sheet->getStyle("A1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
    $sheet->mergeCells("A2:D2");
    $sheet->setCellValue("A2", $lang['department_hospital']);
    $sheet->getStyle("A2")->getFont()->setBold(true);
    $sheet->getStyle("A2")->getFont()->setSize(14);
    $sheet->getStyle("A2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
    $sheet->mergeCells("A4:L4");
    $sheet->setCellValue("A4", $title_export);
    $sheet->getStyle("A4")->getFont()->setBold(true);
    $sheet->getStyle("A4")->getFont()->setSize(16);
    $sheet->getStyle("A4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $sheet->getRowDimension(4)->setRowHeight(70);
    
    $rowCount = 7;
    $sheet->setCellValue("A".$rowCount, $lang['no.']);
    $sheet->setCellValue("B".$rowCount, $lang['profile_code']);
    $sheet->setCellValue("C".$rowCount, $lang['profile_fullname']);
    $sheet->setCellValue("D".$rowCount, $lang['profile_birthday']);
    $sheet->setCellValue("E".$rowCount, $lang['title']);
    $sheet->setCellValue("F".$rowCount, $lang['department_exam']);
    $sheet->setCellValue("G".$rowCount, $lang['column_register']);
    $sheet->setCellValue("H".$rowCount, $lang['exam_block']);
    $sheet->setCellValue("I".$rowCount, $lang['exam_date']);
    $sheet->setCellValue("J".$rowCount, $lang['time_exam']);
    $sheet->setCellValue("K".$rowCount, $lang['right_answer_on_total_question']);
    $sheet->setCellValue("L".$rowCount, $lang['point_exam']);
    
    // style
    $sheet->getColumnDimension("A")->setAutoSize(true);
    $sheet->getColumnDimension("B")->setAutoSize(true);
    $sheet->getColumnDimension('C')->setWidth(30);
    $sheet->getColumnDimension("D")->setAutoSize(true);
    $sheet->getColumnDimension("E")->setAutoSize(true);
    $sheet->getColumnDimension("F")->setAutoSize(true);
    $sheet->getColumnDimension("G")->setAutoSize(true);
    $sheet->getColumnDimension("H")->setAutoSize(true);
    $sheet->getColumnDimension("I")->setAutoSize(true);
    $sheet->getColumnDimension("J")->setAutoSize(true);
    $sheet->getColumnDimension('K')->setWidth(20);
    $sheet->getColumnDimension("L")->setAutoSize(true);
    
    $sheet->getStyle("A7:L7")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_YELLOW);
    $sheet->getStyle("A7:L7")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
    
    
    if (count($results) > 0) {
        $no = 1;
        foreach ($results as $result) {
            $rowCount++;
            $pid = $h->getProfileById($result['profile_id']);            
            $tt_id = $pid['title_id'];
            $title = $h->getTitleById($tt_id);
            $dp_id = $result['department_id'];
            $department = $h->getDepartmentById($dp_id);
            $bl_id = $result['block_id'];
            $block = $h->getBlockById($bl_id);
            $right_answer = $result['number_answer_right'].'/'.$result['number_questions'];
            $result_point = round($result['point'], 2);
            $sheet->setCellValue("A".$rowCount, $no);
            $sheet->setCellValue("B".$rowCount, $pid['profile_code']);
            $sheet->setCellValue("C".$rowCount, $pid['fullname']);
            $sheet->setCellValue("D".$rowCount, $pid['birthday']);
            $sheet->setCellValue("E".$rowCount, $title['name']);
            $sheet->setCellValue("F".$rowCount, $department['name']);
            $sheet->setCellValue("G".$rowCount, '');
            $sheet->setCellValue("H".$rowCount, $block['name']);
            $sheet->setCellValue("I".$rowCount, date("d/m/Y", strtotime($result['start_date'])));
            $sheet->setCellValue("J".$rowCount, $result['time_exam']);
            $sheet->setCellValue("K".$rowCount, $right_answer);
            $sheet->setCellValue("L".$rowCount, $result_point);
            $no++;
        }
    }
    
    $styleArray = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    );
    $sheet->getStyle("A7:L".$rowCount)->applyFromArray($styleArray);
    $sheet->getStyle("A7:L".$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle("C8:C".$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    
    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $filename = $def['filename_export_result_passed'];
    $objWriter->save($filename);
    
    header("Content-Disposition: attchment; filename = $filename");
    header("Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet");
    header("Content-Length: ".filesize($filename));
    header("Content-Transfer-Encoding: binary");
    header("Cache-Control: must-revalidate");
    header("Pragma: no-cache");
    readfile($filename);
    return;
