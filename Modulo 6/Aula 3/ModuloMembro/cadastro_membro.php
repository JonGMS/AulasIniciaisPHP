<?php
require_once '../includes/auth.php';
verificarLogin();

$inputs = [
    'text_cpf' => ['value' => [''], 'erro' => ['']],
    'text_nome' => ['value' => [''], 'erro' => ['']],
    'text_password' => ['value' => [''], 'erro' => ['']],
    'text_telefone' => ['value' => [''], 'erro' => ['']],
    'text_endereco' => ['value' => [''], 'erro' => ['']]
];

$cpf = ValidarInput('text_cpf', $inputs);

$nome = ValidarInput('text_nome', $inputs);

$password = ValidarInput('text_password', $inputs);

$telefone = ValidarInput('text_telefone', $inputs);

$endereco = ValidarInput('text_endereco', $inputs);

if (AnalizarErros($inputs)) {
    $membro = new Membro($cpf, $password, $nome, $telefone, $endereco);
    $membro->Cadastrar();
    header('Location: membro.php');
}
else{
    header('Location: membro.php');
    exit();
}

function AnalizarErros(&$inputs)
{
    if (
        !empty($inputs['text_cpf']['erro']) ||
        !empty($inputs['text_nome']['erro']) ||
        !empty($inputs['text_password']['erro']) ||
        !empty($inputs['text_telefone']['erro']) ||
        !empty($inputs['text_endereco']['erro'])
    ) {
        $_SESSION['inputs'] = $inputs;
        return false;
    }
    return true;
}

function ValidarInput($inputName, &$inputs){
    if (!isset($_POST[$inputName]) == false) {
        $inputs[$inputName]['erro'] = "Campo Obrigatório!";
        return null;
    }
    if ($inputName == 'text_cpf') {
        if ($_POST['text_cpf'] < 11) {
            $inputs[$inputName]['erro'] = "CPF Inválido";
        }
        CompararCPF($inputs);
    }
    if ($inputName == 'text_telefone') {
        if ($_POST['text_telefone'] > 11 || $_POST['text_telefone'] < 8) {
            $inputs[$inputName]['erro'] = "Telefone Inválido";
        }
    }

    return $_POST[$inputName];
}

function CompararCPF(&$inputs){
    if (file_exists("../Aula 3/ModuloDados/membros.csv")) {
        $file = fopen("../Aula 3/ModuloDados/membros.csv", "r");
        while (($linha = fgetcsv($file)) !== false) {
            if ($linha[0] == $_POST['text_cpf']) {
                if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                    header('Location: cadastro.php');
                    return;
                }
                $inputs['text_cpf']['erro'] = 'CPF já cadastrado';
            }
        }
        fclose($file);
    }
}
