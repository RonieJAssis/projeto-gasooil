<?php
	session_start();
	
	$posto = $_SESSION['post'];
	
	
	$usuario = 'root';
	$servidor = 'localhost';
	$senha = '';
	$banco = 'app';
			
	$con = new mysqli($servidor, $usuario, $senha, $banco);
	$result ="SELECT upper(nome_p),cod_band,cnpj FROM posto WHERE cod_posto = $posto";
	$select = mysqli_query($con,$result);
	while($row = mysqli_fetch_array($select)){
		$nomeP = $row['upper(nome_p)'];
		$cnpj=$row['cnpj'];
		$band=$row['cod_band'];
	}
	
	$_SESSION['npost']=$nomeP;
	$_SESSION['cnpjpost']=$cnpj;
	
	$result ="SELECT upper(nome_band) FROM bandeira WHERE cod_band=$band";
	$select = mysqli_query($con,$result);
	while($row = mysqli_fetch_array($select)){
		$band = $row['upper(nome_band)'];
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title> Gasooil </title>
	<link rel="stylesheet" type="text/css" href="Css/csspgverPosto.css"/>
	<script src="JS/jquery-3.3.1.js"></script>
		<script src="JS/jspgMenuAdm.js"></script>
</head>
<body>

	<header>
		
	 <h1 align="center" id="titulo"> GASOOIL</h1>
	  <h2 align="center">COMPARADOR DE PRECOS DE COMBUSTIVEIS!</h2>	
	 </header>
	<div class="corpo">
	<h3 align="center">NOME DO POSTO: <?php echo $nomeP ?></h3>
	<h3 align="center">CNPJ DO POSTO: <?php echo $cnpj ?></h3>
	<h3 align="center">BANDEIRA DO POSTO: <?php echo $band ?></h3>
	<form action="Php/MenuAdm.php" method="POST">
	<div class="caixabtn">
	<a href="pgPesquisa.php"><input type="button" id="btn2" class="btn" value="VOLTAR"/></a> 
	</div>
	</form>
	<br>
	<br>
	<div class="ajuste">
		<div class="postos">
			<div class="titulo">	
				<label>TIPOS DE COMBUSTIVEIS</label>
			</div>	
			<?php
			$result ="SELECT upper(nome_gas),valor FROM posto_gas p,tipogas t WHERE cod_posto=$posto and p.cod_tipogas=t.cod_tipogas";
			$select = mysqli_query($con,$result);
			while($row = mysqli_fetch_array($select)){
				echo $row['upper(nome_gas)'];
				echo '<br>';
				echo 'R$';
				echo ' ';
				$valor=number_format($row['valor'], 3, ',','.');
				echo $valor;
				echo '<br>';
				echo '<br>';				

			}
		?>
		</div>
		
		<div class="postos">
			<div class="titulo">
				<label class="lbl">TIPOS DE PAGAMENTOS</label>
			</div>
			<?php
			$result ="SELECT upper(nome_tip_pag),t.cod_cart,p.cod_tippag x FROM posto_pag p,tipos_de_pagamento t WHERE cod_posto=$posto and p.cod_tippag=t.cod_tippag";
			$select = mysqli_query($con,$result);
			while($row = mysqli_fetch_array($select)){
				echo '<div class="pags">';
				echo $row['upper(nome_tip_pag)'];
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
	</div>
</body>
</html>
