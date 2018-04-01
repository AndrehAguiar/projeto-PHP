<?php
session_start();
 
require 'settings/init.php';
?>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
	<div id="logo_topo">
		<img src="media/logo_verifica_duvidas.png" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue" />
	</div>
        <?php if (isLoggedIn()): ?>
        	<div id="identidade">
            
                <p>Olá, <a href="?p=cadastro&ed_user=<?php echo $_SESSION['user_id'];?>"/><?php echo $_SESSION['user_name']; ?> <big><i class="fa fa-edit"></i> </big></a>
                <a href="?p=perfil&user=<?php echo $_SESSION['user_id']; ?>">
                 Perfil <big><i class="fa fa-user"></i> </big></a>
                <a href="settings/logout.php">Sair <big><i class="fa fa-sign-out"></i> </big></a></p>
                
                <p><button value="Tirar D&uacute;vida" type="button" class="form-control solicita" id="botao" onclick="MM_goToURL('parent','?p=cadastro&amp;pergunta=nova');return document.MM_returnValue">Tirar D&uacute;vida <big>&#124; <i class="fa fa-bullhorn"></i></big></button></p>
                
            </div>
        <?php elseif(isset($_GET['login'])!= 'erro') : ?>
        	<div id="visita">
            <p>Olá, visitante.</p>
                <div id="form">
                    <form action="settings/login.php" method="POST" />
                        <input name="email" type="email" id="email"  placeholder="Login" size="30" maxlength="35"/>
                        <input name="password" type="password" id="password"  placeholder="Senha" size="20" maxlength="18"/>
                        <button class="botao" name="logar" type="submit" value="" id="logar" > Logar <big><i class="fa fa-sign-in"></i> </big></button>
                    </form>	
                </div>
                <div id="link_form">
                    <a href="?p=cadastro&user=novo">Cadastrar </a>
                    <a href=""> Esqueci a senha </a>
                </div>
             </div>
        <?php endif; ?>