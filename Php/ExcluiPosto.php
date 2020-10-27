<?php
session_start();

$post = $_SESSION['codpost'];

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'app';

$con = new mysqli($servidor, $usuario, $senha, $banco);

$sql = "DELETE FROM posto WHERE cod_posto=$post";

if (mysqli_query($con, $sql)) {
    
	echo"<script language='javascript' type='text/javascript'>alert('Posto excluido!');window.location.href='../pgMenuAdm.php';</script>";
} else {
	
    echo"<script language='javascript' type='text/javascript'>alert('Erro ao exluir posto!');window.location.href='../pgMenuPosto.php';</script>";
}

?>

