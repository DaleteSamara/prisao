<?php

	include("conexao.php");

	$foto= $_POST["foto"];
	$nome = $_POST["nome_detento"];
	$cidade = $_POST["cidade_atual"];
	$idade = $_POST["idade"];
	$motivo = $_POST["motivo"];
	
	$insert = "INSERT INTO detento(id_detento,nome_detento,idade,cod_cidade_estado,motivo,foto)
				VALUES ('','$nome','$idade','$cidade','$motivo','$foto')";;
	
	if(mysqli_query($link, $insert)){
		echo "Cadastrado com sucesso";
	}else{
		die(mysqli_error($link));
	} 
?>