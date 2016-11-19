<?php
require_once '../../lib/config.php';
$title = $_POST['title'];
$note = $_POST['note'];
$img = $_POST['img'];
$price = $_POST['price'];
$oprice = $_POST['oprice'];
$source = $_POST['source'];
$type = $_POST['type'];
$body = $_POST['body'];

$info['title']=$title;
$info['note']=$note;
$info['img']=$img;
$info['price']=$price;
$info['oprice']=$oprice;
$info['source']=$source;
function arrayRecursive(&$array, $function, $apply_to_keys_also = false){ 
    static $recursive_counter = 0; 
    if (++$recursive_counter > 1000) { 
        die('possible deep recursion attack'); 
    } 
    foreach ($array as $key => $value) { 
        if (is_array($value)) { 
            arrayRecursive($array[$key], $function, $apply_to_keys_also); 
        } else { 
            $array[$key] = $function($value); 
        }                                        
        if ($apply_to_keys_also && is_string($key)) { 
            $new_key = $function($key); 
            if ($new_key != $key) { 
                $array[$new_key] = $array[$key]; 
                unset($array[$key]); 
            } 
        } 
    } 
    $recursive_counter--; 
}                
function JSON($array) {
    arrayRecursive($array, 'urlencode', true);
    $json = json_encode($array);
    $data = addslashes($json); 
    return urldecode($data);     
}
$sp_info=JSON($info);
//$sp_info=json_encode($info);
//$bodys['body']=$body;
//$sp_body=JSON($bodys);
//$sp_body=json_encode($bodys);
$sql="INSERT INTO lc_sp(sp_type,sp_info, sp_body) VALUES('$type', '$sp_info', '$body')";
$result=mysql_query($sql);
if ($result){
    $rs['ok'] = '1';
}else{
    $rs['ok'] = '0';
}
echo json_encode($rs);