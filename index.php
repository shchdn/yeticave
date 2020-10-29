<?php
require_once 'data.php';
require_once 'functions.php';
$index_content = include_template('./templates/index.php', [
    'products' => $products
]);
$layout_content = include_template('./templates/layout.php', [
    'page_title' => $page_title,
    'is_auth' => $is_auth,
    'user_avatar' => $user_avatar,
    'user_name' => $user_name,
    'content' => $index_content,
    'container' => true,
    'categories' => $categories
]);
print($layout_content);
