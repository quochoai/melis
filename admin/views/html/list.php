<!-- Main content -->
<?php
	include("../../../require_inc.php");
?>
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-12">
		<div class="card">
		  <div class="card-header container-fluid">
			<div class="row">
				<h3 class="col-md-12 card-title">
					<?php echo $lang['manage_html'] ?>
				</h3>
			</div>
		  </div>
		  <!-- /.card-header -->
		  <div class="card-body">
			<table id="departments" class="table table-bordered table-hover">
			  <thead>
			  <tr>
				<th width="7%" align="center"><?php echo $lang['no.'] ?></th>
				<th width="78%" align="center"><?php echo 'Html' ?></th>
				<th width="15%" align="center"><?php echo $lang['actions'] ?></th>
			  </tr>
			  </thead>
			  <tbody>
			   <?php
				$htmls = $h->getAll("id, tieude", "htmls", "1=1", "id asc");
				$msg_html = '';
				if (count($htmls) > 0) {
					foreach ($htmls as $kd => $html) {
						$no = $kd + 1;
						$msg_html .= '<tr>';
						$msg_html .= ' <td align="center">'.$no.'</td>';
						$msg_html .= ' <td>'.$html['tieude'].'</td>';
						$msg_html .= ' <td align="center"><a href="javascript:void(0)" rel="'.$html['id'].'" class="btn btn-success btn-sm update" title="'.$lang['update'].'"><i class="fas fa-edit"></i></a></td>'; //  href="'.$def['link_update_html'].'/'.$html['id'].'"
						$msg_html .= '</tr>';
					}
				}
				echo $msg_html;
			  ?>
			  </tbody>
			</table>
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
<div class="modal fade" id="modal-update-html">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title text-uppercase"><?php echo $lang['update_html'] ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-white">&times;</span>
				</button>
			</div>
			<form method="post" action="<?php echo $def['link_process_update_html'] ?>" id="form_jquery" enctype="multipart/form-data">
				<div class="modal-body container-fluid" id="html_update"></div>
				<div class="modal-footer">
					<button type="submit" id="update" class="btn btn-success"><?php echo $lang['save'] ?> <i class="fas fa-edit"></i></button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '.update', function(){
		   let id = $(this).attr('rel');
		   $.post("<?php echo $def['modal_update_html'] ?>", {id: id}, function(html){
				$('#html_update').html(html);
				$('#modal-update-html').modal('show'); 
		   }); 
		});
		$(document).on('click', '#update', function(){
			$('#form_jquery').ajaxForm({
				beforeSend: function() {
					$('#update').attr("disabled",true);
					$('#update').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
				},
				uploadProgress: function(event, position, total, percentComplete) {
									
				},
				success: function() {
					/*var percentVal = '100%';
					bar.width(percentVal);
					percent.html(percentVal);*/
				},
			   	complete: function(xhr) {
				   $('#update').html('<?php echo $lang['update']; ?> <i class="fas fa-edit">');
				   $('#update').removeAttr('disabled');
				   var text = xhr.responseText;
				   console.log(text);
				   if(text == '1'){
					   toastr.success('<?php echo $lang['update_success'] ?>');
					   setTimeout(function(){
						   //window.location.replace("<?php echo $def['link_html'] ?>");
						   $('#modal-update-html').modal('hide');
					   }, 1000);
				   } else {           
					   toastr.error('<?php echo $lang['system_error'] ?>');
					   return false;
				   }
	 			}
			});
		});
	});
</script>
