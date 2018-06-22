<?php
	include ("conexao.php");
	include("cabecalho_tabelas.php");
	
	$sql = "SELECT * FROM view_detento_prisao WHERE id_detento_prisao=".$_GET["id"];
	
	$resultado = mysqli_query($link, $sql) or die(mysqli_error($link));
	
	$linha = mysqli_fetch_array($resultado);
	$aux = $_GET["id"];
?>


	
<form method="POST" action="alterando_detento_prisao.php">
	<br/><br/><br/>
	
	<label>Prisao Nova:</label>
	<select name="prisao">
		<?php 
			include ("conexao.php");

			$select = "SELECT * FROM prisao";

			$resultado1 = mysqli_query($link, $select) or die(mysqli_error($link));
			
			
			echo "<option = value='nulo'>::Prisao::</option>";
			while($linha1 = mysqli_fetch_array($resultado1)){
				echo "<option value='". $linha1['id_prisao'] ."'>". $linha1['nome_prisao'] ."</option>";
			}
		?>
	</select>

	<input type="hidden" name="id_prisao" value="<?=$aux;?>"/>
	
	<input type="submit" value="Alterar"/>	
	<a href="exibe_detento_prisao.php">Voltar</a>
</form>

