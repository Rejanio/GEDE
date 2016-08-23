<?php
session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
?>

<?php require_once('funcoes_uteis.php'); ?>
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

                        <h2 class="Titulo">Alunos da Instituição</h2>

                        <form method="post" style="display: inline;" action="busca_aluno.php">
                            <input style="display: inline;" size="100" type="text"  id="iBusca" name="nBusca" placeholder="&nbsp;Buscar aluno por...">

                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
                            </button>

                            <div class="radio">
                                <label><input type="radio" name="opcao" value="id">ID INEP</label>
                                <label><input type="radio" name="opcao" value="nome" checked/>Nome</label>
                                <label><input type="radio" name="opcao" value="cpf">CPF</label>
                                <label><input type="radio" name="opcao" value="matricula">Matrícula</label>
                                <label><input type="radio" name="opcao" value="curso">Curso</label>
                                <label><input type="radio" name="opcao" value="codigocurso">Código Curso</label>
                            </div>
                        </form>

                        <h2 class="Titulo">Ações</h2> 

                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default" onclick="location.href = 'adicao_aluno.php'"> Adicionar aluno</button>

                        </div>

                        <h2 class="Titulo">Estatísticas</h2> 
                        <?php
                        conexao();
                        $count = mysql_query("SELECT COUNT(*) AS Total FROM aluno");

                        $total = mysql_result($count, 0, 'Total');
                        echo 'Total de alunos: ' . $total;
                        ?>

                    </section>

                </div>

            </div> <!-- Fim da div row principal -->

        </div> <!-- Fim da div container -->
    </body>

</html>

