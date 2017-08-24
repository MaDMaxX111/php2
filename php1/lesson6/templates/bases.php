<!DOCTYPE html>
<html lang="en" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">
<head>
	<meta charset="utf-8" />
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Cache-Control" content="private">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
	<title>PHP Уровень 1. Сквозная работа курса</title>
    <link rel="shortcut icon" type="image/x-icon" href="/css/images/favicon.ico" />
	<link rel="stylesheet" href="/css/style.css?v=1.1.2" type="text/css" media="all" />
	<link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="/css/forms.css?v=1.1.2">
    
    <!--Скрипт для AJAX -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <!-- Окончание скрипта AJAX -->
    
	<script src="/js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
		<script src="/js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="/js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="/js/functions.js" type="text/javascript"></script>
    <!-- Make sure the path to CKEditor is correct. -->
 	<script src="/ckeditor/ckeditor.js"></script>
<!--	    
   	<script src="/js/ajax.js?v=1.1.2" type="text/javascript"></script>
-->
</head>
<body>

	<!-- wraper -->
	<div id="wrapper">
		<!-- shell -->
		<div class="shell">
			<!-- container -->
			<div class="container">
				<!-- header -->
				
                <?php include $content['header']; ?>
                
				<!-- end of header -->
				<!-- navigation -->

				<?php include $content['navigation']; ?>

				<!-- end of navigation -->
		
				<!-- end of slider -->
				<!-- main -->

				<?php include $content['content']; ?>

				<!-- end of main -->

			<?php include $content['footer']; ?>

			</div>
			<!-- end of container -->	
		</div>
		<!-- end of shell -->	
	</div>
	<!-- end of wrapper -->
</body>
</html>