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
                        <h2 class="Titulo">Adicionar docente a base</h2> 

                        <form method="post" action="bd_inserir_professor.php">

                            <HR NOSHADE SIZE="4">

                            <p>Matrícula:<input type="text" class="form-control" id="iMatricula" required="required" name="nMatricula" pattern="[0-9]+$" placeholder="Número de matrícula da IES."></p>

                            <p>ID do docente:<input type="text" class="form-control" id="iIdDocente" name="nIdDocente" pattern="[0-9]+$" placeholder="Número fornecido pelo INEP."></p>

                            <p>CPF do docente:<input type="text" class="form-control" id="iCpf" required="required" pattern="[0-9]+$" name="nCpf" placeholder="Utilize apenas números."></p>

                            <p>Nome do docente:<input type="text" class="form-control" id="iNome" required="required" name="nNome" pattern="[A-Z\s]+$" placeholder="Preencha o campo com o nome completo. Utilize letras MAIÚSCULAS."></p>

                            <p>Data de Nascimento: <input type="text" class="form-control" id="iNacimento" name="nNacimento" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de nascimento separada por barras. Ex: 31/12/1990."></p>

                            <p>Sexo do docente:</p>
                            <div class="radio">
                                <label><input type="radio" name="nSexo" id="iMasc" value="Masculino" checked/>Masculino</label>
                                <label><input type="radio" name="nSexo" id="iFemi" value="Feminino">Feminino</label>
                            </div>

                            <p>Nome Completo da Mãe:<input type="text" class="form-control" pattern="[A-Z\s]+$" id="iNomeMae" name="nNomeMae" placeholder="Nome da mãe do docente. Utilize letras MAIÚSCULAS."></p>

                            <p>Cor/Raça do Aluno:</p>
                            <div class="radio">
                                <label><input type="radio" id="iBranca" name="nCor" value="Branca"> Branca</label>
                                <label><input type="radio" id="iPreta" name="nCor" value="Preta"> Preta</label>
                                <label><input type="radio" id="iParda" name="nCor" value="Parda"> Parda</label>
                                <label><input type="radio" id="iAmarela" name="nCor" value="Amarela"> Amarela</label>
                                <label><input type="radio" id="iIndígina" name="nCor" value="Indigina"> Indígina</label>
                                <label><input type="radio" id="iSemDeclarar" name="nCor" value="Docente nao quis declarar cor/raca" checked/> Docente não quis declarar cor/raça</label>
                            </div>

                            <p>Nacionalidade:</p>
                            <div class="radio">
                                <label><input type="radio" id="iBrasileira" name="nNacionalidade" value="Brasileira" checked/> Brasileira</label>
                                <label><input type="radio" id="iNaturalizado" name="nNacionalidade" value="Brasileira - nascido no exterior ou naturalizado"> Brasileira - nascido no exterior ou naturalizado</label>
                                <label><input type="radio" id="iEstrangeiro" name="nNacionalidade" value="Estrangeira"> Estrangeira</label>
                            </div>

                            <p>País de Origem: <input type="text" class="form-control" pattern="[A-Z\s]+$" id="iPaisOrigem" name="nPaisOrigem" placeholder="País de nascimento. Utilize letras MAIÚSCULAS."></p>

                            <p>UF de Nascimento: <input type="text" size="2" id="iUf" name="nUf" pattern="[A-Z\s]+$" min="2" max="2" title="Sigla do estado de nascimento. Apenas duas letas MAIÚSCULAS.. Ex: BA."></p>

                            <p>Município de Nascimento:<input type="text" class="form-control" pattern="[A-Z\s]+$" id="iMunicipio" name="nMunicipio" placeholder="Cidade natal do docente. Utilize letras MAIÚSCULAS."></p>

                            <p>Código do município: <input type="text" class="form-control" name="nCodigoMuni" placeholder="Código do município de nascimento do docente."> <p>
                                
                            <p>Código do estado: <input type="text" class="form-control" name="nCodigoEstado" placeholder="Código do município de nascimento do docente."> <p>
                            
                            <p>Docente com Deficiência:</p>

                            <div class="radio">
                                <label><input type="radio" name="nDeficienciaHabilidades" value="Sim">Sim</label>
                                <label><input type="radio" name="nDeficienciaHabilidades" value="Nao" checked/>Não</label>
                                <label><input type="radio" name="nDeficienciaHabilidades" value="Nao dispoe dessa informacao">Não dispõe dessa informação</label>
                            </div>

                            <p>Tipo de Deficiência:</p>

                            <input type="checkbox" name="nCegueira" value="Sim"> Cegueira
                            <input type="checkbox" name="nBaixaVisao" value="Sim"> Baixa visão
                            <input type="checkbox" name="nSurdez" value="Sim"> Surdez
                            <input type="checkbox" name="nAuditiva" value="Sim"> Deficiência auditiva<br>
                            <input type="checkbox" name="nFisica" value="Sim"> Deficiência física
                            <input type="checkbox" name="nSurdocegueira" value="Sim"> Surdocegueira
                            <input type="checkbox" name="nMultipla" value="Sim"> Deficiência múltipla
                            <input type="checkbox" name="nIntelectual" value="Sim"> Deficiência intelectual<br>


                            <h2 class="Titulo">Vínculo do professor a IES</h2>

                            <HR NOSHADE SIZE="4">

                            <p>Escolaridade</p>

                            <div class="radio">
                                <label><input type="radio" name="nEscolaridade" value="Sem formacao de nivel superior"> Sem formação de nível superior</label>
                                <label><input type="radio" name="nEscolaridade" value="Com formacao de nivel superior" checked/> Com formação de nível superior</label>
                            </div>

                            <p>Pós-Graduação</p>
                            <div class="radio">
                                <label><input type="radio" name="nPos" value="ESPECIALIZACAO"> Especialização</label>
                                <label><input type="radio" name="nPos" value="MESTRADO" checked/> Mestrado</label>
                                <label><input type="radio" name="nPos" value="DOUTORADO"> Doutorado</label>
                                <label><input type="radio" name="nPos" value="NAO POSSUI"> Não possui</label>
                            </div>

                            <p>Situação do Docente na IES</p>
                            <div class="radio">
                                <label><input type="radio" name="nSituacaoDocente" value="Esteve em exercicio" checked/> Esteve em exercício</label>
                                <label><input type="radio" name="nSituacaoDocente" value="Afastado para qualificacao"> Afastado para qualificação</label>
                                <label><input type="radio" name="nSituacaoDocente" value="Afastado para tratamento de saude"> Afastado para tratamento de saúde</label>
                                <label><input type="radio" name="nSituacaoDocente" value="Afastado para exercicio em outros orgaos/entidades"> Afastado para exercício em outros órgãos/entidades</label>
                                <label><input type="radio" name="nSituacaoDocente" value="Afastado por outros motivos"> Afastado por outros motivos</label>
                            </div>

                            <p>Regime de Trabalho</p>

                            <div class="radio">
                                <label><input type="radio" name="nRegime" value="Tempo integral com DE"> Tempo integral com DE</label>
                                <label><input type="radio" name="nRegime" value="Tempo integral sem DE"> Tempo integral sem DE</label>
                                <label><input type="radio" name="nRegime" value="Tempo parcial"> Tempo parcial</label>
                                <label><input type="radio" name="nRegime" value="Horista"> Horista</label>

                            </div>

                            <p>Docente Substituto?</p>

                            <div class="radio">
                                <label><input type="radio" name="nSubstituto" value="Sim">Sim</label>
                                <label><input type="radio" name="nSubstituto" value="Nao" checked/>Não</label>

                            </div>

                            <p>Docente Visitante?</p>

                            <div class="radio">
                                <label><input type="radio" name="nVisitante" value="Sim">Sim</label>
                                <label><input type="radio" name="nVisitante" value="Nao" checked/>Não</label>

                            </div>

                            <p>Docente em Exercício em 31/12?</p>

                            <div class="radio">
                                <label><input type="radio" name="nExercicio3112" value="Sim" checked/>Sim</label>
                                <label><input type="radio" name="nExercicio3112" value="Nao">Não</label>

                            </div>

                            <p>Atuação do Docente</p>

                            <input type="checkbox" name="nPosDistancia" value="Sim"> Ensino de pós-graduação stricto sensu a distância
                            <input type="checkbox" name="nGraduacaoPresencial" value="Sim"> Ensino em curso sequencial de formação específica
                            <input type="checkbox" name="nCursoDistancia" value="Sim"> Ensino em curso de graduação presencial<br>
                            <input type="checkbox" name="nPosPresencial" value="Sim"> Ensino em curso a distância
                            <input type="checkbox" name="nCursoFormacaoEspecifica" value="Sim"> Ensino de pós-graduação stricto sensu presencial
                            <input type="checkbox" name="nPesquisa" value="Sim"> Pesquisa<br>
                            <input type="checkbox" name="nExtensao" value="Sim"> Extensão
                            <input type="checkbox" name="nGestaoPlanejamento" value="Sim"> Gestão, planejamento e avaliação<br><br>


                            <p>Possui Bolsa Pesquisa (Somente para Docentes com Atuação em Pesquisa)?</p>

                            <div class="radio">
                                <label><input type="radio" name="nPossuiBolsa" value="Sim">Sim</label>
                                <label><input type="radio" name="nPossuiBolsa" value="Nao" checked/>Não</label>

                            </div>


                            <h2 class="Titulo">Vínculo do professor ao curso</h2>

                            <HR NOSHADE SIZE="4">

                            <p>Departamento:<input type="text" class="form-control" pattern="[A-Z\s]+$" min="3" max="3" id="iDepartamento" required="required" name="nDepartamento" placeholder="Departamento ao qual o docente está vinculado. Ex: TEC, EXA, SAU e etc. Utilize letras MAIÚSCULAS."></p>

                            <p>Classe</p>

                            <div class="radio">
                                <label><input type="radio" name="nClasse" value="TITULAR"> Titular</label>
                                <label><input type="radio" name="nClasse" value="ADJUNTO"> Adjunto</label>
                                <label><input type="radio" name="nClasse" value="PLENO"> Pleno</label>
                                <label><input type="radio" name="nClasse" value="ASSISTENTE"> Assistente</label>
                                <label><input type="radio" name="nClasse" value="SUBSTITUTO"> Substituto</label>
                                <label><input type="radio" name="nClasse" value="AUXILIAR"> Auxiliar</label>
                            </div>

                            <p>Código do Curso/Área Básica ao qual o Docente está vinculado: <input type="text" class="form-control" id="iCodigoCurso" name="nCodigoCurso" placeholder="Código do curso ou área do docente."> <p>

                            
                            
                            <HR NOSHADE SIZE="4">

                            <div id="botoesAdicao">
                                <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
                        </form>
                        <button type="button" class="btn btn-warning" onclick="location.href = 'menu_professores.php'">Cancelar</button>
                </div>



                </section>

            </div>

        </div> <!-- Fim da div row principal -->

    </div> <!-- Fim da div container -->
</body>

</html>



