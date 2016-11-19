<?php
require_once '../../lib/config.php';
session_start();
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$sql="select user_password from admin where user_id='$email'";
$result = mysql_query($sql);
$row=mysql_fetch_row($result);
if($passwd!=null&&$email!=null){
	if($row[0]==$passwd){
		$rs['code'] = '1';
		$rs['ok'] = '1';
		$rs['msg'] = "欢迎回来";
		$_SESSION['username']=$email;
		//login success
		//$ext = 3600*24*7;
		//setcookie("user_pwd",$pw,time()+$ext);
		//setcookie("uid",$id,time()+$ext);
		//setcookie("user_email",$email,time()+$ext);
	}else{
		$rs['code'] = '0';
		$rs['msg'] = "手机号或者密码错误";
	}
}else{
	$rs['code'] = '0';
    $rs['msg'] = "请填写手机号或密码";
}

echo json_encode($rs);