<?php
$hostname_TIG = "mysql.hostinger.com.br";
$database_TIG = "u494260651_verdu";
$username_TIG = "u494260651_5tig";
$password_TIG = "testehost";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
mysqli_set_charset( $TIG, 'utf8' );

$RsCategorias = mysqli_query( $TIG, "SELECT * FROM u494260651_verdu.categoria_verifica" )or die( mysqli_error( $TIG ) );
?>
	<ul>

 	<?php while ($row_RsCategorias = mysqli_fetch_assoc($RsCategorias))
	
{ ?>
        <li class="menu">
            <?php echo $row_RsCategorias['categoria']; ?>
            <ul>
				<?php include(MODULES_PATH."sub_menu.php"); ?>
            </ul>
        </li>
		<?php } ?>
        
    </ul>
<button type="button" class="form-control" id="botao" onclick="MM_goToURL('parent','?p=cadastro&nv_materia=<?php echo $_SESSION['user_id'];?>');return document.MM_returnValue">Nova Mat&eacute;ria</button>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
