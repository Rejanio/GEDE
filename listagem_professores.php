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

                        <h2 class="Titulo"> Docentes da Instituição </h2>

                        <form method="post" style="display: inline;" action="busca_professor.php">
                            <input style="display: inline;" size="100" type="text"  id="iBusca" name="nBusca" placeholder="&nbsp;Buscar professor por...">

                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
                            </button>

                            <div class="radio">
                                <label><input type="radio" name="opcao" value="id">ID INEP</label>
                                <label><input type="radio" name="opcao" value="nome" checked/>Nome</label>
                                <label><input type="radio" name="opcao" value="cpf">CPF</label>
                                <label><input type="radio" name="opcao" value="matricula">Matrícula</label>
                                <label><input type="radio" name="opcao" value="departamento">Departamento</label>
                            </div>
                        </form>

                        <?php
                        conexao();

                        $sql_seleciona = "SELECT id_inep, cpf, nome, id, matricula FROM docente";
                        $resultado = seleciona($sql_seleciona);
                        ?>
                        <HR NOSHADE SIZE="4">
                        <h2 class="Titulo">Todos os professores da Instituição: <?php echo (mysql_num_rows($resultado)); ?></h2> 
                        <br>
                        <div style="overflow: auto; width: 1000px; height:500px; margin-bottom: 100px">
                            <table border="0">
                                <thead>
                                    <tr id="impar">
                                        <th id="primeiraCelula">Matrícula</th>
                                        <th id="segundaCelula">CPF </th>
                                        <th id='terceiraCelula'>Nome</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($res = mysql_fetch_assoc($resultado)) {

                                        $parImpar = !($i % 2) ? "par" : "impar";
                                        echo('<tr id="' . $parImpar . '">' .
                                        '<td>' . $res['matricula'] . '</td>' .
                                        '<td>' . $res['cpf'] . '</td>' .
                                        '<td>' . $res['nome'] . '</td>' .
                                        '<td>' .
                                        '<form style="display: inline;" method="post" action="vizualizacao_professor.php" > <input style="display: none;" type="text" name="id" value="' . $res['id'] . '">'
                                        . '<button type="submit" class="btn btn-warning">&nbspExibir&nbsp </button> </form>' .
                                        '<form style="display: inline;" method="post" action="bd_exclusao_professor.php" > <input type="text" style="display: none;" name="id" value="' . $res['id'] . '">'
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

            </div>

        </div>
    </body>

</html>



