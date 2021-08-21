<?php
    if (isset($pqh[0]) || trim($pqh[0]) != '') {
        switch ($pqh[0]) {
            case $def['link_config']:
                $title = $lang['config_website'];
                break;
            case $def['link_html']:
                $title = $lang['manage_html'];
                break;
            case $def['link_update_html']:
                $title = $lang['update_html'];
                break;
            case $def['link_change_password']:
                $title = $lang['change_password'];
                break;
            case $def['link_category_product']:
                $title = $lang['manage_category_product'];
                break;
            case $def['link_product']:
                $product_id = $pqh[1];
                $cate = $h->getById("name_vi", "products", $product_id, "and deleted_at is null and active = 1");
                $title = $lang['manage_product'].' - '.$cate['name_vi'];
                break;
            default:
                $title = $lang['title_website_home'];
                break;
        }
    } else {
        $title = $lang['title_website_home'];
    }
    echo $title;
