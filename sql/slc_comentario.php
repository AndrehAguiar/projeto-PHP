<?php
	//include("Connections/tig.php");

	$hostname_TIG = "localhost";
	$database_TIG = "u793605722_tig5";
	$username_TIG = "u793605722_gti5t";
	$password_TIG = "LqDyNy:?I1Sgehv`sZ";
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );	
				$RsComenta = mysqli_query( $TIG, "SELECT * FROM u793605722_tig5.comentario
				WHERE comentario.fk_resposta = '".$id_resposta."'" )or die( mysqli_error( $TIG ) );

	$TIG->close();
 ?>