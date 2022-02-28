<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $table = "landings";
    $landing = $h->getById("ld_id, name_vi, name_en, image, intro_vi, intro_en, content_vi, content_en, sort, active", $table, $id, "and deleted_at is null");
    $ld_id = $landing['ld_id'];
    if ($ld_id == 1)
        $folder = $def['upload_landing_about'];
    else
        $folder = $def['upload_landing_branch'];
?>
<input type="hidden" name="ld_id" id="ld_id" value="<?php _e($ld_id) ?>" />
<input type="hidden" name="id" id="id" value="<?php _e($id) ?>" />
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['title_news'].' (Vie)') ?></label>
        <input type="text" class="form-control" name="data[name_vi]" id="name_vi" value="<?php _e($landing['name_vi']) ?>" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['title_news'].' (Eng)') ?></label>
        <input type="text" class="form-control" name="data[name_en]" id="name_en" value="<?php _e($landing['name_en']) ?>" />
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['image_landing']) ?></label>
        <input type="file" class="form-control" name="image" id="image_landing_e" />
        <small class="text-danger"><?php _e($lang['size_landing'].' '.$lang['if_not_replace_blank']) ?></small>
        <div id="show_image_landing_e">
        <?php
            if ($landing['image'] != '')
                _e('<img src="'.$folder.$landing['image'].'" width="200" class="mt-2" />');
        ?>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e('Intro (Vie)') ?></label><br>
        <textarea name="data[intro_vi]" id="intro_vi" cols="30" rows="5" class="form-control"><?php _e(str_replace("<br>", "\n",$landing['intro_vi'])) ?></textarea>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e('Intro (Eng)') ?></label><br>
        <textarea name="data[intro_en]" id="intro_en" cols="30" rows="5" class="form-control"><?php _e(str_replace("<br>", "\n", $landing['intro_en'])) ?></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['content_landing'].' (Vie)') ?></label><br>
        <textarea name="data[content_vi]" id="content_vi_landing_e" cols="30" rows="10" class="form-control"><?php _e($landing['content_vi']) ?></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['content_landing'].' (Eng)') ?></label><br>
        <textarea name="data[content_en]" id="content_en_landing_e" cols="30" rows="10" class="form-control"><?php _e($landing['content_en']) ?></textarea>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php echo $lang['sort'] ?></label>
        <input type="number" class="form-control" name="data[sort]" id="sorts" value="<?php _e($landing['sort']) ?>" step="1" min="1" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['hs']) ?></label>
        <div class="form-group clearfix">
            <div class="icheck-success d-inline">
            <input type="radio" id="active1" name="data[active]" value="1"<?php if ($landing['active'] == 1) _e(' checked') ?> />
            <label for="active1"><?php _e($lang['active']) ?></label>
            </div>
            <div class="icheck-success d-inline">
            <input type="radio" id="active2" name="data[active]" value="0"<?php if ($landing['active'] == 0) _e(' checked') ?> />
            <label for="active2"><?php _e($lang['hidden']) ?></label>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php _e(URL) ?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea#content_vi_landing_e, textarea#content_en_landing_e",
        theme: "modern",
        width: 750,
        height: 300,
        plugins: [
            "advlist autolink link image lists charmap print planding hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
    ],
    image_advtab: true, 
    //content_css: "css/content.css",
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print planding media fullpage | forecolor backcolor emoticons responsivefilemanager", 
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
    $("#image_landing_e").change(function() {
        readSingleImage(this, '#show_image_landing_e');
    });
</script>
