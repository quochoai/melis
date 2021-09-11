<?php
    include("../../../require_inc.php");
    
    $options = array(
        'draw' => $_REQUEST['draw'],
        'search_value' => $_REQUEST['search'],
        'limit' => $_REQUEST['length'],
        'offset' => $_REQUEST['start'],
        'order' => 0,
        'dir' => $_REQUEST['order.0.dir'],
    );
    $search = $_REQUEST["search"];
    $news_id = $_REQUEST['news_id'];
    if ($news_id == 1)
        $folder = $def['upload_news'];
    elseif ($news_id == 2)
        $folder = $def['upload_knowledge'];
    else
        $folder = $def['upload_promotion'];
    $table = "news";
    if ($search['value'] != '')
        $w = "and (name_vi like '%".$search['value']."%' or name_en like '%".$search['value']."%')";
    else
        $w = "";
    $newsss = $h->getAll("id", $table, "news_id = $news_id and deleted_at is null $w", "id asc");
    if (count($newsss) > 0) {
        $totalData = count($newsss);
        $totalFiltered = $totalData;
        $newss = $h->getAll("id, name_vi, name_en, post_date, sort, active", $table, "news_id = $news_id and deleted_at is null $w", "sort desc, id desc limit ".$options['offset'].", ".$options['limit']);
        foreach ($newss as $kc => $news) {
            $no = $kc + 1;
            if ($news['active'] == 1) {
                $fontawesome = 'eye';
                $tte = $lang['hidden'];
            } else {
                $fontawesome = 'eye-slash';
                $tte = $lang['active'];
            }
            if (! is_null($news['post_date']) && $news['post_date'] != '')
                $post_date = date("d/m/Y", strtotime($news['post_date']));
            else
                $post_date = '';
            $a[] = array(
                "DT_RowId" => 'news'.$news['id'],
                //"DT_RowClass" => "category",
                "active" => $news['active'],
                "no" => $no,
                "id" => $news['id'],  
                "name_vi" => $news['name_vi'],
                "name_en" => $news['name_en'],
                "post_date" => $post_date, 
                'sort' => "<input type='number' value='".$news['sort']."' class='text-center sort_news' id='".$news['id']."' style='width: 60px' min='1' step='1' />"
            );
        }
    } else {
        $totalFiltered = 0;
        $a = array();
    }
    
    $json_data = array(
        "draw"            => $options['draw'],
        "recordsTotal"    => $totalData,
        "recordsFiltered" => $totalFiltered,
        "data"            => $a
    );
    _e(json_encode($json_data));
    