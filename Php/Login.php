<?php
session_start();
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'app';


$email = $_POST['email'];

$senhaa = $_POST['senha'];



$con = new mysqli($servidor, $usuario, $senha, $banco);

if ($con->connect_error) {
	echo"<script language='javascript' type='text/javascript'>alert('Erro de conexão com o banco de dados!');window.location.href='../pgLogin.html';</script>";
	die;
}

$query_select = "SELECT upper(nome),cod_adm FROM adm WHERE email = '$email' and senha='$senhaa'";
$select = mysqli_query($con,$query_select);
$array = mysqli_fetch_array($select);
$result = $array['upper(nome)'];
$cod = $array['cod_adm'];


	if(!$result){
		echo"<script language='javascript' type='text/javascript'>alert('Usuario e/ou senha invalido!');window.location.href='../pgLogin.html';</script>";
        die();
	}
	else{
		$_SESSION['nome'] = $result;
		$_SESSION['cod'] = $cod;
		echo"<script language='javascript' type='text/javascript'> window.location.href='../pgMenuAdm.php'; </script>";
        die();
	}


mysqli_close($con);
?>

