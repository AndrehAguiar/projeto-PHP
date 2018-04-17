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
		<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
       
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>menu_styles.css">
	</head>
	<body>	
      <!--.preloader-->
      <div class="preloader"> <i class="fa fa-gear fa-spin"></i></div>
      <!--/.preloader--> 
		<div id="site" class="mCustomScrollbar">
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

<script>
	CKEDITOR.replace( 'editor', {   
		filebrowserBrowseUrl: 'kcfinder/browse.php',
		filebrowserFlashBrowseUrl: '../browse.php?type=flash',
		filebrowserImageBrowseUrl: 'kcfinder/browse.php?type=Images',
		filebrowserBrowseUrl: 'kcfinder/browse.php?type=files',
		filebrowserUploadUrl: 'kcfinder/upload.php',
		filebrowserUploadUrl: 'kcfinder/upload.php?type=files',
		filebrowserImageUploadUrl : 'kcfinder/upload.php?type=images',
		filebrowserFlashUploadUrl: 'kcfinder/upload.php?type=flash',
		filebrowserImageUploadUrl: 'kcfinder/upload.php?type=Images',
	});
</script>

		<script>
			function MM_goToURL() { //v3.0
			  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
			  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
			}

			function MM_jumpMenu(targ,selObj,restore){ //v3.0
			  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
			  if (restore) selObj.selectedIndex=0;
			}
		</script>
	</body>
</html>