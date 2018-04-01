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
	$sl_categ = mysqli_query( $TIG, "SELECT * FROM ver_duvida.categoria_verifica" ) or die( mysqli_error( $TIG ) );
	
	
 if(isset($_POST["submit"])){
	 
	$in_user = "INSERT INTO ver_duvida.pergunta_verifica (`fk_id_materia`, `pergunta`, `fk_id_usu`) VALUES ('".$_POST["id_mater"]."','".$_POST["pergunta"]."','".$_POST["user_id"]."')";

	if (mysqli_query($TIG, $in_user)) {
	   echo "Resposta comentado com sucesso!";?>
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

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>


<h2>Cadastro</h2>
<form method="post" name="nv_pergunta" action="">
  <table align="center">
  <?php if (isset($_GET['area']) == "") { ?>
    <tr valign="baseline">
      <td nowrap>&Aacute;rea
        <select name="id_categ" class="form-control" id="categ" onchange="MM_jumpMenu('parent',this,0)" required>
                    <option value="">Selecione a &aacute;rea da mat&eacute;ria</option>
                    <?php while ($row_sl_categ = mysqli_fetch_assoc($sl_categ)){ ?>
                        <option  value="?p=cadastro&pergunta=nova&area=<?php echo ($row_sl_categ['pk_id_categoria']); ?>"><?php echo ($row_sl_categ['categoria']); ?></option>
                    <?php } ?>
                  </select>
<input name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="Cancelar"></td>
    </tr>
    <?php }else{ 
	$area = $_GET['area'];
	$sl_mater = mysqli_query( $TIG, "SELECT * FROM ver_duvida.materia_verifica WHERE materia_verifica.fk_id_categoria = '".$area."'" ) or die( mysqli_error( $TIG ) ); ?>
    <tr valign="baseline">
      <td nowrap align="right">Mat&eacute;ria:</td>
      <td>
        <select id="mater" class="form-control" name="id_mater" required>
            <option value="">Selecione a &aacute;rea da mat&eacute;ria</option>
            <?php while ($row_sl_mater = mysqli_fetch_assoc($sl_mater)){ ?>
                <option value="<?php echo ($row_sl_mater['pk_materia_id']); ?>"><?php echo ($row_sl_mater['materia']); ?></option>
            <?php } ?>
          </select>
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Pergunta:</td>
      <td>
      <textarea name="pergunta" class="form-control" rows="5" required="required"></textarea></td>
    </tr>
    <input class="form-control" type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" required="required">
    
    <tr valign="baseline">
      <td nowrap align="right"><input name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="Cancelar"></td>
      <td><input id="botao" class="form-control confirma" type="submit" name="submit" value="Gravar"></td>
    </tr>
    <?php } ?>
  </table>
  <input type="hidden" name="MM_insert" value="nv_usuario">
</form>

