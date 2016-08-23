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


$sql_seleciona = "SELECT * FROM curso WHERE id = '" . $Id . "'";
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

                            </li>
                        </ul>
                    </aside>

                </nav>

                <div class="col-md-10" id="conteudo">

                    <section> 
                        <h2 class="Titulo">Editar dados do curso</h2> 

                        <button type="button" class="btn btn-warning" onclick="location.href = 'menu_cursos.php'">Cancelar</button>
                        <form style="display: inline;" method="post" action="bd_exclusao_curso.php">
                            <input style="display: none;" type="text" name="id" value="<?php echo($res['id']); ?>">
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>

                        <form style="display: inline;" method="post" action="bd_atualizar_curso.php">

                            <input style="display: none;" type="text" name="id" value="<?php echo($res['id']); ?>">
                            <button type="submit" class="btn btn-primary">Salvar</button>

                            <HR NOSHADE SIZE="4">

                            <p>Código do curso:<input type="text" class="form-control" id="iCodigoCurso" name="nCodigoCurso" value="<?php echo($res['codigo_curso']); ?>" ></p>

                            <p>Nome do Curso:<input type="text" class="form-control" id="iNome" name="nNome" value="<?php echo($res['nome']); ?>"></p>

                            <p>Grau Acadêmico</p>

                            <div class="radio">
                                <label><input type="radio" name="nGrauAcademico" value="Bacharelado" <?php
                                    if ($res['grau_academico'] == 'Bacharelado') {
                                        echo 'checked/';
                                    }
                                    ?>>Bacharelado</label>
                                <label><input type="radio" name="nGrauAcademico" value="Licenciatura" <?php
                                    if ($res['grau_academico'] == 'Licenciatura') {
                                        echo 'checked/';
                                    }
                                    ?>>Licenciatura</label>
                                <label><input type="radio" name="nGrauAcademico" value="Tecnologico" <?php
                                    if ($res['grau_academico'] == 'Tecnologico') {
                                        echo 'checked/';
                                    }
                                    ?>>Tecnológico</label>
                            </div>

                            <p>Modalidade</p>

                            <div class="radio">
                                <label><input type="radio" name="nModalidade" value="Presencial" <?php
                                    if ($res['modalidade'] == 'Presencial') {
                                        echo 'checked/';
                                    }
                                    ?>>Presencial</label>
                                <label><input type="radio" name="nModalidade" value="A distancia" <?php
                                    if ($res['modalidade'] == 'A distancia') {
                                        echo 'checked/';
                                    }
                                    ?>>A distância</label>
                            </div>

                            <p>Carga horária:<input type="text" class="form-control" id="iCargaHoraria" name="nCargaHoraria" value="<?php echo($res['carga_horaria']); ?>"></p>

                            <p>Data de início de funcionamento:<input type="text" class="form-control" id="iInicio" name="nInicio" value="<?php echo($res['data_inicio']); ?>"></p>

                            <p>Data de autorização:<input type="text" class="form-control" id="iAutorizacao" name="nAutorizacao" value="<?php echo($res['data_autorizacao']); ?>"></p>

                            <p>Situação do curso no EMEC:</p>

                            <div class="radio">
                                <label><input type="radio" name="nSituacaoEMEC" value="Em atividade" <?php
                                    if ($res['situacao_curso_emec'] == 'Em atividade') {
                                        echo 'checked/';
                                    }
                                    ?>>Em atividade</label>
                                <label><input type="radio" name="nSituacaoEMEC" value="Em extincao" <?php
                                    if ($res['situacao_curso_emec'] == 'Em extincao') {
                                        echo 'checked/';
                                    }
                                    ?>>Em extinção</label>
                                <label><input type="radio" name="nSituacaoEMEC" value="Extinto" <?php
                                    if ($res['situacao_curso_emec'] == 'Extinto') {
                                        echo 'checked/';
                                    }
                                    ?>>Extinto</label>
                            </div>

                            <p>Curso teve aluno vinculado?</p>
                            <div class="radio">
                                <label><input type="radio" name="nAlunoVinculado" value="Sim" <?php
                                    if ($res['curso_teve_aluno_vinculado'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nAlunoVinculado" value="Nao" <?php
                                    if ($res['curso_teve_aluno_vinculado'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>
                            </div>

                            <p>Motivo do curso sem aluno vinculado</p>

                            <div class="radio">
                                <label><input type="radio" name="nMotivoSemAluno" value="Curso extinto" <?php
                                    if ($res['motivo_sem_aluno'] == 'Curso extinto') {
                                        echo 'checked/';
                                    }
                                    ?>>Curso extinto</label>
                                <label><input type="radio" name="nMotivoSemAluno" value="Curso representado por outro codigo de curso" <?php
                                    if ($res['motivo_sem_aluno'] == 'Curso representado por outro codigo de curso') {
                                        echo 'checked/';
                                    }
                                    ?>>Curso representado por outro código de curso</label>
                                <label><input type="radio" name="nMotivoSemAluno" value="Curso novo" <?php
                                    if ($res['motivo_sem_aluno'] == 'Curso novo') {
                                        echo 'checked/';
                                    }
                                    ?>>Curso novo </label>
                                <label><input type="radio" name="nMotivoSemAluno" value="Curso ativo sem demanda" <?php
                                    if ($res['motivo_sem_aluno'] == 'Curso ativo sem demanda') {
                                        echo 'checked/';
                                    }
                                    ?>>Curso ativo sem demanda</label>
                            </div>

                            <p>Código do curso representado:<input type="text" class="form-control" id="iCodigoCursoRepresentado" name="nCodigoCursoRepresentado" value="<?php echo($res['codigo_curso_representado']); ?>"></p>

                            <p>Curso é financiado por convenio?</p>
                            <div class="radio">
                                <label><input type="radio" name="nCursoFinanciado" value="Sim" <?php
                                    if ($res['curso_financ_convenio'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nCursoFinanciado" value="Nao" <?php
                                    if ($res['curso_financ_convenio'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>
                            </div>

                            <p>Turno do curso:</p>
                            <div class="radio">
                                <label><input type="radio" name="nTurno" value="Matutino" <?php
                                    if ($res['turno_curso'] == 'Matutino') {
                                        echo 'checked/';
                                    }
                                    ?>> Matutino</label>
                                <label><input type="radio" name="nTurno" value="Vespertino" <?php
                                    if ($res['turno_curso'] == 'Vespertino') {
                                        echo 'checked/';
                                    }
                                    ?>> Vespertino</label>
                                <label><input type="radio" name="nTurno" value="Noturno" <?php
                                    if ($res['turno_curso'] == 'Noturno') {
                                        echo 'checked/';
                                    }
                                    ?>> Noturno</label>
                                <label><input type="radio" name="nTurno" value="Integral" <?php
                                    if ($res['turno_curso'] == 'Integral') {
                                        echo 'checked/';
                                    }
                                    ?>> Integral</label><br><br>
                            </div>

                            <p>Prazo mínimo de integralização em anos:<input type="text" class="form-control" id="iPrazoMinimo" name="nPrazoMinimo" value="<?php echo($res['prazo_minimo_integralizacao']); ?>"></p>

                            <p>Vagas novas oferecidas:<input type="text" class="form-control" id="iVagasOferecidas" name="nVagasOferecidas" value="<?php echo($res['vagas_novas_oferecidas']); ?>"></p>

                            <p>Inscritos em vagas novas oferecidas:<input type="text" class="form-control" id="iInscritos" name="nInscritos" value="<?php echo($res['inscritos_vagas_oferecidas']); ?>"></p>

                            <p>Vagas remanescentes:<input type="text" class="form-control" id="iVagasRemanescentes" name="nVagasRemanescentes" value="<?php echo($res['vagas_remanecentes']); ?>"></p>

                            <p>Inscritos em vagas remanescentes:<input type="text" class="form-control" id="iInscritosRemanescentes" name="nInscritosRemanescentes" value="<?php echo($res['inscritos_vagas_remanecentes']); ?>"></p>

                            <p>Vagas oferecidas para programas especiais:<input type="text" class="form-control" id="iVagasEspeciais" name="n" value="<?php echo($res['vagas_programas_especiais']); ?>"></p>

                            <p>Inscritos em vagas para programas especiais:<input type="text" class="form-control" id="iInscritosEspeciais" name="nInscritosEspeciais" value="<?php echo($res['inscritos_vagas_especiais']); ?>"></p>

                            <p>Curso garante condições especiais de acessibilidade às pessoas com deficiência?</p>
                            <div class="radio">
                                <label><input type="radio" name="nCondicoesEspeciais" value="Sim" <?php
                                    if ($res['curso_tem_acessibilidade'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nCondicoesEspeciais" value="Nao" <?php
                                    if ($res['curso_tem_acessibilidade'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>
                            </div>

                            <p>Recursos de tecnologia assistiva disponível a pessoas com deficiência</p>
                            <input type="checkbox" name="nRecursosBraille" value="Sim" <?php
                                    if ($res['recursosBraille'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>> Material em Braille<br>
                            <input type="checkbox" name="nRecursosAudio" value="Sim" <?php
                                    if ($res['recursosAudio'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>> Material em áudio<br>
                            <input type="checkbox" name="nRecursosInformatica" value="Sim" <?php
                                    if ($res['recursosInformatica'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>> Recursos de informática acessível<br>
                            <input type="checkbox" name="nRecursosLibras" value="Sim" <?php
                                    if ($res['recursosLibras'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>> Tradutor e intérprete de língua brasileira de sinais<br>
                            <input type="checkbox" name="nRecursosInterprete" value="Sim" <?php
                                    if ($res['recursosInterprete'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>> Guia-Intérprete<br>
                            <input type="checkbox" name="nRecursosLibrasMaterial" value="Sim" <?php
                                    if ($res['recursosLibrasMaterial'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>> Material didático em língua brasileira de sinais<br>
                            <input type="checkbox" name="nRecursosAmpliado" value="Sim" <?php
                                    if ($res['recursosAmpliado'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>> Material em formato impresso em caractere ampliado<br>
                            <input type="checkbox" name="nRecursosTatil" value="Sim" <?php
                                    if ($res['recursosTatil'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>> Material pedagógico tátil<br>
                            <input type="checkbox" name="nRecursosLibrasCursos" value="Sim" <?php
                                    if ($res['recursosLibrasCursos'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>> Inserção da disciplina de língua brasileira de sinais no curso<br>
                            <input type="checkbox" name="nRecursosImpresso" value="Sim" <?php
                                    if ($res['recursosImpresso'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>> Material didático em formato impresso acessível<br>
                            <input type="checkbox" name="nRecursosAcessibilidade" value="Sim" <?php
                                    if ($res['recursosAcessibilidade'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>> Recursos de acessibilidade à comunicação<br>
                            <input type="checkbox" name="nRecursosDigital" value="Sim" <?php
                                    if ($res['recursosDigital'] == "Sim") {
                                        echo 'checked/';
                                    }
                                    ?>> Material didático digital acessível<br><br>

                            <p>Oferece disciplinas semipresenciais?</p>
                            <div class="radio">
                                <label><input type="radio" name="nDisciplinasSemipresenciais" value="Sim" <?php
                                    if ($res['oferece_semepresenciais'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nDisciplinasSemipresenciais" value="Nao" <?php
                                    if ($res['oferece_semepresenciais'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>
                            </div>

                            <p>Percentual de carga horária semipresencial:<input type="text" class="form-control" id="iPercentualSemipresencial" name="nPercentualSemipresencial" value="<?php echo($res['carga_horaria_semepresencial']); ?>"></p>

                            <p>Utiliza laboratórios?</p>
                            <div class="radio">
                                <label><input type="radio" name="nLaboratorios" value="Sim" <?php
                                    if ($res['utiliza_laboratorios'] == 'Sim') {
                                        echo 'checked/';
                                    }
                                    ?>>Sim</label>
                                <label><input type="radio" name="nLaboratorios" value="Nao" <?php
                                    if ($res['utiliza_laboratorios'] == 'Nao') {
                                        echo 'checked/';
                                    }
                                    ?>>Não</label>
                            </div>

                            <p>Códigos dos laboratórios:<input type="text" class="form-control" id="iCodigosLabs" name="nCodigosLabs" value="<?php echo($res['codigos_laboratorios']); ?>"></p>


                        </form>
                        <HR NOSHADE SIZE="4">


                    </section>

                </div>

            </div> <!-- Fim da div row principal -->

        </div> <!-- Fim da div container -->
    </body>

</html>




