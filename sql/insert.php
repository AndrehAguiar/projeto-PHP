<?php
	//include("Connections/tig.php");


	$hostname_TIG = "localhost";
	$database_TIG = "nomeBancoDados";
	$username_TIG = "userLocal";
	$password_TIG = "passUserLocal";

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 	

	 if(isset($_POST["user"])){

		$senha = sha1(md5($_POST["password"]));
		$in_user = "INSERT INTO u793605722_tig5.users ( `email`, `formacao`, `name`, `sobrenome`, `password`) VALUES ('".$_POST["email"]."', '".$_POST["formacao"]."', '".$_POST["name"]."','".$_POST["sobre_nome"]."','".$senha."')";

		if (mysqli_query($TIG, $in_user)) {
			include("../settings/login.php");
		} else {
			header('location:../index.php?p=cadastro&user=novo&cadastro=erro');
		}
		$TIG->close();
	 }
	
	 if(isset($_POST["perguntar"])){

		// Check connection
		if ($TIG->connect_error) {
		   die("Connection failed: " . $TIG->connect_error);
		} 

		$in_pergunta = "INSERT INTO u793605722_tig5.pergunta (`pergunta`, `nivel`, `fk_materia`, `fk_usuario`) VALUES ('".$_POST["pergunta"]."','".$_POST["nivel"]."','".$_POST["id_mater"]."','".$_POST["user_id"]."')";

		if (mysqli_query($TIG, $in_pergunta)) {
			header('location:../index.php?p=cadastro&pergunta=nova&pergunta=cadastrada');
		} else {
			header('location:../index.php?p=cadastro&pergunta=nova&cadastro=erro');
		}
		$TIG->close();
	 }

	 if(isset($_POST["responder"])){	 

		// Check connection
		if ($TIG->connect_error) {
		   die("Connection failed: " . $TIG->connect_error);		} 


		$in_resposta = "INSERT INTO u793605722_tig5.resposta (`resposta`, `fk_pergunta`, `fk_usuario`) VALUES ('".$_POST["resposta"]."','".$_POST["id_pergunta"]."','".$_POST["user_id"]."')";		 
		 

		if (mysqli_query($TIG, $in_resposta)) {
			$_POST['resposta'] = 'cadastrada';
			header(sprintf('location: %s&resposta=cadastrada', $_SERVER['HTTP_REFERER']));
		} else {
			$_SERVER['resposta'] = '';
			header(sprintf('location: %s&cadastro=erro', $_SERVER['HTTP_REFERER']));
		}
	$TIG->close();
	 }

	 if(isset($_POST["comentar"])){

		// Check connection
		if ($TIG->connect_error) {
		   die("Connection failed: " . $TIG->connect_error);
		} 

		$in_comenta = "INSERT INTO u793605722_tig5.comentario (`comentario`, `fk_resposta`, `fk_usuario`) VALUES ('".$_POST["comentario"]."','".$_POST["id_resposta"]."','".$_POST["user_id"]."')";

		if (mysqli_query($TIG, $in_comenta)) {
		   echo "Coment&aacute;rio cadastrada com sucesso!";
			header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));

		} else {
		   //echo "Error: " . $in_comenta . "" . mysqli_error($TIG);
			header(sprintf('location: %s&cadastro=erro', $_SERVER['HTTP_REFERER']));
		}
		$TIG->close();
	 }

	 if(isset($_POST["materia"])){

			// Check connection
		if ($TIG->connect_error) {
		   die("Connection failed: " . $TIG->connect_error);
		} 

		$in_mater = "INSERT INTO u793605722_tig5.materia (materia, fk_categoria , fk_usuario) VALUES ('".$_POST["mater"]."', '".$_POST["id_categ"]."', '".$_POST["id_user"]."')";

		if (mysqli_query($TIG, $in_mater)) {
			header('location:../index.php?p=cadastro&nv_materia=novo&materia=cadastrada');
		} else {
			header('location:../index.php?p=cadastro&nv_materia=novo&cadastro=erro');
		}
		$TIG->close();
	}

	 if(isset($_POST["categoria"])){

		// Check connection
		if ($TIG->connect_error) {
		   die("Connection failed: " . $TIG->connect_error);
		} 
		$in_categ = "INSERT INTO u793605722_tig5.categoria (categoria, fk_usuario) VALUES ('".$_POST["name"]."', '".$_POST["id_user"]."')";

		if (mysqli_query($TIG, $in_categ)) {
			header('location:../index.php?p=cadastro&nv_materia=novo&materia=cadastrada');
		} else {
		   //echo "Error: " . $in_categ . "" . mysqli_error($TIG);
			header(sprintf('location: %s&cadastro=erro', $_SERVER['HTTP_REFERER']));
			
		}
		$TIG->close();
	 } 

	 if(isset($_POST["interesse"])){

		$in_interesse = "INSERT INTO u793605722_tig5.interesse (`nivel`,`email_usuario`,  `fk_materia`) VALUES ('".$_POST["nivel"]."','".$_POST["user_id"]."', '".$_POST["id_mater"]."')";

		if (mysqli_query($TIG, $in_interesse)) {
			header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
		} else {
	   		//echo "Error: " . $in_interesse . "" . mysqli_error($TIG);			
			header(sprintf('location: %s&cadastro=erro', $_SERVER['HTTP_REFERER']));
		}
		$TIG->close();
	 }

	 if(isset($_POST["form_perfil"])){
		$in_perfil = "INSERT INTO u793605722_tig5.cadastro (`telefone`, `endereco`,  `numero`,  `complemento`,  `bairro`,  `cidade`,  `estado`,  `pais`,  `cep`,  `fk_usuario`) VALUES ('".$_POST["celular"]."','".$_POST["endereco"]."', '".$_POST["numero"]."', '".$_POST["complemento"]."', '".$_POST["bairro"]."', '".$_POST["cidade"]."', '".$_POST["estado"]."', '".$_POST["pais"]."', '".$_POST["cep"]."', '".$_POST["usuario"]."')";

		if (mysqli_query($TIG, $in_perfil)) {
			header(sprintf('location: %s&dados=cadastrado', $_SERVER['HTTP_REFERER']));
		} else {
	   		//echo "Error: " . $in_perfil . "" . mysqli_error($TIG);
			header(sprintf('location: %s&cadastro=erro', $_SERVER['HTTP_REFERER']));
		}
		$TIG->close();
	 }

?>
