<?php
$hostname_TIG = "localhost";
$database_TIG = "ver_duvida";
$username_TIG = "5TIG";
$password_TIG = "testehost";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
mysqli_set_charset( $TIG, 'utf8' );

$RsMaterias = mysqli_query( $TIG, "SELECT * FROM ver_duvida.materia_verifica WHERE materia_verifica.fk_id_categoria = '".$row_RsCategorias['pk_id_categoria']."'" )or die( mysqli_error( $TIG ) );
?>

 	<?php while ($row_RsMaterias = mysqli_fetch_assoc($RsMaterias)){ ?>
                    <li onclick="MM_goToURL('parent','?p=categorias&categoria=<?php echo $row_RsMaterias['pk_materia_id']; ?>');return document.MM_returnValue">
                      <a><?php echo $row_RsMaterias['materia']; ?></a>
                    </li>
		<?php } ?>