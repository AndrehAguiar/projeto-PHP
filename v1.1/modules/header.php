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
            <p>Olá, <a href="?p=cadastro&ed_user=<?php echo $_SESSION['user_id'];?>"/><?php echo $_SESSION['user_name']; ?>. <a href="panel.php">Perfil</a> | <a href="settings/logout.php">Sair</a></p>
        <?php elseif(isset($_GET['login'])!= 'erro') : ?>
            <p>Olá, visitante.</p>
        <div id="form">
            <form action="settings/login.php" method="POST" />
                <input name="email" type="email" id="email"  placeholder="Login" size="30" maxlength="35"/>
                <input name="password" type="password" id="password"  placeholder="Senha" size="20" maxlength="18"/>
                <input class="botao" name="logar" type="submit" value="Logar" id="logar" />
            </form>	
        </div>
        <div id="link_form">
            <a href="?p=cadastro&user=novo">Cadastrar </a>
            <a href=""> Esqueci a senha </a>
        </div>
        <?php endif; ?>