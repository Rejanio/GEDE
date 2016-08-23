<?php

require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Nome = $_POST["nNome"];
$Usuario = $_POST["nUsuario"];
$Senha = $_POST["nSenha"];

conexao();

$sql_inserir = "UPDATE usuarios SET senha='$Senha' WHERE usuario=$Usuario";


mysql_query($sql_inserir) or die(" Não foi possivel inserir o novo usuário no sistema: " . mysql_error());

echo '<img id="home" src="imagens/safebox.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=menu_mais.php");
?>