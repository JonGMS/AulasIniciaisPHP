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

//AnalizarErros();

$membro = new Membro($cpf, $password, $nome, $telefone, $endereco);

$membro->Cadastrar();




function ValidarInput($inputName, &$inputs)
{
    if (!isset($_POST[$inputName]) == false) {
        $inputs[$inputName]['erro'] = "Campo Obrigatório!";
        return null;
    }
    if ($inputName == 'text_cpf') {
        if ($_POST['text_cpf'] < 11) {
            $inputs[$inputName]['erro'] = "CPF Inválido";
        }
    }
    if ($inputName == 'text_telefone') {
        if ($_POST['text_telefone'] > 11 || $_POST['text_telefone'] < 8) {
            $inputs[$inputName]['erro'] = "Telefone Inválido";
        }
    }

    return $_POST[$inputName];
}
