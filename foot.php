
  <div class="m_user w">
  	<!--<a href="user.html">忆乡人***</a>
    <a href="#">退出</a>-->
    <a href="login.php">登录</a>
    <a href="register.php">注册</a>
    <a href="javascript:void(0);" class="backtop">返回顶部</a>  </div>
  <div class="footer w">
  	<a href="index.php"><div class="ico_img"><img src="images/178hui-app.png"></div><span style="color:#00bb9c">客户端</span></a>
    <a href="index.php"><div class="ico_img"><img src="images/178hui-shouji.png"></div><span style="color:#eb4f38">触摸版</span></a>
    <a href="index.php"><div class="ico_img"><img src="images/178hui-diannao.png"></div><span>电脑版</span></a>
  </div>
  <div class="copyright">Copyright © 2016 陵城购物 # 版权所有</div>
  <div class="copyright"><a href="http://182.254.146.68/lcshop/admin/views/wangEditor.php">管理员</a></div>
</div>
<div class="gotop backtop" style="display:none;">
</div>


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