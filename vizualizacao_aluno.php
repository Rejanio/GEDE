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

$sql_seleciona = "SELECT * FROM aluno WHERE id= '" . $Id . "'";
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

                    <aside class="span3 sidebar" id="g">

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
                        <h2 class="Titulo">Dados do discente</h2> 


                        <div id="botoesVisualizacao">
                            <form style="display: inline;" method="post" action="edicao_aluno.php">
                                <input style="display: none;" type="text" name="id" value="<?php echo($res['id']); ?>">
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </form>
                            <form style="display: inline;" method="post" action="exclusao_aluno.php">
                                <input style="display: none;" type="text" name="id" value="<?php echo($res['id']); ?>">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">Excluir</button>
                            </form>

                            <button type="button" class="btn btn-warning" onclick="location.href = 'menu_alunos.php'">Cancelar</button>

                        </div>

                        <HR NOSHADE SIZE="4">
                        <p>ID do Aluno: <span style="color: #737373"><?php echo($res['id_inep']); ?> </span> </p>
                        <p>CPF do Aluno: <span style="color: #737373"><?php echo($res['cpf']); ?> </span> </p>
                        <p>Nome do Aluno: <span style="color: #737373"><?php echo($res['nome']); ?> </span> </p>
                        <p>Data de Nascimento: <span style="color: #737373"><?php echo($res['nascimento']); ?> </span> </p>
                        <p>Sexo do Aluno: <span style="color: #737373"><?php echo($res['sexo']); ?> </span> </p>
                        <p>Nome Completo da Mãe: <span style="color: #737373"><?php echo($res['nome_mae']); ?> </span> </p>
                        <p>Cor/Raça do Aluno: <span style="color: #737373"><?php echo($res['cor_raca']); ?> </span> </p>
                        <p>Nacionalidade: <span style="color: #737373"><?php echo($res['nacionalidade']); ?> </span> </p>
                        <p>País de Origem: <span style="color: #737373"><?php echo($res['pais_nacimento']); ?> </span> </p>
                        <p>UF de Nascimento: <span style="color: #737373"><?php echo($res['uf_nacimento']); ?> </span> </p>
                        <p>Município de Nascimento: <span style="color: #737373"><?php echo($res['municipio_nacimento']); ?> </span> </p>
                        <p>Aluno com Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação? <span style="color: #737373"><?php echo($res['deficiencia_transtorno_superdotacao']); ?> </span> </p>
                        <p>Tipo de Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p>
                        <p>-Cegueira: <span style="color: #737373"><?php echo($res['def_Cegueira']); ?> </span> </p>
                        <p>-Baixa visão: <span style="color: #737373"><?php echo($res['def_BaixaVisao']); ?> </span> </p>
                        <p>-Surdez:<span style="color: #737373"><?php echo($res['def_Surdez']); ?> </span> </p>
                        <p>-Deficiência auditiva:<span style="color: #737373"><?php echo($res['def_Auditiva']); ?> </span> </p>
                        <p>-Deficiência física:<span style="color: #737373"><?php echo($res['def_Fisica']); ?> </span> </p>
                        <p>-Surdocegueira:<span style="color: #737373"><?php echo($res['def_Surdocegueira']); ?> </span> </p>
                        <p>-Deficiência múltipla:<span style="color: #737373"><?php echo($res['def_Multipla']); ?> </span> </p>
                        <p>-Deficiência intelectual:<span style="color: #737373"><?php echo($res['def_Intelectual']); ?> </span> </p>
                        <p>-Autismo:<span style="color: #737373"><?php echo($res['def_Autismo']); ?> </span> </p>
                        <p>-Síndrome de Asperger:<span style="color: #737373"><?php echo($res['def_Asperger']); ?> </span> </p>
                        <p>-Síndrome de Rett:<span style="color: #737373"><?php echo($res['def_Rett']); ?> </span> </p>
                        <p>-Transtorno desintegrativo de infância:<span style="color: #737373"><?php echo($res['def_Desintegrativo']); ?> </span> </p>
                        <p>-Altas habilidades/Superdotação:<span style="color: #737373"><?php echo($res['def_Superdotacao']); ?> </span> </p>

                        <h2 class="Titulo">Vínculo do aluno ao curso</h2>

                        <HR NOSHADE SIZE="4">

                        <p>Código do Curso: <span style="color: #737373"><?php echo($res['codigo_curso']); ?> </span> </p>
                        <p>Código do Polo: <span style="color: #737373"><?php echo($res['codigo_polo']); ?> </span> </p>
                        <p>Turno do aluno no curso: <span style="color: #737373"><?php echo($res['turno_aluno_curso']); ?> </span> </p>
                        <p>Situação do Vínculo do Aluno no Curso: <span style="color: #737373"><?php echo($res['situacao_aluno_curso']); ?> </span> </p>
                        <p>Carga Horária Total: <span style="color: #737373"><?php echo($res['carga_horaria_total']); ?> </span> </p>
                        <p>Carga Horária Integralizada: <span style="color: #737373"><?php echo($res['carga_horaria_integralizada']); ?> </span> </p>
                        <p>Semestre de conclusão do Curso: <span style="color: #737373"><?php echo($res['semestre_conclusao']); ?> </span> </p>
                        <p>Aluno PARFOR?: <span style="color: #737373"><?php echo($res['aluno_parfor']); ?> </span> </p>
                        <p>Mobilidade Acadêmica: <span style="color: #737373"><?php echo($res['mobilidade_academica']); ?> </span> </p>
                        <p>IES Destino - Mobilidade Acadêmica Nacional: <span style="color: #737373"><?php echo($res['destino_mobilidade_nacional']); ?> </span> </p>
                        <p>Tipo de Mobilidade Acadêmica Internacional: <span style="color: #737373"><?php echo($res['tipo_mobilidade_internacional']); ?> </span> </p>
                        <p>País Destino - Mobilidade Acadêmica Internacional: <span style="color: #737373"><?php echo($res['pais_destino']); ?> </span> </p>
                        <p>Tipo de Escola que Concluiu o Ensino Médio: <span style="color: #737373"><?php echo($res['tipo_escola_ensino_medio']); ?> </span> </p>
                        <p>Semestre de Ingresso no Curso: <span style="color: #737373"><?php echo($res['semestre_ingresso']); ?> </span> </p> 
                        <p>Participa de Programa de reserva de vagas? <span style="color: #737373"><?php echo($res['programa_reserva_vagas']); ?> </span> <p> 
                        <p>Tipo de Programa de Reserva de Vagas:</p>
                        <p>-Étnico:<span style="color: #737373"><?php echo($res['ReservaEtico']); ?> </span> </p>
                        <p>-Pessoa com deficiência:<span style="color: #737373"><?php echo($res['ReservaDeficiencia']); ?> </span> </p>
                        <p>-Estudante procedente de escola pública:<span style="color: #737373"><?php echo($res['ReservaPublica']); ?> </span> </p>
                        <p>-Social:<span style="color: #737373"><?php echo($res['ReservaSocial']); ?> </span> </p>
                        <p>-Outros:<span style="color: #737373"><?php echo($res['ReservaOutros']); ?> </span> </p>

                        <p>Possui Apoio Social? <span style="color: #737373"><?php echo($res['apoio_social']); ?> </span> <p>

                        <p>Tipo de Apoio Social:</p>
                        <p>-Alimentação:<span style="color: #737373"><?php echo($res['ApoioAlimentacao']); ?> </span> </p>
                        <p>-Moradia:<span style="color: #737373"><?php echo($res['ApoioMoradia']); ?> </span> </p>
                        <p>-Transporte:<span style="color: #737373"><?php echo($res['ApoioTransporte']); ?> </span> </p>
                        <p>-Material didático:<span style="color: #737373"><?php echo($res['ApoioDidatico']); ?> </span> </p>
                        <p>-Bolsa trabalho:<span style="color: #737373"><?php echo($res['ApoioTrabalho']); ?> </span> </p>
                        <p>-Bolsa permanência:<span style="color: #737373"><?php echo($res['ApoioPermanencia']); ?> </span> </p>

                        <p>Atividade Extracurricular:<span style="color: #737373"><?php echo($res['atividade_extracurricular']); ?> </span> </p>

                        <p>Tipo de Atividade Extracurricular</p>
                        <p>-Pesquisa:<span style="color: #737373"><?php echo($res['Pesquisa']); ?> </span> </p>
                        <p>-Extensão:<span style="color: #737373"><?php echo($res['Extensao']); ?> </span> </p>
                        <p>-Monitoria:<span style="color: #737373"><?php echo($res['Monitoria']); ?> </span> </p>
                        <p>-Estágio não obrigatório:<span style="color: #737373"><?php echo($res['Estagio']); ?> </span> </p>

                        <p>Bolsa Atividade Extracurricular:</p>
                        <p>-Bolsa Pesquisa:<span style="color: #737373"><?php echo($res['bolsa_pesquisa']); ?> </span> </p>
                        <p>-Bolsa Extensão:<span style="color: #737373"><?php echo($res['bolsa_extensao']); ?> </span> </p>
                        <p>-Bolsa Monitoria:<span style="color: #737373"><?php echo($res['bolsa_monitoria']); ?> </span> </p>
                        <p>-Bolsa Estágio não obrigatório:<span style="color: #737373"><?php echo($res['bolsa_estagio']); ?> </span> </p>


                    </section>

                </div>
            </div> 
        </div>
    </body>

</html>


