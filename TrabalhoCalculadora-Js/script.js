document.getElementById( )

/*
1 - Pega os números do input
2- coloca os numéros e seus operadores (+, - , x , /)
3 - Faz o calculo 
*/ 

/* Calculo de varios números.*/
var algorismos = []
var ultimoNumero = 0
var numero = ObterNumero()
var operador = ObterOperador()
var resultado = EfetuarCalculo(operador)


function ObterNumero(){
    numero = document.getElementsByName("numeros");
    console.log(numero);
    return numero;
}

function ObterOperador(operador){
    return operador
}

function EfetuarCalculo(operador){
    if(operador == "+"){
        resultado = ultimoNumero + numero
        return resultado
    }
    else if(operador == "-"){
        resultado = ultimoNumero - numero
        return resultado;
    }
    else if (operador == "*"){
        resultado = ultimoNumero * numero
        return resultado;
    }
    else if (perador == "/") {
        resultado = ultimoNumero / numero
        return resultado
    }
}

function CalculoVariosNumeros (){

}