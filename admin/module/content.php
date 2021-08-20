<?php
    if (! isset($_REQUEST['pqh']) || $_REQUEST['pqh'] == null) {
        include("dashboard.php");
    } else {
        $pqh = explode("/", trim($_REQUEST['pqh']));
        switch ($pqh[0]) {
            case $def['link_logout']:
                unset($_SESSION['is_logined']);
                setcookie("islogined", $_COOKIE['islogined'], time() - (86400 * 365), "/");
                header("location: ".$def['admin_url']);                                   
                break;    
            case $def['link_config']:
                include($def['views']."config/edit.php");
                break;
            case $def['link_html']:
                include($def['views']."html/list.php");
                break;
            case $def['link_update_html']:
                include($def['views']."html/update.php");
                break;
            case $def['link_change_password']:
                include($def['views']."profile/change_password.php");
                break;
            case $def['link_category_product']:
                include($def['views']."products/list_category.php");
                break;
            case $def['link_product']:
                include($def['views']."products/list.php");
                break;
            
        }
    }
