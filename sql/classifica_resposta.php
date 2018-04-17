<?php

	$hostname_TIG = "localhost";
	$database_TIG = "nomeBancoDados";
	$username_TIG = "userLocal";
	$password_TIG = "passUserLocal";

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );								 
		
	$id_pergunta = $_GET['pergunta'];


	if (isset($_GET['class']) != ''){
		$user = $_GET['user'];
		$id_resposta = $_GET['resposta'];
		$nivel = $_GET['class'];
	}

	$slc_avaliacao = mysqli_query($TIG, "SELECT * FROM u793605722_tig5.avaliacao
		JOIN u793605722_tig5.users
			ON (users.id_usuario = '".$user."')
		WHERE (fk_usuario = '".$user."'
			AND fk_resposta='".$id_resposta."')")
		or die( mysqli_error( $TIG ) );

		$row_slc_avaliacao = mysqli_fetch_assoc($slc_avaliacao);


	$soma = mysqli_query($TIG, "SELECT SUM(avaliacao.avaliacao) AS cls_respostas FROM u793605722_tig5.avaliacao
									WHERE avaliacao.fk_resposta = '".$id_resposta."'")
		or die( mysqli_error( $TIG ) );

		$row_soma = mysqli_fetch_assoc($soma);


	if($row_slc_avaliacao == '' && isset($_GET['class']) != ''){	
		
		$class_resposta = "INSERT INTO u793605722_tig5.avaliacao (`fk_usuario`, `fk_resposta`, `avaliacao`) VALUES ('".$user."','".$id_resposta."','".$nivel."')";

		if (mysqli_query($TIG, $class_resposta)) {
			   echo "Resposta comentado com sucesso!";
				header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
		} else {
			   echo "Error: " . $class_resposta . "" . mysqli_error($TIG);
			}
		
	 }elseif($row_slc_avaliacao != '' && isset($_GET['class']) != ''){
		
		$class_resposta = "UPDATE u793605722_tig5.avaliacao SET avaliacao ='".$nivel."' WHERE (fk_resposta='".$id_resposta."')";

		if (mysqli_query($TIG, $class_resposta)) {
			   echo "Resposta comentado com sucesso!";
				header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
		} else {
			   echo "Error: " . $class_resposta . "" . mysqli_error($TIG);
			}
	}
	$TIG->close();		

?>
