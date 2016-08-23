<?php

require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

conexao();


$sql_seleciona = "DELETE FROM docente WHERE id= '" . $Id . "'";
mysql_query($sql_seleciona) or die("Não foi possivel excluir:  " . mysql_error());

echo '<img id="home" src="imagens/lixo.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro deletado com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 2 segundos...</h3>';

header("refresh: 2; url=menu_professores.php");
?>