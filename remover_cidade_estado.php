<?php
	include ("conexao.php");
	$valor = $_GET["id"];
	
	$delete = "DELETE FROM cidade_estado WHERE Id_cidade_estado=$valor";
	
	if(mysqli_query($link, $delete)){
		header("Location: exibe_cidade_estado.php");
	}else{
		echo "Nao eh possivel remover essa informacao.
		<br />
		<a href='exibe_cidade_estado.php'>Voltar Lista</a>
		";
	}
?>