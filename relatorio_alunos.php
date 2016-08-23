<?php
session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}

require_once('funcoes_uteis.php');

header("refresh: 1; url=home.php");


$ListaCursos = $_POST["nListaCursos"];

$Masculino = isset($_POST["nMasculino"]) ? $_POST["nMasculino"] : "null";
$Feminino = isset($_POST["nFeminino"]) ? $_POST["nFeminino"] : "null";

$Branca = isset($_POST["nBranca"]) ? $_POST["nBranca"] : "null";
$Preta = isset($_POST["nPreta"]) ? $_POST["nPreta"] : "null";
$Parda = isset($_POST["nParda"]) ? $_POST["nParda"] : "null";
$Amarela = isset($_POST["nAmarela"]) ? $_POST["nAmarela"] : "null";
$Indigina = isset($_POST["nIndigina"]) ? $_POST["nIndigina"] : "null";
$NaoDeclarado = isset($_POST["nNaoDeclarado"]) ? $_POST["nNaoDeclarado"] : "null";

$Brasileira = isset($_POST["nBrasileira"]) ? $_POST["nBrasileira"] : "null";
$Nacionalidade = isset($_POST["nNaturalizado"]) ? $_POST["nNaturalizado"] : "null";
$Estrangeiro = isset($_POST["nEstrangeiro"]) ? $_POST["nEstrangeiro"] : "null";

$ComDeficiencia = isset($_POST["nComDeficiencia"]) ? $_POST["nComDeficiencia"] : "null";
$SemDeficiencia = isset($_POST["nSemDeficiencia"]) ? $_POST["nSemDeficiencia"] : "null";

$Cursando = isset($_POST["nCursando"]) ? $_POST["nCursando"] : "null";
$Formado = isset($_POST["nFormado"]) ? $_POST["nFormado"] : "null";
$MatriculaTrancada = isset($_POST["nMatriculaTrancada"]) ? $_POST["nMatriculaTrancada"] : "null";
$Falecido = isset($_POST["nFalecido"]) ? $_POST["nFalecido"] : "null";
$Desvinculado = isset($_POST["nDesvinculado"]) ? $_POST["nDesvinculado"] : "null";
$Transferido = isset($_POST["nTransferido"]) ? $_POST["nTransferido"] : "null";

$Matutino = isset($_POST["nMatutino"]) ? $_POST["nMatutino"] : "null";
$Vespertino = isset($_POST["nVespertino"]) ? $_POST["nVespertino"] : "null";
$Noturno = isset($_POST["nNoturno"]) ? $_POST["nNoturno"] : "null";
$Integral = isset($_POST["nIntegral"]) ? $_POST["nIntegral"] : "null";

$Vestibular = isset($_POST["nVestibular"]) ? $_POST["nVestibular"] : "null";
$Enem = isset($_POST["nEnem"]) ? $_POST["nEnem"] : "null";
$Seriada = isset($_POST["nSeriada"]) ? $_POST["nSeriada"] : "null";
$Simplificada = isset($_POST["nSimplificada"]) ? $_POST["nSimplificada"] : "null";
$Transferencia = isset($_POST["nTransferencia"]) ? $_POST["nTransferencia"] : "null";
$Convenio = isset($_POST["nConvenio"]) ? $_POST["nConvenio"] : "null";
$Judicial = isset($_POST["nJudicial"]) ? $_POST["nJudicial"] : "null";
$Remanescentes = isset($_POST["nRemanescentes"]) ? $_POST["nRemanescentes"] : "null";
$VagasEspeciais = isset($_POST["nVagasEspeciais"]) ? $_POST["nVagasEspeciais"] : "null";

$ReservaEtico = isset($_POST["nReservaEtico"]) ? $_POST["nReservaEtico"] : "null";
$ReservaDeficiencia = isset($_POST["nReservaDeficiencia"]) ? $_POST["nReservaDeficiencia"] : "null";
$ReservaPublica = isset($_POST["nReservaPublica"]) ? $_POST["nReservaPublica"] : "null";
$ReservaSocial = isset($_POST["nReservaSocial"]) ? $_POST["nReservaSocial"] : "null";
$ReservaOutro = isset($_POST["nReservaOutro"]) ? $_POST["nReservaOutro"] : "null";

$ApoioAlimentacao = isset($_POST["nApoioAlimentacao"]) ? $_POST["nApoioAlimentacao"] : "null";
$ApoioMoradia = isset($_POST["nApoioMoradia"]) ? $_POST["nApoioMoradia"] : "null";
$ApoioTransporte = isset($_POST["nApoioTransporte"]) ? $_POST["nApoioTransporte"] : "null";
$ApoioDidatico = isset($_POST["nApoioDidatico"]) ? $_POST["nApoioDidatico"] : "null";
$ApoioTrabalho = isset($_POST["nApoioTrabalho"]) ? $_POST["nApoioTrabalho"] : "null";
$ApoioPermanencia = isset($_POST["nApoioPermanencia"]) ? $_POST["nApoioPermanencia"] : "null";

$Pesquisa = isset($_POST["nPesquisa"]) ? $_POST["nPesquisa"] : "null";
$Extensao = isset($_POST["nExtensao"]) ? $_POST["nExtensao"] : "null";
$Monitoria = isset($_POST["nMonitoria"]) ? $_POST["nMonitoria"] : "null";
$Estagio = isset($_POST["nEstagio"]) ? $_POST["nEstagio"] : "null";

$CodigoUF = isset($_POST["nCodigoUF"]) ? $_POST["nCodigoUF"] : "null";
$CodigoMunicipio = isset($_POST["nCodigoMunicipio"]) ? $_POST["nCodigoMunicipio"] : "null"; 

$ComNomes = isset($_POST["nComNomes"]) ? $_POST["nComNomes"] : "null"; 

?>