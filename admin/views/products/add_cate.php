<?php
    include("../../../require_inc.php");
?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label" for="name"><?php _e($lang['name_category'].' (Vie)') ?></label>
            <input type="text" class="form-control" name="data[name_vi]" id="name_vi" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label" for="name"><?php _e($lang['name_category'].' (Eng)') ?></label>
            <input type="text" class="form-control" name="data[name_en]" id="name_en" />
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
</div>