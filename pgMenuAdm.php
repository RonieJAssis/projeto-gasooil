<?php
    session_start();
	$nome=$_SESSION['nome'];
	$cod=$_SESSION['cod'];	
	?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title> Gasooil </title>
	<link rel="stylesheet" type="text/css" href="Css/csspgMenuAdm.css"/>
	<script src="JS/jquery-3.3.1.js"></script>
		<script src="JS/jspgMenuAdm.js"></script>
</head>
<body>

	<header>
		
	 <h1 align="center" id="titulo"> GASOOIL</h1>
	  <h2 align="center">COMPARADOR DE PRECOS DE COMBUSTIVEIS!</h2>	
	 </header>
	<div class="corpo">
	<h3 align="center">BEM VINDO(A) <?php echo $nome ?>#<?php echo $cod ?> !</h3>
	
	<div class="caixabtn">
	<a href="pgMenu.html"><input type="button" id="btn2" class="btn" value="SAIR"/></a> 
	<a href="pgCadastroPosto.php"><input type="button" id="btn1" class="btn" value="NOVO POSTO"/></a> 
	</div>

	<br>
	<br>
	<div class="ajuste">
	<div class="postos">
		<?php
			$servidor = 'localhost';
			$usuario = 'root';
			$senha = '';
			$banco = 'app';
			
			$con = new mysqli($servidor, $usuario, $senha, $banco);
			$result ="SELECT cod_posto,upper(nome_p) FROM posto WHERE cod_adm=$cod";
			$select = mysqli_query($con,$result);
			while($row = mysqli_fetch_array($select)){
				echo '<form action="php/pegaPosto.php" method="POST">';
				echo '<input type="hidden" id="id" name="id" value="'.$row['cod_posto'].'"/>';
				echo '<input type="submit" class="nomes" value="'.$row['upper(nome_p)'].'"/>'; 
				echo '</form>';
			}
			mysqli_close($con);
		?>
	</div>
	</div>
	</div>
</body>
</html>
