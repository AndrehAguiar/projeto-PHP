<?php
	
	 /* Constantes de configuração */  
 define('QTDE_REGISTROS', 3);   
 define('RANGE_PAGINAS', 1);   
   
 /* Recebe o número da página via parâmetro na URL */  
 $pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;   
   
 /* Calcula a linha inicial da consulta */  
 $linha_inicial = ($pagina_atual -1) * QTDE_REGISTROS;  
   
 /* Instrução de consulta para paginação com MySQL */  
	 /* Cria uma conexão PDO com MySQL */  
	 $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');  
	 $TIG = new PDO("mysql:host=mysql.hostinger.com.br; dbname=u347189519_verdu;", "u347189519_andre", "HOSTbd5TIG", $opcoes); 
 
	$RsPerguntas =  "SELECT * FROM u347189519_verdu.pergunta_verifica
						JOIN u347189519_verdu.materia_verifica
							ON (pergunta_verifica.fk_id_materia = materia_verifica.pk_materia_id)
						LEFT JOIN u347189519_verdu.resposta_verifica
							ON (pergunta_verifica.pk_id_pergunta = resposta_verifica.fk_id_pergunta)
						LEFT JOIN u347189519_verdu.users
							ON (pergunta_verifica.fk_id_usu =  users.id)
						ORDER BY pk_id_pergunta DESC LIMIT {$linha_inicial}, " . QTDE_REGISTROS;
						
	$stm = $TIG->prepare($RsPerguntas);   
	 $stm->execute();   
	 $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
 
 /* Conta quantos registos existem na tabela */  
 $sqlContador = "SELECT COUNT(*) AS total_registros FROM u347189519_verdu.pergunta_verifica";   
 $conta = $TIG->prepare($sqlContador);   
 $conta->execute();   
 $valor = $conta->fetch(PDO::FETCH_OBJ);   
   
 /* Idêntifica a primeira página */  
 $primeira_pagina = 1;   
   
 /* Cálcula qual será a última página */  
 $ultima_pagina  = ceil($valor->total_registros / QTDE_REGISTROS);   
   
 /* Cálcula qual será a página anterior em relação a página atual em exibição */   
 $pagina_anterior = ($pagina_atual > 1) ? $pagina_atual -1 : 0 ;   
   
 /* Cálcula qual será a pŕoxima página em relação a página atual em exibição */   
 $proxima_pagina = ($pagina_atual < $ultima_pagina) ? $pagina_atual +1 : 0 ;  
   
 /* Cálcula qual será a página inicial do nosso range */    
 $range_inicial  = (($pagina_atual - RANGE_PAGINAS) >= 1) ? $pagina_atual - RANGE_PAGINAS : 1 ;   
   
 /* Cálcula qual será a página final do nosso range */    
 $range_final   = (($pagina_atual + RANGE_PAGINAS) <= $ultima_pagina ) ? $pagina_atual + RANGE_PAGINAS : $ultima_pagina ;   
   
 /* Verifica se vai exibir o botão "Primeiro" e "Pŕoximo" */   
 $exibir_botao_inicio = ($range_inicial < $pagina_atual) ? 'mostrar' : 'esconder'; 
   
 /* Verifica se vai exibir o botão "Anterior" e "Último" */   
 $exibir_botao_final = ($range_final > $pagina_atual) ? 'mostrar' : 'esconder';  
 
 
?>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
<h1>Perguntas Recentes</h1>
<hr />
    
    <?php if (!empty($dados)):
	
		 foreach ($dados as $row_RsPerguntas): 
			$data = explode("-", $row_RsPerguntas->data_pergunta);
			$data[0]; // ano
			$data[1]; // mês 
			$data[2]; // mês
			$dia = explode(" ", $data[2]);
			$dia[0]; // dia
			$dia[1]; // hora
			$hora = explode(".", $dia[1]);
			$hora[0];
			$nivel = $row_RsPerguntas->class_resposta;			
			?>
            <div id="perguntas" onclick="MM_goToURL('parent','?p=respostas&amp;pergunta=<?php echo $row_RsPerguntas->pk_id_pergunta; ?>');return document.MM_returnValue">
                <h3><?php echo $row_RsPerguntas->materia; ?></h3>
                <p><?php echo $row_RsPerguntas->pergunta; ?></p>
                <h5>
                	Postado por:<?php echo $row_RsPerguntas->sobre_nome;?>,
					<?php echo $row_RsPerguntas->name;?> em
					<?php echo $dia[0];?>&frasl;
					<?php echo $data[1];?>&frasl;
					<?php echo $data[0] ;?> &agrave;s 
					<?php echo $hora[0] ;?>
                </h5>                
            </div>
            <div id="rdp_perguntas">
            <?php if (isLoggedIn()){ ?>
                <div id="botoes">
                    <button value="" class="botao" onclick="MM_goToURL('parent','?p=cadastro&resposta=nova&pergunta=<?php echo $row_RsPerguntas->pk_id_pergunta; ?>');return document.MM_returnValue"><big><i class="fa fa-commenting"></i> &#124; </big> Responder</button>
                </div>
				<?php } 	
                    $RsQtdResposta =  "SELECT COUNT(*) AS qtd_respostas FROM u347189519_verdu.resposta_verifica WHERE (resposta_verifica.fk_id_pergunta = '".$row_RsPerguntas->pk_id_pergunta."')";  
            		 if ((int)$nivel > 0){ ?>
                    	<big><i class="fa fa-thumbs-up"></i></big>
                    <?php }elseif ((int)$nivel < 0){ ?>
                    	<big><i class="fa fa-thumbs-down"></i></big>
                    <?php }else{ ?>
                    	<big><i class="fa fa-warning"></i></big>
                    <?php }
					 
                     $total = $TIG->prepare($RsQtdResposta);   
                     $total->execute();   
                     $result = $total->fetch(PDO::FETCH_OBJ); 
				
                	echo $result->qtd_respostas; ?>
                
				<small>Resposta(s) </small> 
            </div> 
     <?php endforeach; ?> 
     <div class='box-paginacao'>     
           <a class='box-navegacao <?=$exibir_botao_inicio?>' href="index.php?page=<?=$primeira_pagina?>" title="Primeira Página">&#124; Primeira  &#124; </a> 
           <a class='box-navegacao <?=$exibir_botao_inicio?>' href="index.php?page=<?=$pagina_anterior?>" title="Página Anterior">Anterior  &#124; </a> 
        <?php
      /* Loop para montar a páginação central com os números */   
      for ($i=$range_inicial; $i <= $range_final; $i++):   
        $destaque = ($i == $pagina_atual) ? 'destaque' : '' ;  
        ?>   
        	<a class='box-numero <?=$destaque?>' href="index.php?page=<?=$i?>"><?=$i?> </a>   
      <?php endfor; ?>    
       		<a class='box-navegacao <?=$exibir_botao_final?>' href="index.php?page=<?=$proxima_pagina?>" title="Próxima Página">&#124; Pr&oacute;xima  &#124; </a>  
       		<a class='box-navegacao <?=$exibir_botao_final?>' href="index.php?page=<?=$ultima_pagina?>" title="Última Página">&Uacute;ltimo  &#124; </a> 
     </div>   
    <?php else: ?>   
     <p class="bg-danger">Nenhum registro foi encontrado!</p>  
    <?php endif; ?>
