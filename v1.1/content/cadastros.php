
<?php
	
	if (isset($_GET['login'])=="erro"){
		include(FORMS_PATH."form-login.php");
	}
	if (isset($_GET['login'])=="erro" ||(isset($_GET['user'])=="novo")){
		include(FORMS_PATH."nv_usuario.php");
	}
	if (isset($_GET['ed_user'])!=""){
		include(FORMS_PATH."ed_usuario.php");	
	}
	if (isset($_GET['ex_user'])!=""){
		include(FORMS_PATH."ex_usuario.php");
	}
	if (isset($_GET['nv_materia'])!=""){
		include(FORMS_PATH."nv_materia.php");
	}
	
?>