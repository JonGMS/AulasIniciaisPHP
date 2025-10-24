function Testar(selecao) {
    if (selecao == 1) {
        console.clear()
        let primeiro = document.querySelector('.variant')
        console.log(primeiro)
        console.log("Seleciona o primeiro elemento com a classe solicitada")
    }
    else if (selecao == 2) {
        console.clear()
        let primeiro = document.querySelector('#variant')
        console.log(primeiro)
        console.log("Seleciona o primeiro elemento com o ID solicitado")
    }
    else if (selecao == 3) {
        let primeiro = document.querySelector('div > span')
        console.log(primeiro)
        console.log("Seleciona o primeiro botão que é filho direto de uma div")
    }
    else if (selecao == 4) {
        console.clear()
        let todos = document.querySelectorAll('div')
        console.log(todos)
        console.log("Seleciona todos os elementos div da página")
    }
    else if (selecao == 5){
        console.clear()
        let primeiro = document.getElementById('variant')
        console.log(primeiro)
        console.log("Seleciona o elemento com o ID selecionado")
    }
    else if (selecao == 6){
        console.clear()
        let primeiro = document.getElementsByClassName('variant')
        console.log(primeiro)
        console.log("Seleciona todos os elementos com a classe selecionada")
    }
    else{
        console.clear()
        let primeiro = document.getElementsByTagName('div')
         console.log(primeiro)
         console.log("Seleciona todos os elementos selecionados")
    }
}

// let elemento = document.documentElement;
// console.log(elemento)
// elemento = document.head
// console.log(elemento)

// let pessoa = {
//     nome: "João",
//     apelido: "Jon",
//     idade: 21,
//     genero: "masculino",

//     apresentar_nome: function() {
//         return this.nome + "  " + this.apelido
//     },
//     apresentar_idade: function() {
//         return this.idade + " anos de idade"
//     },
//     hobbies:[
//         'Programação',
//         'Cinema',
//         'Música'
//     ]
// }

// console.log(pessoa.nome)
// console.log(pessoa['genero'])
// console.log(pessoa.apresentar_nome())
// console.log(pessoa.apresentar_idade())
// console.table(pessoa.hobbies)

// pessoa.email = "joaoexemple@exemple.com"

// let clone = Object.assign({}, pessoa)
// clone.nome = "Joao clone"
// console.table(pessoa)
// console.table(clone)

// let antagonista = {...clone}
// clone.apelido = "Antagonista"
// console.table(clone)
// document.querySelector('.classe')






let cor = document.getElementById('noticia');


const estilos = window.getComputedStyle(cor)
cor.style.backgroundColor = "blue"
console.log(cor.style.backgroundColor)
console.log(estilos.getPropertyValue('color'))
let el = null
/* Busca o primeiro Elemento do documento */
el = document.querySelector('*')

// busca todos os elementos do documento
el = document.querySelectorAll('*')

// Busca o primeiro paragrago de um documento

el = document.querySelector('p')

//busca todos os paragrafos de um documento
el = document.querySelectorAll('p')
//botao executar
function button_executar(){
    document.getElementById('noticia')
    console.log(document)

    let e = document.getElementById('titulo-noticia')
    console.log(e.id)
    console.log(e.className)
    console.log(e.innerHTML)
    console.log(e.innerText)
    console.log(e.textContent)

    let d = document.querySelector('#titulo')
    console.log(d)

    let a = document.querySelectorAll('p')

}
