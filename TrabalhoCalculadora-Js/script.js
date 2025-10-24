
var algorismos = []

var numero
var operador
var resultado
var calculo

function ObterNumero(operador) {

    try {
        numero = document.getElementById("numeros");
        var numeroValue = parseFloat(numero.value)

        console.log("Operador escolhido: " + operador)
        EfetuarCalculo( operador, numeroValue)
    }
    catch {
        console.log("Erro no ObeterNumero")
    }



}


function EfetuarCalculo(operador, numero) {
    console.log( operador, numero)
    try {
        if (operador == "+") {
            
            calculo = document.getElementById('calculo')
            nCalculo = parseFloat(calculo.textContent.replace('+')) 
            
            resultado = nCalculo + numero
            console.log(nCalculo + " + " + numero + " = " + resultado)

            calculo.value = resultado + operador
            
            //Apresentar na Tela
            calculo.textContent = resultado + operador
            ApagarNumeros()
        }
        else if (operador == "-") {
            calculo = document.getElementById('calculo')
            nCalculo = parseFloat(calculo.textContent.replace('-')) 
            
            resultado = nCalculo + numero
            console.log(nCalculo + " + " + numero + " = " + resultado)

            calculo.value = resultado + operador
            
            //Apresentar na Tela
            calculo.textContent = resultado + operador
            ApagarNumeros()
        }
        else if (operador == "*") {
            calculo = document.getElementById('calculo')
            nCalculo = parseFloat(calculo.textContent.replace('*')) 
            
            resultado = nCalculo + numero
            console.log(nCalculo + " x " + numero + " = " + resultado)

            calculo.value = resultado * operador
            
            calculo.textContent = resultado + operador
            ApagarNumeros()
        }
        else if (operador == "/") {
            calculo = document.getElementById('calculo')
            nCalculo = parseFloat(calculo.textContent.replace('/')) 
            
            resultado = nCalculo + numero
            console.log(nCalculo + " / " + numero + " = " + resultado)

            calculo.value = resultado / operador
            
            calculo.textContent = resultado + operador
            ApagarNumeros()

        }
    }
    catch {
        console.log("Erro no EfetuarCalculo")
    }


}

function CalculoVariosNumeros() {

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