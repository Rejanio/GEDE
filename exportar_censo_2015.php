<?php

session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}

require_once('funcoes_uteis.php');

$opcao = $_POST["nOpcao"];

conexao();

if ($opcao == 1) {

    $sql_seleciona = "SELECT * FROM docente";
    $resultado = seleciona($sql_seleciona);

    $string = "30|666|3";

    while ($res = mysql_fetch_assoc($resultado)) {

        $string.="\r\n31|" . $res['id_ies'] . '|' . $res['nome'] . '|' . $res['cpf'] . '|' . $res['documento_estrangeiro'] . '|' . $res['nascimento'] . '|' . $res['sexo'] . '|' . $res['cor_raca'] . '|' . $res['nome_mae'] . '|'
                . $res['nacionalidade'] . '|' . $res['pais_nacimento'] . '|' . $res['codigo_uf'] . '|' . $res['codigo_municipio'] . '|' . $res['deficiencia'] . '|' . $res['cegueira'] . '|' . $res['baixa_visao'] . '|' . $res['surdez'] . '|' . $res['def_auditiva'] . '|'
                . $res['def_fisica'] . '|' . $res['surdocegueira'] . '|' . $res['def_multipla'] . '|' . $res['def_intelectual'] . '|' . $res['escolaridade'] . '|' . $res['pos_graduacao'] . '|' . $res['situacao_docente'] . '|' . $res['exercicio_3112'] . '|' . $res['regime_trabalho'] . '|'
                . $res['docente_substituto'] . '|' . $res['docente_visitante'] . '|' . '|' . $res['curso_formacao_especifica'] . '|' . $res['graduacao_presencial'] . '|' . $res['curso_distancia'] . '|' . $res['pos_presencial'] . '|' . $res['pos_distancia'] . '|' . $res['pesquisa'] . '|'
                . $res['extensao'] . '|' . $res['gestao_planejamento'] . '|' . $res['bolsa_pesquisa'];

        if ($res['codigo_cursoarea'] != "") {
            $temp = "\r\n32|" . $res['codigo_cursoarea'];
            $string.=$temp;
        }
    }

    $novaString = str_replace(",", "\r\n32|", $string);

    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H_i_s');

    $nomearquivo = "professores".$date.".txt";

    $fp = fopen($nomearquivo, "a");
    $escreve = fwrite($fp, $novaString);
    fclose($fp);

    download($nomearquivo);

    header('location:menu_exportacao.php');
} elseif ($opcao == 2) {

    set_time_limit(0);
    $sql_selecionaCursos = "SELECT codigo_curso, nome FROM curso";
    $cursos = seleciona($sql_selecionaCursos);

    while ($temp = mysql_fetch_assoc($cursos)) {

        $sql_selecionaAlunos = "SELECT * FROM aluno";
        $resultado = seleciona($sql_selecionaAlunos);

        $string = "40|666|4";

        while ($res = mysql_fetch_assoc($resultado)) {

            if ($res['codigo_curso'] == $temp['codigo_curso']) {

                $string.="\r\n41|" . $res['id_inep'] . '|' . $res['id_ies'] . '|' . $res['nome'] . '|' . $res['cpf'] . '|' . $res['documento_estrangeiro'] . '|'
                        . $res['nascimento'] . '|' . $res['sexo'] . '|' . $res['cor_raca'] . '|' . $res['nome_mae'] . '|' . $res['nacionalidade'] . '|' . $res['codigo_uf']
                        . '|' . $res['codigo_municipio'] . '|' . $res['pais_nacimento'] . '|' . $res['deficiencia_transtorno_superdotacao'] . '|' . $res['def_Cegueira'] . '|' . $res['def_BaixaVisao']
                        . '|' . $res['def_Surdez'] . '|' . $res['def_Auditiva'] . '|' . $res['def_Fisica'] . '|' . $res['def_Surdocegueira'] . '|' . $res['def_Multipla']
                        . '|' . $res['def_Intelectual'] . '|' . $res['def_Autismo'] . '|' . $res['def_Asperger'] . '|' . $res['def_Rett'] . '|' . $res['def_Desintegrativo']
                        . '|' . $res['def_Superdotacao'] . "\r\n42|" . $res['semestre_referencia'] . '|' . $res['codigo_curso'] . '|' . $res['codigo_polo'] . '|' . $res['turno_aluno_curso']
                        . '|' . $res['situacao_aluno_curso'] . '|' . $res['curso_origem'] . '|' . $res['semestre_conclusao'] . '|' . $res['aluno_parfor'] . '|' . $res['semestre_ingresso']
                        . '|' . $res['tipo_escola_ensino_medio'] . '|' . $res['Ingres_Vestibular'] . '|' . $res['Ingres_Enem'] . '|' . $res['Ingres_Seriada'] . '|' . $res['Ingres_Simplificada']
                        . '|' . $res['Ingres_Convenio'] . '|' . $res['Ingres_Transferencia'] . '|' . $res['Ingres_Judicial'] . '|' . $res['Ingres_Remanescentes'] . '|' . $res['Ingres_VagasEspeciais']
                        . '|' . $res['mobilidade_academica'] . '|' . $res['tipo_mobilidade'] . '|' . $res['destino_mobilidade_nacional'] . '|' . $res['tipo_mobilidade_internacional'] . '|' . $res['pais_destino']
                        . '|' . $res['programa_reserva_vagas'] . '|' . $res['ReservaEtico'] . '|' . $res['ReservaDeficiencia'] . '|' . $res['ReservaPublica'] . '|' . $res['ReservaSocial']
                        . '|' . $res['ReservaOutros'] . '|' . $res['finaceamento_estudantil'] . '|' . $res['Fies'] . '|' . $res['GovernoEstadualReembolsavel'] . '|' . $res['GovernoMunicipalReembolsavel']
                        . '|' . $res['FinanciamentoIESReembolsavel'] . '|' . $res['FinanciamentoExternoReembolsavel'] . '|' . $res['ProuniIntegral'] . '|' . $res['ProuniParcial'] . '|' . $res['FinanciamentoExterno']
                        . '|' . $res['FinanciamentoEstadual'] . '|' . $res['FinanciamentoIES'] . '|' . $res['FinanciamentoMunicipal'] . '|' . $res['apoio_social'] . '|' . $res['ApoioAlimentacao']
                        . '|' . $res['ApoioMoradia'] . '|' . $res['ApoioTransporte'] . '|' . $res['ApoioDidatico'] . '|' . $res['ApoioTrabalho'] . '|' . $res['ApoioPermanencia']
                        . '|' . $res['atividade_extracurricular'] . '|' . $res['Pesquisa'] . '|' . $res['bolsa_pesquisa'] . '|' . $res['Extensao'] . '|' . $res['bolsa_extensao']
                        . '|' . $res['Monitoria'] . '|' . $res['bolsa_monitoria'] . '|' . $res['Estagio'] . '|' . $res['bolsa_estagio'] . '|' . $res['carga_horaria_total']
                        . '|' . $res['carga_horaria_integralizada'];
            }
        }

        //$fp = fopen($temp['codigo_curso'] . ".txt", "a");
        //$escreve = fwrite($fp, $string);
        //fclose($fp);

            date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H_i_s');

    $nomearquivo = $temp['codigo_curso'].$date.".txt";

    $fp = fopen($nomearquivo, "a");
    $escreve = fwrite($fp, $novaString);
    fclose($fp);

    download($nomearquivo);
    }

    header('location:menu_exportacao.php');
} elseif ($opcao == 3) {

    $sql_seleciona = "SELECT * FROM curso";
    $resultado = seleciona($sql_seleciona);

    $string = "20|666|2";

    while ($res = mysql_fetch_assoc($resultado)) {

        if ($res['turno_curso'] == "Matutino") {

            $string.="\r\n21|" . $res['codigo_curso'] . '|' . $res['curso_teve_aluno_vinculado'] . '|' . $res['motivo_sem_aluno'] . '|' . $res['codigo_curso_representado'] . '|'
                    . $res['curso_financ_convenio'] . '|Sim|' . $res['prazo_minimo_integralizacao'] . '|' . $res['vagas_novas_oferecidas'] . '|' . $res['vagas_remanecentes'] . '|' . $res['vagas_programas_especiais'] . '|'
                    . $res['inscritos_vagas_oferecidas'] . '|' . $res['inscritos_vagas_remanecentes'] . '|' . $res['inscritos_vagas_especiais'] . "|Nao||||||||Nao||||||||Nao|||||||||||||||" . $res['curso_tem_acessibilidade'] . '|' . $res['recursosBraille'] . '|'
                    . $res['recursosAudio'] . '|' . $res['recursosInformatica'] . '|' . $res['recursosAmpliado'] . '|' . $res['recursosTatil'] . '|' . $res['recursosAcessibilidade'] . '|'
                    . $res['recursosLibras'] . '|' . $res['recursosInterprete'] . '|' . $res['recursosLibrasMaterial'] . '|' . $res['recursosLibrasCursos'] . '|' . $res['recursosImpresso'] . '|' . $res['recursosDigital'] . '|'
                    . $res['utiliza_laboratorios'] . '|' . $res['oferece_semepresenciais'] . '|' . $res['carga_horaria_semepresencial'] . ',' . $res['codigos_laboratorios'];
        } elseif ($res['turno_curso'] == "Vespertino") {

            $string.="\r\n21|" . $res['codigo_curso'] . '|' . $res['curso_teve_aluno_vinculado'] . '|' . $res['motivo_sem_aluno'] . '|' . $res['codigo_curso_representado'] . '|'
                    . $res['curso_financ_convenio'] . '|Nao||||||||Sim|' . $res['prazo_minimo_integralizacao'] . '|' . $res['vagas_novas_oferecidas'] . '|' . $res['vagas_remanecentes'] . '|' . $res['vagas_programas_especiais'] . '|'
                    . $res['inscritos_vagas_oferecidas'] . '|' . $res['inscritos_vagas_remanecentes'] . '|' . $res['inscritos_vagas_especiais'] . "|Nao||||||||Nao|||||||||||||||" . $res['curso_tem_acessibilidade'] . '|' . $res['recursosBraille'] . '|'
                    . $res['recursosAudio'] . '|' . $res['recursosInformatica'] . '|' . $res['recursosAmpliado'] . '|' . $res['recursosTatil'] . '|' . $res['recursosAcessibilidade'] . '|'
                    . $res['recursosLibras'] . '|' . $res['recursosInterprete'] . '|' . $res['recursosLibrasMaterial'] . '|' . $res['recursosLibrasCursos'] . '|' . $res['recursosImpresso'] . '|' . $res['recursosDigital'] . '|'
                    . $res['utiliza_laboratorios'] . '|' . $res['oferece_semepresenciais'] . '|' . $res['carga_horaria_semepresencial'] . ',' . $res['codigos_laboratorios'];
        } elseif ($res['turno_curso'] == "Noturno") {

            $string.="\r\n21|" . $res['codigo_curso'] . '|' . $res['curso_teve_aluno_vinculado'] . '|' . $res['motivo_sem_aluno'] . '|' . $res['codigo_curso_representado'] . '|'
                    . $res['curso_financ_convenio'] . '|Nao||||||||Nao||||||||Sim|' . $res['prazo_minimo_integralizacao'] . '|' . $res['vagas_novas_oferecidas'] . '|' . $res['vagas_remanecentes'] . '|' . $res['vagas_programas_especiais'] . '|'
                    . $res['inscritos_vagas_oferecidas'] . '|' . $res['inscritos_vagas_remanecentes'] . '|' . $res['inscritos_vagas_especiais'] . "|Nao|||||||||||||||" . $res['curso_tem_acessibilidade'] . '|' . $res['recursosBraille'] . '|'
                    . $res['recursosAudio'] . '|' . $res['recursosInformatica'] . '|' . $res['recursosAmpliado'] . '|' . $res['recursosTatil'] . '|' . $res['recursosAcessibilidade'] . '|'
                    . $res['recursosLibras'] . '|' . $res['recursosInterprete'] . '|' . $res['recursosLibrasMaterial'] . '|' . $res['recursosLibrasCursos'] . '|' . $res['recursosImpresso'] . '|' . $res['recursosDigital'] . '|'
                    . $res['utiliza_laboratorios'] . '|' . $res['oferece_semepresenciais'] . '|' . $res['carga_horaria_semepresencial'] . ',' . $res['codigos_laboratorios'];
        } elseif ($res['turno_curso'] == "Integral") {

            $string.="\r\n21|" . $res['codigo_curso'] . '|' . $res['curso_teve_aluno_vinculado'] . '|' . $res['motivo_sem_aluno'] . '|' . $res['codigo_curso_representado'] . '|'
                    . $res['curso_financ_convenio'] . "|Nao||||||||Nao||||||||Nao||||||||Sim|" . $res['prazo_minimo_integralizacao'] . '|' . $res['vagas_novas_oferecidas'] . '|' . $res['vagas_remanecentes'] . '|' . $res['vagas_programas_especiais'] . '|'
                    . $res['inscritos_vagas_oferecidas'] . '|' . $res['inscritos_vagas_remanecentes'] . '|' . $res['inscritos_vagas_especiais'] . "||||||||" . $res['curso_tem_acessibilidade'] . '|' . $res['recursosBraille'] . '|'
                    . $res['recursosAudio'] . '|' . $res['recursosInformatica'] . '|' . $res['recursosAmpliado'] . '|' . $res['recursosTatil'] . '|' . $res['recursosAcessibilidade'] . '|'
                    . $res['recursosLibras'] . '|' . $res['recursosInterprete'] . '|' . $res['recursosLibrasMaterial'] . '|' . $res['recursosLibrasCursos'] . '|' . $res['recursosImpresso'] . '|' . $res['recursosDigital'] . '|'
                    . $res['utiliza_laboratorios'] . '|' . $res['oferece_semepresenciais'] . '|' . $res['carga_horaria_semepresencial'] . ',' . $res['codigos_laboratorios'];
        }
    }

    $novaString = str_replace(",", "\r\n22|", $string);

    //$fp = fopen("cursos.txt", "a");
    //$escreve = fwrite($fp, $novaString);
    //fclose($fp);

    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H_i_s');

    $nomearquivo = "cursos".$date.".txt";

    $fp = fopen($nomearquivo, "a");
    $escreve = fwrite($fp, $novaString);
    fclose($fp);

    download($nomearquivo);

    header('location:menu_exportacao.php');
}
?>
