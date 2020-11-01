<?php
include_once 'data.php';
include_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;
    $required = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];
    $numeric_test = ['lot-rate', 'lot-step'];
    $input_file_name = 'lot-file';
    $dict = [
        'lot-name' => 'name',
        'lot-rate' => 'price'
    ];
    $errors = [];
    foreach ($_POST as $key => $value) {
        if (in_array($key, $required) and !$value) {
            $errors[$key] = 'Поле не может быть пустым';
        }
        if (in_array($key, $numeric_test) and !is_numeric($value)) {
            $errors[$key] = 'Вы должны ввести число';
        }
        if ($key == 'category' and $value == 'Выберите категорию'){
            $errors[$key] = 'Вы должны выбрать категорию';
        }
    }
    if (isset($_FILES[$input_file_name]['name'])){
        $file_path = './img/' . $_FILES[$input_file_name]['name'];
        move_uploaded_file($_FILES[$input_file_name]['tmp_name'], $file_path);
        $lot['image_path'] = $file_path;
    }
    if (count($errors)) {
        $add_content = include_template('./templates/add.php', [
            'errors' => $errors
        ]);
    }
    else {
        function change_keys ($array, $dict){
            $new_array = [];
            foreach ($array as $key => $value){
                $new_array[isset($dict[$key]) ? $dict[$key] : $key] = $value;
            }
            return $new_array;
        }
        $lot = change_keys($lot, $dict);
        $add_content = include_template('./templates/lot.php', [
            'lot' => $lot
        ]);
    }
}
else{
    $add_content = include_template('./templates/add.php', [
    ]);
}

$layout_content = include_template('./templates/layout.php', [
    'content' => $add_content,
    'container' => false,
    'page_title' => $page_title,
    'is_auth' => $is_auth,
    'user_avatar' => $user_avatar,
    'user_name' => $user_name,
    'categories' => $categories

]);
print($layout_content);
