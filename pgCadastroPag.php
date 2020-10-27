<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title> Gasooil </title>
	<link rel="stylesheet" type="text/css" href="Css/csspgCadastroPag.css"/>
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
	<form action="Php/CadastroPag.php" method="POST">
		<?php
			$servidor = 'localhost';
			$usuario = 'root';
			$senha = '';
			$banco = 'app';
			
			$con = new mysqli($servidor, $usuario, $senha, $banco);
			$result ="SELECT upper(nome_tip_pag),cod_tippag,cod_cart FROM tipos_de_pagamento";
			$select = mysqli_query($con,$result);
			while($row = mysqli_fetch_array($select)){
				echo '<div class="it">';
				echo '<input type="radio" id="pag" name="pag" value="'.$row['cod_tippag'].'"/>'.$row['upper(nome_tip_pag)'];
				$codc=$row['cod_cart'];
				if($codc > 0){
					$result2 ="SELECT upper(nome_car)FROM cartao c WHERE cod_cart=$codc";
					$select2 = mysqli_query($con,$result2);
					while($row2 = mysqli_fetch_array($select2)){
						echo '('.$row2['upper(nome_car)'].')';
					}
				}
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
