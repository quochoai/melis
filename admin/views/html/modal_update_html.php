<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $html = $h->getById("*", "htmls", $id);
    $arrayone = array(2, 3, 4);
    $arraytwo = array(5, 6, 7);
?>
<input type="hidden" name="id" value="<?php echo $id ?>" />  
<div class="card-body container-fluid">
    <div class="row">
        <?php
            if ($id == 1 || $id == 8) {
        ?>
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php echo $html['tieude'] ?></label>
                <input type="file" class="form-control" name="noidung_vi" id="noidung_vi" />
                <?php
                    if ($html['noidung_vi'] != '') {
                        echo '<img src="'.URL.'upload/'.$html['noidung_vi'].'" width="30" style="max-width: 150px; margin-top: 10px" />';
                    }
                ?>
            </div>
        </div>
        <?php } 
                elseif (in_array($id, $arrayone)) { 
        ?>
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php echo $html['tieude'] ?></label>
                <input type="text" class="form-control" name="noidung_vi" id="noidung_vi" value="<?php echo $html['noidung_vi'] ?>" />
            </div>
        </div>  
        <?php }
                elseif (in_array($id, $arraytwo)) { 
        ?>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php echo $html['tieude'] ?> (VIE)</label>
                <textarea class="form-control" name="noidung_vi" id="noidung_vi" rows="5"><?php echo $html['noidung_vi'] ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="name"><?php echo $html['tieude'] ?> (ENG)</label>
                <textarea class="form-control" name="noidung_en" id="noidung_en" rows="5"><?php echo $html['noidung_en'] ?></textarea>
            </div>
        </div>
        <?php } ?>
    </div>
</div>