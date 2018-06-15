<?php
include("cabecalho.php");
?>
<html>
	<head>
		<title>Pagina do detento</title>
		<link rel="stylesheet" href="estilo.css">
	</head>

   <body background="detento.jpg">
		<form method="POST" action="cadastra_detento.php">	
		<div class="a">
             <label for="foto">Foto:</label>
			<input type="file" name="foto" id="foto" accept="image/*" /><br/><br/>
		
			
		
			<label>Nome</label>
			<input type="text" name="nome_detento"/> <br/><br/>
			
			<label>Idade</label>
			<input type="number" name="idade" min="1"/> <br/> <br/>
			
			<label>Motivo da sua prisao</label>
			<textarea name="motivo" placeholder="Coloque aqui o motivo da prisao"></textarea> <br/>	<br/>
			
			
			
			<label>Cidade/Estado:</label>
			<select name="cidade_atual" >
			<?php 
				include ("conexao.php");

				$select = "SELECT * FROM cidade_estado";

				$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
				
				
				echo "<option = value='nulo'>::Cidade/Estado::</option>";
				while($linha = mysqli_fetch_array($resultado)){
					echo "<option value='". $linha['Id_cidade_estado'] ."'>". $linha['nome_cidade'] ."</option>";
				}
			?><br/><br/>
			
			
			
			<input type="submit" value="Enviar"/>
			<input type="reset" value="Limpar"/>
		 </div>	
		</form>	
	</body>
</html>