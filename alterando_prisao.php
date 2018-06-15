<?php
	include ("conexao.php");
	$nome= $_POST["nome_prisao"];
	$cidade_estado= $_POST["cidade_estado"];
	$id = $_POST["id_prisao"];
	
	$update = "UPDATE prisao SET nome_prisao='$nome',cod_cidade_estado='$cidade_estado' WHERE id_prisao = $id";
	
	if(mysqli_query($link, $update)){
		header("Location: exibe_prisao.php");
	}else{
		/*echo "Nao eh possivel atualizar essa informacao.
		<br />
		<a href='exibe_estados.php'>Voltar Lista</a>
		";*/
		die(mysqli_error($link));
	}
?>