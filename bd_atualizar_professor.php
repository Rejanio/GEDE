<?php

require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

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
$Pos = $_POST["nPos"];
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

$sql_atualiza = "UPDATE docente SET id_inep='$IdDocente', matricula='$Matricula', cpf='$Cpf', nome='$Nome', nascimento='$Nacimento', sexo='$Sexo', nome_mae='$NomeMae', "
        . "cor_raca='$Cor', nacionalidade='$Nacionalidade', pais_nacimento='$PaisOrigem', uf_nacimento='$Uf',"
        . "municipio_nacimento='$Municipio', deficiencia='$DeficienciaHabilidades', cegueira='$Cegueira', baixa_visao='$BaixaVisao', surdez='$Surdez', def_auditiva='$Auditiva', def_fisica='$Fisica', surdocegueira='$Surdocegueira', def_multipla='$Multipla', def_intelectual='$Intelectual', escolaridade='$Escolaridade', "
        . "pos_graduacao='$Pos', situacao_docente='$SituacaoDocente', regime_trabalho='$Regime', docente_substituto='$Substituto', docente_visitante='$Visitante', "
        . "tipo_docente_visitante='$TipoVinculo', exercicio_3112='$Exercicio3112', pos_distancia='$PosDistancia', graduacao_presencial='$GraduacaoPresencial', "
        . "curso_distancia='$CursoDistancia', pos_presencial='$PosPresencial ', curso_formacao_especifica='$CursoFormacaoEspecifica', "
        . "pesquisa='$Pesquisa', extensao='$Extensao', gestao_planejamento='$GestaoPlanejamento', bolsa_pesquisa='$PossuiBolsa', codigo_cursoarea='$CodigoCurso', codigo_municipio='$CodigoMuni', codigo_uf='$CodigoEstado', classe='$Classe', departamento='$Departamento' WHERE id=$Id";
mysql_query($sql_atualiza) or die("Não foi possivel excluir:  " . mysql_error());

echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=menu_professores.php");
?>