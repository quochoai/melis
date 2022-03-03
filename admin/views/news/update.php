<?php
	include("../../../require_inc.php");
	$id = $_POST['id'];
	$table = "news";
	$news = $h->getById("news_id, name_vi, name_en, image, thumbfb, scontent_vi, scontent_en, content_vi, content_en, tag_vi, tag_en, post_date, title_vi, title_en, desc_vi, desc_en, keyw_vi, keyw_en, sort, active", $table, $id, "and deleted_at is null");
	$news_id = $news['news_id'];
	if ($news_id == 1)
		$folder = $def['upload_news'];
	elseif ($news_id == 2)
		$folder = $def['upload_knowledge'];
	else
		$folder = $def['upload_promotion'];
?>
<input type="hidden" name="news_id" id="news_id" value="<?php _e($news_id) ?>" />
<input type="hidden" name="id" id="id" value="<?php _e($id) ?>" />
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['title_news'].' (Vie)') ?></label>
		<input type="text" class="form-control" name="data[name_vi]" id="name_vi_news_e" value="<?php _e($news['name_vi']) ?>" />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['title_news'].' (Eng)') ?></label>
		<input type="text" class="form-control" name="data[name_en]" id="name_en_news_e" value="<?php _e($news['name_en']) ?>" />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['customer_image']) ?></label>
		<input type="file" class="form-control" name="image" id="image_news_e" />
		<small class="text-danger"><?php _e($lang['size_news']) ?></small>
		<div id="show_image_news_e">
		<?php
			if ($news['image'] != '')
				_e('<img src="'.$folder.$news['image'].'" width="200" class="mt-2" />');
		?>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['thumbfb']) ?></label>
		<input type="file" class="form-control" name="thumbfb" id="thumbfb_news_e" />
		<small class="text-danger"><?php _e($lang['size_thumbfb']) ?></small>
		<div id="show_thumbfb_news_e">
		<?php
			if ($news['thumbfb'] != '')
				_e('<img src="'.$folder.'thumbfb/'.$news['thumbfb'].'" width="200" class="mt-2" />');
		?>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['short_content'].' (Vie)') ?></label>
		<textarea name="data[scontent_vi]" id="scontent_vi_news" rows="6" class="form-control"><?php _e($news['scontent_vi']) ?></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['short_content'].' (Eng)') ?></label>
		<textarea name="data[scontent_en]" id="scontent_en_news" rows="6" class="form-control"><?php _e($news['scontent_en']) ?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['content_news'].' (Vie)') ?></label><br>
		<textarea name="data[content_vi]" id="content_vi_news_e" cols="30" rows="10" class="form-control"><?php _e($news['content_vi'])?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['content_news'].' (Eng)') ?></label><br>
		<textarea name="data[content_en]" id="content_en_news_e" cols="30" rows="10" class="form-control"><?php _e($news['content_en']) ?></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['tag'].' (Vie)') ?></label>
		<textarea class="form-control" name="data[tag_vi]" id="tag_vi" rows="4"><?php _e($news['tag_vi']) ?></textarea>
		<small class="text-danger"><?php _e($lang['each_tag']) ?></small>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['tag'].' (Eng)') ?></label>
		<textarea class="form-control" name="data[tag_en]" id="tag_en" rows="4"><?php _e($news['tag_en']) ?></textarea>
		<small class="text-danger"><?php _e($lang['each_tag']) ?></small>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['title_website'].' (Vie)') ?></label>
		<input type="text" class="form-control" name="data[title_vi]" id="title_vi" value="<?php _e($news['title_vi']) ?>"/>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['title_website'].' (Eng)') ?></label>
		<input type="text" class="form-control" name="data[title_en]" id="title_en" value="<?php _e($news['title_en']) ?>"/>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['description'].' (Vie)') ?></label>
		<textarea class="form-control" name="data[desc_vi]" id="desc_vi" rows="4"><?php _e($news['desc_vi']) ?></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['description'].' (Eng)') ?></label>
		<textarea class="form-control" name="data[desc_en]" id="desc_en" rows="4"><?php _e($news['desc_en']) ?></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['keyword'].' (Vie)') ?></label>
		<textarea class="form-control" name="data[keyw_vi]" id="keyw_vi" rows="4"><?php _e($news['keyw_vi'])?></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['keyword'].' (Eng)') ?></label>
		<textarea class="form-control" name="data[keyw_en]" id="keyw_en" rows="4"><?php _e($news['keyw_en']) ?></textarea>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['post_date']) ?></label>
		<div class="input-group date" id="postdate_e" data-target-input="nearest">
			<div class="input-group-prepend" data-target="#postdate_e" data-toggle="datetimepicker">
			<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
			</div>
			<input type="text" name="data[post_date]" id="post_date_e" class="form-control datetimepicker-input" data-target="#postdate_e" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php _e(date("d/m/Y", strtotime($news['post_date']))) ?>">
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php echo $lang['sort'] ?></label>
		<input type="number" class="form-control" name="data[sort]" id="sorts" value="<?php _e($news['sort']) ?>" step="1" min="1" />
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['hs']) ?></label>
		<div class="form-group clearfix">
			<div class="icheck-success d-inline">
			<input type="radio" id="activenews1" name="data[active]" value="1"<?php if ($news['active'] == 1) _e(' checked') ?> />
			<label for="activenews1"><?php _e($lang['active']) ?></label>
			</div>
			<div class="icheck-success d-inline">
			<input type="radio" id="activenews2" name="data[active]" value="0"<?php if ($news['active'] == 0) _e(' checked') ?> />
			<label for="activenews2"><?php _e($lang['hidden']) ?></label>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php _e(URL) ?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
		selector: "textarea#content_vi_news_e, textarea#content_en_news_e",
		theme: "modern",
		width: 750,
		height: 300,
		plugins: [
			"advlist autolink link image lists charmap print pnews hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
	],
	image_advtab: true, 
	//content_css: "css/content.css",
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print pnews media fullpage | forecolor backcolor emoticons responsivefilemanager", 
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
<!-- InputMask -->
<script src="<?php _e($def['theme']) ?>plugins/moment/moment.min.js"></script>
<script src="<?php _e($def['theme']) ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="<?php _e($def['theme']) ?>js/common.js"></script>
<script type="text/javascript">
	$('#post_date_e').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
	$('#postdate_e').datetimepicker({
		timePicker: false,
		format: 'DD/MM/YYYY'
	});
	$("#image_news_e").change(function() {
		readSingleImage(this, '#show_image_news_e');
	});
	$("#thumbfb_news_e").change(function() {
		readSingleImage(this, '#show_thumbfb_news_e');
	});
</script>
