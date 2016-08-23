<?php

require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

function atualizacaoPos() {

    conexao();

    $sql_selecionaPos = "SELECT cpf, curso FROM professores_pos";
    $resultado = seleciona($sql_selecionaPos);

    $resp = "Sim";

    while ($res = mysql_fetch_assoc($resultado)) {

        $sql_atualiza = "UPDATE docente SET pos_presencial='$resp' WHERE cpf=" . $res['cpf'];

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacao() {

    conexao();

    $resp = "Não";

    $sql_atualiza = "UPDATE docente SET docente_visitante='$resp'";

    mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
}

function atualizacaoExte() {

    conexao();

    $sql_selecionaPos = "SELECT matricula_ex FROM projetos_professores";
    $resultado = seleciona($sql_selecionaPos);

    $resp = "Sim";

    while ($res = mysql_fetch_assoc($resultado)) {

        $sql_atualiza = "UPDATE docente SET extensao='$resp' WHERE matricula=" . $res['matricula_ex'];

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoTecno() {

    conexao();

    $sql_selecionaPos = "SELECT matricula_t, cpf_t, mae_t, estado_t, pais_t, municipio_t FROM prof_tecno";
    $resultado = seleciona($sql_selecionaPos);

    while ($res = mysql_fetch_assoc($resultado)) {

        $sql_atualiza = "UPDATE docente SET nome_mae='" . $res['mae_t'] . "', uf_nacimento='" . $res['estado_t'] . "', pais_nacimento='" . $res['pais_t'] . "', municipio_nacimento='" . $res['municipio_t'] . "' WHERE matricula=" . $res['matricula_t'];

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoINEP() {

    conexao();

    $sql_selecionaPos = "SELECT id_inep_i, cpf_i, mae_i, raca_i, nacionalidade_i, pais_i FROM profinep";
    $resultado = seleciona($sql_selecionaPos);

    while ($res = mysql_fetch_assoc($resultado)) {

        $sql_atualiza = "UPDATE docente SET nome_mae='" . $res['mae_i'] . "', id_inep='" . $res['id_inep_i'] . "', pais_nacimento='" . $res['pais_i'] . "', nacionalidade='" . $res['nacionalidade_i'] . "', cor_raca='" . $res['raca_i'] . "' WHERE cpf=" . $res['cpf_i'];

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoCodigosLocal() {

    conexao();

    $sql_selecionaPos = "SELECT municipio_i, cpf_i, uf_nascimento_i FROM profinep";
    $resultado = seleciona($sql_selecionaPos);

    while ($res = mysql_fetch_assoc($resultado)) {

        $sql_atualiza = "UPDATE docente SET codigo_municipio='" . $res['municipio_i'] . "', codigo_uf='" . $res['uf_nascimento_i'] . "' WHERE cpf=" . $res['cpf_i'];

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function txtProfTeste() {

    conexao();

    $sql_selecionaPos = "SELECT * FROM docente";
    $resultado = seleciona($sql_selecionaPos);

    $txt = "";

    while ($res = mysql_fetch_assoc($resultado)) {

        $txt += "";
    }
}

function atualizacaoINEP2() {

    conexao();

    $sql_seleciona = "SELECT id_novo, cpf_inep FROM idsinep";
    $resultado = seleciona($sql_seleciona);

    while ($res = mysql_fetch_assoc($resultado)) {

        $sql_atualiza = "UPDATE docente SET id_inep='" . $res['id_novo'] . "' WHERE cpf=" . $res['cpf_inep'];

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoGestao() {

    conexao();

    $sql_seleciona = "SELECT matricula_g, gestao_g FROM gestao";
    $resultado = seleciona($sql_seleciona);

    while ($res = mysql_fetch_assoc($resultado)) {

        $sql_atualiza = "UPDATE docente SET gestao_planejamento='" . $res['gestao_g'] . "' WHERE matricula=" . $res['matricula_g'];

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoPesquisa() {

    conexao();

    $sql_seleciona = "SELECT matricula_p, pesquisa_p FROM profpesqui";
    $resultado = seleciona($sql_seleciona);

    while ($res = mysql_fetch_assoc($resultado)) {

        $sql_atualiza = "UPDATE docente SET pesquisa='" . $res['pesquisa_p'] . "' WHERE matricula=" . $res['matricula_p'];

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoAlunos() {

    set_time_limit(0);

    conexao();

    $sql_selecionaPos = "SELECT * FROM dados_alunos";
    $resultado = seleciona($sql_selecionaPos);

    while ($res = mysql_fetch_assoc($resultado)) {

        $sql_atualiza = "UPDATE aluno SET codigo_curso='" . $res['B'] . "', turno_aluno_curso='" . $res['C'] . "', semestre_ingresso='" . $res['E'] . "', tipo_escola_ensino_medio='" . $res['F'] . "', "
                . "programa_reserva_vagas='" . $res['P'] . "', ReservaEtico='" . $res['Q'] . "', ReservaDeficiencia='" . $res['R'] . "', ReservaPublica='" . $res['S'] . "', ReservaSocial='" . $res['T'] . "', "
                . "ReservaOutros='" . $res['U'] . "', Ingres_Vestibular='" . $res['G'] . "', Ingres_Enem='" . $res['H'] . "', Ingres_Seriada='" . $res['I'] . "', Ingres_Simplificada='" . $res['J'] . "', Ingres_Transferencia='" . $res['L'] . "', "
                . "Ingres_Convenio='" . $res['K'] . "', Ingres_Judicial='" . $res['M'] . "', Ingres_Remanescentes='" . $res['N'] . "', Ingres_VagasEspeciais='" . $res['O'] . "' WHERE cpf=" . $res['A'];


        //echo($sql_atualiza);
        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoIDS() {

    set_time_limit(0);

    conexao();

    $sql_selecionaPos = "SELECT * FROM ids";
    $resultado = seleciona($sql_selecionaPos);

    while ($res = mysql_fetch_assoc($resultado)) {

        $sql_atualiza = "UPDATE aluno SET id_inep='" . $res['id_in'] . "' WHERE cpf=" . $res['cpf2'];


        //echo($sql_atualiza);
        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoAlunosMatriculas() {

    set_time_limit(0);

    conexao();

    $sql = "SELECT * FROM matriculas";
    $resultado = seleciona($sql);

    while ($res = mysql_fetch_assoc($resultado)) {

        $sql_atualiza = "UPDATE aluno SET matricula='" . $res['matricula'] . "' WHERE cpf=" . $res['cpf'];


        echo($sql_atualiza . "<br>");

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoMonitoria() {

    set_time_limit(0);

    conexao();

    $sql = "SELECT * FROM monitoria";
    $resultado = seleciona($sql);

    while ($res = mysql_fetch_assoc($resultado)) {

        $sql_atualiza = "UPDATE aluno SET atividade_extracurricular='Sim', Monitoria='Sim' WHERE matricula=" . $res['matricula'];


        echo($sql_atualiza . "<br>");

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoCPFS_datas() {

    set_time_limit(0);

    conexao();

    $sql = "SELECT cpf, id, nascimento, semestre_ingresso FROM aluno";
    $resultado = seleciona($sql);

    while ($res = mysql_fetch_assoc($resultado)) {

        $nova1 = str_pad($res['cpf'], 11, '0', STR_PAD_LEFT);

        $nova2 = str_pad($res['nascimento'], 8, '0', STR_PAD_LEFT);

        $nova3 = str_pad($res['semestre_ingresso'], 6, '0', STR_PAD_LEFT);

        $sql_atualiza = "UPDATE aluno SET cpf='$nova1', nascimento='$nova2', semestre_ingresso='$nova3' WHERE id=" . $res['id'];

        echo($sql_atualiza . "<br>");

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoCargas() {

    set_time_limit(0);

    conexao();

    $sql = "SELECT * FROM cargas2";
    $resultado = seleciona($sql);

    while ($res = mysql_fetch_assoc($resultado)) {

        if ($res['porcentagem'] != 0) {

            $cargaAtual = porcentagem($res['porcentagem'], $res['carga']);

            $sql_atualiza = "UPDATE aluno SET carga_horaria_total='" . $res['carga'] . "', carga_horaria_integralizada='" . round($cargaAtual) . "' WHERE cpf=" . $res['cpf'];

            echo($sql_atualiza . "<br>");

            mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
        } else {

            $sql_atualiza = "UPDATE aluno SET carga_horaria_total='" . $res['carga'] . "', carga_horaria_integralizada='0' WHERE cpf=" . $res['cpf'];

            echo($sql_atualiza . "<br>");

            mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
        }
    }
}

function semestreIngresso() {

    set_time_limit(0);

    conexao();

    $sql = "SELECT cpf, id, semestre_ingresso FROM aluno";
    $resultado = seleciona($sql);

    while ($res = mysql_fetch_assoc($resultado)) {

        $nova1 = str_pad($res['cpf'], 11, '0', STR_PAD_LEFT);

        $nova2 = str_pad($res['nascimento'], 8, '0', STR_PAD_LEFT);

        $sql_atualiza = "UPDATE aluno SET cpf='$nova1', nascimento='$nova2' WHERE id=" . $res['id'];

        echo($sql_atualiza . "<br>");

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoCPFS() {

    set_time_limit(0);

    conexao();

    $sql = "SELECT * FROM cargas2";
    $resultado = seleciona($sql);

    while ($res = mysql_fetch_assoc($resultado)) {

        $nova1 = str_pad($res['cpf'], 11, '0', STR_PAD_LEFT);

        $sql_atualiza = "UPDATE cargas2 SET cpf='$nova1' WHERE id=" . $res['id'];

        echo($sql_atualiza . "<br>");

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function atualizacaoSemestres() {

    set_time_limit(0);

    conexao();

    $sql = "SELECT * FROM semestres";
    $resultado = seleciona($sql);

    while ($res = mysql_fetch_assoc($resultado)) {

        $nova = $res['semestre'] . $res['ano'];

        $sql_atualiza = "UPDATE aluno SET semestre_ingresso='$nova' WHERE cpf=" . $res['cpf'];

        echo($sql_atualiza . "<br>");

        mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
    }
}

function retiraPECg() {

    set_time_limit(0);

    conexao();

    $sql = "SELECT nacionalidade, id FROM aluno";
    $resultado = seleciona($sql);

    while ($res = mysql_fetch_assoc($resultado)) {

        if (nacionalidade != 'Estrangeira') {
            $sql_atualiza = "UPDATE aluno SET Ingres_Convenio='' WHERE id=" . $res['id'];

            echo($sql_atualiza . "<br>");

            mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
        }
    }
}

function formados() {

    set_time_limit(0);

    conexao();

    $sql = "SELECT carga_horaria_integralizada, carga_horaria_total, situacao_aluno_curso, id FROM aluno";
    $resultado = seleciona($sql);

    while ($res = mysql_fetch_assoc($resultado)) {

        if ($res['situacao_aluno_curso'] == 'Formado') {
            $sql_atualiza = "UPDATE aluno SET carga_horaria_integralizada='" . $res['carga_horaria_total'] . "' WHERE id=" . $res['id'];

            echo($sql_atualiza . "<br>");

            mysql_query($sql_atualiza) or die("Não foi possivel atualizar: " . mysql_error());
        }
    }
}

function teste() {

    set_time_limit(0);

    conexao();

    $count = mysql_query("SELECT COUNT(*) AS Total FROM docente WHERE departamento = 'BIO'");

    $total = mysql_result($count, 0, 'Total');
    echo 'DBIO:' . $total. '<br>';

    $count = mysql_query("SELECT COUNT(*) AS Total FROM docente WHERE departamento = 'EXA'");

    $total = mysql_result($count, 0, 'Total');
    echo 'DEXA:' . $total. '<br>';

    $count = mysql_query("SELECT COUNT(*) AS Total FROM docente WHERE departamento = 'CHF'");

    $total = mysql_result($count, 0, 'Total');
    echo 'DCFH:' . $total. '<br>';

    $count = mysql_query("SELECT COUNT(*) AS Total FROM docente WHERE departamento = 'CIS'");

    $total = mysql_result($count, 0, 'Total');
    echo 'DCIS:' . $total. '<br>';

    $count = mysql_query("SELECT COUNT(*) AS Total FROM docente WHERE departamento = 'EDU'");

    $total = mysql_result($count, 0, 'Total');
    echo 'DEDU:' . $total. '<br>';

    $count = mysql_query("SELECT COUNT(*) AS Total FROM docente WHERE departamento = 'FIS'");

    $total = mysql_result($count, 0, 'Total');
    echo 'DFIS:' . $total. '<br>';

    $count = mysql_query("SELECT COUNT(*) AS Total FROM docente WHERE departamento = 'CIS'");

    $total = mysql_result($count, 0, 'Total');
    echo 'DCIS:' . $total. '<br>';

    $count = mysql_query("SELECT COUNT(*) AS Total FROM docente WHERE departamento = 'DLA'");

    $total = mysql_result($count, 0, 'Total');
    echo 'DLA:' . $total. '<br>';

    $count = mysql_query("SELECT COUNT(*) AS Total FROM docente WHERE departamento = 'SAU'");

    $total = mysql_result($count, 0, 'Total');
    echo 'DSAU:' . $total. '<br>';

    $count = mysql_query("SELECT COUNT(*) AS Total FROM docente WHERE departamento = 'TEC'");

    $total = mysql_result($count, 0, 'Total');
    echo 'DTEC:' . $total. '<br>';
}

atualizacaoMonitoria();
?>


