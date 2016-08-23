<?php

require_once('funcoes_gerais.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$CodigoCurso = $_POST["nCodigoCurso"];
$Nome = $_POST["nNome"];
$GrauAcademico = $_POST["nGrauAcademico"];
$Modalidade = $_POST["nModalidade"];
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
$DisciplinasSemipresenciais = $_POST["nDisciplinasSemipresenciais"];
$PercentualSemipresencial = $_POST["nPercentualSemipresencial"];
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

$sql_atualiza = "UPDATE curso SET codigo_curso='$CodigoCurso', nome='$Nome', grau_academico='$GrauAcademico', modalidade='$Modalidade', carga_horaria='$CargaHoraria', data_inicio='$Inicio',"
        . "situacao_curso_emec='$SituacaoEMEC', curso_teve_aluno_vinculado='$AlunoVinculado', motivo_sem_aluno='$MotivoSemAluno', codigo_curso_representado='$CodigoCursoRepresentado', curso_financ_convenio='$CursoFinanciado', turno_curso='$Turno',"
        . "prazo_minimo_integralizacao='$PrazoMinimo', vagas_novas_oferecidas='$VagasOferecidas', inscritos_vagas_oferecidas='$Inscritos', vagas_remanecentes='$VagasRemanescentes', inscritos_vagas_remanecentes='$InscritosRemanescentes', vagas_programas_especiais='$VagasEspeciais', inscritos_vagas_especiais='$InscritosEspeciais', "
        . "curso_tem_acessibilidade='$CondicoesEspeciais', recursosBraille='$RecursosBraille', recursosAudio='$RecursosAudio', recursosInformatica='$RecursosInformatica', recursosLibras='$RecursosLibras', recursosInterprete='$RecursosInterprete', recursosLibrasMaterial='$RecursosLibrasMaterial', recursosAmpliado='$RecursosAmpliado', "
        . "recursosTatil='$RecursosTatil', recursosLibrasCursos='$RecursosLibrasCursos', recursosImpresso='$RecursosImpresso', recursosAcessibilidade='$RecursosAcessibilidade', recursosDigital='$RecursosDigital', oferece_semepresenciais='$DisciplinasSemipresenciais', carga_horaria_semepresencial='$PercentualSemipresencial', "
        . "utiliza_laboratorios='$Laboratorios', codigos_laboratorios='$CodigosLabs' WHERE id=$Id";
mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=menu_cursos.php");
?>