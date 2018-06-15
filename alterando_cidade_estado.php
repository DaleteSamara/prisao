<?php
	include ("conexao.php");
	$nome_cidade_estado_att = $_POST["nome_cidade"];
	$sigla_cidade_estado_att = $_POST["uf"];
	$id = $_POST["Id_cidade_estado"];
	
	$update = "UPDATE cidade_estado SET nome_cidade='$nome_cidade_estado_att',uf='$sigla_cidade_estado_att' WHERE Id_cidade_estado = $id";
	
	if(mysqli_query($link, $update)){
		header("Location: exibe_cidade_estado.php");
	}else{
		/*echo "Nao eh possivel atualizar essa informacao.
		<br />
		<a href='exibe_estados.php'>Voltar Lista</a>
		";*/
		die(mysqli_error($link));
	}
?>