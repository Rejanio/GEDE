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
        
        <link rel="icon" type="image/ico" href="imagens/favicon.ico" />

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

                        <div id="indexTitulo">

                            <h2 class="Titulo">Gerenciador de Dados Educacionais</h2>

                        </div>

                        <div id="indexDicentes" onclick="location.href = 'menuAlunos.php'">

                            <img src ="imagens/aluno.png" width="64">
                            <span style="color:white; font-size: 20px"> &nbsp;&nbsp;&nbsp;Módulo Discentes:</span>
                            Gerenciar as informações sobre os dicentes da instituição.

                        </div>
                        <div id="indexDocentes" onclick="location.href = 'menuProfessores.php'">

                            <img src ="imagens/prof.png" width="64">
                            <span style="color:white; font-size: 15pt"> &nbsp;&nbsp;&nbsp;Módulo Docentes:</span>
                            Gerenciar as informações sobre os docentes da instituição.
                        </div>
                        <div id="indexCursos" onclick="location.href = 'menuCursos.php'">

                            <img src ="imagens/curso.png" width="64">
                            <span style="color:white; font-size: 20px"> &nbsp;&nbsp;&nbsp;Módulo Cursos:</span>
                            Gerenciar as informações sobre os cursos da instituição.
                        </div>


                    </section>

                </div>

            </div> <!-- Fim da div row principal -->

        </div> <!-- Fim da div container -->
    </body>

</html>

