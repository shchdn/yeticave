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
function get_time_to_midnight(){
    $sec_in_hour = 3600;
    $sec_in_minute = 60;
    $ts = time();
    $ts_to_midnight = strtotime('tomorrow');
    $sec_to_midnight = $ts_to_midnight - $ts;
    $hours = floor($sec_to_midnight / $sec_in_hour);
    $minutes = floor(($sec_to_midnight % $sec_in_hour) / $sec_in_minute);
    return $hours . ':' . $minutes;
}
?>