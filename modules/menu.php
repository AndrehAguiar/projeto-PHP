<?php include("sql/select.php");
	?>
	<ul>
		<?php while ($row_RsCategorias = mysqli_fetch_assoc($RsCategorias)){ ?>
			<li class="active has-sub">
				<a><?php echo $row_RsCategorias['categoria']; ?></a>
				<ul>
					<?php include(MODULES_PATH."sub_menu.php"); ?>
				</ul>
			</li>
		<?php } ?>

	</ul>
	<?php if (isLoggedIn()){ ?>
		<button type="button" class="form-control solicita" id="botao" onclick="MM_goToURL('parent','?p=cadastro&nv_materia=nova');return document.MM_returnValue">Nova Mat&eacute;ria</button>
<?php } ?>
