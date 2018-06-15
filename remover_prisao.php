<?php
	include ("conexao.php");
	$valor = $_GET["id"];
	
	$delete = "DELETE FROM prisao WHERE id_prisao=$valor";
	
	if(mysqli_query($link, $delete)){
		header("Location: exibe_prisao.php");
	}else{
		echo "Nao eh possivel remover essa informacao.
		<br />
		<a href='exibe_prisao.php'>Voltar Lista</a>
		";
	}
?>