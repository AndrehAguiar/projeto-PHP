<?php
	//include("Connections/tig.php");

	$hostname_TIG = "localhost";
	$database_TIG = "nomeBancoDados";
	$username_TIG = "userLocal";
	$password_TIG = "senhaUserLocal";
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );	
				$RsComenta = mysqli_query( $TIG, "SELECT * FROM nomeBancoDados.comentario
				WHERE comentario.fk_resposta = '".$id_resposta."'" )or die( mysqli_error( $TIG ) );

	$TIG->close();
 ?>
