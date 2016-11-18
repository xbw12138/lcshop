<?php
require("lib/config.php");
//$rowz=mysql_fetch_row(mysql_query("select count(*) from lc_sp"));
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="#" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="format-detection" content="telephone=no">
<title>陵城购物</title
><link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/public.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="layer/layer.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".mall_list a").click(function(){
		var index = layer.open({
			type: 1,
			title: false,
			closeBtn: false,
			shadeClose: false,
			offset: '25%',
			content: "<div class='no_login_show'><h1>亲！您还没登录哦！</h1><a href='login.html'>马上登录</a><a href='register.html'>免费注册</a><a href='#'>陵城购物</a><a href='javascript:layer.closeAll();'>取消</a></div>"
		});
	});
	$("#msg_gw").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
	});
    $("#msg_qd").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
    });
    $("#msg_dd").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
     });
    $("#msg_hy").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
    });
    $("#msg_fl").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
    	});
      $("#msg_yh").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
      });
      $("#msg_tb").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
       });
      $("#msg_bj").click(function(){
        alert("请耐心等待一下，我们正在拼命开发中···");
      });
});
</script>
<script src="http://ku.zzfriend.com/js/ie.js"></script>
</head>

<body>

<?php require("header.php"); ?>
	<div class="top w">
   	<div class="m_banner" id="owl">
            <a href="index.php" class="item"><img src="images/10250290397.png"></a>
            <a href="index.php" class="item"><img src="images/10225357963.jpg"></a>
      </div>
        <div class="m_nav">
        	<a href="javascript:void(0);" id="msg_fl"><img src="images/m-index_10.png"><span>商城返利</span></a>
            <a href="javascript:void(0);" id="msg_yh"><img src="images/m-index_12.png"><span>优惠爆料</span></a>
            <a href="javascript:void(0);" id="msg_tb"><img src="images/m-index_14.png"><span>淘宝返利</span></a>
            <a href="javascript:void(0);" id="msg_bj"><img src="images/m-index_22.png"><span>比价网</span></a>
            <a href="javascript:void(0);" id="msg_gw"><img src="images/m-index_16.png"><span>购物资讯</span></a>
            <a href="javascript:void(0);" id="msg_qd"><img src="images/m-index_24.png"><span>有奖签到</span></a>
            <a href="javascript:void(0);" id="msg_dd"><img src="images/m-index_26.png"><span>订单管理</span></a>
            <a href="javascript:void(0);" id="msg_hy"><img src="images/m-index_27.png"><span>会员中心</span></a>
        </div>
  </div>
  
  
<?php require("search.php"); ?>
  
  
  <div class="m_mall w">
  	<div class="mall_title"><span>购物分类</span><em><a href="index.php">更多</a></em></div>
    <div class="mall_list">
   	  <a href="index.php" class="mall"><div class="mall_logo"><img src="http://img.ecfun.cc/QQ20161118-0@2x.png" /></div><span>电脑办公</span></a>
        <a href="index.php" class="mall"><div class="mall_logo"><img src="http://img.ecfun.cc/QQ20161118-0@2x.png" /></div><span>生活用品</span></a>
        <a href="index.php" class="mall"><div class="mall_logo"><img src="http://img.ecfun.cc/QQ20161118-0@2x.png" /></div><span>汽车用品</span></a>
        <a href="index.php" class="mall"><div class="mall_logo"><img src="http://img.ecfun.cc/QQ20161118-0@2x.png" /></div><span>医药保健</span></a>
        <a href="index.php" class="mall"><div class="mall_logo"><img src="http://img.ecfun.cc/QQ20161118-0@2x.png" /></div><span>图书</span></a>
        <a href="index.php" class="mall"><div class="mall_logo"><img src="http://img.ecfun.cc/QQ20161118-0@2x.png" /></div><span>家用电器</span></a>
        <a href="index.php" class="mall"><div class="mall_logo"><img src="http://img.ecfun.cc/QQ20161118-0@2x.png" /></div><span>服装</span></a>
        <a href="index.php" class="mall"><div class="mall_logo"><img src="http://img.ecfun.cc/QQ20161118-0@2x.png" /></div><span>吃货</span></a>
    </div>
  </div>
  

  
  <div class="m_baoliao w">
  	<div class="baoliao_title"><span>新品推送</span><em><a href="sp_more.php?page=1"><img src="images/iconfont-shuaxin.png"></a></em></div>
    <div class="baoliao_list">
    
    <?php
      if(1){
        $sql="select id,sp_info,sp_time from lc_sp  ORDER BY id DESC limit 0 , 10 ";
              if($result=mysql_query($sql)){
                  while($row=mysql_fetch_array($result)){	
                    	$obj=json_decode($row['1']); 
    ?>              
    	<a href="baoliao_view.php?body=<?php echo $row['0']; ?>">
        <div class="baoliao_content">
            <div class="bl_img"><img src="<?php echo $obj->img; ?>" /></div>
            <div class="bl_right">
                <div class="bl_title"><?php echo $obj->title; ?></div>
                <div class="bl_note"><?php echo $obj->note; ?></div>
                <div class="bl_tag">
                    <div class="bl_price">¥<?php echo $obj->price; ?></div>
                    <div class="bl_oprice">¥<?php echo $obj->oprice; ?></div>
                    <div class="bl_time"><?php echo $row['2']; ?></div>
                    <div class="bl_mall"><?php echo $obj->source; ?></div>
                </div>
            </div>
        </div> 
        </a>

        <?php }}} ?>
    </div>
    <div class="bl_more"><a href="sp_more.php?page=1">浏览更多</a></div>
  </div>
  <?php require("foot.php"); ?>


</body>
</html>
<script type="text/javascript">
//返回顶部
$(document).ready(function(){
	$(window).scroll(function () {
		var scrollHeight = $(document).height();
		var scrollTop = $(window).scrollTop();
		var $windowHeight = $(window).innerHeight();
		scrollTop > 75 ? $(".gotop").fadeIn(200).css("display","block") : $(".gotop").fadeOut(200).css({"background-image":"url(images/iconfont-fanhuidingbu.png)"});
	});
	$('.backtop').click(function (e) {
		$(".gotop").css({"background-image":"url(images/iconfont-fanhuidingbu_up.png)"});
		e.preventDefault();
		$('html,body').animate({ scrollTop:0});
	});
});
</script>
