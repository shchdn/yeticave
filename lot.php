<?php
include_once 'data.php';
include_once 'functions.php';
$lot = null;
if (isset($_GET['id'])){
    foreach ($products as $value){
        if ($value['id'] == $_GET['id']){
            $lot = $value;
            break;
        }
    }
}
if (!$lot){
    http_response_code(404);
}
$lot_content = include_template('./templates/lot.php', [
    'lot' => $lot
]);
$layout_content = include_template('./templates/layout.php', [
    'content' => $lot_content,
    'container' => false,
    'page_title' => $page_title,
    'is_auth' => $is_auth,
    'user_avatar' => $user_avatar,
    'user_name' => $user_name,
    'categories' => $categories
]);
print($layout_content);
print_r($lot);
