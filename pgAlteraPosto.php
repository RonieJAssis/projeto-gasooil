<?php
    session_start();
	$posto = $_SESSION['codpost'];
	$nposto = $_SESSION['npost'];
	$cnpj = $_SESSION['cnpjpost'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title> Gasooil </title>
	<link rel="stylesheet" type="text/css" href="Css/csspgCadastroPosto.css"/>
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
	<form action="Php/AlteraPosto.php" method="POST">
	<div class="text">NOME DO POSTO</div>
	<div class="mid">
		<input type="text" style="text-align: center;" id="nomeP" name="nomeP" value=<?php echo '"'.$nposto.'"' ?>/>
	</div>
	<div class="text">CNPJ</div>
	<div class="mid">
		<input type="text" style="text-align: center;" id ="cnpj" name ="cnpj" value=<?php echo '"'.$cnpj.'"' ?>/>
	</div>
	
	<div class="ajuste">
	<div class="bands">
		<?php
			$servidor = 'localhost';
			$usuario = 'root';
			$senha = '';
			$banco = 'app';
			
			$con = new mysqli($servidor, $usuario, $senha, $banco);
			$result ="SELECT upper(nome_band),cod_band FROM bandeira";
			$select = mysqli_query($con,$result);
			while($row = mysqli_fetch_array($select)){
				echo '<div class="it">';
				echo '<input type="radio" id="band" name="band" value="'.$row['cod_band'].'"/>'.$row['upper(nome_band)'];
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
