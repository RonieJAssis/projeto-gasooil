	<?php
session_start();
	$posto = $_SESSION['codpost'];
	
	$servidor = 'localhost';
	$usuario = 'root';
	$senha = '';
	$banco = 'app';



	$codC = $_POST['id']; 



$con = new mysqli($servidor, $usuario, $senha, $banco);

if ($con->connect_error) {
	echo"<script language='javascript' type='text/javascript'>alert('Erro de conexão com o banco de dados!');window.location.href='../pgMenuPosto.php';</script>";
	die;
}

	$sql = "DELETE FROM posto_gas WHERE cod_posto=$posto and cod_tipogas = $codC";

if (mysqli_query($con, $sql)) {
	echo"<script language='javascript' type='text/javascript'>alert('Exclusão de combustivel realizado com sucesso!');window.location.href='../pgMenuPosto.php';</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Nao foi possivel realizar a exclusão do combustivel!');window.location.href='../pgMenuPosto.php';</script>";
	die;
}

mysqli_close($con);
?>

