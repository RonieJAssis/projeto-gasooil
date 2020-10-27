<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title> Gasooil </title>
	<link rel="stylesheet" type="text/css" href="Css/csspgConsumo.css"/>
	<script src="JS/jquery-3.3.1.js"></script>
		<script src="JS/jspgConsumo.js"></script>
</head>
<body>

	<header>
		
	 <h1 align="center" id="titulo"> GASOOIL</h1>
	  <h2 align="center">COMPARADOR DE PRECOS DE COMBUSTIVEIS!</h2>	
	 </header>
	<div class="corpo">
	<form action="Php/vereficacomb.php" method="POST">
	<div class="text">CONSUMO DO CARRO</div>
	<div class="mid">
		<input type="number" style="text-align: center;" step="0.01" id="cc" name="cc"/>
		<label>KM/L</label>
		
	</div>
	<div class="text">DISTANCIA DA VIAGEM</div>
	<div class="mid">
		<input type="number" style="text-align: center;" step="0.01" id="dv" name="dv"/>
		<label>KM</label>
	</div>
	
	<div class="ajuste">
	<div class="text">TIPO DE COMBUSTIVEL</div>
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
	
	<a href=#><input type="submit" id="btn1" class="btn" value="CONFIRMAR"/> </a>
	</form>
	</div>
</body>
</html>