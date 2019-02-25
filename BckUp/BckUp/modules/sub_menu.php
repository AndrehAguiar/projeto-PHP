<?php
$hostname_TIG = "mysql.hostinger.com.br";
$database_TIG = "u347189519_verdu";
$username_TIG = "u347189519_andre";
$password_TIG = "HOSTbd5TIG";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
mysqli_set_charset( $TIG, 'utf8' );

$RsMaterias = mysqli_query( $TIG, "SELECT * FROM u347189519_verdu.materia_verifica WHERE materia_verifica.fk_id_categoria = '".$row_RsCategorias['pk_id_categoria']."'" )or die( mysqli_error( $TIG ) );
?>

 	<?php while ($row_RsMaterias = mysqli_fetch_assoc($RsMaterias)){ ?>
                    <li onclick="MM_goToURL('parent','?p=categorias&categoria=<?php echo $row_RsMaterias['pk_materia_id']; ?>');return document.MM_returnValue" class="sub_menu">
                      <a><?php echo $row_RsMaterias['materia']; ?></a>
                    </li>
		<?php } ?>