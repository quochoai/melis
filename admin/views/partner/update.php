<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $table = "partners";
    $partner = $h->getById("name_vi, name_en, image, url, sort, active", $table, $id, "and deleted_at is null");
    $folder = $def['upload_partner'];
?>
<input type="hidden" name="id" id="id" value="<?php _e($id) ?>" />
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['name_partner'].' (Vie)') ?></label>
        <input type="text" class="form-control" name="data[name_vi]" id="name_vi" value="<?php _e($partner['name_vi']) ?>" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['name_partner'].' (Eng)') ?></label>
        <input type="text" class="form-control" name="data[name_en]" id="name_en" value="<?php _e($partner['name_en']) ?>" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['image_partner']) ?></label>
        <input type="file" class="form-control" name="image" id="image_partner_e" />
        <small class="text-danger"><?php _e($lang['size_partner'].' '.$lang['if_not_replace_blank']) ?></small>
        <div id="show_image_partner_e">
        <?php
            if ($partner['image'] != '')
                _e('<img src="'.$folder.$partner['image'].'" width="200" class="mt-2" />');
        ?>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['website_partner']) ?></label>
        <input type="text" class="form-control" name="data[url]" id="url" value="<?php _e($partner['url']) ?>" />
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php echo $lang['sort'] ?></label>
        <input type="number" class="form-control" name="data[sort]" id="sorts" value="<?php _e($partner['sort']) ?>" step="1" min="1" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['hs']) ?></label>
        <div class="form-group clearfix">
            <div class="icheck-success d-inline">
            <input type="radio" id="active1" name="data[active]" value="1"<?php if ($partner['active'] == 1) _e(' checked') ?> />
            <label for="active1"><?php _e($lang['active']) ?></label>
            </div>
            <div class="icheck-success d-inline">
            <input type="radio" id="active2" name="data[active]" value="0"<?php if ($partner['active'] == 0) _e(' checked') ?> />
            <label for="active2"><?php _e($lang['hidden']) ?></label>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php _e($def['theme']) ?>js/common.js"></script>
<script type="text/javascript">
    $("#image_partner_e").change(function() {
        readSingleImage(this, '#show_image_partner_e');
    });
</script>
