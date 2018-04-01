<?php
$hostname_TIG = "mysql.hostinger.com.br";
$database_TIG = "u347189519_verdu";
$username_TIG = "u347189519_andre";
$password_TIG = "HOSTbd5TIG";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
mysqli_set_charset( $TIG, 'utf8' );

$pergunta = $_GET['pergunta'];
$RsPergunta = mysqli_query( $TIG, "SELECT * FROM u347189519_verdu.pergunta_verifica
										LEFT JOIN u347189519_verdu.resposta_verifica ON (pergunta_verifica.pk_id_pergunta = resposta_verifica.fk_id_pergunta)
										LEFT JOIN u347189519_verdu.materia_verifica ON (pk_materia_id = fk_id_materia)
										LEFT JOIN u347189519_verdu.users ON (pergunta_verifica.fk_id_usu = users.id)
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
    
    <h5>Postado por: <?php echo $row_RsPergunta['sobre_nome'];?>, <?php echo $row_RsPergunta['name'];?> em  <?php echo $dia[0];?>&frasl;<?php echo $data[1];?>&frasl;<?php echo $data[0] ;?> &agrave;s <?php echo $hora[0] ;?></h5>
 </div>
 <div id="rdp_perguntas">
    <?php                 
        if (isLoggedIn() && isset($_GET['resposta'])!='nova'){ ?>
            <div id="botoes">
                <button value="" class="botao" onclick="MM_goToURL('parent','?p=cadastro&resposta=nova&pergunta=<?php echo $row_RsPergunta['pk_id_pergunta']; ?>');return document.MM_returnValue"><big><i class="fa fa-commenting"></i> &#124; </big> Responder</button>
            </div>
    <?php } 	
        $RsQtdResposta = "SELECT COUNT(*) AS qtd_respostas FROM u347189519_verdu.resposta_verifica WHERE (resposta_verifica.fk_id_pergunta = '".$row_RsPergunta['pk_id_pergunta']."')" or die( mysqli_error( $TIG ) );

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