<?php
	include("../../../require_inc.php");
	$rv_id = $_POST['rv_id'];
?>
<input type="hidden" name="data[rv_id]" id="rv_id" value="<?php _e($rv_id) ?>" />
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['customer_name'].' (Vie)') ?></label>
		<input type="text" class="form-control" name="data[customer_vi]" id="customer_vi" />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['customer_name'].' (Eng)') ?></label>
		<input type="text" class="form-control" name="data[customer_en]" id="customer_en" />
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['customer_image']) ?></label>
		<input type="file" class="form-control" name="image" id="image_review" />
		<small class="text-danger"><?php _e($lang['size_review']) ?></small>
		<div id="show_image_review" class="d-none"></div>
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['content_review'].' (Vie)') ?></label><br>
		<textarea name="data[content_vi]" id="content_vi_review" cols="30" rows="10" class="form-control"></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['content_review'].' (Eng)') ?></label><br>
		<textarea name="data[content_en]" id="content_en_review" cols="30" rows="10" class="form-control"></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['title_website'].' (Vie)') ?></label>
		<input type="text" class="form-control" name="data[title_vi]" id="title_vi" />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['title_website'].' (Eng)') ?></label>
		<input type="text" class="form-control" name="data[title_en]" id="title_en" />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['description'].' (Vie)') ?></label>
		<textarea class="form-control" name="data[desc_vi]" id="desc_vi" rows="4"></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['description'].' (Eng)') ?></label>
		<textarea class="form-control" name="data[desc_en]" id="desc_en" rows="4"></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['keyword'].' (Vie)') ?></label>
		<textarea class="form-control" name="data[keyw_vi]" id="keyw_vi" rows="4"></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['keyword'].' (Eng)') ?></label>
		<textarea class="form-control" name="data[keyw_en]" id="keyw_en" rows="4"></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['show_home']) ?></label>
		<div class="form-group clearfix">
		<div class="icheck-success d-inline">
			<input type="radio" id="show_home1" name="data[show_home]" value="1" />
			<label for="show_home1"><?php _e($lang['active']) ?></label>
		</div>
		<div class="icheck-success d-inline">
			<input type="radio" id="show_home2" name="data[show_home]" value="0" checked />
			<label for="show_home2"><?php _e($lang['hidden']) ?></label>
		</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php _e(URL) ?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
		selector: "textarea#content_vi_review, textarea#content_en_review",
		theme: "modern",
		width: 750,
		height: 300,
		plugins: [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
	],
	image_advtab: true, 
	//content_css: "css/content.css",
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons responsivefilemanager", 
	external_filemanager_path:"<?php _e(URL) ?>filemanager/",
	filemanager_title:"Responsive Filemanager" ,
	external_plugins: { "filemanager" : "<?php _e(URL) ?>filemanager/plugin.min.js"},
	style_formats: [
			{title: 'Bold text', inline: 'b'},
			{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			{title: 'Example 1', inline: 'span', classes: 'example1'},
			{title: 'Example 2', inline: 'span', classes: 'example2'},
			{title: 'Table styles'},
			{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		]
	});
</script>
<script type="text/javascript" src="<?php _e($def['theme']) ?>js/common.js"></script>
<script type="text/javascript">
	$("#image_review").change(function() {
		readSingleImage(this, '#show_image_review');
	});
</script>
