<?php
 if(isset($_POST["submit"])){
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
	$senha = sha1(md5($_POST["password"]));
	$in_user = "INSERT INTO ver_duvida.users (`name`, `sobre_nome`, `email`, `password`) VALUES ('".$_POST["name"]."','".$_POST["sobre_nome"]."','".$_POST["email"]."', '".$senha."')";

	if (mysqli_query($TIG, $in_user)) {
	   echo "Usu&aacute;rio cadastrado com sucesso!"; ?>
       <?php
	} else {
		   echo "Error: " . $in_user . "" . mysqli_error($TIG);
	}
	$TIG->close();
 }
?>
<h2>Cadastro</h2>
<hr/>
<form method="post" name="in_user" action="">
  <table align="center">
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
      <td><input id="botao" class="form-control confirma" type="submit" name="submit" value="Gravar"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="nv_usuario">
</form>

