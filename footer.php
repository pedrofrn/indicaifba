<footer>
    <div class="footer">
        <div class="container">
            <dic class="footer1">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Informações do projeto')) : ?>
                    <h4>O Projeto</h4>
                    <p>O IndicaIFBA é resultado do Projeto Monitoramento, Avaliação e Produção de Indicadores Educacionais do IFBA, desenvolvido pela <span style="font-weight: 500;color:#aec5eb;">Coordenação de Avaliação e Sistematização das Informações</span> (CASI/PRODIN).</p>
                    <span class="emailSvg">
                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path>
                        </svg>
                        <span class="email"><a href="mailto:casi.rei@ifba.edu.br">casi.rei@ifba.edu.br</a></span>
                    </span><br /><br />
                    <span class="enderecoSvg">
                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"></path>
                        </svg>
                        <span class="endereco">Reitoria do IFBA: Avenida Araújo Pinho, nº 39, Canela, Salvador-BA. CEP: 40.110-150</span>
                    </span><br /><br />
                    <span class="telefoneSvg">
                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"></path>
                        </svg>
                        <span class="telefone">(71) 2102-0413 / 0416</span>
                    </span>


                <?php endif; ?>
            </dic>
            <dic class="footer2">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contato')) : ?>
                    <div class="contactForm">
                        <form>
                            <input type="text" placeholder="Digite seu nome" required />
                            <input type="email" placeholder="Seu endereço de e-mail" required />
                            <textarea rows="3" cols="30" required></textarea>
                            <button type="submit">Enviar mensagem</button>
                        </form>
                    </div>
                <?php endif; ?>
            </dic>
            <dic class="footer3">
                <div class="redesSociais">
                    <div><a href="https://www.facebook.com/InstitutoFederaldaBahia" title="Página do IFBA no Facebook" target="_blank"><img class="facebook" src="<?php bloginfo('template_url'); ?>/imagens/icone-facebook.svg" alt="Ícone Facebook" /></a></div>
                    <div><a href="https://www.instagram.com/ifbaoficial/" title="Perfil do IFBA no Instagram" target="_blank"><img class="instagram" src="<?php bloginfo('template_url'); ?>/imagens/icone-instagram.svg" alt="Ícone Instagram" /></a></div>
                    <div><a href="https://www.youtube.com/channel/UCyCPdBXqatYjrOhqY0k3sMQ" title="Canal do IFBA no YouTube" target="_blank"><img class="youtube" src="<?php bloginfo('template_url'); ?>/imagens/icone-youtube.svg" alt="Ícone YouTube" /></a></div>
                </div>
                <div class="marcas">
                    <div class="indicaFooter"></div>
                    <div class="ifbaFooter"></div>
                </div>
                <div class="copyright">
                    <span>Copyright © <span class="currYear"></span> - Instituto Federal de Educação, Ciência e Tecnologia da Bahia - IFBA. Todos os direitos reservados.</span>
                </div>
            </dic>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<script src="<?php bloginfo('template_url'); ?>/js/app.js"></script>
</body>

</html>