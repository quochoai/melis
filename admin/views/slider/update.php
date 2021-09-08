<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $table = "sliders";
    $slider = $h->getById("hc_id, alt_vi, alt_en, image, url, sort, active", $table, $id, "and deleted_at is null");
    $hc_id = $slider['hc_id'];
    if ($hc_id == 1) {
        $path_img = $def['upload_slider_home'];
    } elseif ($hc_id == 2) {
        $path_img = $def['upload_slider_about'];
    } else {
        $path_img = $def['upload_slider_branch'];
    }
?>
<input type="hidden" name="data[hc_id]" id="hc_id" value="<?php _e($hc_id) ?>" />
<input type="hidden" name="id" id="id" value="<?php _e($id) ?>" />
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['avatar']) ?></label>
        <input type="file" class="form-control" name="image" id="image_slider_e" />
        <small class="text-danger"><?php _e($lang['size_slider']) ?></small>
        <div id="show_image_slider_e">
        <?php
            if ($slider['image'] != '') {
                _e('<img src="'.$path_img.$slider['image'].'" width="200" class="mt-2" />');
            }
        ?>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['alt'].' (Vie)') ?></label>
        <input type="text" class="form-control" name="data[alt_vi]" id="alt_vi" value="<?php _e($slider['alt_vi']) ?>" />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['alt'].' (Eng)') ?></label>
        <input type="text" class="form-control" name="data[alt_en]" id="alt_en" value="<?php _e($slider['alt_en']) ?>" />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['link_to_page']) ?></label>
        <input type="text" class="form-control" name="data[url]" id="url" value="<?php _e($slider['url']) ?>" />
    </div>
</div>
<script type="text/javascript" src="<?php _e($def['theme']) ?>js/common.js"></script>
<script type="text/javascript">
    $("#image_slider_e").change(function() {
        readSingleImage(this, '#show_image_slider_e');
    });
</script>
