<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title> Gasooil </title>
	<link rel="stylesheet" type="text/css" href="Css/csspgCadastroComb.css"/>
	<script src="JS/jquery-3.3.1.js"></script>
		<script src="JS/jspgCadastro.js"></script>
</head>
<body>

	<header>
		
	 <h1 align="center" id="titulo"> GASOOIL</h1>
	  <h2 align="center">COMPARADOR DE PRECOS DE COMBUSTIVEIS!</h2>	
	 </header>
	<label></label> 
	<div class="corpo">
	<form action="Php/CadastroComb.php" method="POST">
	<div class="text">Valor</div>
	<div class="mid">
		<label class="s">R$</label>
		<input type="number" step=".001" style="text-align: center;" id="val" name="val"/>
		
	</div>
	<div class="ajuste">
	<div class="bands">
		<?php
			$servidor = 'localhost';
			$usuario = 'root';
			$senha = '';
			$banco = 'app';
			
			$con = new mysqli($servidor, $usuario, $senha, $banco);
			$result ="SELECT upper(nome_gas),cod_tipogas FROM tipogas";
			$select = mysqli_query($con,$result);
			while($row = mysqli_fetch_array($select)){
				echo '<div class="it">';
				echo '<input type="radio" id="comb" name="comb" value="'.$row['cod_tipogas'].'"/>'.$row['upper(nome_gas)'];
				echo '</div>';
			}
			mysqli_close($con);
		?>
	</div>
	</div>
	<br>
	<div class="caixabtn">
		<a href="pgMenuPosto.php"><input type="button" id="btn2" class="btn" value="VOLTAR"/></a> 
		<input type="submit" id="btn1" class="btn" value="CADASTRAR"/> 
	</div>
	</form>
	</div>
</body>
</html>
