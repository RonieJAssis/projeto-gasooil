<?php
session_start();
	$cod=$_SESSION['cod'];
	
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'app';

$nomeP = $_POST['nomeP'];


$cnpj = $_POST['cnpj'];

$codB = $_POST['band']; 


if($nomeP == '' || $cnpj == '' || $codB == ''){
	echo"<script language='javascript' type='text/javascript'>alert('dados em branco!');window.location.href='../pgCadastroPosto.php';</script>";
	die;
}

$con = new mysqli($servidor, $usuario, $senha, $banco);

if ($con->connect_error) {
	echo"<script language='javascript' type='text/javascript'>alert('Erro de conexão com o banco de dados!');window.location.href='../pgCadastroPosto.php';</script>";
	die;
}

$sql = "INSERT INTO posto (cnpj,cod_adm,cod_band,nome_p) VALUES ('$cnpj','$cod','$codB','$nomeP')";

if (mysqli_query($con, $sql)) {
	echo"<script language='javascript' type='text/javascript'>alert('Cadastro de posto realizado com sucesso!');window.location.href='../pgMenuAdm.php';</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Nao foi possivel realizar o cadastro do posto!');window.location.href='../pgCadastroPosto.php';</script>";
	die;
}

mysqli_close($con);
?>

