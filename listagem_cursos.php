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

                        <h2 class="Titulo">Cursos da Instituição</h2>

                        <form method="post" style="display: inline;" action="busca_curso.php">
                            <input style="display: inline;" size="100" type="text"  id="iBusca" name="nBusca" placeholder="&nbsp;Buscar curso por...">

                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
                            </button>

                            <div class="radio">
                                <label><input type="radio" name="opcao" value="codigo">Código INEP</label>
                                <label><input type="radio" name="opcao" value="nome" checked/>Nome</label>
                                <label><input type="radio" name="opcao" value="codigo_ocde">Código OCDE</label>
                                <label><input type="radio" name="opcao" value="grau">Grau Acadêmico</label>
                            </div>
                        </form>

                        <?php
                        conexao();

                        $sql_seleciona = "SELECT codigo_curso, nome, grau_academico, id FROM curso";
                        $resultado = seleciona($sql_seleciona);
                        ?>

                        <h2 class="Titulo">Todos os cursos da Instituição: <?php echo (mysql_num_rows($resultado)); ?></h2> 
                        <br>
                        <div style="overflow: auto; width: 1000px; height:500px; margin-bottom: 100px">
                            <table border="0">
                                <thead>
                                    <tr id="impar">
                                        <th id="primeiraCelula">Código INEP</th>
                                        <th id="segundaCelula">Nome </th>
                                        <th id='terceiraCelula'>Grau</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($res = mysql_fetch_assoc($resultado)) {

                                        $parImpar = !($i % 2) ? "par" : "impar";
                                        echo('<tr id="' . $parImpar . '">' .
                                        '<td>' . $res['codigo_curso'] . '</td>' .
                                        '<td>' . $res['nome'] . '</td>' .
                                        '<td>' . $res['grau_academico'] . '</td>' .
                                        '<td>' .
                                        '<form style="display: inline;" method="post" action="vizualizacao_curso.php" > <input style="display: none;" type="text" name="id" value="' . $res['id'] . '">'
                                        . '<button type="submit" class="btn btn-warning">&nbspExibir&nbsp </button> </form>' .
                                        '<form style="display: inline;" method="post" action="exclusao_curso.php" > <input type="text" style="display: none;" name="id" value="' . $res['id'] . '">'
                                        . '<button type="submit" class="btn btn-danger" onclick="return confirm(\'Deseja mesmo excluir?\')">Excluir</button> </form>' .
                                        '</td>' .
                                        '</tr>');
                                        $i++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </section>

                </div>

            </div> <!-- Fim da div row principal -->

        </div> <!-- Fim da div container -->
    </body>

</html>



