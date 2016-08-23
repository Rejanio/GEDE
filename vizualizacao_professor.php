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

$sql_seleciona = "SELECT * FROM docente WHERE id = '" . $Id . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
                        <h2 class="Titulo">Dados do Professor</h2> 

                        <div id="botoesEdicao">
                            <form style="display: inline;" method="post" action="edicao_professor.php">
                                <input style="display: none;" type="text" name="id" value="<?php echo($res['id']); ?>">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Deseja editar?')">Editar</button>
                            </form>
                            <form style="display: inline;" method="post" action="bd_exclusao_professor.php">
                                <input style="display: none;" type="text" name="id" value="<?php echo($res['id']); ?>">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">Excluir</button>
                            </form>

                            <button type="button" class="btn btn-warning" onclick="location.href = 'menu_professores.php'">Cancelar</button>

                        </div>

                        <HR NOSHADE SIZE="4">

                        <p>Nome do docente: <span style="color: #737373">  <?php echo($res['nome']); ?></span></p>

                        <p>Matrícula: <span style="color: #737373"><?php echo($res['matricula']); ?> </span></p>

                        <p>ID INEP: <span style="color: #737373"><?php echo($res['id_inep']); ?> </span></p>

                        <p>CPF do docente: <span style="color: #737373"> <?php echo($res['cpf']); ?></span></p>

                        <p>Data de Nascimento: <span style="color: #737373">  <?php echo($res['nascimento']); ?></span></p>

                        <p>Sexo do docente: <span style="color: #737373">  <?php echo($res['sexo']); ?></span></p>

                        <p>Nome Completo da Mãe:  <span style="color: #737373"> <?php echo($res['nome_mae']); ?></span></p>

                        <p>Cor/Raça do Aluno:  <span style="color: #737373"> <?php echo($res['cor_raca']); ?></span></p>

                        <p>Nacionalidade: <span style="color: #737373"> <?php echo($res['nacionalidade']); ?></span></p>

                        <p>País de Origem:  <span style="color: #737373"> <?php echo($res['pais_nacimento']); ?></span></p>

                        <p>UF de Nascimento: <span style="color: #737373">  <?php echo($res['uf_nacimento']); ?></span></p>

                        <p>Município de Nascimento: <span style="color: #737373">   <?php echo($res['municipio_nacimento']); ?></span></p>

                        <p>Docente com Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação: <span style="color: #737373">   <?php echo($res['deficiencia']); ?></span></p>

                        <p>Tipo de Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:  
                            <span style="color: #737373">  <?php echo($res['tipo_deficiencia']); ?></span></p>

                        <h2 class="Titulo">Vínculo do professor a IES</h2>

                        <HR NOSHADE SIZE="4">

                        <p>Escolaridade: <span style="color: #737373"> <?php echo($res['escolaridade']); ?></span></p>

                        <p>Pós-Graduação: <span style="color: #737373"> <?php echo($res['pos_graduacao']); ?></span></p>

                        <p>Situação do Docente na IES:  <span style="color: #737373">  <?php echo($res['situacao_docente']); ?></span></p>

                        <p>Regime de Trabalho:  <span style="color: #737373"> <?php echo($res['regime_trabalho']); ?></span></p>

                        <p>Docente Substituto? <span style="color: #737373">  <?php echo($res['docente_substituto']); ?></span></p>

                        <p>Docente Visitante? <span style="color: #737373">  <?php echo($res['docente_visitante']); ?></span></p>

                        <p>Tipo de Vínculo de Docente Visitante: <span style="color: #737373">  <?php echo($res['tipo_docente_visitante']); ?></span></p>

                        <p>Docente em Exercício em 31/12?  <span style="color: #737373"> <?php echo($res['exercicio_3112']); ?></span></p>

                        <p>Atuação do Docente:</p>
                        Ensino de pós-graduação stricto sensu a distância: <?php
                        if ($res['pos_distancia'] == 'Sim') {
                            echo 'Sim';
                        } else {
                            echo 'Não';
                        }
                        ?><br>
                        Ensino em curso sequencial de formação específica: <?php
                        if ($res['curso_formacao_especifica'] == 'Sim') {
                            echo 'Sim';
                        } else {
                            echo 'Não';
                        }
                        ?><br>
                        Ensino em curso de graduação presencial: <?php
                        if ($res['graduacao_presencial'] == 'Sim') {
                            echo 'Sim';
                        } else {
                            echo 'Não';
                        }
                        ?><br>
                        Ensino em curso a distância: <?php
                        if ($res['curso_distancia'] == 'Sim') {
                            echo 'Sim';
                        } else {
                            echo 'Não';
                        }
                        ?><br>
                        Ensino de pós-graduação stricto sensu presencial: <?php
                        if ($res['pos_presencial'] == 'Sim') {
                            echo 'Sim';
                        } else {
                            echo 'Não';
                        }
                        ?><br>
                        Pesquisa: <?php
                        if ($res['pesquisa'] == 'Sim') {
                            echo 'Sim';
                        } else {
                            echo 'Não';
                        }
                        ?><br>
                        Extensão: <?php
                        if ($res['extensao'] == 'Sim') {
                            echo 'Sim';
                        } else {
                            echo 'Não';
                        }
                        ?><br>
                        Gestão, planejamento e avaliação: <?php
                        if ($res['gestao_planejamento'] == 'Sim') {
                            echo 'Sim';
                        } else {
                            echo 'Não';
                        }
                        ?>
                        <br>
                        <br>
                        <p>Possui Bolsa Pesquisa (Somente para Docentes com Atuação em Pesquisa)? <span style="color: #737373">  <?php echo($res['bolsa_pesquisa']); ?></span></p>

                        <h2 class="Titulo">Vínculo do professor ao curso</h2>

                        <HR NOSHADE SIZE="4">

                        <p>Departamento: <span style="color: #737373"><?php echo($res['departamento']); ?> </span></p>

                        <p>Classe: <span style="color: #737373"><?php echo($res['classe']); ?> </span></p>

                        <p>Código do Curso/Área Básica ao qual o Docente está vinculado: <span style="color: #737373">  <?php echo($res['codigo_cursoarea']); ?> </span><p>

                        <HR NOSHADE SIZE="4">

                    </section>

                </div>

            </div> <!-- Fim da div row principal -->

        </div> <!-- Fim da div container -->
    </body>

</html>




