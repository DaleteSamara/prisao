<?php
	session_start();
	include ("conexao.php");
	include("cabecalho.php");
?>
	<form method='POST' action='exibe_prisao.php'/>
		
			<label>Filtrar pelo nome que comece com:</label>
			<input type="text" name="filtro"/>
			

			<input type='submit' value='Filtro'/>
			<input type='reset' value='Limpar'/>	
			
	</form>
<form name="ordenar" method='POST' action='exibe_prisao.php'>
		<select name="ordenacao_prisao" onchange ="document.ordenar.submit()">
				<option>.:Ordenar por:.</option>
				<option value ="id_a_z">ID (A-Z)</option>
				<option value ="id_z_a">ID (Z-A)</option>
				<option value ="nome_a_z">NOME(A-Z)</option>
				<option value ="nome_z_a">NOME(Z-A)</option>
		</select>
	
</form>
<?php

		if(isset($_POST["filtro"])){
			$condicao = " WHERE nome_prisao LIKE '$_POST[filtro]%'";
			
		}else{
			$condicao = "";
		}
		session_start();
		  if(isset($_POST["ordenacao_prisao"]) || isset($_SESSION["ordenacao_prisao"])){
			  if($_POST["ordenacao_prisao"]){
				$_SESSION["ordenacao_prisao"] = $_POST["ordenacao_prisao"];
			  }
			  
		  switch($_SESSION["ordenacao_prisao"]){
			  case "id_a_z":
					$condicao .= " ORDER BY id_prisao";
					break;
					
			  case "id_z_a":
					$condicao .= " ORDER BY id_prisao DESC";
			  break;
			  
			  
			  case "nome_a_z":
					$condicao .= " ORDER BY nome_prisao";
			  break;
			  
			  case "nome_z_a":
					$condicao .= " ORDER BY nome_prisao DESC";
			  break;
		
			  
			  
			}
		  }
		
		 $select = "SELECT * FROM view_prisao $condicao";
		 $resultado = mysqli_query($link, $select) or die(mysqli_error($link));
		
	echo "
		<table border='1'>
			<tr>
				<th>ID Prisao</th>
				<th>Nome Prisao</th>
				<th>cod_cidade_estado</th>				
				<th>Acao</th>
			</tr>
		";
	while($linha = mysqli_fetch_array($resultado)){
		echo "
			<tr>
				<td class='c'>$linha[id_prisao]</td>
				<td>$linha[nome_prisao]</td>
				<td class='c'>$linha[nome_cidade]/$linha[uf]</td>				
				<td><a href='remover_prisao.php?id=$linha[id_prisao]'>Remover</a>| 
				<a href='alterar_prisao.php?id=$linha[id_prisao]'>Alterar</a></td>
			</tr>
		";
	}
			
		echo "</table>";
?>








