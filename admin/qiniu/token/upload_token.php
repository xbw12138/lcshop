<?php
require_once __DIR__ . '/../autoload.php';

use Qiniu\Auth;

$accessKey = 'DnaAnYC59MiINvUeZssSjfNq2_dPVnw9KQ82Tvyo';
$secretKey = 'OsoHJB_BrzGiM8wr28cDPXFc3gSYKb7UpMxUZ2ck';
$auth = new Auth($accessKey, $secretKey);

$bucket = 'xbw12138';
$upToken = $auth->uploadToken($bucket);

    $rs['uptoken']=$upToken;
    echo json_encode($rs);
    //echo $upToken;
