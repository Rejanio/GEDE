<?php
require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Matricula = $_POST["nMatricula"];
$IdDocente = $_POST["nIdDocente"];
$Cpf = $_POST["nCpf"];
$Nome = $_POST["nNome"];
$Nacimento = $_POST["nNacimento"];
$Sexo = $_POST["nSexo"];
$NomeMae = $_POST["nNomeMae"];
$Cor = $_POST["nCor"];
$Nacionalidade = $_POST["nNacionalidade"];
$PaisOrigem = $_POST["nPaisOrigem"];
$Uf = $_POST["nUf"];
$Municipio = $_POST["nMunicipio"];
$CodigoMuni = $_POST["nCodigoMuni"];
$CodigoEstado = $_POST["nCodigoEstado"];
$DeficienciaHabilidades = $_POST["nDeficienciaHabilidades"];

//Deficiencias 
if ($_POST["nDeficienciaHabilidades"] == "Sim") {
    $Cegueira = isset($_POST["nCegueira"]) ? $_POST["nCegueira"] : "Nao";
    $BaixaVisao = isset($_POST["nBaixaVisao"]) ? $_POST["nBaixaVisao"] : "Nao";
    $Surdez = isset($_POST["nSurdez"]) ? $_POST["nSurdez"] : "Nao";
    $Auditiva = isset($_POST["nAuditiva"]) ? $_POST["nAuditiva"] : "Nao";
    $Fisica = isset($_POST["nFisica"]) ? $_POST["nFisica"] : "Nao";
    $Surdocegueira = isset($_POST["nSurdocegueira"]) ? $_POST["nSurdocegueira"] : "Nao";
    $Multipla = isset($_POST["nMultipla"]) ? $_POST["nMultipla"] : "Nao";
    $Intelectual = isset($_POST["nIntelectual"]) ? $_POST["nIntelectual"] : "Nao";
} else {
    $Cegueira = isset($_POST["nCegueira"]) ? $_POST["nCegueira"] : "";
    $BaixaVisao = isset($_POST["nBaixaVisao"]) ? $_POST["nBaixaVisao"] : "";
    $Surdez = isset($_POST["nSurdez"]) ? $_POST["nSurdez"] : "";
    $Auditiva = isset($_POST["nAuditiva"]) ? $_POST["nAuditiva"] : "";
    $Fisica = isset($_POST["nFisica"]) ? $_POST["nFisica"] : "";
    $Surdocegueira = isset($_POST["nSurdocegueira"]) ? $_POST["nSurdocegueira"] : "";
    $Multipla = isset($_POST["nMultipla"]) ? $_POST["nMultipla"] : "";
    $Intelectual = isset($_POST["nIntelectual"]) ? $_POST["nIntelectual"] : "";
}

$Escolaridade = isset($_POST["nEscolaridade"]) ? $_POST["nEscolaridade"] : "";
$Pos = isset($_POST["nPos"]) ? $_POST["nPos"] : "";
$SituacaoDocente = isset($_POST["nSituacaoDocente"]) ? $_POST["nSituacaoDocente"] : "";
$Regime = isset($_POST["nRegime"]) ? $_POST["nRegime"] : "";
$Substituto = isset($_POST["nSubstituto"]) ? $_POST["nSubstituto"] : "Nao";
$Visitante = isset($_POST["nVisitante"]) ? $_POST["nVisitante"] : "Nao";
$TipoVinculo = isset($_POST["nTipoVinculo"]) ? $_POST["nTipoVinculo"] : "";
$Exercicio3112 = isset($_POST["nExercicio3112"]) ? $_POST["nExercicio3112"] : "";

