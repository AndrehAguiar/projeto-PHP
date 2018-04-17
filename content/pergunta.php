<?php
	$pergunta = $_GET['pergunta'];
	include("sql/slc_pergunta.php");
	$row_RsPerguntas = mysqli_fetch_assoc($RsPergunta);
?>

	<h1>Pergunta: <small><?php echo $row_RsPerguntas['materia'];?> &#124; <?php echo $row_RsPerguntas['nivel'];?></small></h1>	
	<hr />
	 <?php
		 
			$data = explode("-", $row_RsPerguntas['data']);
			$data[0]; // ano
			$data[1]; // mês 
			$data[2]; // mês
			$dia = explode(" ", $data[2]);
			$dia[0]; // dia
			$dia[1]; // hora
			$hora = explode(".", $dia[1]);
			$hora[0];	
			$id_resposta = isset($row_RsRespostas['id']);
			$id_user_comenta = isset($row_RsComenta['fk_usuario']);
			include("sql/conta_respostas.php");	
		?>
		<div id="perguntas" onclick="MM_goToURL('parent','?p=respostas&pergunta=<?php echo $row_RsPerguntas->id; ?>');return document.MM_returnValue">
	
		<h3><?php echo $row_RsPerguntas['pergunta'];?></h3>

		<h5>Postado por:<br />
				<?php echo $row_RsPerguntas['sobrenome'];?>,
				<?php echo $row_RsPerguntas['name'];?> em
				<?php echo $dia[0];?> &#45;
				<?php echo $data[1];?> &#45;
				<?php echo $data[0] ;?> &agrave;s
				<?php echo $hora[0] ;?>
				</h5>
		 </div>
		<div id="rdp_perguntas">
		<?php if (isLoggedIn()){ ?>
			<div id="botoes">
				<button value="" class="botao" onclick="MM_goToURL('parent','?p=cadastro&resposta=nova&pergunta=<?php echo $pergunta; ?>');return document.MM_returnValue"><big><i class="fa fa-commenting"></i> &#124; </big> Responder</button>
			</div>
			<?php }		
			$nivel = $row_RsNivel['cls_respostas'];
			
			if ($nivel > 0){ ?>
				<big><i class="fa fa-thumbs-up"></i></big>
				<?php }elseif ($nivel < 0){ ?>
				<big><i class="fa fa-thumbs-down"></i></big>
				<?php }else{ ?>
				<big><i class="fa fa-warning"></i></big>
			<?php }
			echo $row_RsQtdResposta['qtd_respostas']; ?>
			<small>Resposta(s) </small> 
		</div>
		<?php {
			include("sql/slc_respostas.php");
		 	include (CONTENT_PATH."resposta.php");
	}?>
