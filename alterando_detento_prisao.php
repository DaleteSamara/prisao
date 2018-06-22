<?php
	include ("conexao.php");
	$nome_prisao_att = $_POST["prisao"];
	$id = $_POST["id_prisao"];
	
	$update = "UPDATE detento_prisao SET cod_prisao='$nome_prisao_att' WHERE id_detento_prisao = $id";
	
	if(mysqli_query($link, $update)){
		header("Location: exibe_detento_prisao.php");
	}else{
		/*echo "Nao eh possivel atualizar essa informacao.
		<br />
		<a href='exibe_estados.php'>Voltar Lista</a>
		";*/
		die(mysqli_error($link));
	}
?>