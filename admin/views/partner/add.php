<?php
    include("../../../require_inc.php");
?>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['name_partner'].' (Vie)') ?></label>
        <input type="text" class="form-control" name="data[name_vi]" id="name_vi" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['name_partner'].' (Eng)') ?></label>
        <input type="text" class="form-control" name="data[name_en]" id="name_en" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['image_partner']) ?></label>
        <input type="file" class="form-control" name="image" id="image_partner" />
        <small class="text-danger"><?php _e($lang['size_partner']) ?></small>
        <div id="show_image_partner" class="d-none"></div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['website_partner']) ?></label>
        <input type="text" class="form-control" name="data[url]" id="url" />
    </div>
</div>

<script type="text/javascript" src="<?php _e($def['theme']) ?>js/common.js"></script>
<script type="text/javascript">
    $("#image_partner").change(function() {
        readSingleImage(this, '#show_image_partner');
    });
</script>
