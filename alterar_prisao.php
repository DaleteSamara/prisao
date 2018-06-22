<?php
 include ("conexao.php");
 
 $sql  = "SELECT * FROM prisao WHERE id_prisao=".$_GET["id"];
 $resultado = mysqli_query($link, $sql) or die(mysqli_error($link));
 
 $linha = mysqli_fetch_array($resultado) 
?>
<html>
    
		<form method="POST" action="alterando_prisao.php">
          <div>
			<br/><br/><br/>	
			<label>Nome Prisao:</label>
			<input type="text" name="nome_prisao" value ="<?=$linha["nome_prisao"]?>"><br/>
			
			<label>Cidade/Estado:</label>
			<select name="cidade_estado" value ="<?=$linha["cidade_estado"]?>">
			<?php 
				include ("conexao.php");

				$select = "SELECT * FROM cidade_estado";

				$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
				
				
				echo "<option = value='nulo'>::Cidade/Estado::</option>";
				while($linha = mysqli_fetch_array($resultado)){
					echo "<option value='". $linha['Id_cidade_estado'] ."'>". $linha['nome_cidade'] ."</option>";
				}
			?>
		<input type="hidden" name="id_prisao" value="<?=$linha["id_prisao"];?>"/>
		
			<input type="submit" value="Alterar"/>	
			<a href="exibe_prisao.php">Voltar</a>
		 </div>	
		</form>	
	</body>
</html>
		