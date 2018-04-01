<?php
$hostname_TIG = "localhost";
$database_TIG = "ver_duvida";
$username_TIG = "5TIG";
$password_TIG = "testehost";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
mysqli_set_charset( $TIG, 'utf8' );

$pergunta = $_GET['pergunta'];
$RsRespostas = mysqli_query( $TIG, "SELECT * FROM ver_duvida.resposta_verifica
										JOIN ver_duvida.pergunta_verifica
											ON (pergunta_verifica.pk_id_pergunta = $pergunta)
										JOIN ver_duvida.users
											ON (resposta_verifica.fk_id_usu =  users.id)
										WHERE resposta_verifica.fk_id_pergunta = $pergunta
										 ORDER BY pk_id_resposta DESC" )or die( mysqli_error( $TIG ) );	
										 
if(isset($_GET['resposta'])!='' && isset($_GET['class'])!=''){			
										 
		
	$id_pergunta = $_GET['pergunta'];
	$id_resposta = $_GET['resposta'];			
	$nivel = $_GET['class'];
						 
	$class_resposta = "UPDATE ver_duvida.resposta_verifica SET class_resposta ='".$nivel."' WHERE pk_id_resposta = '".$id_resposta."'";
	
	if (mysqli_query($TIG, $class_resposta)) {
	   echo "Resposta avaliada com sucesso!"; ?>
       	<meta http-equiv="Refresh" content="3;URL=?p=respostas&pergunta=<?php echo ($id_pergunta); ?>" >
       <?php
	} else {
		   echo "Error: " . $class_resposta . "" . mysqli_error($TIG); ?>" >
       <?php
	}
	$TIG->close();
} ?>
    
<script type="text/javascript">
	function MM_goToURL() { //v3.0
	  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
	  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
	}
</script>
		<?php include(CONTENT_PATH."pergunta.php");?>

		<h3>Respostas</h3>
	<?php
		while ($row_RsRespostas = mysqli_fetch_assoc($RsRespostas)){ 
			$data = explode("-", $row_RsRespostas['data_resposta']);
			$data[0]; // ano
			$data[1]; // mês 
			$data[2]; // mês
			$dia = explode(" ", $data[2]);
			$dia[0]; // dia
			$dia[1]; // hora
			$hora = explode(".", $dia[1]);
			$hora[0];	
			$nivel = $row_RsRespostas['class_resposta']	;	
			?>
		<div id="respostas">
			<p><?php echo $row_RsRespostas['resposta'];?></p>
			<h5>
                <big>
                    <a name="classe" href="?p=respostas&pergunta=<?php echo $row_RsRespostas['fk_id_pergunta'];?>&resposta=<?php echo $row_RsRespostas['pk_id_resposta'];?>&class=<?php echo ($nivel - 1); ?>" class="botao"><i class="fa fa-close"></i></a>
                    <a name="classe" href="?p=respostas&pergunta=<?php echo $row_RsRespostas['fk_id_pergunta'];?>&resposta=<?php echo $row_RsRespostas['pk_id_resposta'];?>&class=<?php echo ($nivel) + 1; ?>" class="botao"><i class="fa fa-check"></i></a>
                </big>
                    Respondido por:
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
			<?php                 
                if (isLoggedIn() && isset($_GET['comentario'])!='nova'){ ?>
                    <div id="botoes">
                        <button value="" class="botao" onclick="MM_goToURL('parent','?p=cadastro&pergunta=<?php echo $pergunta; ?>&resposta=<?php echo $row_RsRespostas['pk_id_resposta']; ?>&comentario=novo');return document.MM_returnValue"><big><i class="fa fa-comments-o"></i>&#124; </big> Comentar</button>
                    </div>
            <?php }  ?>
            	
            </h5>
            <hr/>
			<?php
				include CONTENT_PATH."comenta.php";
			?>
		</div>
<?php } ?>