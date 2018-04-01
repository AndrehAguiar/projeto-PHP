<?php
    $hostname_TIG = "mysql.hostinger.com.br";
    $database_TIG = "u347189519_verdu";
    $username_TIG = "u347189519_andre";
    $password_TIG = "HOSTbd5TIG";

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 
 
 
	// Seleciona e imprimi a pergunta selecionada
	
	$pergunta = $_GET['pergunta'];
	$RsRespostas = mysqli_query( $TIG, "SELECT * FROM u347189519_verdu.resposta_verifica
										JOIN u347189519_verdu.pergunta_verifica
											ON (pergunta_verifica.pk_id_pergunta = resposta_verifica.fk_id_pergunta)
										JOIN u347189519_verdu.users
											ON (resposta_verifica.fk_id_usu =  users.id)
										WHERE resposta_verifica.fk_id_pergunta = $pergunta
										 ORDER BY pk_id_resposta DESC" )or die( mysqli_error( $TIG ) );
										 
	include(CONTENT_PATH."pergunta.php");
	
	//Insere os dados no banco quando invocado pelo botão submit
	
	 if(isset($_POST["submit"])){
		 
		$in_user = "INSERT INTO u347189519_verdu.resposta_verifica (`resposta`, `fk_id_pergunta`, `fk_id_usu`) VALUES ('".$_POST["resposta"]."','".$pergunta."','".$_POST["user_id"]."')";
	
		if (mysqli_query($TIG, $in_user)) {
		   echo "Pergunta respondida com sucesso!";?>
            	<meta http-equiv="Refresh" content="3;URL=?p=respostas&pergunta=<?php echo ($pergunta); ?>" >
           <?php
		} else {
		   echo "Error: " . $in_user . "" . mysqli_error($TIG);
		}
		$TIG->close();
		
		
		header("Location: index.php");
	 }
?>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>

<h2>Resposta</h2>
<form method="post" name="nv_resposta" action="">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Resposta:</td>
      <td>
      <textarea name="resposta" class="form-control" rows="5" required="required"></textarea></td>
    </tr>
    <input class="form-control" type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" required="required">
    
    <tr valign="baseline">
      <td nowrap align="right"><input name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','?p=respostas&pergunta=<?php echo $pergunta ?>');return document.MM_returnValue" value="Cancelar"></td>
      <td><input id="botao" class="form-control confirma" type="submit" name="submit" value="Gravar"></td>
    </tr>
  </table>
</form>

