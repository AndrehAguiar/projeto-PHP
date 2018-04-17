	<h3>Respostas</h3>	
	
	<?php
		while ($row_RsRespostas = mysqli_fetch_assoc($RsRespostas)){ 
			$id_resposta = $row_RsRespostas['id'];

			switch ($row_RsRespostas['formacao']){
				case "Estudante":
					$nota = 1;
					break;
				case "Profissional":
					$nota = 3;
					break;
				case "Mestre":
					$nota = 5;
					break;			
			}		
			
			$data = explode("-", $row_RsRespostas['data']);
			$data[0]; // ano
			$data[1]; // mês 
			$data[2]; // mês
			$dia = explode(" ", $data[2]);
			$dia[0]; // dia
			$dia[1]; // hora
			$hora = explode(".", $dia[1]);
			$hora[0];	
			$id_resposta = $row_RsRespostas['id'];
		?>
		<div id="respostas">
			<p><?php
			echo $row_RsRespostas['resposta'];?></p>
			<h5>
                <big>
                   <?php 
                		if (isLoggedIn()){
							
							$user = $_SESSION['user_id'];
							include("sql/conta_respostas.php");	
							$user_class = $row_RsNivelUser['cls_respostas'];
							include('sql/classifica_resposta.php');
							
						if ($user_class  <= 0){ ?>                    
							 <a name="classe" href="sql/classifica_resposta.php?p=respostas&pergunta=<?php echo $pergunta ;?>&resposta=<?php echo $id_resposta;?>&user=<?php echo ($user); ?>&class=<?php echo ($row_slc_avaliacao["avaliacao"] + $nota);?>" class="botao"><i class="fa fa-check"></i></a>
                    
                    <?php }if ($user_class >= 0) { ?>
                    
	                    <a name="classe" href="sql/classifica_resposta.php?p=respostas&pergunta=<?php echo $row_RsRespostas['fk_pergunta'];?>&resposta=<?php echo $id_resposta;?>&user=<?php echo ($user); ?>&class=<?php echo ($row_slc_avaliacao["avaliacao"] - $nota); ?>" class="botao"><i class="fa fa-close"></i></a>
	                    
                <?php }
				}
						include("sql/conta_respostas.php");	
						$nivel_resposta = $row_RsNivelResposta['cls_respostas'];?>
                </big>
                   
                    Respondido por:
                    <?php echo $row_RsRespostas['sobrenome'];?>,
                    <?php echo $row_RsRespostas['name'];?> em
                    <?php echo $dia[0];?> &#45;
                    <?php echo $data[1];?> &#45;
                    <?php echo $data[0] ;?> &agrave;s 
                    <?php echo $hora[0] ;
			
					if ($nivel_resposta > 0){ ?>
                    <big><i class="fa fa-thumbs-up"></i></big>
                    <?php }elseif ($nivel_resposta < 0){ ?>
                    <big><i class="fa fa-thumbs-down"></i></big>
                    <?php }else{ ?>
                    <big><i class="fa fa-warning"></i></big>
                    <?php } ?>
			<?php                 
                if (isLoggedIn() && isset($_GET['comentario'])!='nova'){ ?>
                    <div id="botoes">
                        <button value="" class="botao" onclick="MM_goToURL('parent','?p=cadastro&pergunta=<?php echo $pergunta; ?>&resposta=<?php echo $id_resposta; ?>&comentario=novo');return document.MM_returnValue"><big><i class="fa fa-comments-o"></i>&#124; </big> Comentar</button>
                    </div>
            <?php }  ?>
            	
            </h5>
            <hr/><?php			
				include("sql/slc_comentario.php");
				include (CONTENT_PATH."comenta.php");
			?>
		</div>
<?php } ?>