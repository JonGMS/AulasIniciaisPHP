<?php
function DarNotas($alunos)
{
    for ($id_aluno = 1; $id_aluno <= count($alunos); $id_aluno++) {
        for ($semestre = 1; $semestre <= 4; $semestre++) {
            $nota = random_int(4, 10);
            $alunos[$id_aluno]['notas'][$semestre] = $nota;
        }
    }
    return $alunos;
}
function Verificarstatus($alunos, $idAluno){
    $status = $alunos[$idAluno]['status'] == "APROVADO" ? true : false;
    return $status;
}

function FazerMedias($alunos) {
    for($aluno = 1; $aluno <= count($alunos); $aluno++)
    {
        $alunos[$aluno]['media'] =  ($alunos[$aluno]['notas'][1] + $alunos[$aluno]['notas'][2] + $alunos[$aluno]['notas'][3] + $alunos[$aluno]['notas'][4]) /4;
        $alunos = AplicarStatus($alunos, $aluno);
    }
    return $alunos;
    
}

function AplicarStatus($alunos, $idAluno){
    $alunos[$idAluno]['status'] = $alunos[$idAluno]['media'] >= 7 ? "APROVADO" : "REPROVADO";  
    return $alunos; 
}

function Boletim($alunos)
{
    for ($aluno = 1; $aluno < count($alunos); $aluno++) {
        if(Verificarstatus($alunos, $aluno)){
            echo "
            <tr><td>" . $alunos[$aluno]['nome'] . "</td><td>" . $alunos[$aluno]['notas'][1] . "</td><td>" . $alunos[$aluno]['notas'][2] . "</td><td>" . $alunos[$aluno]['notas'][3] . "</td><td>" . $alunos[$aluno]['notas'][4]."</td><td class='notaAprovada'>" . $alunos[$aluno]['media'] . "</td><td class='statusAprovado'>".$alunos[$aluno]['status']."</td><tr>";
        }
        else{
            echo "
            <tr><td>" . $alunos[$aluno]['nome'] . "</td><td>" . $alunos[$aluno]['notas'][1] . "</td><td>" . $alunos[$aluno]['notas'][2] . "</td><td>" . $alunos[$aluno]['notas'][3] . "</td><td>" . $alunos[$aluno]['notas'][4]."</td><td class='notaReprovada'>" . $alunos[$aluno]['media'] . "</td><td class='statusReprovado'>".$alunos[$aluno]['status']."</td></tr>";
        }
            
    }
}
