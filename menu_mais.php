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

                            <h2 class="Titulo">Mais Opções</h2>

                            Cadastrar novo usuário
                            <br>
                            <br>
                            <form method="post" action="/controle_usuarios/inserirUsuario.php">
                                <p>Nome: <input type="text" class="form-control" id="iNome" name="nNome" placeholder=""></p>
                                <p>Usuário: <input type="text" class="form-control" id="iUsuario" name="nUsuario" placeholder=""></p>
                                <p>Senha: <input type="text" class="form-control" id="iSenha" name="nSenha" placeholder=""></p>
                                <br>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </form>

                            <HR NOSHADE SIZE="4">

                            Mudar senha de usuário
                            <br>
                            <br>
                            <form method="post" action="/controle_usuarios/atualizarUsuario.php">
                                <p>Usuário: <input type="text" class="form-control" id="iUsuario" name="nUsuario" placeholder=""></p>
                                <p>Senha antiga: <input type="text" class="form-control" id="iSenhaAntiga" name="nSenhaAntiga" placeholder=""></p>
                                <p>Senha nova: <input type="text" class="form-control" id="iSenhaNova" name="nSenhaNova" placeholder=""></p>
                                <br>
                                <button type="submit" class="btn btn-primary">Alterar senha</button>
                            </form>

                            <HR NOSHADE SIZE="4">


                        </div>




                    </section>

                </div>

            </div> <!-- Fim da div row principal -->

        </div> <!-- Fim da div container -->
    </body>

</html>

