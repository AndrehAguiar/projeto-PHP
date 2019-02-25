<?php
	//include("Connections/tig.php");


	$hostname_TIG = "localhost";
	$database_TIG = "nomeBancoDados";
	$username_TIG = "userLocal";
	$password_TIG = "passUserLocal";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
mysqli_set_charset( $TIG, 'utf8' );	

				$resposta = $row_RsRespostas['pk_id_resposta'];
				$RsComenta = mysqli_query( $TIG, "SELECT * FROM nomeBancoDados.comenta_verifica
				WHERE nomeBancoDados.fk_id_resposta = $resposta" )or die( mysqli_error( $TIG ) );

	$TIG->close();
 ?>
