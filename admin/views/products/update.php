<?php
	include("../../../require_inc.php");
	$id = $_POST['id'];
	$product = $h->getById("name_vi, name_en, image, image_detail, thumbfb, uudiem_vi, uudiem_en, thanhphan_vi, thanhphan_en, congdung_vi, congdung_en, hdsd_vi, hdsd_en, khtn_vi, khtn_en, udmuahang_vi, udmuahang_en, show_home, offer_product, tag_vi, tag_en, title_vi, title_en, desc_vi, desc_en, keyw_vi, keyw_en, sort, active", "products", $id);
?>
<input type="hidden" name="id" id="id" value="<?php _e($id) ?>" />
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['name_product'].' (Vie)') ?></label>
		<input type="text" class="form-control" name="data[name_vi]" id="name_vi_product_e" value="<?php _e($product['name_vi']) ?>" />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['name_product'].' (Eng)') ?></label>
		<input type="text" class="form-control" name="data[name_en]" id="name_en_product_e" value="<?php _e($product['name_en']) ?>" />
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['avatar']) ?></label>
		<input type="file" class="form-control" name="image" id="image_e" />
		<small class="text-danger"><?php _e($lang['size_product'].' '.$lang['if_not_replace_blank']) ?></small>
		<div id="show_image_e">
		<?php
			if ($product['image'] != '') {
				_e('<img src="'.$def['upload_product_avatar'].$product['image'].'" width="200" />');
			}
		?>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['image_detail']) ?></label>
		<input type="file" class="form-control" name="image_detail" id="image_detail_e" />
		<small class="text-danger"><?php _e($lang['size_detail'].' '.$lang['if_not_replace_blank']) ?></small>
		<div id="show_image_detail_e">
		<?php
			if ($product['image_detail'] != '') {
				_e('<img src="'.$def['upload_product_detail'].$product['image_detail'].'" width="200" />');
			}
		?>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['thumbfb']) ?></label>
		<input type="file" class="form-control" name="thumbfb" id="thumbfb_e" />
		<small class="text-danger"><?php _e($lang['size_thumbfb'].' '.$lang['if_not_replace_blank']) ?></small>
		<div id="show_thumbfb_e">
		<?php
			if ($product['thumbfb'] != '') {
				_e('<img src="'.$def['upload_product_thumbfb'].$product['thumbfb'].'" width="200" />');
			}
		?>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['uudiem'].' (Vie)') ?></label>
		<textarea name="data[uudiem_vi]" id="uudiem_vi" class="form-control"><?php _e($product['uudiem_vi']) ?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['uudiem'].' (Eng)') ?></label>
		<textarea name="data[uudiem_en]" id="uudiem_en" class="form-control"><?php _e($product['uudiem_en']) ?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['thanhphan'].' (Vie)') ?></label>
		<textarea name="data[thanhphan_vi]" id="thanhphan_vi" class="form-control"><?php _e($product['thanhphan_vi'])?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['thanhphan'].' (Eng)') ?></label>
		<textarea name="data[thanhphan_en]" id="thanhphan_en" class="form-control"><?php _e($product['thanhphan_en']) ?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['congdung'].' (Vie)') ?></label>
		<textarea name="data[congdung_vi]" id="congdung_vi" class="form-control"><?php _e($product['congdung_vi']) ?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['congdung'].' (Eng)') ?></label>
		<textarea name="data[congdung_en]" id="congdung_en" class="form-control"><?php _e($product['congdung_en']) ?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['huongdansudung'].' (Vie)') ?></label>
		<textarea name="data[hdsd_vi]" id="hdsd_vi" class="form-control"><?php _e($product['hdsd_vi']) ?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['huongdansudung'].' (Eng)') ?></label>
		<textarea name="data[hdsd_en]" id="hdsd_en" class="form-control"><?php _e($product['hdsd_en']) ?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['khachhangtrainghiem'].' (Vie)') ?></label>
		<textarea name="data[khtn_vi]" id="khtn_vi" class="form-control"><?php _e($product['khtn_vi']) ?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['khachhangtrainghiem'].' (Eng)') ?></label>
		<textarea name="data[khtn_en]" id="khtn_en" class="form-control"><?php _e($product['khtn_en']) ?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['uudiemkhimuataimelis'].' (Vie)') ?></label>
		<textarea name="data[udmuahang_vi]" id="udmuahang_vi" class="form-control"><?php _e($product['udmuahang_vi']) ?></textarea>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['uudiemkhimuataimelis'].' (Eng)') ?></label>
		<textarea name="data[udmuahang_en]" id="udmuahang_en" class="form-control"><?php _e($product['udmuahang_en']) ?></textarea>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['tag'].' (Vie)') ?></label>
		<textarea class="form-control" name="data[tag_vi]" id="tag_vi" rows="3"><?php _e($product['tag_vi']) ?></textarea>
		<small class="text-danger"><?php _e($lang['each_tag']) ?></small>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['tag'].' (Eng)') ?></label>
		<textarea class="form-control" name="data[tag_en]" id="tag_en" rows="3"><?php _e($product['tag_en']) ?></textarea>
		<small class="text-danger"><?php _e($lang['each_tag']) ?></small>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['show_home']) ?></label>
		<div class="form-group clearfix">
		<div class="icheck-success d-inline">
			<input type="radio" id="show_home1" name="data[show_home]" value="1"<?php if ($product['show_home'] == 1) _e(' checked') ?> />
			<label for="show_home1"><?php _e($lang['active']) ?></label>
		</div>
		<div class="icheck-success d-inline">
			<input type="radio" id="show_home2" name="data[show_home]" value="0" <?php if ($product['show_home'] != 1) _e(' checked') ?> />
			<label for="show_home2"><?php _e($lang['hidden']) ?></label>
		</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['offer_products']) ?></label>
		<div class="form-group clearfix">
		<div class="icheck-success d-inline">
			<input type="radio" id="offer_product1" name="data[offer_product]" value="1"<?php ($product['offer_product'] == 1) ? _e(' checked') : '' ?> />
			<label for="offer_product1"><?php _e($lang['active']) ?></label>
		</div>
		<div class="icheck-success d-inline">
			<input type="radio" id="offer_product2" name="data[offer_product]" value="0" <?php ($product['offer_product'] != 1) ? _e(' checked') : '' ?> />
			<label for="offer_product2"><?php _e($lang['hidden']) ?></label>
		</div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['title_website'].' (Vie)') ?></label>
		<input type="text" class="form-control" name="data[title_vi]" id="title_vi" value="<?php _e($product['title_vi']) ?>"/>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['title_website'].' (Eng)') ?></label>
		<input type="text" class="form-control" name="data[title_en]" id="title_en" value="<?php _e($product['title_en']) ?>"/>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['description'].' (Vie)') ?></label>
		<textarea class="form-control" name="data[desc_vi]" id="desc_vi" rows="4"><?php _e($product['desc_vi']) ?></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['description'].' (Eng)') ?></label>
		<textarea class="form-control" name="data[desc_en]" id="desc_en" rows="4"><?php _e($product['desc_en']) ?></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['keyword'].' (Vie)') ?></label>
		<textarea class="form-control" name="data[keyw_vi]" id="keyw_vi" rows="4"><?php _e($product['keyw_vi']) ?></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['keyword'].' (Eng)') ?></label>
		<textarea class="form-control" name="data[keyw_en]" id="keyw_en" rows="4"><?php _e($product['keyw_en']) ?></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php echo $lang['sort'] ?></label>
		<input type="number" class="form-control" name="data[sort]" id="sorts" value="<?php _e($product['sort']) ?>" step="1" min="1" />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['hs']) ?></label>
		<div class="form-group clearfix">
			<div class="icheck-success d-inline">
			<input type="radio" id="active1" name="data[active]" value="1"<?php if ($product['active'] == 1) _e(' checked') ?> />
			<label for="active1"><?php _e($lang['active']) ?></label>
			</div>
			<div class="icheck-success d-inline">
			<input type="radio" id="active2" name="data[active]" value="0"<?php if ($product['active'] == 0) _e(' checked') ?> />
			<label for="active2"><?php _e($lang['hidden']) ?></label>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php _e(URL) ?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
		selector: "textarea#uudiem_vi, textarea#uudiem_en, textarea#thanhphan_vi, textarea#thanhphan_en, textarea#congdung_vi, textarea#congdung_en, textarea#hdsd_vi, textarea#hdsd_en, textarea#khtn_vi, textarea#khtn_en, textarea#udmuahang_vi, textarea#udmuahang_en",
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
	$("#image_e").change(function() {
		readSingleImage(this, '#show_image_e');
	});
	$("#image_detail_e").change(function() {
		readSingleImage(this, '#show_image_detail_e');
	});
	$("#thumbfb_e").change(function() {
		readSingleImage(this, '#show_thumbfb_e');
	});
</script>
