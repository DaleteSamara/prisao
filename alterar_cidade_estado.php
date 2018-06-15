<?php
	include ("conexao.php");
	$sql = "SELECT * FROM cidade_estado WHERE Id_cidade_estado=".$_GET["id"];
	
	$resultado = mysqli_query($link, $sql) or die(mysqli_error($link));
	
	$linha = mysqli_fetch_array($resultado)

?>


	
<form method="POST" action="alterando_cidade_estado.php">
	<label>Nome Cidade:</label>
	<input type="text" name="nome_cidade" value="<?=$linha["nome_cidade"]?>"/>

	<label> Estado:</label>
	<input type="text" name="uf" value="<?=$linha["uf"]?>"/>

	<input type="hidden" name="Id_cidade_estado" value="<?=$linha["Id_cidade_estado"];?>"/>
	
	<input type="submit" value="Alterar"/>	
	<a href="exibe_cidade_estados.php">Voltar</a>
</form>