<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <?php
            $pid = $h->getProfileById($pqh[1]);
            $eb = $h->getById("exam_block", $pqh[2]);
            $ex = $h->getById("exams", $eb['exam_id']);
          ?>  
          <div class="card-header">
                <h3 class="card-title text-uppercase font-weight-bold">
                    <?php echo $lang['content_exam'].' - '.$pid['fullname'].' - '.$ex['name'] ?>
                </h3>
          </div>  
          <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <h3 class="col-md-12 text-center text-success" id="has_end_quiz"></h3>
                <?php
                    $eqs = $h->getQuestionsProfileExam($pqh[2], $pqh[1]);
                    if (count($eqs) > 0) {
                        foreach ($eqs as $k => $eq) {
                            $no = $k+1;
                            $idq = $eq['question_id'];
                            $eq_id = $eq['id'];
                            $q = $h->getQuestionById($idq);
                            $aa = explode(";;;s_answer;;;", $q['answer']);
                            if ($q['type_question'] == $def['type_question_image']) {
                                if ($q['image'] != '')
                                    $img = '<br /><img src="app/views/question/img/'.$q['image'].'" style="max-width: 50%; margin-top: 10px; margin-bottom: 10px;" />';
                                else
                                    $img = '';
                            } else 
                                $img = '';                            
                ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label font-weight-bold" id="<?php echo $idq ?>"><?php echo $no.'. '.$q['question'] ?></label>
                            <?php echo $img; ?>
                        </div>
                        <div class="form-group clearfix">
                        <?php  
                            $msa = '';
                            if (count($aa) > 0) {
                                $namea = 'answer.'.$idq;
                                foreach ($aa as $ka => $va) {
                                    $idd = "suggess_answer.".$idq.".".$ka;
                                    if ($eq['profile_answer'] == trim($va)) {
                                        $checked = ' checked';
                                        if ($eq['profile_answer'] == $q['right_answer']) {
                                            $cls = 'success';
                                            $cls_text = ' text-success';
                                            $font = 'fa-check-circle';
                                        } else {
                                            $cls = 'danger';
                                            $cls_text = ' text-danger';
                                            $font = 'fa-times-circle';
                                        }
                                    } else {
                                        $checked = '';
                                        $cls = 'dark';
                                        $cls_text = ' text-dark';
                                        $font = 'fa-circle';
                                    }
                                    $msa .= '<div class="d-block'.$cls_text.'">';
                                    $msa .= '   <i class="fas '.$font.'"></i>';
                                    $msa .= '   <span>'.$va.'</span>';
                                    $msa .= '</div>';
                                }
                            }
                            echo $msa;
                        ?>
                        </div>
                        
                    </div>
                <?php 
                        }
                    }   
                ?>
                </div>
              </div>
              <!-- /.card-body -->
          
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->