<?php
session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
?>

<?php
require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

conexao();

$sql_seleciona = "SELECT * FROM aluno WHERE id = '" . $Id . "'";
$resultado = seleciona($sql_seleciona);

$res = mysql_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">

        <title>Gerenciador de dados educacionais</title>
        <link rel="stylesheet" type="text/css" href="css/estiloPadrao.css"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container-fluid" id="principal">

            <div class="row">

                <nav class="col-md-2" id="barraLateral" style=" height: 3200px;">

                    <aside class="span3 sidebar">

                        <ul id="menu" class="nav affix">

                            <li><img id="logo" src="imagens/logo.png" width="130" alt="logo"/>
                            </li>

                            <li><a href="home.php">
                                    <img id="home" src="imagens/home.png" width="25" alt="logo"/>Principal
                                </a> 
                            </li>

                            <li><a href="menu_alunos.php">Alunos</a>
                            </li> 

                            <li><a href="menu_professores.php">Docentes</a>
                            </li>

                            <li><a href="menu_cursos.php">Cursos</a>
                            </li>

                            <li><a href="menu_exportacao.php">Exportar dados</a>
                            </li>

                            <li><a href="menu_relatorios.php">Estatísticas</a>
                            </li>

                            <li><a href="menu_mais.php">Mais</a>
                            </li>

                            <li><a href="logout.php">Sair</a>
                            </li>
                        </ul>
                    </aside>

                </nav>

                <div class="col-md-10" id="conteudo">

                    <section> 
                        <h2 class="Titulo">Editar dados do aluno na base</h2> 

                        <button style="display: inline;" type="button" class="btn btn-warning" onclick="location.href = 'menu_alunos.php'">Cancelar</button>
                        <form style="display: inline;" method="post" action="bd_exclusao_aluno.php">
                            <input style="display: none;" type="text" name="id" value="<?php echo($res['id']); ?>">
                            <button style="display: inline;" type="submit" class="btn btn-danger">Excluir</button>
                        </form>

                        <form style="display: inline;" method="post" action="bd_atualizar_aluno.php" >

                            <input style="display: none;" type="text" name="id" value="<?php echo($res['id']); ?>">
                            <button style="display: inline;" type="submit" class="btn btn-primary">Salvar</button>

                            <HR NOSHADE SIZE="4">

                            <p>ID do Aluno:<input type="text" class="form-control" id="iIdAluno" name="nIdAluno" value="<?php echo($res['id_inep']); ?>"></p>

                            <p>ID na IES:<input type="text" class="form-control" id="iIdIES" name="nIdIES" value="<?php echo($res['id_ies']); ?>"></p>

                            <p>Matrícula:<input type="text" class="form-control" name="nMatricula" value="<?php echo($res['matricula']); ?>"></p>

                            <p>CPF do Aluno:<input type="text" class="form-control" id="iCpf" name="nCpf" value="<?php echo($res['cpf']); ?>"></p>

                            <p>Nome do Aluno:<input type="text" class="form-control" id="iNome" name="nNome" value="<?php echo($res['nome']); ?>"></p>

                            <p>Data de Nascimento: <input type="text" class="form-control" id="iNacimento" name="nNacimento" value="<?php echo($res['nascimento']); ?>"></p>

                            <p>Sexo do Aluno:</p>
                            <div class="radio">
                                <label><input type="radio" name="nSexo" id="iMasc" value="Masculino" <?php
                                    if ($res['sexo'] == 'Masculino') {
                                        echo 'checked/';
                                    }
                                    ?>>Masculino</label>
                                <label><input type="radio" name="nSexo" id="iFemi" value="Feminino" <?php
                                    if ($res['sexo'] == 'Feminino') {
                                        echo 'checked/';
                                    }
                                    ?>>Feminino</label>
                            </div>

                            <p>Nome Completo da Mãe:<input type="text" class="form-control" id="iNomeMae" name="nNomeMae" value="<?php echo($res['nome_mae']); ?>"></p>

                            <p>Cor/Raça do Aluno:</p>
                            <div class="radio">
                                <label><input type="radio" id="iBranca" name="nCor" value="Branca" <?php
                                    if ($res['cor_raca'] == 'Branca') {
                                        echo 'checked/';
                                    }
                                    ?>> Branca</label>
                                <label><input type="radio" id="iPreta" name="nCor" value="Preta" <?php
                                    if ($res['cor_raca'] == 'Preta') {
                                        echo 'checked/';
                                    }
                                    ?>> Preta</label>
                                <label><input type="radio" id="iParda" name="nCor" value="Parda" <?php
                                    if ($res['cor_raca'] == 'Parda') {
                                        echo 'checked/';
                                    }
                                    ?>> Parda</label>
                                <label><input type="radio" id="iAmarela" name="nCor" value="Amarela" <?php
                                    if ($res['cor_raca'] == 'Amarela') {
                                        echo 'checked/';
                                    }
                                    ?>> Amarela</label>
                                <label><input type="radio" id="iIndígina" name="nCor" value="Indigina" <?php
                                    if ($res['cor_raca'] == 'Indigina') {
                                        echo 'checked/';
                                    }
                                    ?>> Indígina</label>
                                <label><input type="radio" id="iSemInformacao" name="nCor" value="Nao dispoe da informacao" <?php
                                    if ($res['cor_raca'] == 'Nao dispoe da informacao') {
                                        echo 'checked/';
                                    }
                                    ?>> Não dispõe da informação</label>
                                <label><input type="radio" id="iSemDeclarar" name="nCor" value="Aluno nao quis declarar cor/raca" <?php
                                    if ($res['cor_raca'] == 'Aluno nao quis declarar cor/raca') {
                                        echo 'checked/';
                                    }
                                    ?>> Aluno não quis declarar cor/raça</label>
                            </div>

                            <p>Nacionalidade:</p>
                            <div class="radio">
                                <label><input type="radio" id="iBrasileira" name="nNacionalidade" value="Brasileira" <?php
                                    if ($res['nacionalidade'] == 'Brasileira') {
                                        echo 'checked/';
                                    }
                                    ?>> Brasileira</label>
                                <label><input type="radio" id="iNaturalizado" name="nNacionalidade" value="Brasileira - nascido no exterior ou naturalizado" <?php
                                    if ($res['nacionalidade'] == 'Brasileira - nascido no exterior ou naturalizado') {
                                        echo 'checked/';
                                    }
                                    ?>> Brasileira - nascido no exterior ou naturalizado</label>
                                <label><input type="radio" id="iEstrangeiro" name="nNacionalidade" value="Estrangeira" <?php
                                    if ($res['nacionalidade'] == 'Estrangeira') {
                                        echo 'checked/';
                                    }
                                    ?>> Estrangeira</label>
                            </div>

                            <p>País de Origem: <input type="text" class="form-control" id="iPaisOrigem" name="nPaisOrigem" value="<?php echo($res['pais_nacimento']); ?>"></p>

                            <p>UF de Nascimento: <input type="text" size="2" id="iUf" name="nUf" value="<?php echo($res['uf_nacimento']); ?>"></p>

                            <p>Município de Nascimento:<input type="text" class="form-control" id="iMunicipio" name="nMunicipio" value="<?php echo($res['municipio_nacimento']); ?>"></p>

                            <p>Aluno com Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p>

                            <div class="radio">
                                <label><input type="radio" name="nDeficienciaHabilidades" value="Sim" <?php
                                    if ($res['deficiencia_transtorno_superdotacao'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nDeficienciaHabilidades" value="Nao" <?php
                                    if ($res['deficiencia_transtorno_superdotacao'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>
                                <label><input type="radio" name="nDeficienciaHabilidades" value="Nao dispoe dessa informacao" <?php
                                    if ($res['deficiencia_transtorno_superdotacao'] == 'Nao dispoe dessa informacao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não dispõe dessa informação</label>
                            </div>

                            <p>Tipo de Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p>
                            <input type="checkbox" name="nCegueira" value="Sim" <?php
                            if ($res['def_Cegueira'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Cegueira
                            <input type="checkbox" name="nBaixaVisao" value="Sim" <?php
                            if ($res['def_BaixaVisao'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Baixa visão
                            <input type="checkbox" name="nSurdez" value="Sim" <?php
                            if ($res['def_Surdez'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Surdez
                            <input type="checkbox" name="nAuditiva" value="Sim" <?php
                            if ($res['def_Auditiva'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Deficiência auditiva<br>
                            <input type="checkbox" name="nFisica" value="Sim" <?php
                            if ($res['def_Fisica'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Deficiência física
                            <input type="checkbox" name="nSurdocegueira" value="Sim" <?php
                            if ($res['def_Surdocegueira'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Surdocegueira
                            <input type="checkbox" name="nMultipla" value="Sim" <?php
                            if ($res['def_Multipla'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Deficiência múltipla
                            <input type="checkbox" name="nIntelectual" value="Sim" <?php
                            if ($res['def_Intelectual'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Deficiência intelectual<br>
                            <input type="checkbox" name="nAutismo" value="Sim" <?php
                            if ($res['def_Autismo'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Autismo
                            <input type="checkbox" name="nAsperger" value="Sim" <?php
                            if ($res['def_Asperger'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Síndrome de Asperger
                            <input type="checkbox" name="nRett" value="Sim" <?php
                            if ($res['def_Rett'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Síndrome de Rett<br>
                            <input type="checkbox" name="nDesintegrativo" value="Sim" <?php
                            if ($res['def_Desintegrativo'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Transtorno desintegrativo de infância
                            <input type="checkbox" name="nSuperdotacao" value="Sim" <?php
                            if ($res['def_Superdotacao'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Altas habilidades/Superdotação<br><br>

                            <h2 class="Titulo">Vínculo do aluno ao curso</h2>

                            <HR NOSHADE SIZE="4">

                            <p>Código do Curso: <input type="text" class="form-control" id="iCodigoCurso" name="nCodigoCurso" value="<?php echo($res['codigo_curso']); ?>"></p>

                            <p>Código do Polo: <input type="text" class="form-control" id="iCodigoPolo" name="nCodigoPolo" value="<?php echo($res['codigo_polo']); ?>"></p>

                            <p>Turno do aluno no curso:</p>
                            <div class="radio">
                                <label><input type="radio" name="nTurno" value="Matutino" <?php
                                    if ($res['turno_aluno_curso'] == 'Matutino') {
                                        echo 'checked/';
                                    }
                                    ?>> Matutino</label>
                                <label><input type="radio" name="nTurno" value="Vespertino" <?php
                                    if ($res['turno_aluno_curso'] == 'Vespertino') {
                                        echo 'checked/';
                                    }
                                    ?>> Vespertino</label>
                                <label><input type="radio" name="nTurno" value="Noturno" <?php
                                    if ($res['turno_aluno_curso'] == 'Noturno') {
                                        echo 'checked/';
                                    }
                                    ?>> Noturno</label>
                                <label><input type="radio" name="nTurno" value="Integral" <?php
                                    if ($res['turno_aluno_curso'] == 'Integral') {
                                        echo 'checked/';
                                    }
                                    ?>> Integral</label><br><br>
                            </div>

                            <p>Situação do Vínculo do Aluno no Curso:</p>
                            <div class="radio">
                                <label><input type="radio" name="nSituacaoVinculo" value="Cursando" <?php
                                    if ($res['situacao_aluno_curso'] == 'Cursando') {
                                        echo 'checked/';
                                    }
                                    ?>>Cursando</label>
                                <label><input type="radio" name="nSituacaoVinculo" value="Formado" <?php
                                    if ($res['situacao_aluno_curso'] == 'Formado') {
                                        echo 'checked/';
                                    }
                                    ?>>Formado</label>
                                <label><input type="radio" name="nSituacaoVinculo" value="Matricula trancada" <?php
                                    if ($res['situacao_aluno_curso'] == 'Matricula trancada') {
                                        echo 'checked/';
                                    }
                                    ?>>Matrícula trancada </label>
                                <label><input type="radio" name="nSituacaoVinculo" value="Falecido" <?php
                                    if ($res['situacao_aluno_curso'] == 'Falecido') {
                                        echo 'checked/';
                                    }
                                    ?>>Falecido</label>
                                <label><input type="radio" name="nSituacaoVinculo" value="Desvinculado do curso" <?php
                                    if ($res['situacao_aluno_curso'] == 'Desvinculado do curso') {
                                        echo 'checked/';
                                    }
                                    ?>>Desvinculado do curso</label>
                                <label><input type="radio" name="nSituacaoVinculo" value="Transferido para outro curso da mesma IES" <?php
                                    if ($res['situacao_aluno_curso'] == 'Transferido para outro curso da mesma IES') {
                                        echo 'checked/';
                                    }
                                    ?>>Transferido para outro cursoda mesma IES</label>
                            </div>

                            <p>Carga Horária Total: <input type="text" class="form-control" id="iCargaHoraria" name="nCargaHoraria" value="<?php echo($res['carga_horaria_total']); ?>"></p>

                            <p>Carga Horária Integralizada: <input type="text" class="form-control" id="iCargaIntegralizada" name="nCargaIntegralizada" value="<?php echo($res['carga_horaria_integralizada']); ?>"></p>

                            <p>Semestre de conclusão do Curso:</p>
                            <div class="radio">
                                <label><input type="radio" name="nSemestreConclusao" value="Primeiro" <?php
                                    if ($res['semestre_conclusao'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>>Primeiro</label>
                                <label><input type="radio" name="nSemestreConclusao" value="Segundo" <?php
                                    if ($res['semestre_conclusao'] == '2') {
                                        echo 'checked/';
                                    }
                                    ?>>Segundo</label>
                            </div>

                            <p>Aluno PARFOR?:</p>
                            <div class="radio">
                                <label><input type="radio" name="nAlunoParfor" value="Sim" <?php
                                    if ($res['aluno_parfor'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nAlunoParfor" value="Nao" <?php
                                    if ($res['aluno_parfor'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>
                            </div>

                            <p>Mobilidade Acadêmica?</p>
                            <div class="radio">
                                <input type="radio" name="nMobilidadeAcademica" value="Sim" <?php
                                if ($res['mobilidade_academica'] == 'Sim') {
                                    echo 'checked/';
                                }
                                ?>> Nacional
                                <input type="radio" name="nMobilidadeAcademica" value="Nao"<?php
                                if ($res['mobilidade_academica'] == 'Nao') {
                                    echo 'checked/';
                                }
                                ?>> Internacional<br><br>
                            </div>

                            <p>Tipo de Mobilidade Acadêmica:</p>
                            <div class="radio">
                                <input type="radio" name="nTipoMobilidadeAcademica" value="Nacional" <?php
                                if ($res['tipo_mobilidade'] == 'Nacional') {
                                    echo 'checked/';
                                }
                                ?>> Nacional
                                <input type="radio" name="nTipoMobilidadeAcademica" value="Internacional"<?php
                                if ($res['tipo_mobilidade'] == 'Internacional') {
                                    echo 'checked/';
                                }
                                ?>> Internacional<br><br>
                            </div>

                            <p>IES Destino - Mobilidade Acadêmica Nacional:<input type="text" class="form-control" id="iIesDestino" name="nIesDestino" value="<?php echo($res['destino_mobilidade_nacional']); ?>"></p>

                            <p>Tipo de Mobilidade Acadêmica Internacional:</p>
                            <div class="radio">
                                <input type="radio" name="nTipoMobilidade" value="Intercambio" <?php
                                if ($res['tipo_mobilidade_internacional'] == 'Intercambio') {
                                    echo 'checked/';
                                }
                                ?>> Intercâmbio
                                <input type="radio" name="nTipoMobilidade" value="Ciencia sem fronteiras" <?php
                                if ($res['tipo_mobilidade_internacional'] == 'Ciencia sem fronteiras') {
                                    echo 'checked/';
                                }
                                ?>> Ciência sem fronteiras<br><br>
                            </div>

                            <p>País Destino - Mobilidade Acadêmica Internacional:<input type="text" class="form-control" id="iPaisDestino" name="nPaisDestino" value="<?php echo($res['pais_destino']); ?>"></p>

                            <p>Tipo de Escola que Concluiu o Ensino Médio:</p>

                            <div class="radio">
                                <label><input type="radio" name="nTipoEscola" value="Privada" <?php
                                    if ($res['tipo_escola_ensino_medio'] == 'Privada') {
                                        echo 'checked/';
                                    }
                                    ?>>Privada</label>
                                <label><input type="radio" name="nTipoEscola" value="Publica" <?php
                                    if ($res['tipo_escola_ensino_medio'] == 'Publica') {
                                        echo 'checked/';
                                    }
                                    ?>>Pública</label>
                                <label><input type="radio" name="nTipoEscola" value="Nao dispoe dessa informacao" <?php
                                    if ($res['tipo_escola_ensino_medio'] == 'Nao dispoe dessa informacao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não dispõe dessa informação</label>
                            </div>

                            <p>Semestre de Ingresso no Curso:<input type="text" class="form-control" id="iSemestreIngresso" name="nSemestreIngresso" value="<?php echo($res['semestre_ingresso']); ?>"></p>

                            <p>Forma de Ingresso/Seleção:</p>

                            <input type="checkbox" name="nVestibular" value="Sim"<?php
                            if ($res['Ingres_Vestibular'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>>Vestibular
                            <input type="checkbox" name="nEnem" value="Sim" <?php
                            if ($res['Ingres_Enem'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>>Enem
                            <input type="checkbox" name="nSeriada" value="Sim" <?php
                            if ($res['Ingres_Seriada'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>>Avaliação seriada
                            <input type="checkbox" name="nSimplificada" value="Sim" <?php
                            if ($res['Ingres_Simplificada'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>>Seleção Simplificada (analise de currículo,entrevista,etc.)
                            <input type="checkbox" name="nTransferencia" value="Sim" <?php
                            if ($res['Ingres_Transferencia'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>>Transferência Ex-Officio
                            <input type="checkbox" name="nConvenio" value="Sim" <?php
                            if ($res['Ingres_Convenio'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>>Convênio PEC-G
                            <input type="checkbox" name="nJudicial" value="Sim" <?php
                            if ($res['Ingres_Judicial'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>>Decisão Judicial
                            <input type="checkbox" name="nRemanescentes" value="Sim" <?php
                            if ($res['Ingres_Remanescentes'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>>Seleção para vagas remanescentes
                            <input type="checkbox" name="nVagasEspeciais" value="Sim" <?php
                            if ($res['Ingres_VagasEspeciais'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>>Seleção para vagas de programas especiais

                            <p>Participa de Programa de reserva de vagas?</p>
                            <div class="radio">
                                <label><input type="radio" name="nReservaVagas" value="Sim" <?php
                                    if ($res['programa_reserva_vagas'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nReservaVagas" value="Nao" <?php
                                    if ($res['programa_reserva_vagas'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>
                            </div>

                            <p>Tipo de Programa de Reserva de Vagas</p>
                            <input type="checkbox" name="nReservaEtico" value="Sim" <?php
                            if ($res['ReservaEtico'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Étnico
                            <input type="checkbox" name="nReservaDeficiencia" value="Sim" <?php
                            if ($res['ReservaDeficiencia'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Pessoa com deficiência
                            <input type="checkbox" name="nReservaPublica" value="Sim" <?php
                            if ($res['ReservaPublica'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Estudante procedente de escola pública<br>
                            <input type="checkbox" name="nReservaSocial" value="Sim" <?php
                            if ($res['ReservaSocial'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Social
                            <input type="checkbox" name="nReservaOutro" value="Sim" <?php
                            if ($res['ReservaOutros'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Outro<br><br>

                            <p>Possui Financiamento Estudantil?</p>
                            <div class="radio">
                                <label><input type="radio" name="nFinanciamentoEstudantil" value="Sim" <?php
                                    if ($res['finaceamento_estudantil'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nFinanciamentoEstudantil" value="Nao" <?php
                                    if ($res['finaceamento_estudantil'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>
                            </div>

                            <p>Tipo de Financiamento Estudantil Reembolsável</p>
                            <input type="checkbox" name="nFies" value="Sim" <?php
                            if ($res['Fies'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> FIES
                            <input type="checkbox" name="nGovernoEstadualReembolsavel" value="Sim" <?php
                            if ($res['GovernoEstadualReembolsavel'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Programa de financiamento do governo estadual
                            <input type="checkbox" name="nGovernoMunicipalReembolsavel" value="Sim" <?php
                            if ($res['GovernoMunicipalReembolsavel'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Programa de financiamento do governo municipal
                            <input type="checkbox" name="nFinanciamentoIESReembolsavel" value="Sim" <?php
                            if ($res['FinanciamentoIESReembolsavel'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Programa de financiamento da IES
                            <input type="checkbox" name="nFinanciamentoExternoReembolsavel" value="Sim" <?php
                            if ($res['FinanciamentoExternoReembolsavel'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Programa de financiamento de entidades externas<br><br>

                            <p>Tipo de Financiamento Estudantil não Reembolsável</p>
                            <input type="checkbox" name="nProuniIntegral" value="Sim" <?php
                            if ($res['ProuniIntegral'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> ProUni integral
                            <input type="checkbox" name="nProuniParcial" value="Sim" <?php
                            if ($res['ProuniParcial'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> ProUni parcial
                            <input type="checkbox" name="nFinanciamentoEstadual" value="Sim" <?php
                            if ($res['FinanciamentoEstadual'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Programa de financiamento do governo estadual<br>
                            <input type="checkbox" name="nFinanciamentoIES" value="Sim" <?php
                            if ($res['FinanciamentoIES'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Programa de financiamento da IES
                            <input type="checkbox" name="nFinanciamentoExterno" value="Sim" <?php
                            if ($res['FinanciamentoExterno'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Programa de financiamento de entidades externas
                            <input type="checkbox" name="nFinanciamentoMunicipal" value="Sim" <?php
                            if ($res['FinanciamentoMunicipal'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Programa de financiamento do governo municipal<br><br>

                            <p>Possui Apoio Social?</p>
                            <div class="radio">
                                <label><input type="radio" name="nApoioSocial" value="Sim" <?php
                                    if ($res['apoio_social'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nApoioSocial" value="Nao" <?php
                                    if ($res['apoio_social'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>
                            </div>

                            <p>Tipo de Apoio Social</p>
                            <input type="checkbox" name="nApoioAlimentacao" value="Sim" <?php
                            if ($res['ApoioAlimentacao'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Alimentação
                            <input type="checkbox" name="nApoioMoradia" value="Sim" <?php
                            if ($res['ApoioMoradia'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Moradia
                            <input type="checkbox" name="nApoioTransporte" value="Sim" <?php
                            if ($res['ApoioTransporte'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Transporte<br>
                            <input type="checkbox" name="nApoioDidatico" value="Sim" <?php
                            if ($res['ApoioDidatico'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Material didático
                            <input type="checkbox" name="nApoioTrabalho" value="Sim" <?php
                            if ($res['ApoioTrabalho'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Bolsa trabalho
                            <input type="checkbox" name="nApoioPermanencia" value="Sim" <?php
                            if ($res['ApoioPermanencia'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Bolsa permanência<br><br>

                            <p>Atividade Extracurricular</p>
                            <div class="radio">
                                <label><input type="radio" name="nAtividadeExtra" value="Sim" <?php
                                    if ($res['atividade_extracurricular'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nAtividadeExtra" value="Nao" <?php
                                    if ($res['atividade_extracurricular'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>
                            </div>

                            <p>Tipo de Atividade Extracurricular</p>
                            <input type="checkbox" name="nPesquisa" value="Sim" <?php
                            if ($res['Pesquisa'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Pesquisa
                            <input type="checkbox" name="nExtensao" value="Sim" <?php
                            if ($res['Extensao'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Extensão<br>
                            <input type="checkbox" name="nMonitoria" value="Sim" <?php
                            if ($res['Monitoria'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Monitoria
                            <input type="checkbox" name="nEstagio" value="Sim" <?php
                            if ($res['Estagio'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Estágio não obrigatório<br><br>

                            <p>Bolsa Atividade Extracurricular</p>
                            <input type="checkbox" name="nBolsaPesquisa" value="Sim" <?php
                            if ($res['bolsa_pesquisa'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Bolsa Pesquisa
                            <input type="checkbox" name="nBolsaExtensao" value="Sim" <?php
                            if ($res['bolsa_extensao'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Bolsa Extensão<br>
                            <input type="checkbox" name="nBolsaMonitoria" value="Sim" <?php
                            if ($res['bolsa_monitoria'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Bolsa Monitoria
                            <input type="checkbox" name="nBolsaEstagio" value="Sim" <?php
                            if ($res['bolsa_estagio'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Bolsa Estágio não obrigatório<br><br>

                        </form>

                    </section>

                </div>

            </div> <!-- Fim da div row principal -->

        </div> <!-- Fim da div container -->
    </body>

</html>



