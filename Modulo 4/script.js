
console.log("Hello World!! - Ficheiro Externo");
//Comentario
var nome= "João Gabriel"; // String
var idade = 21; // int
var administrador = true; //boolean

var cidade = "Lisboa";

var valor1 = 100, nome2= "Maria Eduarda", apelido= "Duda"

var descVar= ""
let desc = "let é somente acessivel dentro das suas '{}' onde ele foi declarado."

const desc1 = "const é constante e imutavel, quando declarado não pode ser alterado e também só sera acessivel dentro das suas '{}' onde foi declarado";

console.log(desc)
console.log(desc1)

// alert("Clique com o botão direito do mouse e selecione Inspecionar. Ao abrir, redirecione para a aba console, assim poderá ver o que está sendo feito em js.");

if(cidade == "Lisboa"){
    console.log('Ta dentro do if');
}
else{
    console.log('Como assim não é lisboa?')
}

let enviar_email = true
let frase = enviar_email ? "Enviar" : "Não Enviar"
console.log(frase)