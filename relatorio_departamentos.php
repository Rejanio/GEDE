<?php
session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}

require_once('funcoes_uteis.php');

header("refresh: 1; url=home.php");

$BIO = isset($_POST["nBIO"]) ? $_POST["nBIO"] : "null";
$EXA = isset($_POST["nEXA"]) ? $_POST["nEXA"] : "null";
$CFH = isset($_POST["nCHF"]) ? $_POST["nCHF"] : "null";
$CIS = isset($_POST["nCIS"]) ? $_POST["nCIS"] : "null";
$EDU = isset($_POST["nEDU"]) ? $_POST["nEDU"] : "null";
$FIS = isset($_POST["nFIS"]) ? $_POST["nFIS"] : "null";
$DLET = isset($_POST["nDLET"]) ? $_POST["nDLET"] : "null";
$SAU = isset($_POST["nSAU"]) ? $_POST["nSAU"] : "null";
$TEC = isset($_POST["nTEC"]) ? $_POST["nTEC"] : "null";

$Masculuno = isset($_POST["nMasculuno"]) ? $_POST["nMasculuno"] : "null";
$Feminino = isset($_POST["nFeminino"]) ? $_POST["nFeminino"] : "null";

$Branca = isset($_POST["nBranca"]) ? $_POST["nBranca"] : "null";
$Preta = isset($_POST["nPreta"]) ? $_POST["nPreta"] : "null";
$Parda = isset($_POST["nParda"]) ? $_POST["nParda"] : "null";
$Amarela = isset($_POST["nAmarela"]) ? $_POST["nAmarela"] : "null";
$Indigena = isset($_POST["nIndigena"]) ? $_POST["nIndigena"] : "null";
$SemDeclaracao = isset($_POST["nSemDeclaracao"]) ? $_POST["nSemDeclaracao"] : "null";

$Brasileira = isset($_POST["nBrasileira"]) ? $_POST["nBrasileira"] : "null";
$Naturalizado = isset($_POST["nNaturalizado"]) ? $_POST["nNaturalizado"] : "null";
$Estrangeira = isset($_POST["nEstrangeira"]) ? $_POST["nEstrangeira"] : "null";

$ComDeficiencia = isset($_POST["nComDeficiencia"]) ? $_POST["nComDeficiencia"] : "null";
$SemDeficiencia = isset($_POST["nSemDeficiencia"]) ? $_POST["nSemDeficiencia"] : "null";

$Especializacao = isset($_POST["nEspecializacao"]) ? $_POST["nEspecializacao"] : "null";
$Mestrado = isset($_POST["nMestrado"]) ? $_POST["nMestrado"] : "null";
$Doutorado = isset($_POST["nDoutorado"]) ? $_POST["nDoutorado"] : "null";
$NaoPossui = isset($_POST["nNaoPossui"]) ? $_POST["nNaoPossui"] : "null";


$EsteveEmExercicio = isset($_POST["nEsteveEmExercicio"]) ? $_POST["nEsteveEmExercicio"] : "null";
$AfastadoParaQualificacao = isset($_POST["nAfastadoParaQualificacao"]) ? $_POST["nAfastadoParaQualificacao"] : "null";
$AfastadoParaTreinamento = isset($_POST["nAfastadoParaTreinamento"]) ? $_POST["nAfastadoParaTreinamento"] : "null";
$AfastadoOutrosOrgaos = isset($_POST["nAfastadoOutrosOrgaos"]) ? $_POST["nAfastadoOutrosOrgaos"] : "null";
$AfastadoOutrosMotivos = isset($_POST["nAfastadoOutrosMotivos"]) ? $_POST["nAfastadoOutrosMotivos"] : "null";


$IntegralComDE = isset($_POST["nIntegralComDE"]) ? $_POST["nIntegralComDE"] : "null";
$IntegralSemDE = isset($_POST["nIntegralSemDE"]) ? $_POST["nIntegralSemDE"] : "null";
$TempoParcial = isset($_POST["nTempoParcial"]) ? $_POST["nTempoParcial"] : "null";
$Horista = isset($_POST["nHorista"]) ? $_POST["nHorista"] : "null";

$Substituto = isset($_POST["nSubstituto"]) ? $_POST["nSubstituto"] : "null";
$NaoSubstituto = isset($_POST["nNaoSubstituto"]) ? $_POST["nNaoSubstituto"] : "null";

$EnsinoPosDistancia = isset($_POST["nEnsinoPosDistancia"]) ? $_POST["nEnsinoPosDistancia"] : "null";
$EnsinoGraduacao = isset($_POST["nEnsinoGraduacao"]) ? $_POST["nEnsinoGraduacao"] : "null";
$EnsinoGraduacaoEAD = isset($_POST["nEnsinoGraduacaoEAD"]) ? $_POST["nEnsinoGraduacaoEAD"] : "null";
$EnsinoPosPresencial = isset($_POST["nEnsinoPosPresencial"]) ? $_POST["nEnsinoPosPresencial"] : "null";
$Pesquisa = isset($_POST["nPesquisa"]) ? $_POST["nPesquisa"] : "null";
$Extensao = isset($_POST["nExtensao"]) ? $_POST["nExtensao"] : "null";
$Gestao = isset($_POST["nGestao"]) ? $_POST["nGestao"] : "null";

$Titular = isset($_POST["nTitular"]) ? $_POST["nTitular"] : "null";
$Adjunto = isset($_POST["nAdjunto"]) ? $_POST["nAdjunto"] : "null";
$Pleno = isset($_POST["nPleno"]) ? $_POST["nPleno"] : "null";
$Assistente = isset($_POST["nAssistente"]) ? $_POST["nAssistente"] : "null";
$Substituto = isset($_POST["nSubstituto"]) ? $_POST["nSubstituto"] : "null";
$Auxiliar = isset($_POST["nAuxiliar"]) ? $_POST["nAuxiliar"] : "null";

$CodigoUF = isset($_POST["nCodigoUF"]) ? $_POST["nCodigoUF"] : "null";
$CodigoMunicipio = isset($_POST["nCodigoMunicipio"]) ? $_POST["nCodigoMunicipio"] : "null";
$ComNomes = isset($_POST["nComNomes"]) ? $_POST["nComNomes"] : "null";


if ($BIO == "sim") {


	
}
if ($EXA == "sim") {
	

}
if ($CFH == "sim") {
	

}
if ($CIS == "sim") {
	

}
if ($DLET == "sim") {
	

}
if ($SAU == "sim") {
	

}
if ($FIS == "sim") {
	

}
if ($EDU == "sim") {
	

}
if ($TEC == "sim") {
	

}





?>