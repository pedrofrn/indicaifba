<!--?php /* Template name: Documentos */ ?-->
<?php get_header(); ?>

<?php
if (have_posts()) {

    while (have_posts()) {
        the_post(); ?>

        <section>
            <div id="bgUppingSquares">
                <div>
                    <div class="area">
                        <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <div class="sloganAnimation titulo">
                            <h1 class="block-effect" style="--td: 1.2s">
                                <div class="block-reveal" style="--bc: #f4991f; --d: .5s">Documentos</div>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="conteudoPagina">
                <div class="container">
                    <div class="conteudo">
                        <?php the_content(); ?>
                        <div class="docsContainer">
                            <div id="documentos">
                                <div class="docsHeader">
                                    <div class="titulo">
                                        LISTA DE DOCUMENTOS
                                    </div>
                                    <div class="docPesquisar">
                                        <form action="#" method="get" onsubmit="return false;">
                                            <input placeholder="Digite aqui sua procura..." type="text" size="30" name="q" id="q" value="" onkeyup="docSearch();" />
                                        </form>
                                    </div>
                                </div>
                                <div class="docType">
                                    <div class="titulo">
                                        Título do arquivo
                                    </div>
                                    <div class="data headdata">
                                        Data de publicação
                                    </div>
                                </div>
                                <div class="containerDocSingle">
                                    <?php
                                    wp_reset_query();
                                    wp_reset_postdata();
                                    $args = array(
                                        'post_type' => 'attachment',
                                        'numberposts' => -1,
                                        'post_status' => null,
                                        'post_parent' => null,
                                        'post_mime_type' => 'application/pdf, application/vnd.oasis.opendocument.text, application/vnd.oasis.opendocument.spreadsheet, application/x-vnd.oasis.opendocument.spreadsheet, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/rar, application/zip'
                                    );
                                    $my_posts = get_posts($args);
                                    if ($my_posts) {
                                        foreach ($my_posts as $post) {
                                            setup_postdata($post); ?>

                                            <div class="docSingle">
                                                <div class="titulo">
                                                    <span class="sufixodoc"></span>
                                                    <a id="linkDoc" class="linkDoc" target="_blank" href="<?php echo wp_get_attachment_url(); ?>">
                                                        <?php echo substr(get_the_title(), 0, 120); ?>
                                                    </a>
                                                </div>
                                                <div class="data">
                                                    <a target="_blank" href="<?php echo wp_get_attachment_url(); ?>">
                                                        <?php the_time('d/m/Y \à\s H\hi'); ?>
                                                    </a>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    } ?>
                                </div>
                                <div style="display:none;" id="noresults">
                                    <div class="titulo">
                                        Nenhum arquivo com o termo "<strong><span id="qt"></span></strong>".
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

<?php    }
} ?>


<?php get_footer(); ?>