<?php

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	}
	$RsRespostas = mysqli_query( $TIG, "SELECT * FROM nomeBancoDados.users
										LEFT JOIN nomeBancoDados.resposta
											ON (users.id_usuario = resposta.fk_usuario)
										WHERE resposta.fk_pergunta = '".$pergunta."'
										 ORDER BY resposta.id DESC" )or die( mysqli_error( $TIG ) );

	$TIG->close();
?>
