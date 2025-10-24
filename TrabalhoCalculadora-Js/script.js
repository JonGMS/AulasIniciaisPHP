

/*
1 - Pega os números do input
2- coloca os numéros e seus operadores (+, - , x , /)
3 - Faz o calculo 
*/ 

/* Calculo de varios números.*/
var algorismos = []
var ultimoNumero = 0
var numero
var operador
var resultado //= EfetuarCalculo(operador)


function ObterNumero(){
    // numero = document.getElementsByName("numeros");
    // console.log(numero);
    // return numero;
}

function ObterOperador(operador){
    console.log("Operador escolhido: " + operador)
    return operador
}

function EfetuarCalculo(operador){
    if(operador == "+"){
        resultado = ultimoNumero + numero
        console.log(ultimo + " + " + numero + " = " + resultado )
        return resultado
    }
    else if(operador == "-"){
        resultado = ultimoNumero - numero
        console.log(ultimo + " - " + numero + " = " + resultado )
        return resultado;
    }
    else if (operador == "*"){
        resultado = ultimoNumero * numero
        console.log(ultimo + " x " + numero + " = " + resultado )
        return resultado;
    }
    else if (perador == "/") {
        resultado = ultimoNumero / numero
        console.log(ultimo + " ÷ " + numero + " = " + resultado )
        return resultado
    }
}

function CalculoVariosNumeros (){

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