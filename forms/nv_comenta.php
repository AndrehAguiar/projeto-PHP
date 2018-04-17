
<?php include(CONTENT_PATH."pergunta.php");?>
<?php 
	$resposta = $_GET['resposta'];
?>
<h2>Cadastrar coment&aacute;rio</h2>
<form method="post" name="nv_comentario" action="sql/insert.php">
	
      <textarea name="comentario" id="editor" data-role-required="true"></textarea>
      
      <input id="botao" class="form-control confirma" type="submit" name="comentar" value="Gravar">
    	<input class="form-control" type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" required="required">
       	<input name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','?p=respostas&pergunta=<?php echo $pergunta ?>');return document.MM_returnValue" value="Cancelar">
    	<input type="hidden" value="<?php echo ($resposta); ?>" name="id_resposta"/>

</form>

