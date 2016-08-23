<?php
session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}

require_once('funcoes_uteis.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">

        <title>Gerenciador de Dados Educacionais</title>
        <link rel="stylesheet" type="text/css" href="css/estiloPadrao.css"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container-fluid" id="principal">

            <div class="row">

                <nav class="col-md-2" id="barraLateral" style="height: 2800px;">

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

                        <div id="indexTitulo">

                            <h2 class="Titulo">Relatórios Estatísticos da instituição:</h2>

                            <h2 style="color: gray;">Departamento</h2>

                            <p>Utilize esta sessão para extrair informações sobre os docentes alocados nos diversos departamentos da instituição.</p>

                            <HR NOSHADE SIZE="6">

                            <form method="post" action="relatorio_departamentos.php">

                                <input type="checkbox" name="nBIO" value="sim"> DBIO 
                                <input type="checkbox" name="nEXA" value="sim"> DEXA
                                <input type="checkbox" name="nCHF" value="sim"> DCHF
                                <input type="checkbox" name="nCIS" value="sim"> DCIS
                                <input type="checkbox" name="nEDU" value="sim"> DEDU
                                <input type="checkbox" name="nFIS" value="sim"> DFIS
                                <input type="checkbox" name="nDLET" value="sim"> DLET
                                <input type="checkbox" name="nSAU" value="sim"> DSAU
                                <input type="checkbox" name="nTEC" value="sim"> DTEC

                                <HR NOSHADE SIZE="6">

                                <p>Sexo do docente: <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nMasculuno" value="sim"> Masculino
                                <input type="checkbox" name="nFeminino" value="sim"> Feminino
                                <br>
                                <br>
                                <p>Cor/Raça do Docente: <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nBranca" value="sim"> Branca
                                <input type="checkbox" name="nPreta" value="sim"> Preta
                                <input type="checkbox" name="nParda" value="sim"> Parda
                                <input type="checkbox" name="nAmarela" value="sim"> Amarela
                                <input type="checkbox" name="nIndigena" value="sim"> Indígena
                                <input type="checkbox" name="nSemDeclaracao" value="sim"> Docente não quis declarar cor/raça
                                <br>
                                <br>
                                <p>Nacionalidade: <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nBrasileira" value="sim" > Brasileira
                                <input type="checkbox" name="nNaturalizado" value="sim"> Brasileira - nascido no exterior ou naturalizado
                                <input type="checkbox" name="nEstrangeira" value="sim"> Estrangeira
                                <br>
                                <br>
                                <p>Docente com Deficiência: <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nComDeficiencia" value="sim"> Sim
                                <input type="checkbox" name="nSemDeficiencia" value="sim" > Não
                                <br>
                                <br>
                                <p>Pós-Graduação <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nEspecializacao" value="sim"> Especialização
                                <input type="checkbox" name="nMestrado" value="sim" > Mestrado
                                <input type="checkbox" name="nDoutorado" value="sim"> Doutorado
                                <input type="checkbox" name="nNaoPossui" value="sim"> Não possui
                                <br>
                                <br>
                                <p>Situação do Docente na IES <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nEsteveEmExercicio" value="sim"> Esteve em exercício
                                <input type="checkbox" name="nAfastadoParaQualificacao" value="sim"> Afastado para qualificação
                                <input type="checkbox" name="nAfastadoParaTreinamento" value="sim"> Afastado para tratamento de saúde
                                <input type="checkbox" name="nAfastadoOutrosOrgaos" value="sim"> Afastado para exercício em outros órgãos/entidades
                                <input type="checkbox" name="nAfastadoOutrosMotivos" value="sim"> Afastado por outros motivos
                                <br>
                                <br>
                                <p>Regime de Trabalho <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nIntegralComDE" value="sim"> Tempo integral com DE
                                <input type="checkbox" name="nIntegralSemDE" value="sim"> Tempo integral sem DE
                                <input type="checkbox" name="nTempoParcial" value="sim"> Tempo parcial
                                <input type="checkbox" name="nHorista" value="sim"> Horista
                                <br>
                                <br>
                                <p>Docente Substituto? <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nSubstituto" value="sim"> Sim
                                <input type="checkbox" name="nNaoSubstituto" value="sim"> Não
                                <br>
                                <br>
                                <p>Atuação do Docente <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nEnsinoPosDistancia" value="sim"> Ensino de pós-graduação stricto sensu a distância
                                <input type="checkbox" name="nEnsinoGraduacao" value="sim"> Ensino em curso de graduação presencial<br>
                                <input type="checkbox" name="nEnsinoGraduacaoEAD" value="sim"> Ensino em curso a distância
                                <input type="checkbox" name="nEnsinoPosPresencial" value="sim"> Ensino de pós-graduação stricto sensu presencial
                                <input type="checkbox" name="nPesquisa" value="sim"> Pesquisa<br>
                                <input type="checkbox" name="nExtensao" value="sim"> Extensão
                                <input type="checkbox" name="nGestao" value="sim"> Gestão, planejamento e avaliação
                                <br>
                                <br>
                                <p>Classe <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nTitular" value="sim"> Titular
                                <input type="checkbox" name="nAdjunto" value="sim"> Adjunto
                                <input type="checkbox" name="nPleno" value="sim"> Pleno
                                <input type="checkbox" name="nAssistente" value="sim"> Assistente
                                <input type="checkbox" name="nSubstituto" value="sim"> Substituto
                                <input type="checkbox" name="nAuxiliar" value="sim"> Auxiliar

                                <br><br>

                                <p>Código da Unidade Federal: <input type="text" name="nCodigoUF"></p>
                                <br>
                                <p>Código do Município: <input type="text" name="nCodigoMunicipio"></p>
                                <br>

                                <p><input type="checkbox" name="nComNomes" value="Sim"> Incluir nomes no relatório.</p>

                                <div class="btn-group" role="group" aria-label="...">
                                    <button type="submit" class="btn btn-default" onclick="alert('Este módulo foi desativado pelo desenvolvedor.')"> Gerar relatório</button>

                                </div>

                            </form >

                            <br>
                            <br>

                            <h2 style="color: gray;">Cursos</h2>
                            <p>Utilize esta sessão para extrair informações sobre os discentes alocados nos diversos cursos da instituição.</p>
                            <HR NOSHADE SIZE="6">

                            <form method="post" action="relatorio_alunos.php">

                                <p>Nome do curso: 

                                    <SELECT NAME = "nListaCursos" SIZE=1>

                                        <?php
                                        conexao();

                                        $sql_seleciona = "SELECT nome, id FROM curso";
                                        $resultado = seleciona($sql_seleciona);

                                        while ($res = mysql_fetch_assoc($resultado)) {

                                            echo ('<OPTION value = "'.$res['nome'].'">' . $res['nome']);
                                        }
                                        ?>

                                    </SELECT>
                                <p>

                                <br>

                                <p>Sexo do Aluno: <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p> 

                                <input type="checkbox" name="nMasculino" value="Masculino"> Masculino
                                <input type="checkbox" name="nFeminino" value="Feminino"> Feminino
                                <br>
                                <br>
                                <p>Cor/Raça do Aluno: <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nBranca" value="sim"> Branca
                                <input type="checkbox" name="nPreta" value="sim"> Preta
                                <input type="checkbox" name="nParda" value="sim"> Parda
                                <input type="checkbox" name="nAmarela" value="sim"> Amarela
                                <input type="checkbox" name="nIndigina" value="sim"> Indígina
                                <input type="checkbox" name="nNaoDeclarado" value="sim"> Aluno não quis declarar cor/raça
                                <br>
                                <br>
                                <p>Nacionalidade: <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nBrasileira" value="sim" > Brasileira
                                <input type="checkbox" name="nNaturalizado" value="sim"> Brasileira - nascido no exterior ou naturalizado
                                <input type="checkbox" name="nEstrangeiro" value="sim"> Estrangeira
                                <br>
                                <br>
                                <p>Docente com Deficiência: <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nComDeficiencia" value="sim"> Sim
                                <input type="checkbox" name="nSemDeficiencia" value="sim" > Não
                                
                                <br><br>

                                <p>Situação do Vínculo do Aluno no Curso: <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nCursando" value="sim"> Cursando
                                <input type="checkbox" name="nFormado" value="sim"> Formado
                                <input type="checkbox" name="nMatriculaTrancada" value="sim"> Matrícula trancada 
                                <input type="checkbox" name="nFalecido" value="sim"> Falecido
                                <input type="checkbox" name="nDesvinculado" value="sim"> Desvinculado do curso
                                <input type="checkbox" name="nTransferido" value="sim"> Transferido para outro cursoda mesma IES
                                <br><br>
                                <p>Turno do aluno no curso: <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nMatutino" value="sim"> Matutino
                                <input type="checkbox" name="nVespertino" value="sim"> Vespertino
                                <input type="checkbox" name="nNoturno" value="sim"> Noturno
                                <input type="checkbox" name="nIntegral" value="sim"> Integral<br><br>

                                <p>Forma de Ingresso/Seleção: <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>

                                <input type="checkbox" name="nVestibular" value="sim"> Vestibular
                                <input type="checkbox" name="nEnem" value="sim"> Enem
                                <input type="checkbox" name="nSeriada" value="sim"> Avaliação seriada
                                <input type="checkbox" name="nSimplificada" value="sim"> Seleção Simplificada (analise de currículo,entrevista,etc.)
                                <input type="checkbox" name="nTransferencia" value="sim"> Transferência Ex-Officio
                                <input type="checkbox" name="nConvenio" value="sim"> Convênio PEC-G
                                <input type="checkbox" name="nJudicial" value="sim"> Decisão Judicial
                                <input type="checkbox" name="nRemanescentes" value="sim"> Seleção para vagas remanescentes
                                <input type="checkbox" name="nVagasEspeciais" value="sim"> Seleção para vagas de programas especiais
                                <br><br>
                                <p>Tipo de Programa de Reserva de Vagas <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>
                                <input type="checkbox" name="nReservaEtico" value="sim"> Étnico
                                <input type="checkbox" name="nReservaDeficiencia" value="sim"> Pessoa com deficiência
                                <input type="checkbox" name="nReservaPublica" value="sim"> Estudante procedente de escola pública<br>
                                <input type="checkbox" name="nReservaSocial" value="sim"> Social
                                <input type="checkbox" name="nReservaOutro" value="sim"> Outro<br><br>

                                <p>Tipo de Apoio Social <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>
                                <input type="checkbox" name="nApoioAlimentacao" value="sim"> Alimentação
                                <input type="checkbox" name="nApoioMoradia" value="sim"> Moradia
                                <input type="checkbox" name="nApoioTransporte" value="sim"> Transporte<br>
                                <input type="checkbox" name="nApoioDidatico" value="sim"> Material didático
                                <input type="checkbox" name="nApoioTrabalho" value="sim"> Bolsa trabalho
                                <input type="checkbox" name="nApoioPermanencia" value="sim"> Bolsa permanência<br><br>

                                <p>Tipo de Atividade Extracurricular <input type="checkbox" name="n" value=""> AND
                                <input type="checkbox" name="n" value=""> OR</p>
                                <input type="checkbox" name="nPesquisa" value="sim"> Pesquisa
                                <input type="checkbox" name="nExtensao" value="sim"> Extensão<br>
                                <input type="checkbox" name="nMonitoria" value="sim"> Monitoria
                                <input type="checkbox" name="nEstagio" value="sim"> Estágio não obrigatório<br><br>

                                <p>Código da Unidade Federal: <input type="text" name="nCodigoUF"></p>
                                <br>
                                <p>Código do Município: <input type="text" name="nCodigoMunicipio"></p>
                                <br>

                                <p><input type="checkbox" name="nComNomes" value=""> Incluir nomes no relatório.</p>

                                <div class="btn-group" role="group" aria-label="...">
                                    <button type="submit" class="btn btn-default" onclick="alert('Este módulo foi desativado pelo desenvolvedor.')"> Gerar relatório</button>
                                </div>

                            </form>

                 
                        </div>
                    </section>

                </div>

            </div> <!-- Fim da div row principal -->

        </div> <!-- Fim da div container -->
    </body>

</html>

