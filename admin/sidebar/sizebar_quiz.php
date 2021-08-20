<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-successs elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light"><?php echo $text_role; ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="edit-information">
          <?php
                $block = $h->getBlockById($profile['block_id']);
          ?>  
          <a class="d-block"><?php echo $lang['profile_fullname'].': '.$profile['fullname']; ?></a>
          <a class="d-block"><?php echo $lang['profile_code'].': '.$profile['profile_code']; ?></a>
          <a class="d-block"><?php echo $lang['exam_block'].':<br />&nbsp;'.$block['name']; ?></a>
          <?php
            if ($pqh[1] != '' && ($pqh[1] == $def['check_quiz'] || $pqh[1] == $def['quiz'])) {
                $me = '';
                $examBDT = $h->getExamBlockById($pqh[2]);
                $exam_info = $h->getExamById($examBDT['exam_id']);
                
                $ed = strtotime($examBDT['start_date']);
                $me .= '<a class="d-block">'.$lang['exam_date'].': '.date("d/m/Y", $ed).'</a>';
                $me .= '<a class="d-block">'.$lang['time_exam'].': '.$examBDT['time_exam'].'</a>';
                $me .= '<a class="d-block">'.$lang['exam_time'].': '.$exam_info['exam_time'].'</a>';
                $me .= '<a class="d-block">'.$lang['number_questions'].': '.$exam_info['number_questions'].'</a>';
                echo $me;  
            }
          ?>
        </div>
      </div>
      <?php
        if ($pqh[1] != '' && $pqh[1] == $def['quiz']) {
            $examBDT = $h->getExamBlockById($pqh[2]);
            $exam_info = $h->getExamById($examBDT['exam_id']);
            $today = date("Y/m/d");
            $hours = date("H:i");
            $time_exam = $examBDT['time_exam'];
            $exam_time = $exam_info['exam_time'];
            $time_end = date("H:i", strtotime("+$exam_time minutes", strtotime($time_exam)));
            //echo $hours.' / '.$time_exam.' / '.$time_end;
            if ($examBDT['start_date'] == $today) {
                if ($time_exam <= $hours && $hours < $time_end) {
                    $time = '<nav class="mt-2">';
                    $time .= '  <ul class="nav nav-pills nav-sidebar flex-column '.$def['nav-flat'].'" data-widget="treeview" role="menu" data-accordion="false">';
                    $time .= '      <li class="nav-item"><a class="nav-link font-weight-bold"><i class="fas fa-clock-o" aria-hidden="true"></i>'.$lang['time_remaining'].':</a></li>';
                    $time .= '      <li class="nav-item"><a class="nav-link text-large"><h2 id="time_remain"></h2></a></li>';
                    $time .= '  </ul>';
                    $time .= '</nav>';
                    echo $time;
                    //$examinfo = $h->getExamById($pqh[2]);
                    $e_profile = $h->getExamProfileExamIdProfileId($pqh[2], $profile['id']);
                    $second_exam_time = $exam_time*60;
                    $time_remain = $second_exam_time - $e_profile['time_pass'];
                    $second = $time_remain % 60;
                    $minute = ($time_remain - $second) / 60; 
            
      ?>
        <script language="javascript">
            
            var m = <?php echo $minute; ?>; // Phút
            var s = <?php echo $second ?>; // Giây
            
            var timeout = null; // Timeout
            var stringm = '';
            var strings = '';
            function start()
            {
                /*BƯỚC 1: CHUYỂN ĐỔI DỮ LIỆU*/
                // Nếu số giây = -1 tức là đã chạy ngược hết số giây, lúc này:
                //  - giảm số phút xuống 1 đơn vị
                //  - thiết lập số giây lại 59
                if (s === -1){
                    m -= 1;
                    s = 59;
                }
             
                // Nếu số giờ = -1 tức là đã hết giờ, lúc này:
                //  - Dừng chương trình
                if (m == -1){
                    clearTimeout(timeout);
                    alert('Hết giờ làm bài thi');
                    $('.answer').attr('disabled', true);
                    $('#submit_quiz').attr('disbaled', true);
                    return false;
                }
             
                /*BƯỚC 1: HIỂN THỊ ĐỒNG HỒ */
                
                
                stringm = m < 10 ? "0" + m : m;
                strings = s < 10 ? "0" + s : s;
                var clock_display = stringm + ":" + strings;
                document.getElementById('time_remain').innerText = clock_display.toString();
                //document.getElementById('m').innerText = m.toString();
                //document.getElementById('s').innerText = s.toString();
             
                /*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
                timeout = setTimeout(function(){
                    s--;
                    start();
                    $.post("<?php echo $def['link_update_time_remaining'] ?>", {exam_id: <?php echo $pqh[2]; ?>,m: m, s: s}, function(data){
                    });
                }, 1000);
            }
            window.onload = function () {
                start();
            };
        </script>      
      <?php
                }
            }
        }                                                                             
      ?>
    </div>
    <!-- /.sidebar -->
    
  </aside>