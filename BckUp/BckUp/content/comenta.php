<?php
$hostname_TIG = "mysql.hostinger.com.br";
$database_TIG = "u347189519_verdu";
$username_TIG = "u347189519_andre";
$password_TIG = "HOSTbd5TIG";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
mysqli_set_charset( $TIG, 'utf8' );	

                $resposta = $row_RsRespostas['pk_id_resposta'];
				$RsComenta = mysqli_query( $TIG, "SELECT * FROM u347189519_verdu.comenta_verifica
				WHERE comenta_verifica.fk_id_resposta = $resposta" )or die( mysqli_error( $TIG ) );
 ?>

		<h3>Coment&aacute;rios</h3>
	<?php while ($row_RsComenta = mysqli_fetch_assoc($RsComenta)){ 
			$data = explode("-", $row_RsComenta['data_comentario']);
			$data[0]; // ano
			$data[1]; // mês 
			$data[2]; // mês
			$dia = explode(" ", $data[2]);
			$dia[0]; // dia
			$dia[1]; // hora
			$hora = explode(".", $dia[1]);
			$hora[0];		
			?>
		<div id="comentarios">
			<p><?php echo $row_RsComenta['comentario'];?></p>
			<h5>
                    Comentado por:
                    <?php echo $row_RsRespostas['sobre_nome'];?>,
                    <?php echo $row_RsRespostas['name'];?> em
                    <?php echo $dia[0];?>&frasl;
                    <?php echo $data[1];?>&frasl;
                    <?php echo $data[0] ;?> &agrave;s 
                    <?php echo $hora[0] ;?>
            		<?php if ((int)$nivel > 0){ ?>
                    <big><i class="fa fa-thumbs-up"></i></big>
                    <?php }elseif ((int)$nivel < 0){ ?>
                    <big><i class="fa fa-thumbs-down"></i></big>
                    <?php }else{ ?>
                    <big><i class="fa fa-warning"></i></big>
                    <?php } ?>
            	
            </h5>
		</div>
<?php } ?>