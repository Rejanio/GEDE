<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$IdAluno = isset($_POST["nIdAluno"]) ? $_POST["nIdAluno"] : "";
$Matricula = $_POST["nMatricula"];
$Cpf = isset($_POST["nCpf"]) ? $_POST["nCpf"] : "";
$Nome = isset($_POST["nNome"]) ? $_POST["nNome"] : "";
$Nacimento = isset($_POST["nNacimento"]) ? $_POST["nNacimento"] : "";
$Sexo = isset($_POST["nSexo"]) ? $_POST["nSexo"] : "";
$NomeMae = isset($_POST["nNomeMae"]) ? $_POST["nNomeMae"] : "";
$Cor = isset($_POST["nCor"]) ? $_POST["nCor"] : "";
$Nacionalidade = isset($_POST["nNacionalidade"]) ? $_POST["nNacionalidade"] : "";
$PaisOrigem = isset($_POST["nPaisOrigem"]) ? $_POST["nPaisOrigem"] : "";
$Uf = isset($_POST["nUf"]) ? $_POST["nUf"] : "";
$Municipio = isset($_POST["nMunicipio"]) ? $_POST["nMunicipio"] : "";
$DeficienciaHabilidades = isset($_POST["nDeficienciaHabilidades"]) ? $_POST["nDeficienciaHabilidades"] : "";

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
    $Autismo = isset($_POST["nAutismo"]) ? $_POST["nAutismo"] : "Nao";
    $Asperger = isset($_POST["nAsperger"]) ? $_POST["nAsperger"] : "Nao";
    $Rett = isset($_POST["nRett"]) ? $_POST["nRett"] : "Nao";
    $Desintegrativo = isset($_POST["nDesintegrativo"]) ? $_POST["nDesintegrativo"] : "Nao";
    $Superdotacao = isset($_POST["nSuperdotacao"]) ? $_POST["nSuperdotacao"] : "Nao";
} else {
    $Cegueira = isset($_POST["nCegueira"]) ? $_POST["nCegueira"] : "";
    $BaixaVisao = isset($_POST["nBaixaVisao"]) ? $_POST["nBaixaVisao"] : "";
    $Surdez = isset($_POST["nSurdez"]) ? $_POST["nSurdez"] : "";
    $Auditiva = isset($_POST["nAuditiva"]) ? $_POST["nAuditiva"] : "";
    $Fisica = isset($_POST["nFisica"]) ? $_POST["nFisica"] : "";
    $Surdocegueira = isset($_POST["nSurdocegueira"]) ? $_POST["nSurdocegueira"] : "";
    $Multipla = isset($_POST["nMultipla"]) ? $_POST["nMultipla"] : "";
    $Intelectual = isset($_POST["nIntelectual"]) ? $_POST["nIntelectual"] : "";
    $Autismo = isset($_POST["nAutismo"]) ? $_POST["nAutismo"] : "";
    $Asperger = isset($_POST["nAsperger"]) ? $_POST["nAsperger"] : "";
    $Rett = isset($_POST["nRett"]) ? $_POST["nRett"] : "";
    $Desintegrativo = isset($_POST["nDesintegrativo"]) ? $_POST["nDesintegrativo"] : "";
    $Superdotacao = isset($_POST["nSuperdotacao"]) ? $_POST["nSuperdotacao"] : "";
}

$CodigoCurso = isset($_POST["nCodigoCurso"]) ? $_POST["nCodigoCurso"] : "";
$CodigoPolo = isset($_POST["nCodigoPolo"]) ? $_POST["nCodigoPolo"] : "";
$Turno = isset($_POST["nTurno"]) ? $_POST["nTurno"] : "";
$SituacaoVinculo = isset($_POST["nSituacaoVinculo"]) ? $_POST["nSituacaoVinculo"] : "";
$CargaHoraria = isset($_POST["nCargaHoraria"]) ? $_POST["nCargaHoraria"] : "";
$CargaIntegralizada = isset($_POST["nCargaIntegralizada"]) ? $_POST["nCargaIntegralizada"] : "";
$SemestreConclusao = isset($_POST["nSemestreConclusao"]) ? $_POST["nSemestreConclusao"] : "";
$AlunoParfor = isset($_POST["nAlunoParfor"]) ? $_POST["nAlunoParfor"] : "";

$MobilidadeAcademica = isset($_POST["nMobilidadeAcademica"]) ? $_POST["nMobilidadeAcademica"] : "Nao";
$TipoMobilidadeAcademica = isset($_POST["nTipoMobilidadeAcademica"]) ? $_POST["nTipoMobilidadeAcademica"] : "";
$IesDestino = isset($_POST["nIesDestino"]) ? $_POST["nIesDestino"] : "";
$TipoMobilidadeInternacional = isset($_POST["nTipoMobilidade"]) ? $_POST["nTipoMobilidade"] : "";
$PaisDestino = isset($_POST["nPaisDestino"]) ? $_POST["nPaisDestino"] : "";

