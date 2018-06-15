<?php
include ("conexao.php");
include("cabecalho.php");
?>

	<form method='POST' action='exibe_detento.php'/>
		
			<label>Filtrar pelo nome que comece com:</label>
			<input type="text" name="filtro"/>
			

			<input type='submit' value='Filtro'/>
			<input type='reset' value='Limpar'/>	
			
	</form>

<form name="ordenar" method='POST' action='exibe_detento.php'>
		<select name="ordenacao_detento" onchange ="document.ordenar.submit()">
				<option>.:Ordenar por:.</option>
				<option value ="id_a_z">ID (A-Z)</option>
				<option value ="id_z_a">ID (Z-A)</option>
				<option value ="nome_a_z">NOME(A-Z)</option>
				<option value ="nome_z_a">NOME(Z-A)</option>
		</select>
	
</form>
<?php

		if(isset($_POST["filtro"])){
			$condicao = " WHERE nome_detento LIKE '$_POST[filtro] %'";
			
		}else{
			$condicao = "";
		}
		session_start();
		  if(isset($_POST["ordenacao_detento"]) || isset($_SESSION["ordenacao_detento"])){
			  $_SESSION["ordenacao_detento"] = $_POST["ordenacao_detento"];
		  
		  switch($_SESSION["ordenacao_detento"]){
			  case "id_a_z":
					$condicao .= " ORDER BY id_detento";
					break;
					
			  case "id_z_a":
					$condicao .= " ORDER BY id_detento DESC";
			  break;
			  
			  
			  case "nome_a_z":
					$condicao .= " ORDER BY nome_detento";
			  break;
			  
			  case "nome_z_a":
					$condicao .= " ORDER BY nome_detento DESC";
			  break;
		
			  
			  
			}
		  }
		
		 $select "SELECT * FROM detento $condicao";
		 $resultado = mysqli_query($link, $select) or die(mysqli_error($link));
		
	echo "
		<table border='1'>
			<tr>
				<th>id_detento</th>
				<th>nome_detento</th>
				<th>idade</th>
				<th>cidade/estado</th>				
				<th>motivo da prisao</th>
				<th>foto</th>
				<th>Acao</th>
			</tr>
		";
	while($linha = mysqli_fetch_array($resultado)){
		echo "
			<tr>
				<td class='c'>$linha[id_detento]</td>
				<td>$linha[nome_detento]</td>
				<td class='c'>$linha[idade]</td>
				<td>$linha[cod_cidade_estado]</td>
				<td class='c'>$linha[motivo]</td>
				<td>$linha[foto]</td>			
				<td class='c'><a href='remover_detento.php?id=$linha[id_detento]'>Remover</a>|
				<a href='alterar_detento.php?id=$linha[id_detento]'>Alterar</a></td>
			</tr>
		";
	}
			
		echo "</table>";
?>








