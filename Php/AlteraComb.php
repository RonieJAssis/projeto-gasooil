<?php
session_start();

$posto = $_SESSION['codpost'];
	
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'app';

$val = $_POST['valor'];
$codC = $_POST['id']; 


if($val==''){
	echo"<script language='javascript' type='text/javascript'>alert('dados em branco!');window.location.href=''../pgMenuPosto.php'';</script>";
	die;
}

$con = new mysqli($servidor, $usuario, $senha, $banco);

if ($con->connect_error) {
	echo"<script language='javascript' type='text/javascript'>alert('Erro de conexão com o banco de dados!');window.location.href=''../pgMenuPosto.php'';</script>";
	die;
}

$sql = "UPDATE posto_gas SET valor='$val' WHERE cod_posto=$posto and cod_tipogas=$codC";

if (mysqli_query($con, $sql)) {
	echo"<script language='javascript' type='text/javascript'>alert('Alteração de valor realizado com sucesso!');window.location.href='../pgMenuPosto.php';</script>";
} else {

    echo"<script language='javascript' type='text/javascript'>alert('Nao foi possivel realizar o alteração no valor!');window.location.href='../pgMenuPosto.php';</script>";
	die;
}

mysqli_close($con);
?>

