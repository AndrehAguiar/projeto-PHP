<?php	
	include("settings/settings.php");
	include(SETTINGS_PATH."controller.php");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		
		<title>Verifica D&uacute;vidas Online</title>
		
		<link href="<?php echo CSS_PATH; ?>style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
	</head>
	<body>
		<div id="site">
			<div id="header">
				<?php include(MODULES_PATH."header.php"); ?>
			</div>
			<div id="menu">
				<?php include(MODULES_PATH."menu.php"); ?>
			</div>
			<div id="content">
                <?php (isset($page)) ? include(CONTENT_PATH.$page) : include(CONTENT_PATH."home.php"); ?>
			</div>
			
			<div id="footer">
				<?php include(MODULES_PATH."footer.html"); ?>
			</div>
		</div>
	</body>
</html>