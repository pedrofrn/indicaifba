<?php get_header(); ?>

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
                        <div class="block-reveal" style="--bc: #f4991f; --d: .5s">Resultado da pesquisa</div>
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
                <?php if (have_posts()) : ?>
                    <div id="confiraPesquisa">
                        Confira o que foi encontrado sobre &#8216;&#8216;<span style="color:#369837;font-weight:bold;"><?php the_search_query(); ?></span>&#8216;&#8217;:
                    </div>
                    <?php while (have_posts()) {
                        the_post(); ?>
                        <div class="resultadoPesquisa">
                            <a href="<?php the_permalink() ?>" rel="bookmark">
                                <div class="containerResultado">
                                    <div class="dataResultado">
                                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"></path>
                                        </svg>
                                        <?php the_time('j \d\e F \d\e Y') ?>
                                    </div>
                                    <div class="tituloResultado">
                                        <?php the_title(); ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php else : ?>
                    <div class="item entry">
                        <div class="tituloNoticiaDestaque">Nada encontrado!</div>
                        <p>Nenhuma ocorr&ecirc;ncia foi encontrada com o termo &#8216;<?php the_search_query(); ?>&#8217;.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>