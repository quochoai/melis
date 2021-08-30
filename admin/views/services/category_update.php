<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $table = "services";
    $cate = $h->getById("name_vi, name_en, title_vi, title_en, desc_vi, desc_en, keyw_vi, keyw_en, sort, active", $table, $id);
?>
<input type="hidden" name="id" value="<?php _e($id) ?>" />  
<div class="card-body container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php _e($lang['name_category'].' (Vie)') ?></label>
                <input type="text" class="form-control" name="data[name_vi]" id="name_vi" value="<?php _e($cate['name_vi']) ?>" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php _e($lang['name_category'].' (Eng)') ?></label>
                <input type="text" class="form-control" name="data[name_en]" id="name_en" value="<?php _e($cate['name_en']) ?>" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php _e($lang['title_website'].' (Vie)') ?></label>
                <input type="text" class="form-control" name="data[title_vi]" id="title_vi" value="<?php _e($cate['title_vi']) ?>" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php _e($lang['title_website'].' (Eng)') ?></label>
                <input type="text" class="form-control" name="data[title_en]" id="title_en" value="<?php _e($cate['title_en']) ?>" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php _e($lang['description'].' (Vie)') ?></label>
                <textarea class="form-control" name="data[desc_vi]" id="desc_vi" rows="4"><?php _e($cate['desc_vi']) ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php _e($lang['description'].' (Eng)') ?></label>
                <textarea class="form-control" name="data[desc_en]" id="desc_en" rows="4"><?php _e($cate['desc_en']) ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php _e($lang['keyword'].' (Vie)') ?></label>
                <textarea class="form-control" name="data[keyw_vi]" id="keyw_vi" rows="4"><?php _e($cate['keyw_vi']) ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php _e($lang['keyword'].' (Eng)') ?></label>
                <textarea class="form-control" name="data[keyw_en]" id="keyw_en" rows="4"><?php _e($cate['keyw_en']) ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php _e($lang['sort']) ?></label>
                <input type="number" class="form-control" name="data[sort]" id="sort" value="<?php _e($cate['sort']) ?>" step="1" min="1" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php _e($lang['hs']) ?></label>
                <div class="form-group clearfix">
                  <div class="icheck-success d-inline">
                    <input type="radio" id="active1" name="data[active]" value="1"<?php if ($cate['active'] == 1) _e(' checked') ?> />
                    <label for="active1"><?php _e($lang['active']) ?></label>
                  </div>
                  <div class="icheck-success d-inline">
                    <input type="radio" id="active2" name="data[active]" value="0"<?php if ($cate['active'] == 0) _e(' checked') ?> />
                    <label for="active2"><?php _e($lang['hidden']) ?></label>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>