﻿<?php
	 /* Constantes de configuração */  
if('QTDE_REGISTROS' == ""){
 define(!empty('QTDE_REGISTROS'), 3);
}
if('RANGE_PAGINAS' == ""){
 	define(!empty('RANGE_PAGINAS'), 1);  
}
   
 /* Recebe o número da página via parâmetro na URL */  
 $pagina_atual = (isset($_GET['pag']) && is_numeric($_GET['pag'])) ? $_GET['pag'] : 1;   
   
 /* Calcula a linha inicial da consulta */  
 $linha_inicial = ($pagina_atual -1) * QTDE_REGISTROS;  
   
 /* Instrução de consulta para paginação com MySQL */  
	/* Cria uma conexão PDO com MySQL */  
	$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');  
	$TIG = new PDO("mysql:host=localhost; dbname=u793605722_tig5;", "u793605722_gti5t", "LqDyNy:?I1Sgehv`sZ", $opcoes); 

	$RsRespostas =  "SELECT * FROM u793605722_tig5.comentario
					JOIN u793605722_tig5.resposta
						ON ( resposta.id = comentario.fk_resposta )
					LEFT JOIN u793605722_tig5.pergunta
						ON ( pergunta.id = resposta.fk_pergunta )
					LEFT JOIN u793605722_tig5.users
						ON ( resposta.fk_usuario = users.id_usuario )
						 WHERE (resposta.fk_usuario = '".$user."')
					ORDER BY pergunta.id DESC LIMIT {$linha_inicial}, " . QTDE_REGISTROS;

	$stm = $TIG->prepare($RsRespostas);   
	$stm->execute();   
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);   
 
 /* Conta quantos registos existem na tabela */  
 $sqlContador = "SELECT COUNT(*) AS total_registros FROM u793605722_tig5.pergunta 
 					JOIN u793605722_tig5.resposta
						ON ( resposta.fk_pergunta = pergunta.id ) 
					LEFT JOIN u793605722_tig5.comentario
						ON ( resposta.id = comentario.fk_resposta )
				WHERE (comentario.fk_usuario = '".$user."')";   
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