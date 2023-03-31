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
								<div class="block-reveal" style="--bc: #f4991f; --d: .5s"><?php the_title(); ?></div>
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
					</div>
				</div>
			</div>
		</section>

<?php	}
} ?>


<?php get_footer(); ?>