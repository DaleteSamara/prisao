<?php

	include("conexao.php");

	$nome_prisao = $_POST["prisao"];
	$nome_detento = $_POST["detento"];
	
	$insert = "INSERT INTO  detento_prisao (cod_detento,id_detento_prisao,cod_prisao)
				VALUES ('$nome_detento','','$nome_prisao')";;
	
	if(mysqli_query($link, $insert)){
		echo "Cadastrado com sucesso";
	}else{
		die(mysqli_error($link));
	} 
?>