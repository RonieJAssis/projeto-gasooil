<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'app';

$nome = $_POST['nome'];

$email = $_POST['email'];

$telefone = $_POST['tel'];

$cpf = $_POST['cpf'];

$senhaa = $_POST['senha'];
$senha1 = $_POST['senha1'];

if($nome=='' || $email=='' || $telefone=='' || $cpf=='' || $senhaa==''){
	echo"<script language='javascript' type='text/javascript'>alert('dados em branco!');window.location.href='../pgCadastro.html';</script>";
	die;
}
if($senhaa != $senha1 ){
	echo"<script language='javascript' type='text/javascript'>alert('senhas inconpativeis!');window.location.href='../pgCadastro.html';</script>";
	die;
}
$con = new mysqli($servidor, $usuario, $senha, $banco);

if ($con->connect_error) {
	echo"<script language='javascript' type='text/javascript'>alert('Erro de conexão com o banco de dados!');window.location.href='../pgCadastro.html';</script>";
	die;
}

$query_select = "SELECT email FROM adm WHERE email = '$email'";
$select = mysqli_query($con,$query_select);
$array = mysqli_fetch_array($select);
$emarray = $array['email'];

if($emarray == $email){
        echo"<script language='javascript' type='text/javascript'>alert('Esse e-mail já existe!');window.location.href='../pgCadastro.html';</script>";
        die();
}

$sql = "INSERT INTO adm (nome,cpf,tel,email,senha) VALUES ('$nome','$cpf','$telefone','$email','$senhaa')";

if (mysqli_query($con, $sql)) {
	echo"<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso!');window.location.href='../pgMenu.html';</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Nao foi possivel realizar o cadastro!');window.location.href='../pgCadastro.html';</script>";
	die;
}

mysqli_close($con);
?>

