<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $table = "galleries";
    $gallery = $h->getById("gal_id, name_vi, name_en, avatar, gallery, link_youtube, sort, active", $table, $id, "and deleted_at is null");
    $gal_id = $gallery['gal_id'];
    if ($gal_id == 1) {
        $path_avatar = $def['upload_gallery_image_avatar'];
        if ($gallery['gallery'] != '') {
            $gs = explode(";", $gallery['gallery']);
        }
?>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/image-uploader/image-uploader.min.css">
<?php
    } else
        $path_avatar = $def['upload_gallery_video_avatar'];
?>
<input type="hidden" name="gal_id" id="gal_id" value="<?php _e($gal_id) ?>" />
<input type="hidden" name="id" id="id" value="<?php _e($id) ?>" />
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['name_gallery'].' (Vie)') ?></label>
        <input type="text" class="form-control" name="data[name_vi]" id="name_vi" value="<?php _e($gallery['name_vi']) ?>" />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['name_gallery'].' (Eng)') ?></label>
        <input type="text" class="form-control" name="data[name_en]" id="name_en" value="<?php _e($gallery['name_en']) ?>" />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['avatar']) ?></label>
        <input type="file" class="form-control" name="avatar" id="avatar" />
        <small class="text-danger"><?php _e($lang['size_gallery']) ?></small>
        <div id="show_avatar">
        <?php
            if ($gallery['avatar'] != '') {
                _e('<img src="'.$path_avatar.$gallery['avatar'].'" width="200" class="mt-2" />');
            }
        ?>
        </div>
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
        <input type="text" class="form-control" name="data[link_youtube]" id="link_youtube" value="<?php _e($gallery['link_youtube']) ?>" />
    </div>
</div>
<?php
    }
?>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php echo $lang['sort'] ?></label>
        <input type="number" class="form-control" name="data[sort]" id="sorts" value="<?php _e($gallery['sort']) ?>" step="1" min="1" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['hs']) ?></label>
        <div class="form-group clearfix">
            <div class="icheck-success d-inline">
            <input type="radio" id="active1" name="data[active]" value="1"<?php if ($gallery['active'] == 1) _e(' checked') ?> />
            <label for="active1"><?php _e($lang['active']) ?></label>
            </div>
            <div class="icheck-success d-inline">
            <input type="radio" id="active2" name="data[active]" value="0"<?php if ($gallery['active'] == 0) _e(' checked') ?> />
            <label for="active2"><?php _e($lang['hidden']) ?></label>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php _e($def['theme']) ?>js/common.js"></script>
<script type="text/javascript">
    $("#avatar").change(function() {
        readSingleImage(this, '#show_avatar');
    });
    <?php
        if ($gal_id == 1) {
            if ($gs) {
    ?>
    
    var preloaded = [
    <?php
        foreach ($gs as $k => $g) {
            $imgg = $def['upload_gallery_image_gallery'].$g; 
    ?>
        {id: <?php _e($k) ?>, src: '<?php _e($imgg) ?>'},
    <?php
        }
    ?>
    ];
    <?php
        } 
    ?>
    $('.gallery-image').imageUploader(<?php if ($gs) { ?>{
        preloaded: preloaded,
        imagesInputName: 'images',
        preloadedInputName: 'old'
    }<?php } ?>);
    <?php
        } 
    ?>
</script>
