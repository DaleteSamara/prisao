<?php
	include ("conexao.php");
	$valor = $_GET["id"];
	
	$delete = "DELETE FROM detento WHERE id_detento=$valor";
	
	if(mysqli_query($link, $delete)){
		header("Location: exibe_detento.php");
	}else{
		echo "Nao eh possivel remover essa informacao.
		<br />
		<a href='exibe_prisao.php'>Voltar Lista</a>
		";
	}
?>