<?php
  include("../require_inc.php");
  $id = $_POST['id'];
  $table = "galleries";
  $gal = $h->getById("name_vi, name_en, avatar, gallery", $table, $id, " and gal_id = 1 and deleted_at is null");
  if ($gal) {
    $title = $gal["name_vi"];
    $avatar = $gal['avatar'];
    if (! is_null($gal['gallery'])) {
      $gallery = explode(";", $gal['gallery']);
      $count = count($gallery);
      foreach ($gallery as $ka => $ga) {
          if ($ka == 0)
            $image .= '[{ "src": "'.$def['upload_gallery_image_gallery'].$ga.'", "title": "'.$title.'" },';
          elseif ($ka < $count - 1)
            $image .= '{ "src": "'.$def['upload_gallery_image_gallery'].$ga.'", "title": "'.$title.'" },';
          else
            $image .= '{ "src": "'.$def['upload_gallery_image_gallery'].$ga.'", "title": "'.$title.'" }]';
      }
    } else {
      $image = '[{ "src": "'.$def['upload_gallery_image_avatar'].$avatar.'", "title": "'.$title.'"}]';
    }
    _e($title.'vs;vs'.$image);
  }
