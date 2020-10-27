<?php
    session_start();
	$cal=$_SESSION['cal'];
	$comb=$_SESSION['comb'];	
	
	function printFloatWithLeadingZeros($num, $precision = 2, $leadingZeros = 0){
    $decimalSeperator = ".";
    $adjustedLeadingZeros = $leadingZeros + mb_strlen($decimalSeperator) + $precision;
    $pattern = "%0{$adjustedLeadingZeros}{$decimalSeperator}{$precision}f";
    return sprintf($pattern,$num);
	}

	?>
	

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title> Gasooil </title>
	<link rel="stylesheet" type="text/css" href="Css/csspgPesquisa.css"/>
	<script src="JS/jquery-3.3.1.js"></script>
		<script src="JS/jspgMenuAdm.js"></script>
</head>
<body>

	<header>
		
	 <h1 align="center" id="titulo"> GASOOIL</h1>
	  <h2 align="center">COMPARADOR DE PRECOS DE COMBUSTIVEIS!</h2>	
	 </header>
	<div class="corpo">
	<h3 align="center">PESQUISA DOS MELHORES PREÇOS!</h3>
	
	

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
			if($comb==''){
				$result ="SELECT upper(nome_p),p.cod_posto x,nome_gas,valor from posto p,posto_gas pg,tipogas g where p.cod_posto = pg.cod_posto and pg.cod_tipogas = g.cod_tipogas order by valor asc"; 
				$select = mysqli_query($con,$result);
				while($row = mysqli_fetch_array($select)){
					echo '<div class="proc">';
					echo '<form action="Php/pegaPosto2.php" method="POST">';
					echo '<input type="hidden" id="post" name="post" value="'.$row['x'].'"/>';
					echo '<div class="inicio">';
					echo '<label>'.$row['upper(nome_p)'].'</label>';
					
					
					echo '</div>';
					echo '<div class="fim">';
					echo  '<label>'.$row['nome_gas'].'</label>';
					
					$val=$row['valor']*$cal;
					$val=printFloatWithLeadingZeros($val,3,4);
					$val= str_replace(".", ",", $val);
					
					
					echo '<label>R$ '.$val.'</label>';
	
					echo '<input type="submit" class="ver" value="VER"/>';
					echo '</div>';
					echo '</form>';
					echo '</div>';
				}
			}
			else{
				$result ="SELECT upper(nome_p),p.cod_posto x,nome_gas,valor from posto p,posto_gas pg,tipogas g where p.cod_posto = pg.cod_posto and pg.cod_tipogas = g.cod_tipogas and g.cod_tipogas = 1 order by valor asc"; 
				$select = mysqli_query($con,$result);
				while($row = mysqli_fetch_array($select)){
					echo '<div class="proc">';
					echo '<form action="Php/pegaPosto2.php" method="POST">';
					echo '<input type="hidden" id="post" name="post" value="'.$row['x'].'"/>';
					echo '<div class="inicio">';
					echo '<label>'.$row['upper(nome_p)'].'</label>';
					
					
					echo '</div>';
					echo '<div class="fim">';
					echo  '<label>'.$row['nome_gas'].'</label>';
					
					$val=$row['valor']*$cal;
					$val=printFloatWithLeadingZeros($val,3,4);
					$val= str_replace(".", ",", $val);
					
					
					echo '<label>R$ '.$val.'</label>';
	
					echo '<input type="submit" class="ver" value="VER"/>';
					echo '</div>';
					echo '</form>';
					echo '</div>';
				}	
			}

			mysqli_close($con);
		?>
	</div>
	</div>
	<div class="caixabtn">
	<a href="pgMenu.html"><input type="button" id="btn2" class="btn" value="VOLTAR"/></a> 
	</div>
	</div>
</body>
</html>
