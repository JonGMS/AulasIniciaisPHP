<?php
class Fruta extends Alimento
{
    public $TemSemente; 
    
    public function ApresentarFruto()
    {
        return "O nome é: {$this->nome}, a cor é {$this->cor} e meu peso é {$this->peso}.";
    }

    function __destruct(){
        echo 'Destruido'; //Quando usar um unset no construtor, ira aparecer esse mensagem.
    }

}

$laranja = new Fruta($nome, $cor, $peso, $unidades, $matricula);

$laranja->nome = "Laranja";
$laranja->cor = "Alaranjado";
$laranja->peso = "1kg";


$banana = new Fruta($nome, $cor, $peso, $unidades, $matricula);

$banana->nome = "Banana";
$banana->cor = "Amarelho";
$banana->peso = "1gr";

echo $banana->ApresentarFruto();

class Alimento{

    public $nome;
    public $cor;
    public $peso;
    protected $unidades;
    private $matricula;

    function __construct($nome, $cor, $peso, $unidades, $matricula)
    {
        $this->nome = $nome;
        $this->cor = $cor;
        $this->peso = $peso;
        $this->unidades = $unidades;
        $this->matricula = $matricula;
    }

    public function comer(){
        echo "O alimento foi consumido.";
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

    function __destruct(){
        echo 'Destruido'; //Quando usar um unset no construtor, ira aparecer esse mensagem.
    }
}
}

