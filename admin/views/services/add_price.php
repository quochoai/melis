<?php
	include("../../../require_inc.php");
	$service_id = $_POST['service_id'];
?>
<input type="hidden" name="data[service_id]" id="service_id" value="<?php _e($service_id) ?>" />
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['name_service'].' (Vie)') ?></label>
		<input type="text" class="form-control" name="data[name_vi]" id="name_vi_price" />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['name_service'].' (Eng)') ?></label>
		<input type="text" class="form-control" name="data[name_en]" id="name_en_price" />
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['period']) ?></label>
		<input type="number" class="form-control" name="data[period]" id="period" min="1" step="1" />
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['time_period']) ?></label>
		<input type="number" class="form-control" name="data[time_period]" id="time_period" min="1" step="1" />
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['price_service']) ?></label>
		<input type="number" class="form-control" name="data[price]" id="price" min="1000" step="100" />
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['gift'].' (Vie)') ?></label>
		<textarea name="data[gift_vi]" id="gift_vi" class="form-control" rows="7"></textarea>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="col-form-label" for="name"><?php _e($lang['gift'].' (Eng)') ?></label>
		<textarea name="data[gift_en]" id="gift_en" class="form-control" rows="7"></textarea>
	</div>
</div>
