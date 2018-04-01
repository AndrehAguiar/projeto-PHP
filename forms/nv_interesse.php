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
	$area = isset($_GET['area']);
	$sl_mater = mysqli_query( $TIG, "SELECT * FROM ver_duvida.materia_verifica WHERE materia_verifica.fk_id_categoria = '".$area."'" ) or die( mysqli_error( $TIG ) );
	
	
 if(isset($_POST["submit"])){
	 
	$in_interesse = "INSERT INTO ver_duvida.usu_verifica (`fk_id_usu`, `id_nivel`, `id_materia`) VALUES ('".$_POST["user_id"]."','".$_POST["nivel"]."','".$_POST["id_mater"]."')";

	if (mysqli_query($TIG, $in_interesse)) {
	   echo "Interesse cadastrado com sucesso!"; ?>
       	<meta http-equiv="Refresh" content="3;URL=?p=perfil&amp;user=<?php echo ($_SESSION['user_id']); ?>" >
       <?php
	} else {
	   echo "Interesse já cadastrado!";?>
       	<meta http-equiv="Refresh" content="3;URL=?p=perfil&amp;user=<?php echo ($_SESSION['user_id']); ?>" >
       <?php
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
<form method="post" name="nv_interesse" action="">
  <?php if (isset($_GET['interesse']) != "") { 
  			if (isset($_GET['area']) == '') {?>
      	
                    <select name="id_categ" class="form-control" id="categ" required>
                    <option value="">Selecione a &aacute;rea</option>
                    <?php while ($row_sl_categ = mysqli_fetch_assoc($sl_categ)){ ?>
                        <option onclick="MM_goToURL('parent','?p=perfil&user=<?php echo ($_SESSION['user_id']); ?>&interesse=novo&area=<?php echo ($row_sl_categ['pk_id_categoria']); ?>');return document.MM_returnValue" value="<?php echo ($row_sl_categ['pk_id_categoria']); ?>"><?php echo ($row_sl_categ['categoria']); ?></option>
                    <?php } ?>
                  </select>
      	<?php }else{ ?>
                    <select id="nivel" name="nivel" class="form-control" required>
                    <option value="">Selecione o n&iacute;vel</option>
                     <option value="1">B&aacute;sico</option>
                     <option value="2">M&eacute;dio</option>                     
                     <option value="3">Universit&aacute;rio</option>
                  </select>
                  
                   <select id="mater" name="id_mater" class="form-control" required>
                        <option value="">Selecione a &aacute;rea da mat&eacute;ria</option>
                        <?php while ($row_sl_mater = mysqli_fetch_assoc($sl_mater)){ ?>
                            <option value="<?php echo ($row_sl_mater['pk_materia_id']); ?>"><?php echo ($row_sl_mater['materia']); ?></option>
                        <?php } ?>
          			</select>
                  <?php } ?>
                  <button id="botao" class="form-control confirma" type="submit" name="submit" value="Gravar">Gravar</button>
                  <button name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','?p=perfil&user=6');return document.MM_returnValue" value="Cancelar">Cancelar</button>
  				<input type="hidden" name="user_id" value="<?php echo $_GET['user']; ?>">
    <?php } ?>
</form>