$TipoEscola = isset($_POST["nTipoEscola"]) ? $_POST["nTipoEscola"] : "";
$SemestreIngresso = isset($_POST["nSemestreIngresso"]) ? $_POST["nSemestreIngresso"] : "";

//Ingresso
$Vestibular = isset($_POST["nVestibular"]) ? $_POST["nVestibular"] : "Nao";
$Enem = isset($_POST["nEnem"]) ? $_POST["nEnem"] : "Nao";
$Seriada = isset($_POST["nSeriada"]) ? $_POST["nSeriada"] : "Nao";
$Simplificada = isset($_POST["nSimplificada"]) ? $_POST["nSimplificada"] : "Nao";
$Transferencia = isset($_POST["nTransferencia"]) ? $_POST["nTransferencia"] : "Nao";
$Convenio = isset($_POST["nConvenio"]) ? $_POST["nConvenio"] : "Nao";
$Judicial = isset($_POST["nJudicial"]) ? $_POST["nJudicial"] : "Nao";
$Remanescentes = isset($_POST["nRemanescentes"]) ? $_POST["nRemanescentes"] : "Nao";
$VagasEspeciais = isset($_POST["nVagasEspeciais"]) ? $_POST["nVagasEspeciais"] : "Nao";

$ReservaVagas = isset($_POST["nReservaVagas"]) ? $_POST["nReservaVagas"] : "";
//Tipo reserva de vagas
if ($_POST["nReservaVagas"] == "Sim") {
    $ReservaEtico = isset($_POST["nReservaEtico"]) ? $_POST["nReservaEtico"] : "Nao";
    $ReservaDeficiencia = isset($_POST["nReservaDeficiencia"]) ? $_POST["nReservaDeficiencia"] : "Nao";
    $ReservaPublica = isset($_POST["nReservaPublica"]) ? $_POST["nReservaPublica"] : "Nao";
    $ReservaSocial = isset($_POST["nReservaSocial"]) ? $_POST["nReservaSocial"] : "Nao";
    $ReservaOutro = isset($_POST["nReservaOutro"]) ? $_POST["nReservaOutro"] : "Nao";
} else {
    $ReservaEtico = isset($_POST["nReservaEtico"]) ? $_POST["nReservaEtico"] : "";
    $ReservaDeficiencia = isset($_POST["nReservaDeficiencia"]) ? $_POST["nReservaDeficiencia"] : "";
    $ReservaPublica = isset($_POST["nReservaPublica"]) ? $_POST["nReservaPublica"] : "";
    $ReservaSocial = isset($_POST["nReservaSocial"]) ? $_POST["nReservaSocial"] : "";
    $ReservaOutro = isset($_POST["nReservaOutro"]) ? $_POST["nReservaOutro"] : "";
}

