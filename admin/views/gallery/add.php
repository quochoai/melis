<?php
    include("../../../require_inc.php");
    $gal_id = $_POST['gal_id'];
    if ($gal_id == 1) {
        ?>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/image-uploader/image-uploader.min.css">
<?php
    } 
?>
<input type="hidden" name="data[gal_id]" id="gal_id" value="<?php _e($gal_id) ?>" />
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['name_gallery'].' (Vie)') ?></label>
        <input type="text" class="form-control" name="data[name_vi]" id="name_vi" />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['name_gallery'].' (Eng)') ?></label>
        <input type="text" class="form-control" name="data[name_en]" id="name_en" />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['avatar']) ?></label>
        <input type="file" class="form-control" name="avatar" id="avatar" />
        <small class="text-danger"><?php _e($lang['size_gallery']) ?></small>
        <div id="show_avatar" class="d-none"></div>
    </div>
</div>
<?php 
    if ($gal_id == 1) {
?>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['gallery_image']) ?></label>
        <div class="gallery-image p-1"></div>
        <small class="text-danger"><?php _e($lang['size_image_gallery']) ?></small>
    </div>
</div>
<script type="text/javascript" src="<?php _e($def['theme']) ?>plugins/image-uploader/image-uploader.min.js"></script>
<?php
    } else {
?>
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['link_youtube']) ?></label>
        <input type="text" class="form-control" name="data[link_youtube]" id="link_youtube" />
    </div>
</div>
<?php
    }
?>
<script type="text/javascript">
    function readSingleImage(input, destination) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(destination).removeClass('d-none');
                $(destination).html('<img src="'+ e.target.result +'" width="200" />');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#avatar").change(function() {
        readSingleImage(this, '#show_avatar');
    });
    <?php
        if ($gal_id == 1) {
    ?>
    $('.gallery-image').imageUploader();
    <?php
        } 
    ?>
</script>
