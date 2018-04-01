<?php
	if (isset($_REQUEST['p'])) {
		switch ($_REQUEST['p']) {
			case 'home':
				$page = "home.php";
				break;
			case 'cadastro':
				$page = "cadastros.php";
				break;
			case 'categorias':
				$page = "perguntas.php";
				break;
			case 'perguntas':
				$page = "pergunta.php";
				break;
			case 'respostas':
				$page = "resposta.php";
				break;
			default:
				$page = "home.php";
				break;
		}
	}
?>