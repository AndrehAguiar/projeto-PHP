<?php 
	$RsMaterias = mysqli_query( $TIG, "SELECT * FROM u793605722_tig5.materia WHERE materia.fk_categoria = '".$row_RsCategorias['id']."'" )or die( mysqli_error( $TIG ) );
	
	while ($row_RsMaterias = mysqli_fetch_assoc($RsMaterias)){ ?>
	<li onclick="MM_goToURL('parent','?p=categorias&categoria=<?php echo $row_RsMaterias['id']; ?>');return document.MM_returnValue">
	  <a><?php echo $row_RsMaterias['materia']; ?></a>
	</li>
<?php } ?>