if ($_POST["nExercicio3112"] == "Sim") {
    $PosDistancia = isset($_POST["nPosDistancia"]) ? $_POST["nPosDistancia"] : "Nao";
    $GraduacaoPresencial = isset($_POST["nGraduacaoPresencial"]) ? $_POST["nGraduacaoPresencial"] : "Nao";
    $CursoDistancia = isset($_POST["nCursoDistancia"]) ? $_POST["nCursoDistancia"] : "Nao";
    $PosPresencial = isset($_POST["nPosPresencial"]) ? $_POST["nPosPresencial"] : "Nao";
    $CursoFormacaoEspecifica = isset($_POST["nCursoFormacaoEspecifica"]) ? $_POST["nCursoFormacaoEspecifica"] : "Nao";
    $Pesquisa = isset($_POST["nPesquisa"]) ? $_POST["nPesquisa"] : "Nao";
    $Extensao = isset($_POST["nExtensao"]) ? $_POST["nExtensao"] : "Nao";
    $GestaoPlanejamento = isset($_POST["nGestaoPlanejamento"]) ? $_POST["nGestaoPlanejamento"] : "Nao";
} else {
    $PosDistancia = isset($_POST["nPosDistancia"]) ? $_POST["nPosDistancia"] : "";
    $GraduacaoPresencial = isset($_POST["nGraduacaoPresencial"]) ? $_POST["nGraduacaoPresencial"] : "";
    $CursoDistancia = isset($_POST["nCursoDistancia"]) ? $_POST["nCursoDistancia"] : "";
    $PosPresencial = isset($_POST["nPosPresencial"]) ? $_POST["nPosPresencial"] : "";
    $CursoFormacaoEspecifica = isset($_POST["nCursoFormacaoEspecifica"]) ? $_POST["nCursoFormacaoEspecifica"] : "";
    $Pesquisa = isset($_POST["nPesquisa"]) ? $_POST["nPesquisa"] : "";
    $Extensao = isset($_POST["nExtensao"]) ? $_POST["nExtensao"] : "";
    $GestaoPlanejamento = isset($_POST["nGestaoPlanejamento"]) ? $_POST["nGestaoPlanejamento"] : "";
}
$PossuiBolsa = isset($_POST["nPossuiBolsa"]) ? $_POST["nPossuiBolsa"] : "";
$CodigoCurso = isset($_POST["nCodigoCurso"]) ? $_POST["nCodigoCurso"] : "";

$Classe = isset($_POST["nClasse"]) ? $_POST["nClasse"] : "";
$Departamento = $_POST["nDepartamento"];

conexao();

$sql_inserir = "INSERT INTO docente (matricula, id_inep, cpf, nome, nascimento, sexo, cor_raca, nacionalidade, pais_nacimento,"
        . " uf_nacimento, municipio_nacimento, deficiencia, cegueira, baixa_visao, surdez, def_auditiva, def_fisica, surdocegueira, def_multipla, def_intelectual, nome_mae, escolaridade, pos_graduacao, situacao_docente, regime_trabalho, docente_substituto, docente_visitante,"
        . "tipo_docente_visitante, exercicio_3112, pos_distancia, graduacao_presencial, curso_distancia, pos_presencial, curso_formacao_especifica, pesquisa, extensao, gestao_planejamento, bolsa_pesquisa, codigo_cursoarea, classe, departamento, codigo_municipio, codigo_uf) "
        . "VALUES ('" . $Matricula . "', '" . $IdDocente . "', '" . $Cpf . "', '" . $Nome . "', '" . $Nacimento . "', '" . $Sexo . "', '" . $Cor . "', '" . $Nacionalidade . "', '" . $PaisOrigem . "', '" . $Uf . "', '" . $Municipio . "', '"
        . $DeficienciaHabilidades . "', '" . $Cegueira . "', '" . $BaixaVisao . "', '" . $Surdez . "', '" . $Auditiva . "', '" . $Fisica . "', '" . $Surdocegueira . "', '" . $Multipla . "', '" . $Intelectual . "', '" . $NomeMae . "', '" . $Escolaridade . "', '" . $Pos . "', '" . $SituacaoDocente . "', '" . $Regime . "', '" . $Substituto . "',"
        . " '" . $Visitante . "', '" . $TipoVinculo . "', '" . $Exercicio3112 . "', '" . $PosDistancia
        . "', '" . $GraduacaoPresencial . "', '" . $CursoDistancia . "', '" . $PosPresencial . "', '" . $CursoFormacaoEspecifica . "', '" . $Pesquisa . "', '" . $Extensao . "', '" . $GestaoPlanejamento . "', '" . $PossuiBolsa . "', '" . $CodigoCurso . "', '" . $Classe . "', '" . $Departamento . "', '" . $CodigoMuni . "', '" . $CodigoEstado . "')";

mysql_query($sql_inserir) or die(" Não foi possivel inserir o professor no banco" . mysql_error());

echo '<img id="home" src="imagens/safebox.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=menu_professores.php");
?>