<?php
	include("cabecalho.php");
	include ("conexao.php");
	
?>
	
	<form method='POST' action='exibe_cidade_estado.php'/>
		
			<label>Filtrar cidade/estado pelo nome que comece com:</label>
			<input type="text" name="letra"/>
			

			<input type='submit' value='Filtro'/>
			<input type='reset' value='Limpar'/>	
			
	</form>





<form name="ordenar" method='POST' action='exibe_cidade_estado.php'>
		<select name="ordenacao" onchange ="document.ordenar.submit()">
				<option>.:Ordenar por:.</option>
				<option value ="id_a_z">ID (A-Z)</option>
				<option value ="id_z_a">ID (Z-A)</option>
				<option value ="nome_a_z">NOME(A-Z)</option>
				<option value ="nome_z_a">NOME(Z-A)</option>
				<option value ="uf_a_z">UF(A-Z)</option>
				<option value ="uf_z_a">UF(Z-A)</option>
		</select>
	
</form>
<?php

		if(isset($_POST["filtro"])){
			$select = "SELECT * FROM cidade_estado WHERE nome_cidade LIKE '$_POST[filtro] %'";
			
		}else{
			$select = "SELECT * FROM cidade_estado";
		}
		session_start();
		  if(isset($_POST["ordenacao"]) || isset($_SESSION["ordenacao"])){
			  $_SESSION["ordenacao"] = $_POST["ordenacao"];
		  
		  switch($_SESSION["ordenacao"]){
			  case "id_a_z":
					$select .= " ORDER BY id_cidade_estado";
					break;
					
			  case "id_z_a":
					$select .= " ORDER BY id_cidade_estado DESC";
			  break;
			  
			  
			  case "nome_a_z":
					$select .= " ORDER BY nome_cidade";
			  break;
			  
			  case "nome_z_a":
					$select .= " ORDER BY nome_cidade DESC";
			  break;
			  
			  
			  case "uf_a_z":
					$select .= " ORDER BY uf";
			  break;
			  
			  case "uf_z_a":
					$select .= " ORDER BY uf DESC";
			  break;
			  
			  
			}
		  }
		
		 $resultado = mysqli_query($link, $select) or die(mysqli_error($link));
		
	echo "
		<table border='1'>
			<tr>
				<th>ID Cidade_Estado</th>
				<th>Nome Cidade</th>
				<th>Sigla</th>
				<th>Acao</th>
			</tr>
		";
	while($linha = mysqli_fetch_array($resultado)){
		echo "
			<tr>
				<td class='c'>$linha[Id_cidade_estado]</td>
				<td>$linha[nome_cidade]</td>
				<td class='c'>$linha[uf]</td>
				<td><a href='remover_cidade_estado.php?id=$linha[Id_cidade_estado]'>Remover</a>| <a href='alterar_cidade_estado.php?id=$linha[Id_cidade_estado]'>Alterar</a></td>
			</tr>
		";
	  }
			
	echo "</table>";
?>