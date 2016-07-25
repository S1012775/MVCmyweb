<?php 
// require("../myweb/php/indexSM.php");
require("indexslide.php");
// $selectindex =selectindex();
//  indexMessage();
        
?>
<!DOCTYPE HTML>
<html>
<head>
	
	<meta charset="UTF-8">
<title>UniversalCinema-HOME</title>
<!-- Bootstrap -->
<link rel="icon" type="../views/image/png" href="../views/images/icon.png" sizes="48x48">
<link href="../views/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="../views/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="../views/css/button.css">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Kreon:300,400,700' rel='stylesheet' type='text/css'>
<link href="../views/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="../views/js/jquery.min.js"></script>

<!----font-Awesome----->
   	<link rel="stylesheet" href="../views/fonts/css/font-awesome.min.css">
<!----font-Awesome----->
</head>
<body>
	
<div class="header_bg" id="home"><!-- start header -->
<div class="container">
	<div class="row header text-center specials">
		<div class="h_logo">
			<a href="index.html"><img src="../views/images/logo.png" alt="" class="responsive"/></a>
		</div>
		<nav class="top-nav">
			<ul class="top-nav nav_list">
				<li><a href="movie">電影介紹</a></li>
			    <li class="page-scroll"><a href="movietimes">場次查詢</a></li>
				<li class="logo page-scroll"><a title="hexa" href="index"><img src="../views/images/logo.png" alt="" class="responsive"/></a></li>
			    <li class="page-scroll"><a href="#about">關於影城</a></li>
				<li class="page-scroll"><a href="#contact">聯絡環球</a></li>
			</ul>
			<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
		</nav>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="slider_bg"><!-- start slider -->
<div class="container">
		<div class="row slider">
		<div class="wmuSlider example1"><!-- start wmuSlider example1 -->
			   <div class="kl-title-block clearfix text-left tbk-symbol-- tbk-icon-pos--after-title pbottom-20">
			   	
                   	<h2 class="style">熱映中</h2>
                
				</div>
	<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 900px; height: 350px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('imas/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 900px; height: 350px; overflow: hidden;">
        <?php  
        
       foreach ($data as $value) {
        ?>
            <div style="height:150px;">
                 <?php 
                 echo $value;
                 ?>
            </div>
        <?php 
        }
        ?> 
            <a data-u="add" href="http://www.jssor.com" style="display:none"></a>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb03" style="bottom:10px;right:10px;">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:21px;height:21px;">
                <div data-u="numbertemplate"></div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora03l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora03r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
    </div>
                
			<script src="../views/js/jquery.wmuSlider.js"></script> 
		     <script>
				 $('.example1').wmuSlider();         
			</script>
        </div><!-- end wmuSlider example1 -->
        <div class="clearfix"></div>
      </div>
</div>
</div>

 <script>
        jssor_1_slider_init();
    </script>


<div class="main_bg"  id="about"><!-- start about us -->
<div >
	<div class="row about">
		<div class="col-md-12 about_text">
			<h3>我們在哪?</h3>
					<h4>高雄市苓雅區大順三路108號 <br>07-722-0066</h4>
			<div >
			<!--google 地圖-->
			<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ3bN-Wb8EbjQRsbYBUxnfI-k&key=AIzaSyABzEc8UloW9JiNeR6F9n70iR0p818dCIs" allowfullscreen></iframe>
			</div>
		</div>
		<div class="col-md-9 about_text">
			<h3>票價資訊</h3>
			<?php 
			include 'tickets.php'
			;?>
			<div >
			
			</div>
		</div>
	</div>
</div>
</div>
<div class="footer_bg" id="contact"><!-- start footer -->
<div class="container">
	<div class="row footer">
		<div class="col-md-8 contact_left">
			<h3>聯絡我們</h3>
			<p>請填寫表格</h4>
			<form method="post" action="../Home/index">
				<input type="text" placeholder="Name " name="mesname" >
				<input type="text" placeholder="Email " name="mesemail">
				<input type="text" placeholder="Subject"name ="messubject">
				<textarea  placeholder="Your Message here...." name ="mescontent"></textarea>
				<span class="pull-right"><input type="submit" name="submit"value="submit us"></span>
			</form>
		</div>
		<div class="col-md-4  contact_right">
		
		</div>		
	</div>
</div>
</div>
<div class="footer1_bg"><!-- start footer1 -->
	<div class="container">
		<div class="row  footer">
			<div class="copy text-center">
			<div><a href="../Login/login">	<button class ="allbutton"type="button" name="login">manage only</button></a>
			
			</div>
				<p class="link"><span>&#169; All rights reserved | Template by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></span></p>
				<p class="link"><span>資料來源:<a href="http://www.u-movie.com.tw/"> 環球影城</a><a href="http://www.atmovies.com.tw/home/">  開眼電影網</a></span></p>
				<a href="#home" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"> </span></a>
			</div>
		</div>
		<script type="text/javascript">
				$(function() {
				  $('a[href*=#]:not([href=#])').click(function() {
				    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			
				      var target = $(this.hash);
				      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				      if (target.length) {
				        $('html,body').animate({
				          scrollTop: target.offset().top
				        }, 1000);
				        return false;
				      }
				    }
				  });
				});
		</script>
		<!---- start-smoth-scrolling---->		
	</div>
</div>
</body>
</html>