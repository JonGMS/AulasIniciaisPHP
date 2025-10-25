//Fazer o calculo com base no div - calculo
var algorismos = []


var operador
var resultado


function ObterNumero(operador) {

    try {
        var numero = document.getElementById("numeros");
        var calculo = document.getElementById("calculo")

        if (calculo.textContent != '' && numero.value == '') {
            calculo.textContent = calculo.textContent.replace(/[^0-9,]/g, '') + operador;
            throw new Error(mensagemErro = "Altera o operador para: " + operador);
        }
        else if(numero.value == ''){
            throw new Error( mensagemErro = "Nenhum número para alterar o Operador");
        }

        var numeroValue = parseFloat(numero.value)
        numeroCalculo = parseFloat(calculo.textContent)
        EfetuarCalculo(operador, numeroValue)
    }
    catch {
        console.log(mensagemErro)
    }
}


function EfetuarCalculo(operador, numeroUsuario) {
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
    }
    catch {
        console.log("Erro no EfetuarCalculo")
    }



    function CalculoPorOperador() {

        if (calculo.textContent.includes("+")) {
            return resultado = numeroUsuario + numeroCalculo
        }
        else if (calculo.textContent.includes("-")) {
            return resultado = numeroUsuario - numeroCalculo
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

function AlterarTexto(e) {
    const titulo = document.querySelector("header");
    if (titulo) {
        titulo.textContent = "New titulo";
        console.log(e.target)
    } else {
        console.warn("Elemento <h1> não encontrado.");
    }

}
function ApagarNumeros() {
    let numeros = document.getElementById('numeros')
    numeros.value = ''
}