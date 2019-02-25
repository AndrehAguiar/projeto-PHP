<?php
 
require_once 'settings/init.php';
 
require 'settings/check.php';


$slUser = mysqli_query($TIG, "SELECT * FROM u347189519_verdu.users
								JOIN u347189519_verdu.usu_verifica ON (users.id = usu_verifica.fk_id_usu)
								WHERE users.id = '".$_GET['user']."' ") or die( mysqli_error( $TIG ) );
								
					$row_User = mysqli_fetch_assoc($slUser);
$slInteresse = mysqli_query($TIG, "SELECT * FROM u347189519_verdu.users
								JOIN u347189519_verdu.usu_verifica ON (users.id = usu_verifica.fk_id_usu)
								LEFT JOIN u347189519_verdu.materia_verifica ON (usu_verifica.id_materia = materia_verifica.pk_materia_id)
								WHERE users.id = '".$_GET['user']."' ORDER BY usu_verifica.id_nivel") or die( mysqli_error( $TIG ) );
?>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>

         
        <h1>Painel do Usuário</h1>
 
        <p>Bem-vindo ao seu painel, <?php echo $_SESSION['user_name']; ?> | <a href="settings/logout.php">Sair</a></p>
        <hr>
        <h2>Dados de cadastro </h2>
                <div id="info">
                    <label for="name"> Nome:
                    <input readonly name="name" value="<?php echo $_SESSION['user_name']; ?> " class="leitura"/> </label>

                    
                    <label for="sobre_nome"> Sobrenome:
                    <input readonly name="sobre_nome" value="<?php echo $row_User['sobre_nome']; ?>" class="leitura"/></label>

                    
                    <label for="sobrenome"> E&#45;mail &frasl; Login:
                    <input readonly name="sobre_nome" value="<?php echo $row_User['email']; ?>" class="leitura"/></label>
                 </div>
			<?php while ($row_slInteresse = mysqli_fetch_assoc($slInteresse)){
				if ($row_slInteresse['id_nivel'] == 1) {
				$nivel = 'B&aacute;sico';
				}if ($row_slInteresse['id_nivel'] == 2) {
					$nivel = "M&eacute;dio";
				}if ($row_slInteresse['id_nivel'] == 3) {
					$nivel = "Universit&aacute;rio";
				}?>
                <div id="info">
                    <input readonly name="titulo" value="<?php echo $nivel; ?> " class="leitura"/>
                    
                    <input readonly name="materia" value="<?php echo $row_slInteresse['materia']; ?>" class="leitura"/>
                 </div>
            <?php } if (isset($_GET['interesse'])=="novo"){?>		
                <div id="info">
                    <?php include(FORMS_PATH."nv_interesse.php");?>
                </div>
            <?php }else{?>
                <div id="info">
          		<button type="button" class="form-control solicita" id="botao" onClick="MM_goToURL('parent','?p=perfil&user=<?php echo $_SESSION['user_id']; ?>&interesse=novo');return document.MM_returnValue">Novo interesse</button>
                </div>
            <?php } ?>