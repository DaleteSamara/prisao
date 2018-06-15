<?php

	include("conexao.php");

	$nome_cidade = $_POST["nome_cidade"];
	$uf = $_POST["uf"];

	$insert = "INSERT INTO  cidade_estado (id_cidade_estado,nome_cidade,uf)
				VALUES ('','$nome_cidade','$uf');";
	
	mysqli_query($link,$insert) or die(mysqli_error($link));
	
	echo "Estado cadastrado com sucesso.";
?>