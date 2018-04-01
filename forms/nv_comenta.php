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
	
	$resposta = $_GET['resposta'];
	$RsRespostas = mysqli_query( $TIG, "SELECT * FROM ver_duvida.comenta_verifica
										JOIN ver_duvida.resposta_verifica
											ON (resposta_verifica.pk_id_resposta = comenta_verifica.fk_id_resposta)
										JOIN ver_duvida.users
											ON (resposta_verifica.fk_id_usu =  users.id)
										WHERE comenta_verifica.fk_id_resposta = $resposta" )or die( mysqli_error( $TIG ) );
										 
	include(CONTENT_PATH."resposta.php");
	
	//Insere os dados no banco quando invocado pelo botão submit
	
	 if(isset($_POST["submit"])){
		 
		$in_user = "INSERT INTO ver_duvida.comenta_verifica (`comentario`, `fk_id_resposta`, `fk_id_usu`) VALUES ('".$_POST["comentario"]."','".$resposta."','".$_POST["user_id"]."')";
	
		if (mysqli_query($TIG, $in_user)) {
		   echo "Coment&aacute;rio cadastrada com sucesso!";
		} else {
		   echo "Error: " . $in_user . "" . mysqli_error($TIG);
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
<form method="post" name="nv_resposta" action="">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Coment&aacute;rio:</td>
      <td>
      <textarea name="comentario" class="form-control" rows="5" required="required"></textarea></td>
    </tr>
    <input class="form-control" type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" required="required">
    
    <tr valign="baseline">
      <td nowrap align="right"><input name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','?p=respostas&pergunta=<?php echo $pergunta ?>');return document.MM_returnValue" value="Cancelar"></td>
      <td><input id="botao" class="form-control confirma" type="submit" name="submit" value="Gravar"></td>
    </tr>
  </table>
</form>

