<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $price = $h->getById("name_vi, name_en, period, time_period, price, gift_vi, gift_en, sort, active", "price_tables", $id);
?>
<input type="hidden" name="id" id="id" value="<?php _e($id) ?>" />
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['name_service'].' (Vie)') ?></label>
        <input type="text" class="form-control" name="data[name_vi]" id="name_vi" value="<?php _e($price['name_vi']) ?>" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['name_service'].' (Eng)') ?></label>
        <input type="text" class="form-control" name="data[name_en]" id="name_en" value="<?php _e($price['name_en']) ?>" />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['period']) ?></label>
        <input type="number" class="form-control" name="data[period]" id="period" min="1" step="1" value="<?php _e($price['period']) ?>" />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['time_period']) ?></label>
        <input type="number" class="form-control" name="data[time_period]" id="time_period" min="1" step="1" value="<?php _e($price['time_period']) ?>" />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['price_service']) ?></label>
        <input type="number" class="form-control" name="data[price]" id="price" min="1000" step="100" value="<?php _e($price['price']) ?>" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['gift'].' (Vie)') ?></label>
        <textarea name="data[gift_vi]" id="gift_vi" class="form-control" rows="7"><?php _e($price['gift_vi']) ?></textarea>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['gift'].' (Eng)') ?></label>
        <textarea name="data[gift_en]" id="gift_en" class="form-control" rows="7"><?php _e($price['gift_en']) ?></textarea>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php echo $lang['sort'] ?></label>
        <input type="number" class="form-control" name="data[sort]" id="sorts" value="<?php _e($price['sort']) ?>" step="1" min="1" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label" for="name"><?php _e($lang['hs']) ?></label>
        <div class="form-group clearfix">
            <div class="icheck-success d-inline">
            <input type="radio" id="active1" name="data[active]" value="1"<?php if ($price['active'] == 1) _e(' checked') ?> />
            <label for="active1"><?php _e($lang['active']) ?></label>
            </div>
            <div class="icheck-success d-inline">
            <input type="radio" id="active2" name="data[active]" value="0"<?php if ($price['active'] == 0) _e(' checked') ?> />
            <label for="active2"><?php _e($lang['hidden']) ?></label>
            </div>
        </div>
    </div>
</div>
