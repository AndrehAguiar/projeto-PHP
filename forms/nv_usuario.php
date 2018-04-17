<h2>Cadastro</h2>
<hr/>
<?php if(isset($_GET['cadastro'])=='erro'){
		   echo "Usu&aacute;rio j&aacute; cadastrado!";?>
			<meta http-equiv="Refresh" content="3;URL=index.php?p=cadastro&nv_materia=nova" >
	<?php }elseif(isset($_GET['usuario'])== "cadastrado"){
	echo "Usu&aacute;rio cadastrado com sucesso!";?>
			<meta http-equiv="Refresh" content="3;URL=index.php" >
<?php }else{?>
<form method="post" name="in_user" action="sql/insert.php">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Forma&ccedil;&atilde;o:</td>
      <td><select class="form-control" name="formacao" placeholder="Nome" required>
      	<option value="">Selecione um n&iacute;vel</option>
      	<option value="Estudante">Estudante</option>
      	<option value="Profissional">Profissional</option>
      	<option value="Mestre">Mestre</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nome:</td>
      <td><input class="form-control" type="text" name="name" value="" placeholder="Nome" size="32" required="required"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Sobrenome:</td>
      <td><input class="form-control" type="text" name="sobre_nome" value="" placeholder="Sobre Nome" size="32" required="required"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">E-mail:</td>
      <td><input class="form-control" type="email" name="email" value="" placeholder="E-mail" size="32" required="required"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Senha:</td>
      <td><input class="form-control" type="password" name="password" value="" placeholder="Senha" size="32" required="required"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input id="botao" class="form-control confirma" type="submit" name="user" value="Gravar"></td>
    </tr>
  </table>
</form>
<?php } ?>

