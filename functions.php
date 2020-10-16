<?php 
function get_price($value){
    return number_format(ceil($value), 0, '.', ' ') . '<b class="rub">р</b>';
};
function include_template($file_path, $parameters = false){
    ob_start();
    if($parameters){
        extract($parameters);
    }
    if(file_exists($file_path)){
        require_once($file_path);
        return ob_get_clean();
    }
    else{
        return 'file not found';
    }
};
?>