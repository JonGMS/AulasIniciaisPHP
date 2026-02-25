<?php

?>
<div class="cadastrar_livro">

    <form action="valida_livro.php" method="post" enctype="multipart/form-data">
        <h2>CADASTRAR</h2>
        <div class="campo_nome">
            <label for="text_nome">Nome  <?php echo Show_error('text_nome', $inputs) ?></label><br>
            <input type="text" class="input_text" name="text_nome" id="text_nome">
        </div>
        <div class="campo_autor">
            <label for="text_autor">Autor  <?php echo Show_error('text_autor', $inputs) ?></label><br>
            <input type="text" class="input_text" name="text_autor" id="text_autor">
        </div>
        <div class="campo_quantidade">
            <label for="text_quantidade">Quantidade  <?php echo Show_error('text_quantidade', $inputs) ?></label><br>
            <input type="number" class="input_text" name="text_quantidade" id="text_quantidade">
        </div>
        <div class="campo_genero">
            <label>Gêneros:  <?php echo Show_error('text_genero', $inputs) ?></label><br>
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
            <label for="text_colecao">Coleção  <?php echo Show_error('text_colecao', $inputs) ?></label><br>
            <input type="text" class="input_text" name="text_colecao" id="text_colecao">
        </div>

        <div class="campo_descricao">
            <label for="text_descricao">Descrição  <?php echo Show_error('text_descricao', $inputs) ?></label><br>
            <textarea style="resize: none;" class="text_descricao"
                name="text_descricao"
                id="text_descricao"
                placeholder="Digite a descrição do livro...">
</textarea>
        </div>

        <div class="campo_imagem">
            <label for="capa">Imagem</label><br>
            <input class="addImagem" type="file" name="capa" id="capa">
        </div>

        <input class="inputCadastrar" type="submit" value="CADASTRAR">

    </form>

</div>
<div class="listar_livro">

</div>