<?php
session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
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
                        <h2 class="Titulo">Adicionar discente a base</h2> 

                        <HR NOSHADE SIZE="4">

                        <form method="post" action="bd_inserir_aluno.php" >

                            <p>ID do Aluno:<input type="text" class="form-control" id="iIdAluno" name="nIdAluno"></p>

                            <p>ID na IES:<input type="text" class="form-control" id="iIdIES" name="nIdIES"></p>

                            <p>Matrícula:<input type="text" class="form-control" name="nMatricula"></p>

                            <p>CPF do Aluno:<input type="text" class="form-control" id="iCpf" name="nCpf"></p>

                            <p>Nome do Aluno:<input type="text" class="form-control" id="iNome" name="nNome"></p>

                            <p>Data de Nascimento: <input type="text" class="form-control" id="iNacimento" name="nNacimento"></p>

                            <p>Sexo do Aluno:</p>
                            <div class="radio">
                                <label><input type="radio" name="nSexo" id="iMasc" value="Masculino" checked/>Masculino</label>
                                <label><input type="radio" name="nSexo" id="iFemi" value="Feminino">Feminino</label>
                            </div>

                            <p>Nome Completo da Mãe:<input type="text" class="form-control" id="iNomeMae" name="nNomeMae"></p>

                            <p>Cor/Raça do Aluno:</p>
                            <div class="radio">
                                <label><input type="radio" id="iBranca" name="nCor" value="Branca"> Branca</label>
                                <label><input type="radio" id="iPreta" name="nCor" value="Preta"> Preta</label>
                                <label><input type="radio" id="iParda" name="nCor" value="Parda"> Parda</label>
                                <label><input type="radio" id="iAmarela" name="nCor" value="Amarela"> Amarela</label>
                                <label><input type="radio" id="iIndígina" name="nCor" value="Indigina"> Indígina</label>
                                <label><input type="radio" id="iSemInformacao" name="nCor" value="Nao dispoe da informacao" checked/> Não dispõe da informação</label>
                                <label><input type="radio" id="iSemDeclarar" name="nCor" value="Aluno nao quis declarar cor/raca"> Aluno não quis declarar cor/raça</label>
                            </div>

                            <p>Nacionalidade:</p>
                            <div class="radio">
                                <label><input type="radio" id="iBrasileira" name="nNacionalidade" value="Brasileira" checked/> Brasileira</label>
                                <label><input type="radio" id="iNaturalizado" name="nNacionalidade" value="Brasileira - nascido no exterior ou naturalizado"> Brasileira - nascido no exterior ou naturalizado</label>
                                <label><input type="radio" id="iEstrangeiro" name="nNacionalidade" value="Estrangeira"> Estrangeira</label>
                            </div>

                            <p>País de Origem: <input type="text" class="form-control" id="iPaisOrigem" name="nPaisOrigem"></p>

                            <p>UF de Nascimento: <input type="text" size="2" id="iUf" name="nUf"></p>

                            <p>Município de Nascimento:<input type="text" class="form-control" id="iMunicipio" name="nMunicipio"></p>

                            <p>Aluno com Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p>

                            <div class="radio">
                                <label><input type="radio" name="nDeficienciaHabilidades" value="Sim">Sim</label>
                                <label><input type="radio" name="nDeficienciaHabilidades" value="Nao">Não</label>
                                <label><input type="radio" name="nDeficienciaHabilidades" value="Nao dispoe dessa informacao" checked/>Não dispõe dessa informação</label>
                            </div>

                            <p>Tipo de Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p>
                            <input type="checkbox" name="nCegueira" value="Sim"> Cegueira
                            <input type="checkbox" name="nBaixaVisao" value="Sim"> Baixa visão
                            <input type="checkbox" name="nSurdez" value="Sim"> Surdez
                            <input type="checkbox" name="nAuditiva" value="Sim"> Deficiência auditiva<br>
                            <input type="checkbox" name="nFisica" value="Sim"> Deficiência física
                            <input type="checkbox" name="nSurdocegueira" value="Sim"> Surdocegueira
                            <input type="checkbox" name="nMultipla" value="Sim"> Deficiência múltipla
                            <input type="checkbox" name="nIntelectual" value="Sim"> Deficiência intelectual<br>
                            <input type="checkbox" name="nAutismo" value="Sim"> Autismo
                            <input type="checkbox" name="nAsperger" value="Sim"> Síndrome de Asperger
                            <input type="checkbox" name="nRett" value="Sim"> Síndrome de Rett<br>
                            <input type="checkbox" name="nDesintegrativo" value="Sim"> Transtorno desintegrativo de infância
                            <input type="checkbox" name="nSuperdotacao" value="Sim"> Altas habilidades/Superdotação<br><br>

                            <h2 class="Titulo">Vínculo do aluno ao curso</h2>

                            <HR NOSHADE SIZE="4">

                            <p>Código do Curso: <input type="text" class="form-control" id="iCodigoCurso" name="nCodigoCurso"></p>

                            <p>Código do Polo: <input type="text" class="form-control" id="iCodigoPolo" name="nCodigoPolo"></p>

                            <p>Turno do aluno no curso:</p>
                            <div class="radio">
                                <label><input type="radio" name="nTurno" value="Matutino"> Matutino</label>
                                <label><input type="radio" name="nTurno" value="Vespertino"> Vespertino</label>
                                <label><input type="radio" name="nTurno" value="Noturno"> Noturno</label>
                                <label><input type="radio" name="nTurno" value="Integral"> Integral</label><br><br>
                            </div>

                            <p>Situação do Vínculo do Aluno no Curso:</p>
                            <div class="radio">
                                <label><input type="radio" name="nSituacaoVinculo" value="Cursando" checked/>Cursando</label>
                                <label><input type="radio" name="nSituacaoVinculo" value="Formado">Formado</label>
                                <label><input type="radio" name="nSituacaoVinculo" value="Matricula trancada">Matrícula trancada </label>
                                <label><input type="radio" name="nSituacaoVinculo" value="Falecido">Falecido</label>
                                <label><input type="radio" name="nSituacaoVinculo" value="Desvinculado do curso">Desvinculado do curso</label>
                                <label><input type="radio" name="nSituacaoVinculo" value="Transferido para outro curso da mesma IES">Transferido para outro cursoda mesma IES</label>
                            </div>

                            <p>Carga Horária Total: <input type="text" class="form-control" id="iCargaHoraria" name="nCargaHoraria"></p>

                            <p>Carga Horária Integralizada: <input type="text" class="form-control" id="iCargaIntegralizada" name="nCargaIntegralizada"></p>

                            <p>Semestre de conclusão do Curso:</p>
                            <div class="radio">
                                <label><input type="radio" name="nSemestreConclusao" value="Primeiro">Primeiro</label>
                                <label><input type="radio" name="nSemestreConclusao" value="Segundo">Segundo</label>
                            </div>

                            <p>Aluno PARFOR?:</p>
                            <div class="radio">
                                <label><input type="radio" name="nAlunoParfor" value="Sim">Sim</label>
                                <label><input type="radio" name="nAlunoParfor" value="Nao" checked/>Não</label>
                            </div>

                            <p>Mobilidade Acadêmica?</p>
                            <div class="radio">
                                <label><input type="radio" name="nMobilidadeAcademica" value="Sim"> Sim</label>
                                <label><input type="radio" name="nMobilidadeAcademica" value="Nao"> Não</label><br><br>
                            </div>

                            <p>Tipo de Mobilidade Acadêmica:</p>
                            <div class="radio">
                                <label><input type="radio" name="nTipoMobilidadeAcademica" value="Nacional"> Nacional</label>
                                <label><input type="radio" name="nTipoMobilidadeAcademica" value="Internacional"> Internacional</label><br><br>
                            </div>

                            <p>IES Destino - Mobilidade Acadêmica Nacional:<input type="text" class="form-control" id="iIesDestino" name="nIesDestino"></p>

                            <p>Tipo de Mobilidade Acadêmica Internacional:</p>
                            <div class="radio">
                                <label><input type="radio" name="nTipoMobilidade" value="Intercambio"> Intercâmbio</label>
                                <label><input type="radio" name="nTipoMobilidade" value="Ciencia sem fronteiras"> Ciência sem fronteiras</label><br><br>
                            </div>

                            <p>País Destino - Mobilidade Acadêmica Internacional:<input type="text" class="form-control" id="iPaisDestino" name="nPaisDestino"></p>

                            <p>Tipo de Escola que Concluiu o Ensino Médio:</p>

                            <div class="radio">
                                <label><input type="radio" name="nTipoEscola" value="Privada">Privada</label>
                                <label><input type="radio" name="nTipoEscola" value="Publica">Pública</label>
                                <label><input type="radio" name="nTipoEscola" value="Nao dispoe dessa informacao">Não dispõe dessa informação</label>
                            </div>

                            <p>Semestre de Ingresso no Curso:<input type="text" class="form-control" id="iSemestreIngresso" name="nSemestreIngresso"></p>

                            <p>Forma de Ingresso/Seleção:</p>

                            <input type="checkbox" name="nVestibular" value="Sim" checked/>Vestibular
                            <input type="checkbox" name="nEnem" value="Sim">Enem
                            <input type="checkbox" name="nSeriada" value="Sim">Avaliação seriada
                            <input type="checkbox" name="nSimplificada" value="Sim">Seleção Simplificada (analise de currículo,entrevista,etc.)
                            <input type="checkbox" name="nTransferencia" value="Sim">Transferência Ex-Officio
                            <input type="checkbox" name="nConvenio" value="Sim">Convênio PEC-G
                            <input type="checkbox" name="nJudicial" value="Sim">Decisão Judicial
                            <input type="checkbox" name="nRemanescentes" value="Sim">Seleção para vagas remanescentes
                            <input type="checkbox" name="nVagasEspeciais" value="Sim">Seleção para vagas de programas especiais

                            <p>Participa de Programa de reserva de vagas?</p>
                            <div class="radio">
                                <label><input type="radio" name="nReservaVagas" value="Sim">Sim</label>
                                <label><input type="radio" name="nReservaVagas" value="Nao">Não</label>
                            </div>

                            <p>Tipo de Programa de Reserva de Vagas</p>
                            <input type="checkbox" name="nReservaEtico" value="Sim"> Étnico
                            <input type="checkbox" name="nReservaDeficiencia" value="Sim"> Pessoa com deficiência
                            <input type="checkbox" name="nReservaPublica" value="Sim"> Estudante procedente de escola pública<br>
                            <input type="checkbox" name="nReservaSocial" value="Sim"> Social
                            <input type="checkbox" name="nReservaOutro" value="Sim"> Outro<br><br>

                            <p>Possui Financiamento Estudantil?</p>
                            <div class="radio">
                                <label><input type="radio" name="nFinanciamentoEstudantil" value="Sim">Sim</label>
                                <label><input type="radio" name="nFinanciamentoEstudantil" value="Nao" checked/>Não</label>
                            </div>

                            <p>Tipo de Financiamento Estudantil Reembolsável</p>
                            <input type="checkbox" name="nFies" value="Sim"> FIES
                            <input type="checkbox" name="nGovernoEstadualReembolsavel" value="Sim"> Programa de financiamento do governo estadual
                            <input type="checkbox" name="nGovernoMunicipalReembolsavel" value="Sim"> Programa de financiamento do governo municipal
                            <input type="checkbox" name="nFinanciamentoIESReembolsavel" value="Sim"> Programa de financiamento da IES
                            <input type="checkbox" name="nFinanciamentoExternoReembolsavel" value="Sim"> Programa de financiamento de entidades externas<br><br>

                            <p>Tipo de Financiamento Estudantil não Reembolsável</p>
                            <input type="checkbox" name="nProuniIntegral" value="Sim"> ProUni integral
                            <input type="checkbox" name="nProuniParcial" value="Sim"> ProUni parcial
                            <input type="checkbox" name="nFinanciamentoEstadual" value="Sim"> Programa de financiamento do governo estadual<br>
                            <input type="checkbox" name="nFinanciamentoIES" value="Sim"> Programa de financiamento da IES
                            <input type="checkbox" name="nFinanciamentoExterno" value="Sim"> Programa de financiamento de entidades externas
                            <input type="checkbox" name="nFinanciamentoMunicipal" value="Sim"> Programa de financiamento do governo municipal<br><br>

                            <p>Possui Apoio Social?</p>
                            <div class="radio">
                                <label><input type="radio" name="nApoioSocial" value="Sim">Sim</label>
                                <label><input type="radio" name="nApoioSocial" value="Nao">Não</label>
                            </div>

                            <p>Tipo de Apoio Social</p>
                            <input type="checkbox" name="nApoioAlimentacao" value="Sim"> Alimentação
                            <input type="checkbox" name="nApoioMoradia" value="Sim"> Moradia
                            <input type="checkbox" name="nApoioTransporte" value="Sim"> Transporte<br>
                            <input type="checkbox" name="nApoioDidatico" value="Sim"> Material didático
                            <input type="checkbox" name="nApoioTrabalho" value="Sim"> Bolsa trabalho
                            <input type="checkbox" name="nApoioPermanencia" value="Sim"> Bolsa permanência<br><br>

                            <p>Atividade Extracurricular</p>
                            <div class="radio">
                                <label><input type="radio" name="nAtividadeExtra" value="Sim">Sim</label>
                                <label><input type="radio" name="nAtividadeExtra" value="Nao">Não</label>
                            </div>

                            <p>Tipo de Atividade Extracurricular</p>
                            <input type="checkbox" name="nPesquisa" value="Sim"> Pesquisa
                            <input type="checkbox" name="nExtensao" value="Sim"> Extensão<br>
                            <input type="checkbox" name="nMonitoria" value="Sim"> Monitoria
                            <input type="checkbox" name="nEstagio" value="Sim"> Estágio não obrigatório<br><br>

                            <p>Bolsa Atividade Extracurricular</p>
                            <input type="checkbox" name="nBolsaPesquisa" value="Sim"> Bolsa Pesquisa
                            <input type="checkbox" name="nBolsaExtensao" value="Sim"> Bolsa Extensão<br>
                            <input type="checkbox" name="nBolsaMonitoria" value="Sim"> Bolsa Monitoria
                            <input type="checkbox" name="nBolsaEstagio" value="Sim"> Bolsa Estágio não obrigatório<br><br>

                            <div id="botoesAdicao">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                        <button type="button" class="btn btn-warning" onclick="location.href = 'menu_alunos.php'">Cancelar</button>
                </div>


                </section>

            </div>

        </div> <!-- Fim da div row principal -->

    </div> <!-- Fim da div container -->
</body>

</html>



