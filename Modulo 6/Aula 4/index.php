<?php
class Fruto
{
    public $nome;
    public $cor;
    public $peso;
    protected $unidades;
    private $matricula;



    public function ApresentarFruto()
    {
        return "O nome é: {$this->nome}, a cor é {$this->cor} e meu peso é {$this->peso}.";
    }

    function AdicionarMatricula($m)
{
    $matriculas = [
        '121',
        '123'
    ];
    if(in_array($m, $matriculas)){
        return;
    }
    $this->matricula = $m;
}
}

$laranja = new Fruto();

$laranja->nome = "Laranja";
$laranja->cor = "Alaranjado";
$laranja->peso = "1kg";


$banana = new Fruto();

$banana->nome = "Banana";
$banana->cor = "Amarelho";
$banana->peso = "1gr";

echo $banana->ApresentarFruto();


