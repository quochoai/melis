<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $service = $h->getById("name_vi, name_en, image, image_detail, thumbfb, hieuqua_vi, hieuqua_en, nguyenly_vi, nguyenly_en, uudiem_vi, uudiem_en, khtn_vi, khtn_en, show_home, tag_vi, tag_en, title_vi, title_en, desc_vi, desc_en, keyw_vi, keyw_en, sort, active", "services", $id);
?>
<input type="hidden" name="id" id="id" value="<?php _e($id) ?>" />
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['name_service'].' (Vie)') ?></label>
        <input type="text" class="form-control" name="data[name_vi]" id="name_vi" value="<?php _e($service['name_vi']) ?>" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['name_service'].' (Eng)') ?></label>
        <input type="text" class="form-control" name="data[name_en]" id="name_en" value="<?php _e($service['name_en']) ?>" />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['avatar']) ?></label>
        <input type="file" class="form-control" name="image" id="image_se" />
        <small class="text-danger"><?php _e($lang['size_service'].' '.$lang['if_not_replace_blank']) ?></small>
        <div id="show_image_se">
        <?php
            if ($service['image'] != '') {
                _e('<img src="'.$def['upload_service_avatar'].$service['image'].'" width="200" class="mt-2" />');
            }
        ?>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['image_detail']) ?></label>
        <input type="file" class="form-control" name="image_detail" id="image_detail_se" />
        <small class="text-danger"><?php _e($lang['size_detail'].' '.$lang['if_not_replace_blank']) ?></small>
        <div id="show_image_detail_se">
        <?php
            if ($service['image_detail'] != '') {
                _e('<img src="'.$def['upload_service_detail'].$service['image_detail'].'" width="200" class="mt-2" />');
            }
        ?>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['thumbfb']) ?></label>
        <input type="file" class="form-control" name="thumbfb" id="thumbfb_se" />
        <small class="text-danger"><?php _e($lang['size_thumbfb'].' '.$lang['if_not_replace_blank']) ?></small>
        <div id="show_thumbfb_se">
        <?php
            if ($service['thumbfb'] != '') {
                _e('<img src="'.$def['upload_service_thumbfb'].$service['thumbfb'].'" width="200" class="mt-2" />');
            }
        ?>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['hieuqua'].' (Vie)') ?></label>
        <textarea name="data[hieuqua_vi]" id="hieuqua_vi" class="form-control"><?php _e($service['hieuqua_vi'])?></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['hieuqua'].' (Eng)') ?></label>
        <textarea name="data[hieuqua_en]" id="hieuqua_en" class="form-control"><?php _e($service['hieuqua_en']) ?></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['nguyenly'].' (Vie)') ?></label>
        <textarea name="data[nguyenly_vi]" id="nguyenly_vi" class="form-control"><?php _e($service['nguyenly_vi']) ?></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['nguyenly'].' (Eng)') ?></label>
        <textarea name="data[nguyenly_en]" id="nguyenly_en" class="form-control"><?php _e($service['nguyenly_en']) ?></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['khachhangtrainghiem'].' (Vie)') ?></label>
        <textarea name="data[khtn_vi]" id="khtn_vi" class="form-control"><?php _e($service['khtn_vi']) ?></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['khachhangtrainghiem'].' (Eng)') ?></label>
        <textarea name="data[khtn_en]" id="khtn_en" class="form-control"><?php _e($service['khtn_en']) ?></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['uudiemkhimuataimelis'].' (Vie)') ?></label>
        <textarea name="data[uudiem_vi]" id="uudiem_vi" class="form-control"><?php _e($service['uudiem_vi']) ?></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['uudiemkhimuataimelis'].' (Eng)') ?></label>
        <textarea name="data[uudiem_en]" id="uudiem_en" class="form-control"><?php _e($service['uudiem_en']) ?></textarea>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['tag'].' (Vie)') ?></label>
        <textarea class="form-control" name="data[tag_vi]" id="tag_vi" rows="3"><?php _e($service['tag_vi']) ?></textarea>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['tag'].' (Eng)') ?></label>
        <textarea class="form-control" name="data[tag_en]" id="tag_en" rows="3"><?php _e($service['tag_en']) ?></textarea>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['show_home']) ?></label>
        <div class="form-group clearfix">
        <div class="icheck-success d-inline">
            <input type="radio" id="show_home1" name="data[show_home]" value="1"<?php if ($service['show_home'] == 1) _e(' checked') ?> />
            <label for="show_home1"><?php _e($lang['active']) ?></label>
        </div>
        <div class="icheck-success d-inline">
            <input type="radio" id="show_home2" name="data[show_home]" <?php if ($service['show_home'] == 0) _e(' checked') ?> />
            <label for="show_home2"><?php _e($lang['hidden']) ?></label>
        </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['title_website'].' (Vie)') ?></label>
        <input type="text" class="form-control" name="data[title_vi]" id="title_vi" value="<?php _e($service['title_vi']) ?>"/>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['title_website'].' (Eng)') ?></label>
        <input type="text" class="form-control" name="data[title_en]" id="title_en" value="<?php _e($service['title_en']) ?>"/>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['description'].' (Vie)') ?></label>
        <textarea class="form-control" name="data[desc_vi]" id="desc_vi" rows="4"><?php _e($service['desc_vi']) ?></textarea>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['description'].' (Eng)') ?></label>
        <textarea class="form-control" name="data[desc_en]" id="desc_en" rows="4"><?php _e($service['desc_en']) ?></textarea>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['keyword'].' (Vie)') ?></label>
        <textarea class="form-control" name="data[keyw_vi]" id="keyw_vi" rows="4"><?php _e($service['keyw_vi']) ?></textarea>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['keyword'].' (Eng)') ?></label>
        <textarea class="form-control" name="data[keyw_en]" id="keyw_en" rows="4"><?php _e($service['keyw_en']) ?></textarea>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php echo $lang['sort'] ?></label>
        <input type="number" class="form-control" name="data[sort]" id="sorts" value="<?php _e($service['sort']) ?>" step="1" min="1" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['hs']) ?></label>
        <div class="form-group clearfix">
            <div class="icheck-success d-inline">
            <input type="radio" id="active1" name="data[active]" value="1"<?php if ($service['active'] == 1) _e(' checked') ?> />
            <label for="active1"><?php _e($lang['active']) ?></label>
            </div>
            <div class="icheck-success d-inline">
            <input type="radio" id="active2" name="data[active]" value="0"<?php if ($service['active'] == 0) _e(' checked') ?> />
            <label for="active2"><?php _e($lang['hidden']) ?></label>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php _e(URL) ?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea#uudiem_vi, textarea#uudiem_en, textarea#nguyenly_vi, textarea#nguyenly_en, textarea#hieuqua_vi, textarea#hieuqua_en, textarea#khtn_vi, textarea#khtn_en",
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
    $("#image_se").change(function() {
        readSingleImage(this, '#show_image_se');
    });
    $("#image_detail_se").change(function() {
        readSingleImage(this, '#show_image_detail_se');
    });
    $("#thumbfb_se").change(function() {
        readSingleImage(this, '#show_thumbfb_se');
    });
</script>
