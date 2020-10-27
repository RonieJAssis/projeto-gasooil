<?php

session_start();
$post = $_POST['id'];

$_SESSION['codpost'] = $post;


echo"<script language='javascript' type='text/javascript'> window.location.href='../pgMenuPosto.php'; </script>";

?>

