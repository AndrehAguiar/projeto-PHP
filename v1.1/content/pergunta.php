<?php
$hostname_TIG = "mysql.hostinger.com.br";
$database_TIG = "u494260651_verdu";
$username_TIG = "u494260651_5tig";
$password_TIG = "testehost";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
mysqli_set_charset( $TIG, 'utf8' );

$pergunta = $_GET['pergunta'];
$RsPergunta = mysqli_query( $TIG, "SELECT * FROM u494260651_verdu.pergunta_verifica
										WHERE pk_id_pergunta = $pergunta") or die( mysqli_error( $TIG ) );

	 while ($row_RsPergunta = mysqli_fetch_assoc($RsPergunta)){ ?>
        <h1>Pergunta</h1>
        <hr />
        <div id="perguntas">
    <h3><?php echo $row_RsPergunta['pergunta'];?></h3>
            
        <?php if (isLoggedIn()){ ?>
        	<div id="botoes">
            	<button id="botao" class="botao" value="">Responder</button>
            </div>
        <?php } ?>
    <?php } ?>
</div>