$FinanciamentoEstudantil = isset($_POST["nFinanciamentoEstudantil"]) ? $_POST["nFinanciamentoEstudantil"] : "";
//Tipo Financeamento reembolsavel
if ($_POST["nFinanciamentoEstudantil"] == "Sim") {

    $Fies = isset($_POST["nFies"]) ? $_POST["nFies"] : "Nao";
    $GovernoEstadualReembolsavel = isset($_POST["nGovernoEstadualReembolsavel"]) ? $_POST["nGovernoEstadualReembolsavel"] : "Nao";
    $GovernoMunicipalReembolsavel = isset($_POST["nGovernoMunicipalReembolsavel"]) ? $_POST["nGovernoMunicipalReembolsavel"] : "Nao";
    $FinanciamentoIESReembolsavel = isset($_POST["nFinanciamentoIESReembolsavel"]) ? $_POST["nFinanciamentoIESReembolsavel"] : "Nao";
    $FinanciamentoExternoReembolsavel = isset($_POST["nFinanciamentoExternoReembolsavel"]) ? $_POST["nFinanciamentoExternoReembolsavel"] : "Nao";

//Tipo Financeamento nao reembolsavel

    $ProuniIntegral = isset($_POST["nProuniIntegral"]) ? $_POST["nProuniIntegral"] : "Nao";
    $ProuniParcial = isset($_POST["nProuniParcial"]) ? $_POST["nProuniParcial"] : "Nao";
    $FinanciamentoEstadual = isset($_POST["nFinanciamentoEstadual"]) ? $_POST["nFinanciamentoEstadual"] : "Nao";
    $FinanciamentoIES = isset($_POST["nFinanciamentoIES"]) ? $_POST["nFinanciamentoIES"] : "Nao";
    $FinanciamentoExterno = isset($_POST["nFinanciamentoExterno"]) ? $_POST["nFinanciamentoExterno"] : "Nao";
    $FinanciamentoMunicipal = isset($_POST["nFinanciamentoMunicipal"]) ? $_POST["nFinanciamentoMunicipal"] : "Nao";
} else {

    $Fies = isset($_POST["nFies"]) ? $_POST["nFies"] : "";
    $GovernoEstadualReembolsavel = isset($_POST["nGovernoEstadualReembolsavel"]) ? $_POST["nGovernoEstadualReembolsavel"] : "";
    $GovernoMunicipalReembolsavel = isset($_POST["nGovernoMunicipalReembolsavel"]) ? $_POST["nGovernoMunicipalReembolsavel"] : "";
    $FinanciamentoIESReembolsavel = isset($_POST["nFinanciamentoIESReembolsavel"]) ? $_POST["nFinanciamentoIESReembolsavel"] : "";
    $FinanciamentoExternoReembolsavel = isset($_POST["nFinanciamentoExternoReembolsavel"]) ? $_POST["nFinanciamentoExternoReembolsavel"] : "";

//Tipo Financeamento nao reembolsavel

    $ProuniIntegral = isset($_POST["nProuniIntegral"]) ? $_POST["nProuniIntegral"] : "";
    $ProuniParcial = isset($_POST["nProuniParcial"]) ? $_POST["nProuniParcial"] : "";
    $FinanciamentoEstadual = isset($_POST["nFinanciamentoEstadual"]) ? $_POST["nFinanciamentoEstadual"] : "";
    $FinanciamentoIES = isset($_POST["nFinanciamentoIES"]) ? $_POST["nFinanciamentoIES"] : "";
    $FinanciamentoExterno = isset($_POST["nFinanciamentoExterno"]) ? $_POST["nFinanciamentoExterno"] : "";
    $FinanciamentoMunicipal = isset($_POST["nFinanciamentoMunicipal"]) ? $_POST["nFinanciamentoMunicipal"] : "";
}

$ApoioSocial = isset($_POST["nApoioSocial"]) ? $_POST["nApoioSocial"] : "";
//Tipo de apoio social
if ($_POST["nApoioSocial"] == "Sim") {
    $ApoioAlimentacao = isset($_POST["nApoioAlimentacao"]) ? $_POST["nApoioAlimentacao"] : "Nao";
    $ApoioMoradia = isset($_POST["nApoioMoradia"]) ? $_POST["nApoioMoradia"] : "Nao";
    $ApoioTransporte = isset($_POST["nApoioTransporte"]) ? $_POST["nApoioTransporte"] : "Nao";
    $ApoioDidatico = isset($_POST["nApoioDidatico"]) ? $_POST["nApoioDidatico"] : "Nao";
    $ApoioTrabalho = isset($_POST["nApoioTrabalho"]) ? $_POST["nApoioTrabalho"] : "Nao";
    $ApoioPermanencia = isset($_POST["nApoioPermanencia"]) ? $_POST["nApoioPermanencia"] : "Nao";
} else {
    $ApoioAlimentacao = isset($_POST["nApoioAlimentacao"]) ? $_POST["nApoioAlimentacao"] : "";
    $ApoioMoradia = isset($_POST["nApoioMoradia"]) ? $_POST["nApoioMoradia"] : "";
    $ApoioTransporte = isset($_POST["nApoioTransporte"]) ? $_POST["nApoioTransporte"] : "";
    $ApoioDidatico = isset($_POST["nApoioDidatico"]) ? $_POST["nApoioDidatico"] : "";
    $ApoioTrabalho = isset($_POST["nApoioTrabalho"]) ? $_POST["nApoioTrabalho"] : "";
    $ApoioPermanencia = isset($_POST["nApoioPermanencia"]) ? $_POST["nApoioPermanencia"] : "";
}

$AtividadeExtra = isset($_POST["nAtividadeExtra"]) ? $_POST["nAtividadeExtra"] : "";
//Tipo de atividade extra
if ($_POST["nAtividadeExtra"] == "Sim") {
    $Pesquisa = isset($_POST["nPesquisa"]) ? $_POST["nPesquisa"] : "Nao";
    $Extensao = isset($_POST["nExtensao"]) ? $_POST["nExtensao"] : "Nao";
    $Monitoria = isset($_POST["nMonitoria"]) ? $_POST["nMonitoria"] : "Nao";
    $Estagio = isset($_POST["nEstagio"]) ? $_POST["nEstagio"] : "Nao";
} else {
    $Pesquisa = isset($_POST["nPesquisa"]) ? $_POST["nPesquisa"] : "";
    $Extensao = isset($_POST["nExtensao"]) ? $_POST["nExtensao"] : "";
    $Monitoria = isset($_POST["nMonitoria"]) ? $_POST["nMonitoria"] : "";
    $Estagio = isset($_POST["nEstagio"]) ? $_POST["nEstagio"] : "";
}

