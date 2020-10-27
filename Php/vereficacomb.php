<?php

session_start();

$cc = $_POST['cc'];

$dv = $_POST['dv'];

$codC = $_POST['comb'];

$cpf = $_POST['cpf'];



if($cc=='' || $dv=='' || $cc<=1 || $dv<=1 ){
	$cal=1;
}
else{
	$cal=$dv/$cc;
}

$_SESSION['cal'] = $cal;
$_SESSION['comb'] = $codC;

echo"<script language='javascript' type='text/javascript'> window.location.href='../pgPesquisa.php'; </script>";

?>

