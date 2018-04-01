<?php
$hostname_TIG = "mysql.hostinger.com.br";
$database_TIG = "u494260651_verdu";
$username_TIG = "u494260651_5tig";
$password_TIG = "testehost";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
mysqli_set_charset( $TIG, 'utf8' );

$RsPerguntas = mysqli_query( $TIG, "SELECT * FROM u494260651_verdu.materia_verifica JOIN u494260651_verdu.pergunta_verifica ON (pergunta_verifica.fk_id_materia =  materia_verifica.pk_materia_id) LEFT JOIN u494260651_verdu.usu_verifica ON (pergunta_verifica.fk_id_usu =  usu_verifica.pk_id_usu)  ORDER BY pk_id_pergunta DESC" )or die( mysqli_error( $TIG ) );
?>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
<h1>Perguntas Recentes</h1>
<hr />
<?php while ($row_RsPerguntas = mysqli_fetch_assoc($RsPerguntas)){ ?>
            <div id="perguntas" onclick="MM_goToURL('parent','?p=respostas&amp;pergunta=<?php echo $row_RsPerguntas['pk_id_pergunta']; ?>');return document.MM_returnValue">
                <h3><?php echo $row_RsPerguntas['materia']; ?></h3>
                <p><?php echo $row_RsPerguntas['pergunta']; ?></p>
                <h5>Postado por: <?php echo $row_RsPerguntas['nome_usu'];?>,  <?php echo $row_RsPerguntas['sobre_nome_usu'];?></h5>
                
            </div>
            
        <?php if (isLoggedIn()){ ?>
        	<div id="botoes">
            	<button class="botao" value="">Responder</button>
            </div>
        <?php } ?>
<?php } if (isset($_GET['p']) == "respostas") { 
			include(CONTENT_PATH."resposta.php");
} ?>
