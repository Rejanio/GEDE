<?php

require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$CodigoCurso = $_POST["nCodigoCurso"];
$Nome = $_POST["nNome"];
$GrauAcademico = $_POST["nGrauAcademico"];
$Modalidade = $_POST["nModalidade"];
$AtributoIngresso = $_POST["nAtributoIngresso"];
$CargaHoraria = $_POST["nCargaHoraria"];
$Inicio = $_POST["nInicio"];
$SituacaoEMEC = $_POST["nSituacaoEMEC"];
$AlunoVinculado = $_POST["nAlunoVinculado"];
$MotivoSemAluno = $_POST["nMotivoSemAluno"];

$CodigoCursoRepresentado = $_POST["nCodigoCursoRepresentado"];
$CursoFinanciado = $_POST["nCursoFinanciado"];
$Turno = $_POST["nTurno"];
$PrazoMinimo = $_POST["nPrazoMinimo"];
$VagasOferecidas = $_POST["nVagasOferecidas"];
$Inscritos = $_POST["nInscritos"];
$VagasRemanescentes = $_POST["nVagasRemanescentes"];
$InscritosRemanescentes = $_POST["nInscritosRemanescentes"];
$VagasEspeciais = $_POST["nVagasEspeciais"];
$InscritosEspeciais = $_POST["nInscritosEspeciais"];

$CondicoesEspeciais = $_POST["nCondicoesEspeciais"];
$DisciplinasSemipresenciais = $_POST["nDisciplinasSemipresenciais"] ? $_POST["nDisciplinasSemipresenciais"] : "Nao";
$PercentualSemipresencial = $_POST["nPercentualSemipresencial"]? $_POST["nPercentualSemipresencial"] : "";
$Laboratorios = $_POST["nLaboratorios"];
$CodigosLabs = $_POST["nCodigosLabs"];

//Recursos tecnologicos
if ($_POST["nCondicoesEspeciais"] == "Sim") {
    $RecursosBraille = isset($_POST["nRecursosBraille"]) ? $_POST["nRecursosBraille"] : "Nao";
    $RecursosAudio = isset($_POST["nRecursosAudio"]) ? $_POST["nRecursosAudio"] : "Nao";
    $RecursosInformatica = isset($_POST["nRecursosInformatica"]) ? $_POST["nRecursosInformatica"] : "Nao";
    $RecursosLibras = isset($_POST["nRecursosLibras"]) ? $_POST["nRecursosLibras"] : "Nao";
    $RecursosInterprete = isset($_POST["nRecursosInterprete"]) ? $_POST["nRecursosInterprete"] : "Nao";
    $RecursosLibrasMaterial = isset($_POST["nRecursosLibrasMaterial"]) ? $_POST["nRecursosLibrasMaterial"] : "Nao";
    $RecursosAmpliado = isset($_POST["nRecursosAmpliado"]) ? $_POST["nRecursosAmpliado"] : "Nao";
    $RecursosTatil = isset($_POST["nRecursosTatil"]) ? $_POST["nRecursosTatil"] : "Nao";
    $RecursosLibrasCursos = isset($_POST["nRecursosLibrasCursos"]) ? $_POST["nRecursosLibrasCursos"] : "Nao";
    $RecursosImpresso = isset($_POST["nRecursosImpresso"]) ? $_POST["nRecursosImpresso"] : "Nao";
    $RecursosAcessibilidade = isset($_POST["nRecursosAcessibilidade"]) ? $_POST["nRecursosAcessibilidade"] : "Nao";
    $RecursosDigital = isset($_POST["nRecursosDigital"]) ? $_POST["nRecursosDigital"] : "Nao";
} else {
    $RecursosBraille = isset($_POST["nRecursosBraille"]) ? $_POST["nRecursosBraille"] : "";
    $RecursosAudio = isset($_POST["nRecursosAudio"]) ? $_POST["nRecursosAudio"] : "";
    $RecursosInformatica = isset($_POST["nRecursosInformatica"]) ? $_POST["nRecursosInformatica"] : "";
    $RecursosLibras = isset($_POST["nRecursosLibras"]) ? $_POST["nRecursosLibras"] : "";
    $RecursosInterprete = isset($_POST["nRecursosInterprete"]) ? $_POST["nRecursosInterprete"] : "";
    $RecursosLibrasMaterial = isset($_POST["nRecursosLibrasMaterial"]) ? $_POST["nRecursosLibrasMaterial"] : "";
    $RecursosAmpliado = isset($_POST["nRecursosAmpliado"]) ? $_POST["nRecursosAmpliado"] : "";
    $RecursosTatil = isset($_POST["nRecursosTatil"]) ? $_POST["nRecursosTatil"] : "";
    $RecursosLibrasCursos = isset($_POST["nRecursosLibrasCursos"]) ? $_POST["nRecursosLibrasCursos"] : "";
    $RecursosImpresso = isset($_POST["nRecursosImpresso"]) ? $_POST["nRecursosImpresso"] : "";
    $RecursosAcessibilidade = isset($_POST["nRecursosAcessibilidade"]) ? $_POST["nRecursosAcessibilidade"] : "";
    $RecursosDigital = isset($_POST["nRecursosDigital"]) ? $_POST["nRecursosDigital"] : "";
}
conexao();

