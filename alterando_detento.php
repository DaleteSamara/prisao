<?php
	include ("conexao.php");
	$idade_att = $_POST["idade"];
	$motivo_att = $_POST["motivo"];
	$id = $_POST["id_detento"];
	
	$update = "UPDATE detento SET idade='$idade_att', motivo='$motivo_att' WHERE id_detento = $id";
	
	if(mysqli_query($link, $update)){
		header("Location: exibe_detento.php");
	}else{
		/*echo "Nao eh possivel atualizar essa informacao.
		<br />
		<a href='exibe_estados.php'>Voltar Lista</a>
		";*/
		die(mysqli_error($link));
	}
?>