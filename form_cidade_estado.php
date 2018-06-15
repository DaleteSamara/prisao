<?php
include("cabecalho.php");
?>
<html>

	<head>
		<title>Pagina Cidade/Estado</title>
		<link rel="stylesheet" href="estilo.css">
	</head>
	
    <body background ="cidade_estado.jpg">		
		<form method="POST" action="cadastra_cidade_estado.php">
		<div>
			<label>Nome Cidade: </label>
			<input type="text" name="nome_cidade" placeholder="Digite aqui o nome da cidade" />

			<label>Estado:</label>
			<input type="text" name="uf" placeholder="Digite aqui a sigla do estado">

			<input type="submit" value="Enviar"/>	
		</div>
		</form>
    </body>
	
</html>		