$sql_inserir = "INSERT INTO curso (codigo_curso, nome, codigo_ocde, grau_academico, modalidade, carga_horaria,"
        . " data_inicio, situacao_curso_emec, curso_teve_aluno_vinculado, motivo_sem_aluno, codigo_curso_representado, curso_financ_convenio, turno_curso, prazo_minimo_integralizacao,"
        . "vagas_novas_oferecidas, inscritos_vagas_oferecidas, vagas_remanecentes, inscritos_vagas_remanecentes, vagas_programas_especiais, inscritos_vagas_especiais, curso_tem_acessibilidade, oferece_semepresenciais, carga_horaria_semepresencial"
        . ", utiliza_laboratorios, codigos_laboratorios, recursosBraille, recursosAudio, recursosInformatica, recursosLibras, recursosInterprete, recursosLibrasMaterial, recursosAmpliado, recursosTatil, recursosLibrasCursos, recursosImpresso, recursosAcessibilidade, recursosDigital) "
        . "VALUES ('" . $CodigoCurso . "', '" . $Nome . "', '" . $GrauAcademico . "', '" . $Modalidade . "', '" . $CargaHoraria . "', '" . $Inicio . "', '"
        . $SituacaoEMEC . "', '" . $AlunoVinculado . "', '" . $MotivoSemAluno . "', '" . $CodigoCursoRepresentado . "', '" . $CursoFinanciado . "', '" . $Turno . "', '" . $PrazoMinimo . "', '" . $VagasOferecidas . "', '" . $Inscritos . "', '" . $VagasRemanescentes . "', '" . $InscritosRemanescentes . "', '" . $VagasEspeciais . "', '" . $InscritosEspeciais . "', '"
        . $CondicoesEspeciais . "', '" . $DisciplinasSemipresenciais . "', '" . $PercentualSemipresencial . "', '" . $Laboratorios . "', '" . $CodigosLabs . "', '" . $RecursosBraille . "', '" . $RecursosAudio . "', '" . $RecursosInformatica . "', '" . $RecursosLibras . "', '" . $RecursosInterprete . "', '" . 
        $RecursosLibrasMaterial . "', '" . $RecursosAmpliado . "', '" . $RecursosTatil . "', '" . $RecursosLibrasCursos . "', '" . $RecursosImpresso . "', '" . $RecursosAcessibilidade . "', '" . $RecursosDigital . "')";


mysql_query($sql_inserir) or die(" Não foi possivel inserir o curso no banco: " . mysql_error());

echo '<img id="home" src="imagens/safebox.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=menu_cursos.php");
?>