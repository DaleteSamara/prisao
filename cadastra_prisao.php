<?php

	include("conexao.php");

	$nome_prisao = $_POST["nome_prisao"];
	$cidade = $_POST["cidade_estado"];
	
	$insert = "INSERT INTO  prisao (id_prisao,nome_prisao,cod_cidade_estado)
				VALUES ('','$nome_prisao','$cidade')";;
	
	if(mysqli_query($link, $insert)){
		echo "Cadastrado com sucesso";
	}else{
		die(mysqli_error($link));
	} 
?>