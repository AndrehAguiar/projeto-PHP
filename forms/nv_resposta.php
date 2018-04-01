<?php

	$hostname_TIG = "localhost";
	$database_TIG = "ver_duvida";
	$username_TIG = "5TIG";
	$password_TIG = "testehost";

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 
 
 
	// Seleciona e imprimi a pergunta selecionada
	
	$pergunta = $_GET['pergunta'];
	$RsRespostas = mysqli_query( $TIG, "SELECT * FROM ver_duvida.resposta_verifica
										JOIN ver_duvida.pergunta_verifica
											ON (pergunta_verifica.pk_id_pergunta = resposta_verifica.fk_id_pergunta)
										JOIN ver_duvida.users
											ON (resposta_verifica.fk_id_usu =  users.id)
										WHERE resposta_verifica.fk_id_pergunta = $pergunta
										 ORDER BY pk_id_resposta DESC" )or die( mysqli_error( $TIG ) );
										 
	include(CONTENT_PATH."pergunta.php");
	
	//Insere os dados no banco quando invocado pelo botão submit
	
	 if(isset($_POST["submit"])){
		 
		$in_resposta = "INSERT INTO ver_duvida.resposta_verifica (`resposta`, `fk_id_pergunta`, `fk_id_usu`) VALUES ('".$_POST["resposta"]."','".$pergunta."','".$_POST["user_id"]."')";
	
		if (mysqli_query($TIG, $in_resposta)) {
		   echo "Pergunta respondida com sucesso!";?>
            	<meta http-equiv="Refresh" content="3;URL=?p=respostas&pergunta=<?php echo ($pergunta); ?>" >
           <?php
		} else {
		   echo "Error: " . $in_resposta . "" . mysqli_error($TIG);
		}
		$TIG->close();
	 }
?>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>

<h2>Resposta</h2>
<form method="post" name="in_resposta" action="">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Resposta:</td>
      <td>
      <textarea name="resposta" class="form-control" rows="5" required></textarea></td>
    </tr>
    <input class="form-control" type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" required="required">
    
    <tr valign="baseline">
      <td nowrap align="right"><input name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','?p=respostas&pergunta=<?php echo $pergunta ?>');return document.MM_returnValue" value="Cancelar"></td>
      <td><input id="botao" class="form-control confirma" type="submit" name="submit" value="Gravar"></td>
    </tr>
  </table>
</form>

