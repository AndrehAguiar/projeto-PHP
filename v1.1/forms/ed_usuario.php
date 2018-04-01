<?php
	require 'settings/check.php';
	
	$hostname_TIG = "localhost";
	$database_TIG = "ver_duvida";
	$username_TIG = "5TIG";
	$password_TIG = "testehost";
	
	$user = $_GET['ed_user'];
	$sl_user = mysqli_query( $TIG, "SELECT * FROM ver_duvida.users WHERE id = '".$user."'" ) or die( mysqli_error( $TIG ) );
	
 if(isset($_POST["submit"])){

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 
	$senha = sha1(md5($_POST["password"]));
	$ed_user = "UPDATE ver_duvida.users SET name='".$_POST["name"]."', email='".$_POST["email"]."', password='".$senha."' WHERE id = '".$user."'";
	
	if (mysqli_query($TIG, $ed_user)) {
	   echo "Cadastro de login atualizado";
	} else {
	   echo "Error: " . $in_user . "" . mysqli_error($TIG);
	}
	$TIG->close();
 } 
while ($row_sl_user = mysqli_fetch_assoc($sl_user)){
	?>

	<h2>Edita Usu&aacute;rio</h2> 
    <form method="post" name="ed_usuario" action="">
      <table align="center">
        <tr valign="baseline">
          <td nowrap align="right">Name:</td>
          <td><input class="form-control" type="text" name="name" value="<?php echo ($row_sl_user['name']); ?>" size="35"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Email:</td>
          <td><input class="form-control" type="email" name="email" value="<?php echo ($row_sl_user['email']); ?>" size="35"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Password:</td>
          <td><input class="form-control" type="password" name="password" value="<?php echo ($row_sl_user['password']); ?>" size="35"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right"><button name="submit" value="" type="button" class="form-control" id="botao" onclick="MM_goToURL('parent','?p=cadastro&ex_user=<?php echo ($user); ?>');return document.MM_returnValue">Excluir</button></td>
          <td><input id="botao" class="form-control" type="submit" name="submit" value="Atualizar"></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="nv_usuario">
    </form>
<?php } ?>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
