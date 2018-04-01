<?php
$hostname_TIG = "localhost";
$database_TIG = "ver_duvida";
$username_TIG = "5TIG";
$password_TIG = "testehost";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
mysqli_set_charset( $TIG, 'utf8' );

$pergunta = $_GET['pergunta'];
$RsPergunta = mysqli_query( $TIG, "SELECT * FROM ver_duvida.pergunta_verifica
										LEFT JOIN ver_duvida.resposta_verifica ON (pergunta_verifica.pk_id_pergunta = resposta_verifica.fk_id_pergunta)
										LEFT JOIN ver_duvida.materia_verifica ON (pk_materia_id = fk_id_materia)
										LEFT JOIN ver_duvida.users ON (pergunta_verifica.fk_id_usu = users.id)
										WHERE pk_id_pergunta = $pergunta") or die( mysqli_error( $TIG ) );

 while ($row_RsPergunta = mysqli_fetch_assoc($RsPergunta)){ 
		$data = explode("-", $row_RsPergunta['data_pergunta']);
		$data[0]; // ano
		$data[1]; // mês 
		$data[2]; // mês
		$dia = explode(" ", $data[2]);
		$dia[0]; // dia
		$dia[1]; // hora
		$hora = explode(".", $dia[1]);
		$hora[0];	
		$nivel = $row_RsPergunta['class_resposta']	;
?>
<script type="text/javascript">
	function MM_goToURL() { //v3.0
	  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
	  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
	}
</script>
<h1>Pergunta: <small><?php echo $row_RsPergunta['materia'];?></small></h1>
<hr />
<div id="perguntas">
    <h3><?php echo $row_RsPergunta['pergunta'];?></h3>
    
    <h5>Postado por:<br />
			<?php echo $row_RsPergunta['sobre_nome'];?>,
            <?php echo $row_RsPergunta['name'];?> em
            <?php echo $dia[0];?>&frasl;
			<?php echo $data[1];?>&frasl;
            <?php echo $data[0] ;?> &agrave;s
            <?php echo $hora[0] ;?>
            </h5>
 </div>
 <div id="rdp_perguntas">
    <?php                 
        if (isLoggedIn() && isset($_GET['resposta'])!='nova'){ ?>
            <div id="botoes">
                <button value="" class="botao" onclick="MM_goToURL('parent','?p=cadastro&resposta=nova&pergunta=<?php echo $row_RsPergunta['pk_id_pergunta']; ?>');return document.MM_returnValue"><big><i class="fa fa-commenting"></i> &#124; </big> Responder</button>
            </div>
    <?php }?> 	
       <?php  $RsQtdResposta = "SELECT COUNT(*) AS qtd_respostas FROM ver_duvida.resposta_verifica WHERE (resposta_verifica.fk_id_pergunta = '".$row_RsPergunta['pk_id_pergunta']."')" or die( mysqli_error( $TIG ) );

        $result = mysqli_query($TIG, $RsQtdResposta);
        $row_RsQtdResposta = mysqli_fetch_assoc($result);
				
            if ((int)$nivel > 0){ ?>
                    <big><i class="fa fa-thumbs-up"></i></big>
                    <?php }elseif ((int)$nivel < 0){ ?>
                    <big><i class="fa fa-thumbs-down"></i></big>
                    <?php }else{ ?>
                    <big><i class="fa fa-warning"></i></big>
                    <?php } 
                echo $row_RsQtdResposta['qtd_respostas'];
        ?>
        
        <small>Resposta(s)</small>
    <?php } ?>
</div>