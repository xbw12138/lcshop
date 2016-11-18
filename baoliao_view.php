<?php
require("lib/config.php");
$id=$_GET['body'];
$sql="select sp_info,sp_body,sp_time from lc_sp where id='$id'";
$result=mysql_query($sql);
if ($row=mysql_fetch_row($result)) {
  $obj=json_decode($row[0]); 
  $body=$row[1];
  $time=$row[2];
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="m.178hui.com" />
<meta name="applicable-device" content="mobile" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>商品详情</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
<link href="css/news.css" rel="stylesheet" type="text/css" />
<link href="frozenui/css/frozen.css" rel="stylesheet" type="text/css">
<link href="css/baoliao.css" rel="stylesheet" type="text/css">

<script src="js/jquery-1.8.3.min.js"></script>
<script>
$(window).load(function() {
	$("#status").fadeOut();
	$("#preloader").delay(350).fadeOut("slow");
})
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#msg_s").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
	});
});
</script>



<script type="text/javascript">
$(document).ready(function(){
	$(".shaixuan").click(function(event){
		event.stopPropagation(); 
		$(".shaixuan_box").show();
		$(".shaixuan_box").animate({right:'100%'});
		$("html,body").css("overflow","hidden");
	});
	$(document).click(function(event){
		$(".shaixuan_box").animate({right:'-100%'});
		$(".shaixuan_box").hide(5);
		$("html,body").css("overflow","");
	});    
});
</script>
</head>

<body>
<div class="mobile">
	<!--页面加载 开始-->
  <div id="preloader">
    <div id="status">
      <p class="center-text"><span>拼命加载中···</span></p>
    </div>
  </div>
  <!--页面加载 结束--> 
  <!--header 开始-->
  <header>
    <div class="header"> <a class="new-a-back" href="javascript:history.go(-1)"> <span><img src="images/iconfont-fanhui.png"></span> </a>
      <h2>商品详情</h2>
      <div class="head_right" style="top:13px;"><a href="javascript:history.go(-1)" style="color:#FFFFFF; font-size:14px;">返回列表</a></div>
    </div>
  </header>
  <!--header 结束-->
  
  <div class="view w">
  	<div class="bl_view_img"><img src="<?php echo $obj->img; ?>" /></div>
    <div class="bl_view_title"><span class="bl_type">白菜</span><span class="bl_type" style="background-color:#53bf1e;">活动</span><span class="bl_type" style="background-color:#00bb9c;">优质</span><?php echo $obj->title; ?> </div>
    <div class="bl_view_note"><?php echo $obj->note; ?></div>
    <div class="bl_view_tag">
   		<div class="bl_view_price">¥<?php echo $obj->price; ?></div>
        <div class="bl_view_oprice">¥<?php echo $obj->oprice; ?></div>        
        <div class="bl_view_mall"><?php echo $obj->source; ?></div>
    </div>
    
    <div class="bl_view_tag">
    	<div class="bl_view_user"></div>
        <div class="bl_view_time">时间：<?php echo $time; ?></div>
    </div>
    <div class="go_buy"><a href="javascript:void(0);" id="msg_s">立即购买</a></div>
  </div>
  
  <div class="bl_view_content w">
  	<h1>推荐理由<span></span></h1>
    <div class="bl_view_word">
    <?php  $objbody=json_decode($row[1]); echo $objbody->body; ?>
    	 
    </div>
  </div>
  
 
  <div class="pl_icon"></div>
  <div class="bl_comment w">
  	<h1>用户评论</h1>
  <!-- 多说评论框 start -->
    <div class="ds-thread" data-thread-key="<?php echo $_GET['body']; ?>" data-title="<?php echo $_GET['body']; ?>" data-url="<?php echo "http://182.254.146.68/lcshop/baoliao_view.php?body=".$_GET['body']; ?>"></div>
  <!-- 多说评论框 end -->
  <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
  <script type="text/javascript">
  var duoshuoQuery = {short_name:"lcshop"};
    (function() {
      var ds = document.createElement('script');
      ds.type = 'text/javascript';ds.async = true;
      ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
      ds.charset = 'UTF-8';
      (document.getElementsByTagName('head')[0] 
       || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
    </script>
  <!-- 多说公共JS代码 end -->
  
  </div>
  
<?php require("foot.php"); ?>
</body>
</html>