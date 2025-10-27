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
    else if (selecao == 5) {
        console.clear()
        let primeiro = document.getElementById('variant')
        console.log(primeiro)
        console.log("Seleciona o elemento com o ID selecionado")
    }
    else if (selecao == 6) {
        console.clear()
        let primeiro = document.getElementsByClassName('variant')
        console.log(primeiro)
        console.log("Seleciona todos os elementos com a classe selecionada")
    }
    else {
        console.clear()
        let primeiro = document.getElementsByTagName('div')
        console.log(primeiro)
        console.log("Seleciona todos os elementos selecionados")
    }
}

function MudarCor() {
    let cor = document.getElementById('noticia');

    cor.style.backgroundColor = "blue";

    const estilos = window.getComputedStyle(cor);
    console.log(cor.style.backgroundColor); // "blue"
    console.log(estilos.getPropertyValue('background-color'));
}
function Testar2() {
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

    MudarCor()

}
function testarCriacao(){
    let novo_elemento = document.createElement('p')
    novo_elemento.innerText = 'Texto adicionado pelo JS DOM'

    let div = document.querySelector('#exemplo8')
    div.appendChild(novo_elemento)

    div.classList.add('atributoCriado')
    div.setAttribute('id', 'exemplo8')
}
/* Busca o primeiro Elemento do documento */
el = document.querySelector('*')

// busca todos os elementos do documento
el = document.querySelectorAll('*')

// Busca o primeiro paragrago de um documento

el = document.querySelector('p')

//busca todos os paragrafos de um documento
el = document.querySelectorAll('p')
//botao executar
function button_executar() {

}
