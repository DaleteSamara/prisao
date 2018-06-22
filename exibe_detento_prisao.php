<?php
	session_start();
	include ("conexao.php");
	include("cabecalho_tabelas.php");
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
			$condicao = " WHERE id_detento_prisao LIKE '$_POST[filtro]%'";
			
		}else{
			$condicao = "";
		}
		
		  if(isset($_POST["ordenacao_detento_prisao"]) || isset($_SESSION["ordenacao_detento_prisao"])){
			  if($_POST["ordenacao_detento_prisao"]){
				$_SESSION["ordenacao_detento_prisao"] = $_POST["ordenacao_detento_prisao"];
			  }
			  
		  switch($_SESSION["ordenacao_detento_prisao"]){
			  case "id_a_z":
					$condicao .= " ORDER BY id_detento_prisao";
					break;
					
			  case "id_z_a":
					$condicao .= " ORDER BY id_detento_prisao DESC";
			  break;
			  	  
			}
		  }
		
		 $select = "SELECT * FROM view_detento_prisao $condicao";
		 $resultado = mysqli_query($link, $select) or die(mysqli_error($link));
		
	echo "
		<table border='1'>
			<tr>
				<th>ID Detento/Prisao</th>
				<th>Detento</th>
				<th>Idade</th>
				<th>Motivo</th>
				<th>Prisao</th>				
				<th>Acao</th>
			</tr>
		";
	while($linha = mysqli_fetch_array($resultado)){
		echo "
			<tr>
				<td class='c'>$linha[id_detento_prisao]</td>
				<td>$linha[nome_detento]</td>
				<td class='c'>$linha[idade]</td>
				<td>$linha[motivo]</td>				
				<td class='c'>$linha[nome_prisao]</td>				
				<td><a href='remover_detento_prisao.php?id=$linha[id_detento_prisao]'>Remover</a>|
				<a href='alterar_detento_prisao.php?id=$linha[id_detento_prisao]'>Alterar</a></td>
			</tr>
		";
	}
			
		echo "</table>";
?>








