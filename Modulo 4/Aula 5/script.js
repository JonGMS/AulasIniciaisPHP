let botao = document.querySelector('button')

function evento(){
    document.querySelector("h1").textContent = "Novo Texto"
}

botao.addEventListener('click', function(){
    document.querySelector('h1').textContent = "Texto alterado"
    console.log("Texto foi alterado")
})

botao.addEventListener('click', evento, function(){
    /*Você pode colocar um evento esclusivo*/
})

