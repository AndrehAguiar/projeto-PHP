<?php	
	include("settings/settings.php");
	include(SETTINGS_PATH."controller.php");
?>
<html>
	<head>
	   <meta charset='utf-8'>
	   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Verifica D&uacute;vidas Online</title>
       
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>menu_styles.css">
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>jquery.mCustomScrollbar.css">
        
	</head>
	<body class="mCustomScrollbar">	
      <!--.preloader-->
      <div class="preloader"> <i class="fa fa-gear fa-spin"></i></div>
      <!--/.preloader--> 
		<div id="site">
			<div id="header">
				<?php include(MODULES_PATH."header.php"); ?>
			</div>
			<div id="cssmenu">
				<?php include(MODULES_PATH."menu.php"); ?>
			</div>
			<div id="content">
                <?php (isset($page)) ? include(CONTENT_PATH.$page) : include(CONTENT_PATH."home.php"); ?>
			</div>			
			<div id="footer">
				<?php include(MODULES_PATH."footer.html"); ?>
			</div>
		</div>
  		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo JS_PATH.("preload.js") ?>"></script>
		<script type="text/javascript" src="<?php echo JS_PATH.("script.js") ?>"></script>
    	<script type="text/javascript" src="<?php echo JS_PATH.("jquery.mCustomScrollbar.js") ?>"></script>
	</body>
</html>