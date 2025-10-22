let cor = document.querySelector("#noticia");

const estilos = window.getComputedStyle(cor)
cor.style.backgroundColor = "blue"
console.log(cor.style.backgroundColor)
console.log(estilos.getPropertyValue('color'))
//botao executar
function button_executar(){
    document.getElementById('noticia')
    console.log(document)

    let e = document.getElementById('titulo')
    console.log(e.id)
    console.log(e.className)
    console.log(e.innerHTML)
    console.log(e.innerText)
    console.log(e.textContent)

    let d = documento.querySelector('#titulo')
    console.log(d)

    let a = documenta.querySelectorAll('p')

}

let el = null
/* Busca o primeiro Elemento do documento */
el = document.querySelector('*')

// busca todos os elementos do documento
el = document.querySelectorAll('*')

// Busca o primeiro paragrago de um documento

el = document.querySelector('p')

//busca todos os paragrafos de um documento
el = document.querySelectorAll('p')

