<?php
session_start();

$posto = $_SESSION['codpost'];
	
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'app';

$nomeP = $_POST['nomeP'];


$cnpj = $_POST['cnpj'];

$codB = $_POST['band']; 


if($nomeP == '' || $cnpj == '' || $codB == ''){
	echo"<script language='javascript' type='text/javascript'>alert('dados em branco!');window.location.href=''../pgMenuPosto.php'';</script>";
	die;
}

$con = new mysqli($servidor, $usuario, $senha, $banco);

if ($con->connect_error) {
	echo"<script language='javascript' type='text/javascript'>alert('Erro de conexão com o banco de dados!');window.location.href=''../pgMenuPosto.php'';</script>";
	die;
}

$sql = "UPDATE posto SET nome_p='$nomeP',cnpj=$cnpj,cod_band=$codB WHERE cod_posto=$posto";

if (mysqli_query($con, $sql)) {
	echo"<script language='javascript' type='text/javascript'>alert('Alteração do posto realizado com sucesso!');window.location.href='../pgMenuAdm.php';</script>";
} else {

    echo"<script language='javascript' type='text/javascript'>alert('Nao foi possivel realizar o alteração no posto!');window.location.href='../pgMenuPosto.php';</script>";
	die;
}

mysqli_close($con);
?>

