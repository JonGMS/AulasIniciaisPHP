
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

let valor = 1
switch (valor) {
    case 1:
        // 
        break
    case 2:
        //
        break
    default:
        //
        break
}
let nomes = []
nomes [0]= nome
nomes [1]= nome2

console.log(nomes , " NOMEs");

nomes [2] = "Manu";
nomes [3] = "Katia";
nomes [4] = "Carol";
nomes [5] = "Thais";

console.table(nomes);

nomes.push("Amabile"); //Adiciona na ultima posição

nomes.unshift("Jon d'Santa") //Adiciona na posicão 0 (primeira posição)

console.table(nomes);

let removido = nomes.pop()

console.log("Removeu o nome do final da lista: " , removido)

nomes.splice(3, 4, "Elian", "Ildo", "Elaine")

console.table(nomes)

nomes_extraidos = nomes.slice(3,5)
console.table(nomes_extraidos, "Nomes extraidos")

console.table(nomes);

let outros_nomes = ["Napoleão", "Gislaine"]
nomes = nomes.concat(outros_nomes)

console.table(nomes);

if (nomes.includes("Ildo")){
    console.log("include retornou True")
}
else{
    console.log("include retornou False")
}

console.log(nomes.indexOf("Ildo"))

let todos_nomes = nomes.join(" - ")
console.log(todos_nomes)

let em_ordem = nomes
em_ordem.sort()

console.log(em_ordem)

em_ordem.reverse()
console.log(em_ordem)

