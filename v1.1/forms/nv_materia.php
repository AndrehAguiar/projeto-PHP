<?php
	$hostname_TIG = "localhost";
	$database_TIG = "ver_duvida";
	$username_TIG = "5TIG";
	$password_TIG = "testehost";

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );
	
	$user = $_SESSION['user_id'];
	$sl_user = mysqli_query( $TIG, "SELECT * FROM ver_duvida.users WHERE id = '".$user."'" ) or die( mysqli_error( $TIG ) );
	$sl_categ = mysqli_query( $TIG, "SELECT * FROM ver_duvida.categoria_verifica" ) or die( mysqli_error( $TIG ) );
	$sl_mater = mysqli_query( $TIG, "SELECT * FROM ver_duvida.materia_verifica" ) or die( mysqli_error( $TIG ) );
	
 if(isset($_POST["categoria"])){

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 
	$in_categ = "INSERT INTO ver_duvida.categoria_verifica (categoria, fk_id_usu) VALUES ('".$_POST["name"]."', '".$_SESSION['user_id']."')";

	if (mysqli_query($TIG, $in_categ)) {
	   echo "Conte&uacute;do cadastrado com sucesso!";
	} else {
	   echo "Error: " . $in_categ . "" . mysqli_error($TIG);
	}
	$TIG->close();
 }
	
 if(isset($_POST["materia"])){

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 
	
	$in_mater = "INSERT INTO ver_duvida.materia_verifica (materia, fk_id_categoria , fk_usu) VALUES ('".$_POST["mater"]."', '".$_POST["id_categ"]."', '".$user."')";

	if (mysqli_query($TIG, $in_mater)) {
	   echo "Conte&uacute;do cadastrado com sucesso!";
	} else {
	   echo "Error: " . $in_mater . "" . mysqli_error($TIG);
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

<h2>Cadastro</h2>
<form method="post" name="nv_materia" action="">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Categoria:</td>
      <?php if (isset($_GET['area'])=="nova") {?>
      <td>
      	<input id="nova_categ" class="form-control" type="text" name="name" value="" placeholder="Area" size="32">
        </td>
            <tr valign="baseline">
              <td nowrap align="right">&nbsp;</td>
              <td><input id="botao" class="form-control" type="submit" name="categoria" value="Gravar"></td>
              <?php }else{ ?>
                    <input type="checkbox" onclick="MM_goToURL('parent','?p=cadastro&nv_materia=6&area=nova');return document.MM_returnValue" />
                    <small>Selecione a caixa para adicionar nova &aacute;rea</small>
                    <td>
                    <select id="categ" class="form-control" name="id_categ">
                    <?php while ($row_sl_categ = mysqli_fetch_assoc($sl_categ)){ ?>
                        <option value="<?php echo ($row_sl_categ['pk_id_categoria']); ?>"><?php echo ($row_sl_categ['categoria']); ?></option>
                    <?php } ?>
                  </select>
              </td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Mat&eacute;ria:</td>
              <td><input class="form-control" type="text" name="mater" value="" placeholder="Mat&eacute;ria" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">&nbsp;</td>
              <td><input id="botao" class="form-control" type="submit" name="materia" value="Gravar"></td>
            </tr>
        <?php } ?>
  </table>
  <input type="hidden" name="MM_insert" value="nv_usuario">
</form>

