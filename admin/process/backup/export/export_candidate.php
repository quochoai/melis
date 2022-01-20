<?php
    include("../../../require_inc.php");
    include("../../../phpexcel/Classes/PHPExcel.php");
    $exam_id = $_POST['exam_id'];
    $block_id = $_POST['block_id'];
    $department_id = $_POST['department_id'];
    $count_dp = count($department_id);
    //echo $exam_id.' / '.$block_id.' / '.$count_dp.' / ';
    if ($block_id == '' && $count_dp == 0)
        $pls = $h->getProfilesExam($exam_id);    
    if ($block_id != '' && $count_dp == 0)
        $pls = $h->getProfilesExamBlock($exam_id, $block_id);
    if ($block_id != '' && $count_dp > 0)
        $pls = $h->getProfilesExamBlockDepartment($exam_id, $block_id, $department_id);
        
    $lastExam = $h->getExamById($exam_id);
    $title_export = $lang['excel_title_export_candidate'] . PHP_EOL . $lastExam['name'];
        
    
    $objExcel = new PHPExcel;
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle($lang['title_export_candidate']);
    
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
    
    $sheet->mergeCells("A4:I4");
    $sheet->setCellValue("A4", $title_export);
    $sheet->getStyle("A4")->getFont()->setBold(true);
    $sheet->getStyle("A4")->getFont()->setSize(16);
    $sheet->getStyle("A4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $sheet->getRowDimension(4)->setRowHeight(45);
    
    $sheet->getColumnDimension('C')->setWidth(200);
    
    $rowCount = 7;
    $sheet->setCellValue("A".$rowCount, $lang['no.']);
    $sheet->setCellValue("B".$rowCount, $lang['profile_code']);
    $sheet->setCellValue("C".$rowCount, $lang['profile_fullname']);
    $sheet->setCellValue("D".$rowCount, $lang['profile_birthday']);
    $sheet->setCellValue("E".$rowCount, $lang['title']);
    $sheet->setCellValue("F".$rowCount, $lang['department_exam']);
    $sheet->setCellValue("G".$rowCount, $lang['column_register']);
    $sheet->setCellValue("H".$rowCount, $lang['exam_block']);
    $sheet->setCellValue("I".$rowCount, $lang['notes']);
    
    // style
    $sheet->getColumnDimension("A")->setAutoSize(true);
    $sheet->getColumnDimension("B")->setAutoSize(true);
    $sheet->getColumnDimension("C")->setAutoSize(true);
    $sheet->getColumnDimension("D")->setAutoSize(true);
    $sheet->getColumnDimension("E")->setAutoSize(true);
    $sheet->getColumnDimension("F")->setAutoSize(true);
    $sheet->getColumnDimension("G")->setAutoSize(true);
    $sheet->getColumnDimension("H")->setAutoSize(true);
    $sheet->getColumnDimension("I")->setAutoSize(true);
    
    $sheet->getStyle("A7:I7")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_YELLOW);
    $sheet->getStyle("A7:I7")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
    
    
    if (count($pls) > 0) {
        $no = 1;
        foreach ($pls as $pl) {
            $rowCount++;
            $tt_id = $pl['title_id'];
            $title = $h->getTitleById($tt_id);
            $dp_id = $pl['department_id'];
            $department = $h->getDepartmentById($dp_id);
            $bl_id = $pl['block_id'];
            $block = $h->getBlockById($bl_id);
            $sheet->setCellValue("A".$rowCount, $no);
            $sheet->setCellValue("B".$rowCount, $pl['profile_code']);
            $sheet->setCellValue("C".$rowCount, $pl['fullname']);
            $sheet->setCellValue("D".$rowCount, $pl['birthday']);
            $sheet->setCellValue("E".$rowCount, $title['name']);
            $sheet->setCellValue("F".$rowCount, $department['name']);
            $sheet->setCellValue("G".$rowCount, '');
            $sheet->setCellValue("H".$rowCount, $block['name']);
            $sheet->setCellValue("I".$rowCount, '');
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
    $sheet->getStyle("A7:I".$rowCount)->applyFromArray($styleArray);
    $sheet->getStyle("A7:H".$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle("C8:C".$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    
    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $filename = $def['filename_export_candidate'];
    $objWriter->save($filename);
    
    header("Content-Disposition: attchment; filename = $filename");
    header("Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet");
    header("Content-Length: ".filesize($filename));
    header("Content-Transfer-Encoding: binary");
    header("Cache-Control: must-revalidate");
    header("Pragma: no-cache");
    readfile($filename);
    return;
