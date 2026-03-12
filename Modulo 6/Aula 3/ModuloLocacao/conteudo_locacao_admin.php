<?php require_once 'classe_locacao.php'; ?>
<form class="formulario" action="validar_locacao.php" method="post">
    <div class="locacao">
        <h1>FINALIZAÇÃO</h1>

        <div class="cadastrar_locacao">
            <?php if (!isset($_SESSION['id_livro_locacao'])) {
                echo 'Nenhum livro adicionado - Vamos mudar isso?';
            }
            if (isset($_SESSION['id_livro_locacao'])): ?>
                <div class="painel_overflow">
                    <div class="lista_locacao">

                        

                        <?php Locacao::ListarAdicoes();
                        ?>
                    </div>
                </div>

            <?php endif; ?>

            <div class="finalizar">
                <div class="button_finalizar">
                    <input type="submit" value="FINALIZAR LOCAÇÃO">
                </div>

                <div class="texto_paragrafo">VOCÊ TEM 7 DIAS PARA REALIZAR A RELOCAÇÃO
                </div>
                <div class="texto_paragrafo">A data prevista para devolução é 09/03.
                </div>
                <div class="texto_paragrafo">Caso não efetue a devolução no prazo, será cobrada uma multa de R$0,50 por dia de atraso.
                </div>

            </div>

        </div>
    </div>
</form>