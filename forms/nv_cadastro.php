<h2>Cadastro de contato</h2>
<hr><br>
<?php	if(isset($_GET['cadastro'])=='erro')
	{
		echo "Ocorreu algum erro, confirme as informa&otilde;es e tente novamente!";?>
		<meta http-equiv="Refresh" content="3;URL=index.php?p=cadastro&perfil=<?php echo($user);?>" >
	<?php }
		elseif (isset($_GET['dados'])=='cadastrado')
	{
		echo "Perfil cadastrado com sucesso!";?>
			<meta http-equiv="Refresh" content="3;URL=index.php?p=perfil&user=<?php echo ($user); ?>" >
	<?php }
		else
	{
?>
	<form id="nv_perfil" method="post" action="sql/insert.php" name="in_perfil">

		<div class="row">
			<div class="label">Telefone:
			</div>
			<span id="movel">
			 <input class="form-control" id="celular" name="celular" type="celular" placeholder="Informe seu celular" data-rule-required="true" data-rule-celular="true" required></span>
		</div>

		<div class="row">
			<div class="label">CEP:
			</div>
			<input class="form-control" id="cep" name="cep" size="15" maxlength="9" placeholder="Informe seu CEP" onblur="pesquisacep(this.value);" required><br>
		</div>

		<div class="row endereco">
			<div class="label">Endere&ccedil;o:
			</div><br>
			<input class="form-control" id="endereco" name="endereco" placeholder="Informe seu endere&ccedil;o" required>
			<input class="form-control" id="numero" name="numero" placeholder="N&uacute;mero" required>
			<input class="form-control" id="complemento" name="complemento" placeholder="Complemmento"><br>
		</div>

		<div class="row bairro">
			<div class="label">Bairro:
			</div><br>
			<input class="form-control" id="bairro" name="bairro" placeholder="Informe seu bairro" required>
			<input class="form-control" id="cidade" name="cidade" placeholder="Cidade" required>
			<input class="form-control" id="estado" name="estado" placeholder="UF" required>		
			<input class="form-control" id="pais" name="pais" placeholder="Pa&iacute;s" required>
		</div>
		<input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" name="usuario">
		<input type="hidden" id="ibge" name="ibge">

		<input type="submit" class="form-control confirma" name="form_perfil" value="Gravar">
		<button type="reset" class="form-control alerta" onclick="MM_goToURL('parent','?p=perfil&user=<?php echo ($_SESSION['user_id']); ?>');return document.MM_returnValue" id="botao">Cancelar</button>
	</form>
<?php } ?>
<script  type="text/javascript" src="<?php echo JS_PATH.("cep.js") ?>"></script>
<script type="text/javascript" src="<?php echo JS_PATH.("jquery.js") ?>"></script> 
<script type="text/javascript" src="<?php echo JS_PATH.("jquery.validate.min.js") ?>"></script>
<script type="text/javascript" src="<?php echo JS_PATH.("SpryValidationTextField.js") ?>"></script>
<script  type="text/javascript" src="<?php echo JS_PATH.("valida_celular.js") ?>"></script>
