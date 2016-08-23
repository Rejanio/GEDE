<?php session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
} ?>

<?php
require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

conexao();


$sql_seleciona = "SELECT * FROM docente WHERE id = '" . $Id . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
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
                            
                        </ul>
                    </aside>

                </nav>

                <div class="col-md-10" id="conteudo">

                    <section> 
                        <h2 class="Titulo">Editar dados do docente</h2> 


                        <button type="button" class="btn btn-warning" onclick="location.href = 'menu_professores.php'">Cancelar</button>
                        <form style="display: inline;" method="post" action="bd_exclusao_professor.php">
                            <input style="display: none;" type="text" name="id" value="<?php echo($res['id']); ?>">
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                        <form style="display: inline;" method="post" action="bd_atualizar_professor.php">

                            <input style="display: none;" type="text" name="id" value="<?php echo($res['id']); ?>">
                            <button type="submit" class="btn btn-primary">Salvar</button>

                            <HR NOSHADE SIZE="4">

                            <p>Matrícula:<input type="text" class="form-control" id="iMatricula" name="nMatricula" value="<?php echo($res['matricula']); ?>"></p>

                            <p>ID do docente:<input type="text" class="form-control" id="iIdDocente" name="nIdDocente" value="<?php echo($res['id_inep']); ?>" > </p>

                            <p>CPF do docente:<input type="text" class="form-control" id="iCpf" name="nCpf" value="<?php echo($res['cpf']); ?>" ></p>

                            <p>Nome do docente:<input type="text" class="form-control" id="iNome" name="nNome" value="<?php echo($res['nome']); ?>" ></p>

                            <p>Data de Nascimento: <input type="text" class="form-control" id="iNacimento" name="nNacimento" value="<?php echo($res['nascimento']); ?>" ></p>

                            <p>Sexo do docente:</p>
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

                            <p>Nome Completo da Mãe:<input type="text" class="form-control" id="iNomeMae" name="nNomeMae" value="<?php echo($res['nome_mae']); ?>" ></p>

                            <p>Cor/Raça do Professor:</p>
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
                                <label><input type="radio" id="iSemInformacao" name="nCor" value="Nao dispõe da informacao" <?php
                                    if ($res['cor_raca'] == 'Nao dispoe da informacao') {
                                        echo 'checked/';
                                    }
                                    ?>> Não dispõe da informação</label>
                                <label><input type="radio" id="iSemDeclarar" name="nCor" value="Docente nao quis declarar cor/raca" <?php
                                    if ($res['cor_raca'] == 'Docente nao quis declarar cor/raca') {
                                        echo 'checked/';
                                    }
                                    ?>> Docente não quis declarar cor/raça</label>
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

                            <p>País de Origem: <input type="text" class="form-control" id="iPaisOrigem" name="nPaisOrigem" value="<?php echo($res['pais_nacimento']); ?>" ></p>

                            <p>UF de Nascimento: <input type="text" size="2" id="iUf" name="nUf" value="<?php echo($res['uf_nacimento']); ?>" ></p>

                            <p>Município de Nascimento:<input type="text" class="form-control" id="iMunicipio" name="nMunicipio" value="<?php echo($res['municipio_nacimento']); ?>" ></p>

                            <p>Código do município: <input type="text" class="form-control" name="nCodigoMuni" value="<?php echo($res['codigo_municipio']); ?>" > <p>

                            <p>Código do estado: <input type="text" class="form-control" name="nCodigoEstado" value="<?php echo($res['codigo_uf']); ?>" > <p>

                            <p>Docente com Deficiência:</p>

                            <div class="radio">
                                <label><input type="radio" name="nDeficienciaHabilidades" value="Sim" <?php
                                    if ($res['deficiencia'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?> >Sim</label>
                                <label><input type="radio" name="nDeficienciaHabilidades" value="Nao" <?php
                                    if ($res['deficiencia'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>
                                <label><input type="radio" name="nDeficienciaHabilidades" value="Nao dispoe dessa informacao" <?php
                                    if ($res['deficiencia'] == 'Nao dispoe dessa informacao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não dispõe dessa informação</label>
                            </div>

                            <p>Tipo de Deficiência:</p>

                            <input type="checkbox" name="nCegueira" value="Sim" <?php
                            if ($res['cegueira'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Cegueira
                            <input type="checkbox" name="nBaixaVisao" value="Sim"<?php
                            if ($res['baixa_visao'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Baixa visão
                            <input type="checkbox" name="nSurdez" value="Sim"<?php
                            if ($res['surdez'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Surdez
                            <input type="checkbox" name="nAuditiva" value="Sim"<?php
                            if ($res['def_auditiva'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Deficiência auditiva<br>
                            <input type="checkbox" name="nFisica" value="Sim"<?php
                            if ($res['def_fisica'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Deficiência física
                            <input type="checkbox" name="nSurdocegueira" value="Sim"<?php
                            if ($res['surdocegueira'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Surdocegueira
                            <input type="checkbox" name="nMultipla" value="Sim"<?php
                            if ($res['def_multipla'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Deficiência múltipla
                            <input type="checkbox" name="nIntelectual" value="Sim"<?php
                            if ($res['def_intelectual'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Deficiência intelectual<br>


                            <h2 class="Titulo">Vínculo do professor a IES</h2>

                            <HR NOSHADE SIZE="4">

                            <p>Escolaridade</p>

                            <div class="radio">
                                <label><input type="radio" name="nEscolaridade" value="Sem formacao de nivel superior" <?php
                                    if ($res['escolaridade'] == 'Sem formacao de nivel superior') {
                                        echo 'checked/';
                                    }
                                    ?>> Sem formação de nível superior</label>
                                <label><input type="radio" name="nEscolaridade" value="Com formacao de nivel superior" <?php
                                    if ($res['escolaridade'] == 'Com formacao de nivel superior') {
                                        echo 'checked/';
                                    }
                                    ?>> Com formação de nível superior</label>

                            </div>

                            <p>Pós-Graduação</p>
                            <div class="radio">
                                <label><input type="radio" name="nPos" value="ESPECIALIZACAO"<?php
                                    if ($res['pos_graduacao'] == 'ESPECIALIZACAO') {
                                        echo 'checked/';
                                    }
                                    ?>> Especialização</label>
                                <label><input type="radio" name="nPos" value="MESTRADO"<?php
                                    if ($res['pos_graduacao'] == 'MESTRADO') {
                                        echo 'checked/';
                                    }
                                    ?>> Mestrado</label>
                                <label><input type="radio" name="nPos" value="DOUTORADO"<?php
                                    if ($res['pos_graduacao'] == 'DOUTORADO') {
                                        echo 'checked/';
                                    }
                                    ?>> Doutorado</label>
                                <label><input type="radio" name="nPos" value="NAO POSSUI"<?php
                                    if ($res['pos_graduacao'] == 'NAO POSSUI') {
                                        echo 'checked/';
                                    }
                                    ?>> Não possui</label>
                            </div>

                            <p>Situação do Docente na IES</p>
                            <div class="radio">
                                <label><input type="radio" name="nSituacaoDocente" value="Esteve em exercicio" <?php
                                    if ($res['situacao_docente'] == 'Esteve em exercicio') {
                                        echo 'checked/';
                                    }
                                    ?>> Esteve em exercício</label>
                                <label><input type="radio" name="nSituacaoDocente" value="Afastado para qualificacao" <?php
                                    if ($res['situacao_docente'] == 'Afastado para qualificacao') {
                                        echo 'checked/';
                                    }
                                    ?>> Afastado para qualificação</label>
                                <label><input type="radio" name="nSituacaoDocente" value="Afastado para tratamento de saude" <?php
                                    if ($res['situacao_docente'] == 'Afastado para tratamento de saude') {
                                        echo 'checked/';
                                    }
                                    ?>> Afastado para tratamento de saúde</label>
                                <label><input type="radio" name="nSituacaoDocente" value="Afastado para exercicio em outros orgaos/entidades" <?php
                                    if ($res['situacao_docente'] == 'Afastado para exercício em outros orgaos/entidades') {
                                        echo 'checked/';
                                    }
                                    ?>> Afastado para exercício em outros órgãos/entidades</label>
                                <label><input type="radio" name="nSituacaoDocente" value="Afastado por outros motivos" <?php
                                    if ($res['situacao_docente'] == 'Afastado por outros motivos') {
                                        echo 'checked/';
                                    }
                                    ?>> Afastado por outros motivos</label>
                            </div>

                            <p>Regime de Trabalho</p>

                            <div class="radio">
                                <label><input type="radio" name="nRegime" value="Tempo integral com DE" <?php
                                    if ($res['regime_trabalho'] == 'Tempo integral com DE') {
                                        echo 'checked/';
                                    }
                                    ?>> Tempo integral com DE</label>
                                <label><input type="radio" name="nRegime" value="Tempo integral sem DE" <?php
                                    if ($res['regime_trabalho'] == 'Tempo integral sem DE') {
                                        echo 'checked/';
                                    }
                                    ?>> Tempo integral sem DE</label>
                                <label><input type="radio" name="nRegime" value="Tempo parcial" <?php
                                    if ($res['regime_trabalho'] == 'Tempo parcial') {
                                        echo 'checked/';
                                    }
                                    ?>> Tempo parcial</label>
                                <label><input type="radio" name="nRegime" value="Horista" <?php
                                    if ($res['regime_trabalho'] == 'Horista') {
                                        echo 'checked/';
                                    }
                                    ?>> Horista</label>

                            </div>

                            <p>Docente Substituto?</p>

                            <div class="radio">
                                <label><input type="radio" name="nSubstituto" value="Sim" <?php
                                    if ($res['docente_substituto'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nSubstituto" value="Nao" <?php
                                    if ($res['docente_substituto'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>

                            </div>

                            <p>Docente Visitante?</p>

                            <div class="radio">
                                <label><input type="radio" name="nVisitante" value="Sim" <?php
                                    if ($res['docente_visitante'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nVisitante" value="Nao" <?php
                                    if ($res['docente_visitante'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>

                            </div>

                            <p>Tipo de Vínculo de Docente Visitante</p>

                            <div class="radio">
                                <label><input type="radio" name="nTipoVinculo" value="Em Folha" <?php
                                    if ($res['tipo_docente_visitante'] == 'Em Folha') {
                                        echo 'checked/';
                                    }
                                    ?>>Em Folha</label>
                                <label><input type="radio" name="nTipoVinculo" value="Bolsista" <?php
                                    if ($res['tipo_docente_visitante'] == 'Bolsista') {
                                        echo 'checked/';
                                    }
                                    ?>>Bolsista</label>

                            </div>

                            <p>Docente em Exercício em 31/12?</p>

                            <div class="radio">
                                <label><input type="radio" name="nExercicio3112" value="Sim" <?php
                                    if ($res['exercicio_3112'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nExercicio3112" value="Nao" <?php
                                    if ($res['exercicio_3112'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>

                            </div>

                            <p>Atuação do Docente</p>
                            
                            <input type="checkbox" name="nPosDistancia" value="Sim"<?php
                            if ($res['pos_distancia'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Ensino de pós-graduação stricto sensu a distância
                            
                            <input type="checkbox" name="nGraduacaoPresencial" value="Sim"<?php
                            if ($res['graduacao_presencial'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Ensino em curso de graduação presencial
                            
                            <input type="checkbox" name="nCursoDistancia" value="Sim"<?php
                            if ($res['curso_distancia'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Ensino em curso de graduação a distância<br>
                            
                            <input type="checkbox" name="nPosPresencial" value="Sim"<?php
                            if ($res['pos_presencial'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Ensino em curso de pós-graduação stricto sensu presencial
                            
                            <input type="checkbox" name="nCursoFormacaoEspecifica" value="Sim"<?php
                            if ($res['curso_formacao_especifica'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Ensino de curso de formação específica 
                            
                            <input type="checkbox" name="nPesquisa" value="Sim"<?php
                            if ($res['pesquisa'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Pesquisa<br>
                            
                            <input type="checkbox" name="nExtensao" value="Sim"<?php
                            if ($res['extensao'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Extensão
                            
                            <input type="checkbox" name="nGestaoPlanejamento" value="Sim"<?php
                            if ($res['gestao_planejamento'] == "Sim") {
                                echo 'checked/';
                            }
                            ?>> Gestão, planejamento e avaliação<br><br>

                            <p>Possui Bolsa Pesquisa (Somente para Docentes com Atuação em Pesquisa)?</p>

                            <div class="radio">
                                <label><input type="radio" name="nPossuiBolsa" value="Sim" <?php
                                    if ($res['bolsa_pesquisa'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nPossuiBolsa" value="Nao" <?php
                                    if ($res['bolsa_pesquisa'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>

                            </div>


                            <h2 class="Titulo">Vínculo do professor ao curso</h2>

                            <HR NOSHADE SIZE="4">

                            <p>Departamento:<input type="text" class="form-control" id="iDepartamento" name="nDepartamento" value="<?php echo($res['departamento']); ?>"></p>

                            <p>Classe</p>

                            <div class="radio">
                                <label><input type="radio" name="nClasse" value="TITULAR" <?php
                                    if ($res['classe'] == 'TITULAR') {
                                        echo 'checked/';
                                    }
                                    ?>> Titular</label>
                                <label><input type="radio" name="nClasse" value="ADJUNTO" <?php
                                    if ($res['classe'] == 'ADJUNTO') {
                                        echo 'checked/';
                                    }
                                    ?>> Adjunto</label>
                                <label><input type="radio" name="nClasse" value="PLENO" <?php
                                    if ($res['classe'] == 'PLENO') {
                                        echo 'checked/';
                                    }
                                    ?>> Pleno</label>
                                <label><input type="radio" name="nClasse" value="ASSISTENTE" <?php
                                    if ($res['classe'] == 'ASSISTENTE') {
                                        echo 'checked/';
                                    }
                                    ?>> Assistente</label>
                                <label><input type="radio" name="nClasse" value="SUBSTITUTO" <?php
                                    if ($res['classe'] == 'SUBSTITUTO') {
                                        echo 'checked/';
                                    }
                                    ?>> Substituto</label>
                                <label><input type="radio" name="nClasse" value="AUXILIAR" <?php
                                    if ($res['classe'] == 'AUXILIAR') {
                                        echo 'checked/';
                                    }
                                    ?>> Auxiliar</label>
                            </div>

                            <p>Código do Curso/Área Básica ao qual o Docente está vinculado: <input type="text" class="form-control" id="iCodigoCurso" name="nCodigoCurso" value="<?php echo($res['codigo_cursoarea']); ?>" > <p>

                        </form>

                        <HR NOSHADE SIZE="4">

                    </section>

                </div>

            </div> <!-- Fim da div row principal -->

        </div> <!-- Fim da div container -->
    </body>

</html>