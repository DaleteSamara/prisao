<?php
	include ("conexao.php");
	include("cabecalho_tabelas.php");
	
	$sql = "SELECT * FROM detento WHERE id_detento=".$_GET["id"];
	
	$resultado = mysqli_query($link, $sql) or die(mysqli_error($link));
	
	$linha = mysqli_fetch_array($resultado);
?>


	
<form method="POST" action="alterando_detento_prisao.php">
	<br/><br/><br/>
	
	<label>Idade:</label>
	<input type="text" name="idade" value="<?=$linha["idade"]?>"/>
	
	<label>Motivo:</label>
	<input type="text" name="motivo" value="<?=$linha["motivo"]?>"/>

	<input type="hidden" name="id_detento" value="<?=$linha["id_detento"];?>"/>
	
	<input type="submit" value="Alterar"/>	
	<a href="exibe_detento.php">Voltar</a>
</form>

