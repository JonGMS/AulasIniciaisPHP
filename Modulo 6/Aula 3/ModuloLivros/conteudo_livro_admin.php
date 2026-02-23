<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/livro_admin.css">
    <title>Document</title>
</head>

<body>


    <div class="cadastrar_livro">

        <form action="" method="post">
            <h2>CADASTRAR</h2>
            <div class="campo_nome">
                <label for="text_nome">Nome</label><br>
                <input type="text" class="input_text" name="text_nome" id="text_nome">
            </div>
            <div class="campo_autor">
                <label for="text_autor">Autor</label><br>
                <input type="text" class="input_text" name="text_autor" id="text_autor">
            </div>
            <div class="campo_quantidade">
                <label for="text_quantidade">Quantidade</label><br>
                <input type="number" class="input_text" name="text_quantidade" id="text_quantidade">
            </div>
            <div class="campo_genero">
                <label>Gêneros:</label><br>
                <div class="checkbox-group">

                    <label><input type="checkbox" class="check" name="generos[]" value="Fantasia"> Fantasia</label>
                    <label><input type="checkbox" class="check" name="generos[]" value="FiccaoCientifica"> Ficção Científica</label>
                    <label><input type="checkbox" class="check" name="generos[]" value="Romance"> Romance</label>
                    <label><input type="checkbox" class="check" name="generos[]" value="Misterio"> Mistério</label>
                    <label><input type="checkbox" class="check" name="generos[]" value="Suspense"> Suspense</label>

                    <label><input type="checkbox" class="check" name="generos[]" value="Terror"> Terror</label>
                    <label><input type="checkbox" class="check" name="generos[]" value="Drama"> Drama</label>
                    <label><input type="checkbox" class="check" name="generos[]" value="Distopia"> Biografia</label>
                    <label><input type="checkbox" class="check" name="generos[]" value="Distopia"> AutoAjuda</label>
                    <label><input type="checkbox" class="check" name="generos[]" value="Distopia"> Educação</label>



                </div>
            </div>
            <div class="campo_colecao">
                <label for="text_colecao">Coleção</label><br>
                <input type="text" class="input_text" name="text_colecao" id="text_colecao">
            </div>

            <div class="campo_descricao">
                <label for="text_descricao">Descrição</label><br>
                <textarea style="resize: none;" class="text_descricao"
                    name="text_descricao"
                    id="text_descricao"
                    placeholder="Digite a descrição do livro...">
</textarea>
            </div>

            <div class="campo_imagem">
                <label for="capa">Imagem</label><br>
                <input type="file" name="capa" id="capa">
            </div>

        </form>

    </div>
    <div class="listar_livro">

    </div>

</body>

</html>