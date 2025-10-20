let pessoa = {
    nome: "João",
    apelido: "Jon",
    idade: 21,
    genero: "masculino",

    apresentar_nome: function() {
        return this.nome + "  " + this.apelido
    },
    apresentar_idade: function() {
        return this.idade + " anos de idade"
    },
    hobbies:[
        'Programação',
        'Cinema',
        'Música'
    ]
}

console.log(pessoa.nome)
console.log(pessoa['genero'])
console.log(pessoa.apresentar_nome())
console.log(pessoa.apresentar_idade())
console.table(pessoa.hobbies)

pessoa.email = "joaoexemple@exemple.com"

let clone = Object.assign({}, pessoa)
clone.nome = "Joao clone"
console.table(pessoa)
console.table(clone)

let antagonista = {...clone}
clone.apelido = "Antagonista"
console.table(clone)