<?php
include("cabecalho.php");
?>
<html>
	<head>
		<title>Pagina Prisão</title>
		<link rel="stylesheet" href="estilo.css">
	</head>
	
    <body background="pc.jpg">
		<form method="POST" action="cadastra_prisao.php">
          <div>		
			<label>Nome Prisao:</label>
			<input type="text" name="nome_prisao"/> <br/>
			
			<label>Cidade/Estado:</label>
			<select name="cidade_estado">
			<?php 
				include ("conexao.php");

				$select = "SELECT * FROM cidade_estado";

				$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
				
				
				echo "<option = value='nulo'>::Cidade/Estado::</option>";
				while($linha = mysqli_fetch_array($resultado)){
					echo "<option value='". $linha['Id_cidade_estado'] ."'>". $linha['nome_cidade'] ."</option>";
				}
			?>
			</select>
			
			<input type="submit" value="Enviar"/>
			<input type="reset" value="Limpar"/>
		 </div>	
		</form>	
	</body>
</html>
		