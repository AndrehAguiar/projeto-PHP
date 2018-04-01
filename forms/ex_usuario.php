<?php
	require 'settings/check.php';
	
	$hostname_TIG = "localhost";
	$database_TIG = "ver_duvida";
	$username_TIG = "5TIG";
	$password_TIG = "testehost";
	
	$user = $_GET['ex_user'];
	$sl_user = mysqli_query( $TIG, "SELECT * FROM ver_duvida.users WHERE id = '".$user."'" ) or die( mysqli_error( $TIG ) );

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 
	
 if(isset($_POST["submit"])){
	$senha = sha1(md5($_POST["password"]));
	$ex_user = "DELETE FROM ver_duvida.users WHERE id = '".$user."'";
	
	if ($TIG->query($ex_user)===TRUE) {
	   echo "Cadastro de login excluido";
	} else {
	   echo "Error: " . $ex_user . "" . mysqli_error($TIG);
	}
	$TIG->close();
 } 
while ($row_sl_user = mysqli_fetch_assoc($sl_user)){ ?>
	<h2>Excluir Usu&aacute;rio</h2>
    <form method="post" name="ed_usuario" action="">
      <table align="center">
        <tr valign="baseline">
          <td nowrap align="right">Name:</td>
          <td><input class="form-control" type="text" name="name" readonly="readonly" value="<?php echo ($row_sl_user['name']); ?>" size="35"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Email:</td>
          <td><input class="form-control" type="email" name="email" readonly="readonly" value="<?php echo ($row_sl_user['email']); ?>" size="35"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Password:</td>
          <td><input class="form-control" type="password" name="password" readonly="readonly" value="<?php echo ($row_sl_user['password']); ?>" size="35"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">&nbsp;</td>
          <td><input id="botao" class="form-control alerta" type="submit" name="submit" value="Excluir"></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="nv_usuario">
    </form>
<?php } ?>
