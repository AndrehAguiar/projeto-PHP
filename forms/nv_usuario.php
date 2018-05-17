<h2>Cadastro</h2>
<hr/>
<?php if(isset($_GET['cadastro'])=='erro'){
		   echo "Usu&aacute;rio j&aacute; cadastrado!";?>
			<meta http-equiv="Refresh" content="3;URL=index.php?p=cadastro&nv_materia=nova" >
	<?php }elseif(isset($_GET['usuario'])== "cadastrado"){
	echo "Usu&aacute;rio cadastrado com sucesso!";?>
			<meta http-equiv="Refresh" content="3;URL=index.php" >
<?php }else{?>
<form method="post" name="in_user" action="sql/insert.php">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Forma&ccedil;&atilde;o:</td>
      <td><select class="form-control" name="formacao" placeholder="Nome" required>
      	<option value="">Selecione um n&iacute;vel</option>
      	<option value="Estudante">Estudante</option>
      	<option value="Profissional">Profissional</option>
      	<option value="Mestre">Mestre</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nome:</td>
      <td><input class="form-control" type="text" name="name" value="" placeholder="Nome" size="32" required="required"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Sobrenome:</td>
      <td><input class="form-control" type="text" name="sobre_nome" value="" placeholder="Sobrenome" size="32" required="required"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">E-mail:</td>
      <td><input class="form-control" type="email" name="email" value="" placeholder="E-mail" size="32" required="required"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Senha:</td>
      <td><input class="form-control" type="password" name="password" value="" placeholder="Senha" size="32" required="required"></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" nowrap align="center"><input type="checkbox" name="termo_uso" required="required"> Li e aceito os <span style="text-decoration: underline; cursor: pointer;" id="show-modal">termos de uso</span>.</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input id="botao" class="form-control confirma" type="submit" name="user" value="Gravar"></td>
    </tr>
  </table>
</form>

<div id="modal-termo-uso">
  <div class="modal-content">
    <h2>Termos de uso</h2>
    <ol>
      <li>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nisl augue, semper ut tellus vel, mollis vulputate nisi. Sed elementum turpis vitae elit finibus mattis. Duis eget elementum ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non enim vitae nibh porta dignissim eget ut diam. Donec turpis velit, bibendum sit amet vehicula ac, lacinia et nibh. Praesent ac velit finibus, sodales massa ac, eleifend diam. Phasellus at tortor nec dui ornare venenatis at non magna. Mauris pellentesque ornare mattis. Ut ut blandit magna. Pellentesque dapibus eros vel erat sagittis, nec volutpat tellus scelerisque.
      </li>
      <li>
        In nec purus sit amet nisl vestibulum euismod semper id lorem. Morbi metus urna, hendrerit in enim sed, interdum porta dui. Proin cursus augue eu elit facilisis, at vulputate ipsum vestibulum. Maecenas vulputate non tortor eget suscipit. Nulla odio leo, fermentum in laoreet ac, feugiat ut risus. Nullam et magna non dui lobortis luctus eu id lorem. Vestibulum a ultrices lorem, vel dignissim massa. Sed ac ante commodo, fermentum sapien vitae, blandit leo. Phasellus a ex elementum, elementum purus quis, dictum enim. Duis euismod nisi ipsum. Praesent a felis posuere, dictum arcu ac, maximus dolor. Cras a pellentesque arcu, vel gravida turpis. Suspendisse eleifend nisl quis velit finibus dictum in at massa. Nullam porttitor quis lectus varius luctus. Etiam posuere justo sit amet neque posuere placerat. Pellentesque accumsan augue massa, non sagittis nibh semper ac.
      </li>
      <li>
        Aliquam congue, tortor vitae volutpat faucibus, tortor tellus placerat augue, in hendrerit felis metus quis dui. Proin porta consequat quam. Nulla facilisi. Maecenas elementum pulvinar eros sed varius. Nullam pulvinar consequat nibh, quis pellentesque leo. Curabitur quis turpis ac sem tempus consectetur. Morbi tincidunt facilisis tellus, vitae lacinia massa sollicitudin vel. Nulla quis mauris et lectus pellentesque pretium non pellentesque tellus.
      </li>
      <li>
        Nunc sit amet ultricies velit, nec vehicula quam. Sed eu sapien sapien. Donec eget leo faucibus, hendrerit ex at, mattis eros. Proin lacinia nunc lacus, feugiat volutpat libero tincidunt ut. Etiam aliquam blandit lacus vitae maximus. Praesent imperdiet maximus massa. Cras non elit porta, eleifend orci sed, eleifend libero. Mauris eu lacinia orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam vitae dictum ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin id felis nisi. Phasellus eleifend elit luctus neque blandit, eget blandit felis porttitor. Mauris aliquet pulvinar nibh, sed facilisis dui. Nam non efficitur ante, ornare pulvinar magna. Nunc imperdiet gravida convallis.
      </li>
      <li>
        Suspendisse pellentesque convallis est, faucibus hendrerit augue elementum vitae. Integer non enim eget turpis condimentum lobortis in a arcu. Nunc massa dolor, lacinia et placerat eget, molestie ut dolor. Etiam viverra tellus elit, id pretium augue volutpat ac. Nullam imperdiet, lorem in suscipit feugiat, odio turpis tempus sem, eget venenatis felis lacus at dolor. Mauris eleifend rhoncus sodales. Aenean sodales tortor vel nulla venenatis, pulvinar vehicula enim sollicitudin. Aliquam erat volutpat. Aliquam pretium, ligula vel convallis congue, nulla mauris facilisis sapien, quis rhoncus augue felis vitae ante. Mauris vel volutpat felis. Fusce hendrerit felis nisl, id commodo libero interdum a. Pellentesque dapibus neque id pellentesque cursus. Donec rutrum posuere justo, quis lacinia metus maximus eget.
      </li>
    </ol>
    <div class="close-modal">Fechar</div>
  </div>
</div>
<?php } ?>

