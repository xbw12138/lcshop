<?php
require("lib/config.php");

if(isset($_GET['info'])){
  $g='%'.$_GET['info'].'%';
  $sql = "SELECT count(*) FROM lc_sp WHERE sp_info LIKE '$g'";
  $rowz=mysql_fetch_row(mysql_query($sql));
}
$page=(int)$_GET['page'];
$num=($page-1)*10;
if($rowz[0]%10!=0){
  $totalpage=$rowz[0]/10+1;
}else{
  $totalpage=$rowz[0]/10;
}
$i=1;
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
});
</script>
<script src="http://ku.zzfriend.com/js/ie.js"></script>
</head>

<body>
<?php require("header.php"); ?>
<?php require("search.php"); ?>



  <div class="m_baoliao w">
  	<div class="baoliao_title"><span>新品推送</span><em><a href="sp_more.php?page=<?php echo $page+$i; ?>"><img src="images/iconfont-shuaxin.png"></a></em></div>
    <div class="baoliao_list">
 
    <?php
      if($page<=$totalpage){
        $sql="select id,sp_info,sp_time from lc_sp WHERE sp_info LIKE '$g' ORDER BY id DESC limit $num , 10 ";
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
        
        <?php }}  ?>       
        </div>
        <div class="bl_more"><a href="search_more.php?page=<?php echo $page+$i; ?>&info=<?php echo $_GET['info']; ?>">浏览更多</a></div>
       
        <?php }else{ ?>
          </div>
          <div class="bl_more"><span>没有更多商品了</span></div>   
          <div class="bl_more"><img src="images/nothing.png"></img></div>  
          <div class="bl_more"><a href="sp_more.php?page=1">返回首页</a></div>  
        <?php } ?>
        
                
    
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
