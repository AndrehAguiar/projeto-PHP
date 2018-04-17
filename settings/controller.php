<?php
	if (isset($_REQUEST['p'])) {
		switch ($_REQUEST['p']) {
			case 'home':
				$page = "home.php";
				break;
			case 'perfil':
				$page = "panel.php";
				break;
			case 'categorias':
				$page = "perguntas.php";
				break;
			case 'perguntas':
				$page = "pergunta.php";
				break;
			case 'respostas':
				$page = "pergunta.php";
				break;
			case 'cadastro':
				$page = "ctrl_form.php";
				break;
			default:
				$page = "home.php";
				break;
		}
	}
?>