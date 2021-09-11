<?php
    include("../../../require_inc.php");
    $news_id = $_POST['news_id'];
?>
<input type="hidden" name="data[news_id]" id="news_id" value="<?php _e($news_id) ?>" />
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['title_news'].' (Vie)') ?></label>
        <input type="text" class="form-control" name="data[name_vi]" id="name_vi" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['title_news'].' (Eng)') ?></label>
        <input type="text" class="form-control" name="data[name_en]" id="name_en" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['customer_image']) ?></label>
        <input type="file" class="form-control" name="image" id="image_news" />
        <small class="text-danger"><?php _e($lang['size_news']) ?></small>
        <div id="show_image_news" class="d-none"></div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['thumbfb']) ?></label>
        <input type="file" class="form-control" name="thumbfb" id="thumbfb_news" />
        <small class="text-danger"><?php _e($lang['size_thumbfb']) ?></small>
        <div id="show_thumbfb_news" class="d-none"></div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['short_content'].' (Vie)') ?></label>
        <textarea name="data[scontent_vi]" id="scontent_vi" rows="6" class="form-control"></textarea>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['short_content'].' (Eng)') ?></label>
        <textarea name="data[scontent_en]" id="scontent_en" rows="6" class="form-control"></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['content_news'].' (Vie)') ?></label><br>
        <textarea name="data[content_vi]" id="content_vi" cols="30" rows="10" class="form-control"></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['content_news'].' (Eng)') ?></label><br>
        <textarea name="data[content_en]" id="content_en" cols="30" rows="10" class="form-control"></textarea>
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
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['post_date']) ?></label>
        <div class="input-group date" id="postdate" data-target-input="nearest">
            <div class="input-group-prepend" data-target="#postdate" data-toggle="datetimepicker">
            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
            </div>
            <input type="text" name="data[post_date]" id="post_date" class="form-control datetimepicker-input" data-target="#postdate" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php _e(URL) ?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea#content_vi, textarea#content_en",
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
<!-- InputMask -->
<script src="<?php _e($def['theme']) ?>plugins/moment/moment.min.js"></script>
<script src="<?php _e($def['theme']) ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="<?php _e($def['theme']) ?>js/common.js"></script>
<script type="text/javascript">
    $('#post_date').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    $('#postdate').datetimepicker({
        timePicker: false,
        format: 'DD/MM/YYYY'
    });
    $("#image_news").change(function() {
        readSingleImage(this, '#show_image_news');
    });
    $("#thumbfb_news").change(function() {
        readSingleImage(this, '#show_thumbfb_news');
    });
</script>
