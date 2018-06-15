<?php
include("cabecalho.php");
?>
<html>
	<head>
		<title>Pagina Detento/Prisão</title>
		<link rel="stylesheet" href="estilo.css">
	</head>


    <body background="detento_prisao.jpg">
	<div>
	<form method="POST" action="cadastra_detento_prisao.php">
		  <label>Detento</label>
		 
		  <select name="detento">
			<?php 
				include ("conexao.php");

				$select = "SELECT * FROM detento";

				$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
				
				
				echo "<option = value='nulo'>::Nome::</option>";
				while($linha = mysqli_fetch_array($resultado)){
					echo "<option value='". $linha["id_detento"] ."'>". $linha["nome_detento"] ."</option>";
				}
			?>
			</select>
		
		  <br/>
		  <label>Prisao</label>
		  <select name="prisao">
			<?php 
				include ("conexao.php");

				$select = "SELECT * FROM prisao";

				$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
				
				
				echo "<option = value='nulo'>::Prisao::</option>";
				while($linha = mysqli_fetch_array($resultado)){
					echo "<option value='". $linha["id_prisao"] ."'>". $linha["nome_prisao"] ."</option>";
				}
			?>
			</select>
			
		  
		<input type="submit" value="Enviar"/>
		<input type="reset" value="Limpar"/>
		</div>
	</body>
</html>