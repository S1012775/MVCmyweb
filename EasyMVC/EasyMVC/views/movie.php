<?php  
// require("../myweb/php/movielist.php");
// $selectmoive =selectmoive();
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<title>UniversalCinema-movie</title>
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
	<script>
		$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();
			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
	</script>
<!----font-Awesome----->
   	<link rel="stylesheet" href="views/fonts/css/font-awesome.min.css">
<!----font-Awesome----->
<!-- start light_box -->
<link rel="stylesheet" type="text/css" href="../views/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="views/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="views/js/jquery.fancybox-1.2.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("div.fancyDemo a").fancybox();
		});
	</script>

</head>
<body>
<div class="header_bg" id="home"><!-- start header -->
<div class="container">
	<div class="row header text-center specials">
		<div class="h_logo">
			<a href="index.html"><img src="views/images/logo.png" alt="" class="responsive"/></a>
		</div>
		<nav class="top-nav">
			<ul class="top-nav nav_list">
		<li><a href="movie">電影介紹</a></li>
				<li class="page-scroll"><a href="movietimes">場次查詢</a></li>
				<li class="logo page-scroll"><a title="hexa" href="index"><img src="../views/images/logo.png" alt="" class="responsive"/></a></li>
			     <li class="page-scroll"><a href="index">關於影城</a></li>
				<li class="page-scroll"><a href="index">聯絡環球</a></li>
			</ul>
			<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
		</nav>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="container"><!-- start main -->
	<div class="main row">
 	 	<h2 class="style">檔期電影</h2>
 	 	 <div class="grids_of_4 row" style="height:'600px'">
	 	 	<?php   
	 	 	foreach ($data as $value){
	 	 	?>
				<div class="col-md-4 images_1_of_3">
				 
					<div class="fancyDemo";>
						<a rel="group" title="" ><?php echo $value[0]; ?></a>
						 <!--// echo "<img src= '". $title3->item(0)->nodeValue . "' style='height:400px;'/>"; -->
					</div>
					 <h3><?php echo $value[1] ?></h3>
					  <h6><?php echo  $value[2] ?></h6>
					
					 
				</div>
				 <?php
				 }
				 ?>
		</div>
			</div>
</div><!-- end main -->

<div class="footer1_bg"><!-- start footer1 -->
	<div class="container">
		<div class="row  footer">
			<div class="copy text-center">
				<p class="link"><span>&#169; All rights reserved | Template by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></span></p>
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