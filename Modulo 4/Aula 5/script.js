let botao = document.querySelector('button')

function evento(){
    document.querySelector("h1").textContent = "Novo Texto"
}

botao.addEventListener('click', function(){
    document.querySelector('h1').textContent = "Texto alterado"
    console.log("Texto foi alterado")
})

botao.addEventListener('click',  function(){
    console.log('Outro evento')
})
document.querySelector('button').addEventListener('click' , (e) => {
    console.log('clique')
    e.target.textContent = 'Alterado'
    document.querySelector("h1").textContent = "Texto Alterado"
})


let caixa = document.querySelector(".caixa")
let botao2 = document.querySelector("button")
function executar(event){
    caixa.classList.add('cor-fundo')
    console.log('clique')
    botao2.removeEventListener('click', executar)
}
botao2.addEventListener('click', executar)

//Eventos de clique herdados

let div1 = document.getElementById("div1")
let div2 = document.getElementById("div2")
let div3 = document.getElementById("div3")

div1.addEventListener('click', (event) => {
    console.log('Div1')
})
div2.addEventListener('click', (event) => {
    console.log('Div2')
})
div3.addEventListener('click', (event) => {
    console.log('Div3')
})

//Botão que adiciona o event.stopPropagation() que para eventos herdados

let elementos = document.getElementsByClassName("div1, div2, div3")

elementos.forEach(event => {
    event.addEventListener('click', (e) =>{
        e.stopPropagation()
        console.log(e.target.tagName)
    })
}); //forma Resumida

