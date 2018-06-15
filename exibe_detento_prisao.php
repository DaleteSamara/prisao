<?php
include ("conexao.php");
include("cabecalho.php");
?>
<form name="ordenar" method='POST' action='exibe_detento_prisao.php'>
		<select name="ordenacao_detento_prisao" onchange ="document.ordenar.submit()">
				<option>.:Ordenar por:.</option>
				<option value ="id_a_z">ID (A-Z)</option>
				<option value ="id_z_a">ID (Z-A)</option>
		</select>
	
</form>
<?php

		if(isset($_POST["filtro"])){
			$select = "SELECT * FROM detento_prisao WHERE id_detento_prisao_prisao LIKE '$_POST[filtro] %'";
			
		}else{
			$select = "SELECT * FROM detento_prisao";
		}
		session_start();
		  if(isset($_POST["ordenacao_detento_prisao"]) || isset($_SESSION["ordenacao_detento_prisao"])){
			  $_SESSION["ordenacao_detento_prisao"] = $_POST["ordenacao_detento_prisao"];
		  
		  switch($_SESSION["ordenacao_detento_prisao"]){
			  case "id_a_z":
					$select .= " ORDER BY id_detento_prisao";
					break;
					
			  case "id_z_a":
					$select .= " ORDER BY id_detento_prisao DESC";
			  break;
			  	  
			}
		  }
		
		 $resultado = mysqli_query($link, $select) or die(mysqli_error($link));
		
	echo "
		<table border='1'>
			<tr>
				<th>Cod_Detento</th>
				<th>id_detento_prisao</th>
				<th>cod_prisao</th>				
				<th>Acao</th>
			</tr>
		";
	while($linha = mysqli_fetch_array($resultado)){
		echo "
			<tr>
				<td class='c'>$linha[cod_detento]</td>
				<td>$linha[id_detento_prisao]</td>
				<td class='c'>$linha[cod_prisao]</td>				
				<td><a href='remover_detento.php?id=$linha[id_detento_prisao]'>Remover</a>| <a href='alterar_detento.php?id=$linha[id_detento_prisao]'>Alterar</a></td>
			</tr>
		";
	}
			
		echo "</table>";
?>








