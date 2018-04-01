<?php
$hostname_TIG = "mysql.hostinger.com.br";
$database_TIG = "u494260651_verdu";
$username_TIG = "u494260651_5tig";
$password_TIG = "testehost";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
mysqli_set_charset( $TIG, 'utf8' );

$pergunta = $_GET['pergunta'];
$RsRespostas = mysqli_query( $TIG, "SELECT * FROM u494260651_verdu.resposta_verifica
										JOIN u494260651_verdu.pergunta_verifica
											ON (pergunta_verifica.pk_id_pergunta = resposta_verifica.fk_id_pergunta)
										LEFT JOIN u494260651_verdu.usu_verifica
											ON (resposta_verifica.fk_id_usu = usu_verifica.pk_id_usu)
										WHERE resposta_verifica.fk_id_pergunta = $pergunta
										 ORDER BY pk_id_resposta DESC" )or die( mysqli_error( $TIG ) );
										 
	include(CONTENT_PATH."pergunta.php"); ?>
		<h3>Respostas</h3>
	<?php while ($row_RsRespostas = mysqli_fetch_assoc($RsRespostas)){ ?>
		<div id="respostas">
			<p><?php echo $row_RsRespostas['resposta'];?></p>
			<h5>Respondido por: <?php echo $row_RsRespostas['nome_usu'];?>,  <?php echo $row_RsRespostas['sobre_nome_usu'];?></h5>
		</div>
<?php }