<?php

session_start();
$post = $_POST['post'];

$_SESSION['post'] = $post;


echo"<script language='javascript' type='text/javascript'> window.location.href='../pgVerPosto.php'; </script>";

?>

