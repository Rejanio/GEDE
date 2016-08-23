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

$sql_seleciona = "SELECT * FROM curso WHERE id = '" . $Id . "'";
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
                        <h2 class="Titulo">Dados do curso</h2> 

                        <div id="botoesEdicao">
                            <form style="display: inline;" method="post" action="edicao_curso.php">
                                <input style="display: none;" type="text" name="id" value="<?php echo($res['id']); ?>">
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </form>
                            <form style="display: inline;" method="post" action="exclusao_curso.php">
                                <input style="display: none;" type="text" name="id" value="<?php echo($res['id']); ?>">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">Excluir</button>
                            </form>

                            <button type="button" class="btn btn-warning" onclick="location.href = 'menu_cursos.php'">Cancelar</button>

                        </div>

                        <HR NOSHADE SIZE="4">

                        <p>Código do curso: <span style="color: #737373"><?php echo($res['codigo_curso']); ?> </span> </p>

                        <p>Nome: <span style="color: #737373"><?php echo($res['nome']); ?> </span> </p>

                        <p>Código OCDE: <span style="color: #737373"><?php echo($res['codigo_ocde']); ?> </span> </p>

                        <p>Grau Acadêmico: <span style="color: #737373"><?php echo($res['grau_academico']); ?> </span> </p>

                        <p>Modalidade: <span style="color: #737373"><?php echo($res['modalidade']); ?> </span> </p>

                        <p>Nível acadêmico: <span style="color: #737373"><?php echo($res['nivel_academico']); ?> </span> </p>

                        <p>Atributo de ingresso: <span style="color: #737373"><?php echo($res['atributo_de_ingresso']); ?> </span> </p>

                        <p>Carga horária: <span style="color: #737373"><?php echo($res['carga_horaria']); ?> </span> </p>

                        <p>Data de início de funcionamento: <span style="color: #737373"><?php echo($res['data_inicio']); ?> </span> </p>

                        <p>Data de autorização: <span style="color: #737373"><?php echo($res['data_autorizacao']); ?> </span> </p>

                        <p>Situação do curso no EMEC: <span style="color: #737373"><?php echo($res['situacao_curso_emec']); ?> </span> </p>

                        <p>Curso Gratuito? <span style="color: #737373"><?php echo($res['curso_gratuito']); ?> </span> </p>

                        <p>Curso teve aluno vinculado? <span style="color: #737373"><?php echo($res['curso_teve_aluno_vinculado']); ?> </span> </p>

                        <p>Motivo do curso sem aluno vinculado: <span style="color: #737373"><?php echo($res['motivo_sem_aluno']); ?> </span> </p>

                        <p>Código do curso representado: <span style="color: #737373"><?php echo($res['codigo_curso_representado']); ?> </span> </p>

                        <p>Curso é financiado por convenio? <span style="color: #737373"><?php echo($res['curso_financ_convenio']); ?> </span> </p>

                        <p>Turno do curso: <span style="color: #737373"><?php echo($res['turno_curso']); ?> </span> </p>

                        <p>Prazo mínimo de integralização em anos: <span style="color: #737373"><?php echo($res['prazo_minimo_integralizacao']); ?> </span> </p>

                        <p>Vagas novas oferecidas: <span style="color: #737373"><?php echo($res['vagas_novas_oferecidas']); ?> </span> </p>

                        <p>Inscritos em vagas novas oferecidas: <span style="color: #737373"><?php echo($res['inscritos_vagas_oferecidas']); ?> </span> </p>

                        <p>Vagas remanescentes: <span style="color: #737373"><?php echo($res['vagas_remanecentes']); ?> </span> </p>

                        <p>Inscritos em vagas remanescentes: <span style="color: #737373"><?php echo($res['inscritos_vagas_remanecentes']); ?> </span> </p>

                        <p>Vagas oferecidas para programas especiais: <span style="color: #737373"><?php echo($res['vagas_programas_especiais']); ?> </span> </p>

                        <p>Inscritos em vagas para programas especiais: <span style="color: #737373"><?php echo($res['inscritos_vagas_especiais']); ?> </span> </p>

                        <p>Curso garante condições especiais de acessibilidade às pessoas com deficiência? <span style="color: #737373"><?php echo($res['curso_tem_acessibilidade']); ?> </span> </p>

                        <p>Recursos de tecnologia assistiva disponível a pessoas com deficiência</p>

                        Material em Braille: <?php echo($res['recursosBraille']); ?><br>
                        Material em áudio:<?php echo($res['recursosAudio']); ?><br>
                        Recursos de informática acessível:<?php echo($res['recursosInformatica']); ?><br>
                        Tradutor e intérprete de língua brasileira de sinais:<?php echo($res['recursosLibras']); ?><br>
                        Guia-Intérprete:<?php echo($res['recursosInterprete']); ?><br>
                        Material didático em língua brasileira de sinais:<?php echo($res['recursosLibrasMaterial']); ?><br>
                        Material em formato impresso em caractere ampliado:<?php echo($res['recursosAmpliado']); ?><br>
                        Material pedagógico tátil:<?php echo($res['recursosTatil']); ?><br>
                        Inserção da disciplina de língua brasileira de sinais no curso:<?php echo($res['recursosLibrasCursos']); ?><br>
                        Material didático em formato impresso acessível:<?php echo($res['recursosImpresso']); ?><br>
                        Recursos de acessibilidade à comunicação:<?php echo($res['recursosAcessibilidade']); ?><br>
                        Material didático digital acessível:<?php echo($res['recursosDigital']); ?><br><br>

                        <p>Oferece disciplinas semipresenciais? <span style="color: #737373"><?php echo($res['oferece_semepresenciais']); ?> </span> </p>

                        <p>Percentual de carga horária semipresencial: <span style="color: #737373"><?php echo($res['carga_horaria_semepresencial']); ?> </span> </p>

                        <p>Utiliza laboratórios? <span style="color: #737373"><?php echo($res['utiliza_laboratorios']); ?> </span> </p>

                        <p>Códigos dos laboratórios: <span style="color: #737373"><?php echo($res['codigos_laboratorios']); ?> </span> </p>

                        <p>Tipos de laboratórios: <span style="color: #737373"><?php echo($res['tipos_laboratorios']); ?> </span> </p>


                        <HR NOSHADE SIZE="4">


                    </section>

                </div>

            </div> <!-- Fim da div row principal -->

        </div> <!-- Fim da div container -->
    </body>

</html>




