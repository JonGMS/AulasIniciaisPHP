alerta1 = "Functions são faceis de criar"
alerta2= "E de entender "

escrever_alerta_log(alerta1)
escrever_alerta_log(alerta2)

function escrever_alerta_log(mensagem){
    console.log(mensagem)
}

// Calculadora - 1.0
var calculos = []
algarismo = 100
algarismo1 = 199
console.log("Resultado: " + Somar(algarismo1, algarismo))

function Somar(numero1, numero2){
    resultado = numero1 + numero2 //calculo
    resultadoString = resultado.toString();
    numero1 = numero1.toString();
    numero2 = numero2.toString();
    
    calculo_historico = numero1 + " + " + numero2 + " = " + resultadoString; //Texto
    calculos[0] = calculo_historico;
    return resultado;
}