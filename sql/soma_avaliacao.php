<?php 

	 $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');  
	 $TIG = new PDO("mysql:host=localhost; dbname=nomeBancoDados;", "userLocal", "senhaUserLocal", $opcoes); 

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 



	$soma = $TIG->prepare("SELECT SUM(avaliacao.avaliacao) AS cls_respostas FROM nomeBancoDados.avaliacao
									WHERE avaliacao.fk_resposta = '".$id_resposta."'");	

	$result = mysqli_query($TIG, $soma);
	$total  = mysqli_fetch_assoc($result);

	$TIG->close();

?>
