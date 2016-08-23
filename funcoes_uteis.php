<?php

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

function conexao() {
    $banco = 'uefsbasepei';
    $usuario = 'root';
    $senha = 'g1e2d3e4';
    $host = 'localhost';
    $conex = mysql_connect($host, $usuario, $senha);
    mysql_select_db($banco, $conex) or die("Não foi possivel conectar ao banco: " . mysql_error());
}

function seleciona($sql){	
	return mysql_query($sql);
}

function porcentagem( $porcentagem, $total ) {
	return ( $porcentagem / 100 ) * $total;
}

function download($arquivo){
      header("Content-Type: application/force-download");
      header("Content-Type: application/octet-stream;");
      header("Content-Length:".filesize($arquivo));
      header("Content-disposition: attachment; filename=".$arquivo);
      header("Pragma: no-cache");
      header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
      header("Expires: 0");
      readfile($arquivo);
      flush();
}

?>
