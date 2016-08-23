<?php session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
} ?>

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

                <nav class="col-md-2" id="barraLateral">

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
                        <h2 class="Titulo">Adicionar curso a base</h2> 

                        <HR NOSHADE SIZE="4">

                        <form method="post" action="bd_inserir_curso.php">
                            <p>Código do curso:<input type="text" class="form-control" id="iCodigoCurso" name="nCodigoCurso" pattern="[0-9]+$" placeholder="Número fornecido pelo INEP."></p>

                            <p>Nome do Curso:<input type="text" class="form-control" id="iNome" name="nNome" pattern="[A-Z\s]+$" placeholder="Nome do curso em letras MAIÚSCULAS."></p>

                            <p>Grau Acadêmico</p>

                            <div class="radio">
                                <label><input type="radio" name="nGrauAcademico" value="Bacharelado">Bacharelado</label>
                                <label><input type="radio" name="nGrauAcademico" value="Licenciatura">Licenciatura</label>
                                <label><input type="radio" name="nGrauAcademico" value="Tecnologico">Tecnológico</label>
                            </div>

                            <p>Modalidade</p>

                            <div class="radio">
                                <label><input type="radio" name="nModalidade" value="Presencial" checked/>Presencial</label>
                                <label><input type="radio" name="nModalidade" value="A distancia">A distância</label>
                            </div>

                            <p>Carga horária:<input type="text" class="form-control" id="iCargaHoraria" name="nCargaHoraria" pattern="[0-9]+$" placeholder="Carga horária do curso."></p>

                            <p>Data de início de funcionamento:<input type="text" class="form-control" id="iInicio" name="nInicio" placeholder="Separada por barras. Exemplo: 18/03/2015"></p>

                            <p>Situação do curso no EMEC:</p>

                            <div class="radio">
                                <label><input type="radio" name="nSituacaoEMEC" value="Em atividade" checked/>Em atividade</label>
                                <label><input type="radio" name="nSituacaoEMEC" value="Em extincao">Em extinção</label>
                                <label><input type="radio" name="nSituacaoEMEC" value="Extinto">Extinto</label>
                            </div>

                            <p>Curso teve aluno vinculado?</p>
                            <div class="radio">
                                <label><input type="radio" name="nAlunoVinculado" value="Sim" checked/>Sim</label>
                                <label><input type="radio" name="nAlunoVinculado" value="Nao">Não</label>
                            </div>

                            <p>Motivo do curso sem aluno vinculado</p>

                            <div class="radio">
                                <label><input type="radio" name="nMotivoSemAluno" value="Curso extinto">Curso extinto</label>
                                <label><input type="radio" name="nMotivoSemAluno" value="Curso representado por outro codigo de curso">Curso representado por outro código de curso</label>
                                <label><input type="radio" name="nMotivoSemAluno" value="Curso novo">Curso novo </label>
                                <label><input type="radio" name="nMotivoSemAluno" value="Curso ativo sem demanda">Curso ativo sem demanda</label>
                            </div>

                            <p>Código do curso representado:<input type="text" class="form-control" id="iCodigoCursoRepresentado" name="nCodigoCursoRepresentado" pattern="[0-9]+$"></p>

                            <p>Curso é financiado por convenio?</p>
                            <div class="radio">
                                <label><input type="radio" name="nCursoFinanciado" value="Sim">Sim</label>
                                <label><input type="radio" name="nCursoFinanciado" value="Nao" checked/>Não</label>
                            </div>

                            <p>Turno do curso:</p>
                            <div class="radio">
                                <label><input type="radio" name="nTurno" value="Matutino"> Matutino</label>
                                <label><input type="radio" name="nTurno" value="Vespertino"> Vespertino</label>
                                <label><input type="radio" name="nTurno" value="Noturno"> Noturno</label>
                                <label><input type="radio" name="nTurno" value="Integral"> Integral</label><br><br>
                            </div>

                            <p>Prazo mínimo de integralização em anos:<input type="text" class="form-control" id="iPrazoMinimo" name="nPrazoMinimo" placeholder="Se necessário use ponto. Exemplo: 4.5"></p>

                            <p>Vagas novas oferecidas:<input type="text" class="form-control" id="iVagasOferecidas" name="nVagasOferecidas" pattern="[0-9]+$"></p>

                            <p>Inscritos em vagas novas oferecidas:<input type="text" class="form-control" id="iInscritos" name="nInscritos" pattern="[0-9]+$"></p>

                            <p>Vagas remanescentes:<input type="text" class="form-control" id="iVagasRemanescentes" name="nVagasRemanescentes" value="0" pattern="[0-9]+$"></p>

                            <p>Inscritos em vagas remanescentes:<input type="text" class="form-control" id="iInscritosRemanescentes" name="nInscritosRemanescentes" value="0" pattern="[0-9]+$"></p>

                            <p>Vagas oferecidas para programas especiais:<input type="text" class="form-control" id="iVagasEspeciais" name="nVagasEspeciais" value="0" pattern="[0-9]+$"></p>

                            <p>Inscritos em vagas para programas especiais:<input type="text" class="form-control" id="iInscritosEspeciais" name="nInscritosEspeciais" value="0" pattern="[0-9]+$"></p>

                            <p>Curso garante condições especiais de acessibilidade às pessoas com deficiência?</p>
                            <div class="radio">
                                <label><input type="radio" name="nCondicoesEspeciais" value="Sim">Sim</label>
                                <label><input type="radio" name="nCondicoesEspeciais" value="Nao" checked/>Nao</label>
                            </div>

                            <p>Recursos de tecnologia assistiva disponível a pessoas com deficiência</p>
                            <input type="checkbox" name="nRecursosBraille" value="Sim"> Material em Braille<br>
                            <input type="checkbox" name="nRecursosAudio" value="Sim"> Material em áudio<br>
                            <input type="checkbox" name="nRecursosInformatica" value="Sim"> Recursos de informática acessível<br>
                            <input type="checkbox" name="nRecursosLibras" value="Sim"> Tradutor e intérprete de língua brasileira de sinais<br>
                            <input type="checkbox" name="nRecursosInterprete" value="Sim"> Guia-Intérprete<br>
                            <input type="checkbox" name="nRecursosLibrasMaterial" value="Sim"> Material didático em língua brasileira de sinais<br>
                            <input type="checkbox" name="nRecursosAmpliado" value="Sim"> Material em formato impresso em caractere ampliado<br>
                            <input type="checkbox" name="nRecursosTatil" value="Sim"> Material pedagógico tátil<br>
                            <input type="checkbox" name="nRecursosLibrasCursos" value="Sim"> Inserção da disciplina de língua brasileira de sinais no curso<br>
                            <input type="checkbox" name="nRecursosImpresso" value="Sim"> Material didático em formato impresso acessível<br>
                            <input type="checkbox" name="nRecursosAcessibilidade" value="Sim"> Recursos de acessibilidade à comunicação<br>
                            <input type="checkbox" name="nRecursosDigital" value="Sim"> Material didático digital acessível<br><br>

                            <p>Oferece disciplinas semipresenciais?</p>
                            <div class="radio">
                                <label><input type="radio" name="nDisciplinasSemipresenciais" value="Sim">Sim</label>
                                <label><input type="radio" name="nDisciplinasSemipresenciais" value="Nao" checked/>Não</label>
                            </div>

                            <p>Percentual de carga horária semipresencial:<input type="text" class="form-control" id="iPercentualSemipresencial" name="nPercentualSemipresencial" pattern="[0-9]+$" placeholder="Não utilize o símbolo de porcentagem (%)."></p>

                            <p>Utiliza laboratórios?</p>
                            <div class="radio">
                                <label><input type="radio" name="nLaboratorios" value="Sim" checked/>Sim</label>
                                <label><input type="radio" name="nLaboratorios" value="Nao">Não</label>
                            </div>

                            <p>Códigos dos laboratórios:<input type="text" class="form-control" id="iCodigosLabs" name="nCodigosLabs" placeholder="Separados por vírgula."></p>

                            <p>Tipos de laboratórios:<input type="text" class="form-control" id="iTiposLabs" name="nTiposLabs"></p>

                            <div id="botoesAdicao">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="button" class="btn btn-warning" onclick="location.href = 'menu_cursos.php'">Cancelar</button>
                            </div>

                        </form>
                        <HR NOSHADE SIZE="4">

                    </section>

                </div>

            </div> <!-- Fim da div row principal -->

        </div> <!-- Fim da div container -->
    </body>

</html>




