//Fazer o calculo com base no div - calculo
var algorismos = []
var armazenarHistorico = ''
var operador
var resultado


function ObterNumero(operador) {

    try {
        var numero = document.getElementById("numeros");
        var calculo = document.getElementById("calculo")
        ReiniciarCalculo(operador, calculo, numero);

        if (calculo.textContent != '' && numero.value == '') {
            calculo.textContent = calculo.textContent.replace(/[^0-9,]/g, '') + operador;
            throw new Error(mensagemErro = "Altera o operador para: " + operador);
        }
        else if (numero.value == '') {
            throw new Error(mensagemErro = "Nenhum número para alterar o Operador");
        }

        var numeroValue = parseFloat(numero.value)
        numeroCalculo = parseFloat(calculo.textContent)
        EfetuarCalculo(operador, numeroValue, numero)
    }
    catch {
        console.log(mensagemErro)
    }
}

function ReiniciarCalculo(operador, calculo, numero) {
    botaoResultado = document.getElementById('resultado');
    if (botaoResultado.textContent == 'A/C' && operador == '=') {
        botaoResultado.textContent = '=';
        calculo.textContent = '';
        numero.value = '';
        // 
    }
}

function EfetuarCalculo(operador, numeroUsuario, numero) {
    try {
        if (operador == "+") {

            resultado = CalculoPorOperador()

            calculo.textContent = resultado + operador

            ApagarNumeros()
        }
        else if (operador == "-") {
            resultado = CalculoPorOperador()

            calculo.textContent = resultado + operador

            ApagarNumeros()
        }
        else if (operador == "*") {
            resultado = CalculoPorOperador()

            calculo.textContent = resultado + operador

            ApagarNumeros()
        }
        else if (operador == "/") {

            resultado = CalculoPorOperador()

            calculo.textContent = resultado + operador

            ApagarNumeros()
        }
        else if (operador == "=") {
            resultado = CalculoPorOperador()

            console.log(resultado)

            numero.value = resultado

            calculo.textContent = "Resultado"

            botaoResultado = document.getElementById('resultado')

            botaoResultado.textContent = 'A/C'

            //Bloquear Teclado
            //Adicionar todo o calculo no histórico
        }
        DivisaoZero();
    }
    catch {
        console.log('Erro em Efetuar Calculo')
    }

    function DivisaoZero() {
        if (resultado == "Infinity") {
            calculo.textContent = "Não é possível dividir por zero";
            //Bloquear Cliques em botões
            // Atualizar Botão de =
        }
    }

    function CalculoPorOperador() {

        if (calculo.textContent.includes("+")) {
            //    armazenarHistorico = armazenarHistorico + numero.value + operador
            return resultado = numeroUsuario + numeroCalculo
        }
        else if (calculo.textContent.includes("-")) {
            return resultado = numeroCalculo - numeroUsuario
        }
        else if (calculo.textContent.includes("*")) {
            return resultado = numeroUsuario * numeroCalculo
        }
        else if (calculo.textContent.includes("/")) {
            return resultado = numeroCalculo / numeroUsuario
        }
        else {
            console.log("Primeiro Calculo - Nenhuma formula aplicada.")
            return numeroUsuario
        }

    }
}

function EventoTeclado(digito) {
    let numeros = document.getElementById('numeros')
    numeros.value = numeros.value + digito
}
function ApagarNumeros() {
    let numeros = document.getElementById('numeros')
    numeros.value = ''
}

function AlterarTexto(e) {
    const titulo = document.querySelector("header");
    if (titulo) {
        titulo.textContent = "New titulo";
        console.log(e.target)
    } else {
        console.warn("Elemento <h1> não encontrado.");
    }
}