$BolsaPesquisa = $_POST["nBolsaPesquisa"];
$BolsaExtensao = $_POST["nBolsaExtensao"];
$BolsaMonitoria = $_POST["nBolsaMonitoria"];
$BolsaEstagio = $_POST["nBolsaEstagio"];

conexao();

$sql_atualiza = "UPDATE aluno SET matricula='$Matricula', id_inep='$IdAluno', nome='$Nome', cpf='$Cpf', nome_mae='$NomeMae', nascimento='$Nacimento', sexo='$Sexo', cor_raca='$Cor', nacionalidade='$Nacionalidade', "
        . "pais_nacimento='$PaisOrigem', uf_nacimento='$Uf', municipio_nacimento='$Municipio', deficiencia_transtorno_superdotacao='$DeficienciaHabilidades', def_Cegueira='$Cegueira', def_BaixaVisao='$BaixaVisao', "
        . "def_Surdez='$Surdez', def_Auditiva='$Auditiva', def_Fisica='$Fisica', def_Surdocegueira='$Surdocegueira', def_Multipla='$Multipla', def_Intelectual='$Intelectual', def_Autismo='$Autismo', def_Asperger='$Asperger', "
        . "def_Rett='$Rett', def_Desintegrativo='$Desintegrativo', def_Superdotacao='$Superdotacao', codigo_curso='$CodigoCurso', codigo_polo='$CodigoPolo', turno_aluno_curso='$Turno', situacao_aluno_curso='$SituacaoVinculo', "
        . "carga_horaria_total='$CargaHoraria', carga_horaria_integralizada='$CargaIntegralizada', semestre_conclusao='$SemestreConclusao', aluno_parfor='$AlunoParfor', mobilidade_academica='$MobilidadeAcademica', tipo_mobilidade='$TipoMobilidadeAcademica', "
        . "destino_mobilidade_nacional='$IesDestino', tipo_mobilidade_internacional='$TipoMobilidadeInternacional', pais_destino='$PaisDestino', tipo_escola_ensino_medio='$TipoEscola', semestre_ingresso='$SemestreIngresso', "
        . "Ingres_Vestibular='$Vestibular', Ingres_Enem='$Enem', Ingres_Seriada='$Seriada', Ingres_Simplificada='$Simplificada', Ingres_Transferencia='$Transferencia', Ingres_Convenio='$Convenio', "
        . "Ingres_Judicial='$Judicial', Ingres_Remanescentes='$Remanescentes', Ingres_VagasEspeciais='$VagasEspeciais', programa_reserva_vagas='$ReservaVagas', ReservaEtico='$ReservaEtico', ReservaDeficiencia='$ReservaDeficiencia', "
        . "ReservaPublica='$ReservaPublica', finaceamento_estudantil='$FinanciamentoEstudantil', Fies='$Fies', "
        . "GovernoEstadualReembolsavel='$GovernoEstadualReembolsavel', GovernoMunicipalReembolsavel='$GovernoMunicipalReembolsavel', FinanciamentoIESReembolsavel='$FinanciamentoIESReembolsavel', FinanciamentoExternoReembolsavel='$FinanciamentoExternoReembolsavel', "
        . "ProuniIntegral='$ProuniIntegral', ProuniParcial='$ProuniParcial', FinanciamentoEstadual='$FinanciamentoEstadual', FinanciamentoIES='$FinanciamentoIES', FinanciamentoExterno='$FinanciamentoExterno', FinanciamentoMunicipal='$FinanciamentoMunicipal', "
        . "apoio_social='$ApoioSocial', ApoioAlimentacao='$ApoioAlimentacao', ApoioMoradia='$ApoioMoradia', ApoioTransporte='$ApoioTransporte', ApoioDidatico='$ApoioDidatico', ApoioTrabalho='$ApoioTrabalho', ApoioPermanencia='$ApoioPermanencia', "
        . "atividade_extracurricular='$AtividadeExtra', Pesquisa='$Pesquisa', Extensao='$Extensao ', Monitoria='$Monitoria', Estagio='$Estagio', bolsa_pesquisa='$BolsaPesquisa', bolsa_extensao='$BolsaExtensao ', bolsa_monitoria='$BolsaMonitoria', bolsa_estagio='$BolsaEstagio' WHERE id=$Id";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=menu_alunos.php");
?>

