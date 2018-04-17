
<?php
	// include("Connections/tig.php");

	$hostname_TIG = "localhost";
	$database_TIG = "nomeBancoDados";
	$username_TIG = "userLocal";
	$password_TIG = "senhaUserLocal";
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	$user = isset($_SESSION['user_id']);	
	
	if(isset($_GET['area'])!=''){
		$area = $_GET['area'];
	}else{
		$area = isset($_GET['area']);
	}

	$sl_categ = mysqli_query( $TIG, "SELECT * FROM nomeBancoDados.categoria" )
		or die( mysqli_error( $TIG ) ); 

	$sl_materias = mysqli_query( $TIG, "SELECT * FROM nomeBancoDados.materia" )
		or die( mysqli_error( $TIG ) );

	$sl_mater = mysqli_query( $TIG, "SELECT * FROM nomeBancoDados.materia
		WHERE materia.fk_categoria = '".$area."'" )
		or die( mysqli_error( $TIG ) );

	$sl_pergunta = mysqli_query( $TIG, "SELECT * FROM nomeBancoDados.pergunta
											LEFT JOIN nomeBancoDados.resposta
											ON (resposta.fk_pergunta = pergunta.id)" )
		or die( mysqli_error( $TIG ) ); 
	

	$RsCategorias = mysqli_query( $TIG, "SELECT * FROM nomeBancoDados.categoria" )or die( mysqli_error( $TIG ) );

?>
