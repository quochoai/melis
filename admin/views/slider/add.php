<?php
    include("../../../require_inc.php");
    $hc_id = $_POST['hc_id'];
?>
<input type="hidden" name="data[hc_id]" id="hc_id" value="<?php _e($hc_id) ?>" />
<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['avatar']) ?></label>
        <input type="file" class="form-control" name="image" id="image_slider" />
        <small class="text-danger"><?php _e($lang['size_slider']) ?></small>
        <div id="show_image_slider" class="d-none"></div>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['alt'].' (Vie)') ?></label>
        <input type="text" class="form-control" name="data[alt_vi]" id="alt_vi" />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['alt'].' (Eng)') ?></label>
        <input type="text" class="form-control" name="data[alt_en]" id="alt_en" />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['link_to_page']) ?></label>
        <input type="text" class="form-control" name="data[url]" id="url" />
    </div>
</div>
<script type="text/javascript" src="<?php _e($def['theme']) ?>js/common.js"></script>
<script type="text/javascript">
    $("#image_slider").change(function() {
        readSingleImage(this, '#show_image_slider');
    });
</script>
