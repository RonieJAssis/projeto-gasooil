<?php
session_start();
	$posto = $_SESSION['codpost'];
	
	$servidor = 'localhost';
	$usuario = 'root';
	$senha = '';
	$banco = 'app';



	$codP = $_POST['pag']; 


if($codP == ''){
	echo"<script language='javascript' type='text/javascript'>alert('dados em branco!');window.location.href='../pgMenuPosto.php';</script>";
	die;
}

$con = new mysqli($servidor, $usuario, $senha, $banco);

if ($con->connect_error) {
	echo"<script language='javascript' type='text/javascript'>alert('Erro de conexão com o banco de dados!');window.location.href='../pgMenuPosto.php';</script>";
	die;
}

$sql = "INSERT INTO posto_pag (cod_tippag,cod_posto) VALUES ('$codP','$posto')";

if (mysqli_query($con, $sql)) {
	echo"<script language='javascript' type='text/javascript'>alert('Cadastro de pagamento realizado com sucesso!');window.location.href='../pgMenuPosto.php';</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Nao foi possivel realizar o cadastro do pagamento!');window.location.href='../pgMenuPosto.php';</script>";
	die;
}

mysqli_close($con);
?>

