<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-language" content="pt-br">
	<meta name="robots" content="index,follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="canonical" href="https://indicaifba.ifba.edu.br/index.php" />
	<meta name="description" content="IndicaIFBA - Gestão, monitoramento, avaliação e produção de dados indicadores do Instituto Federal de Educação, Ciência e Tecnologia da Bahia">
	<meta name="author" content="CASI/PRODIN" />
	<meta name="keywords" content="ifba, campi, campus, unidades, avanca ifba, desenvolvimento institucional, dados, sistec, pnp, indicadores, setec, mec, educacao">

	<meta property="og:title" content="IndicaIFBA" />
	<meta property="og:description" content="IndicaIFBA - Gestão, monitoramento, avaliação e produção de dados indicadores do Instituto Federal de Educação, Ciência e Tecnologia da Bahia" />
	<meta property="og:image" content="https://indicaifba.ifba.edu.br/wp-content/uploads/2023/03/imagem-og-indicaifba.png">
	<meta property="og:image:width" content="500">
	<meta property="og:image:height" content="500">
	<meta property="og:url" content="https://indicaifba.ifba.edu.br/">
	<meta property="og:type" content="website">
	<meta property="og:locale" content="pt_BR">
	<meta property="og:site_name" content="IndicaIFBA - Dados indicadores do Instituto Federal da Bahia">

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/imagens/icone-indicaifba.png">
	<link rel="preconnect" href="https://barra.brasil.gov.br">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" title="default" media="screen" />
	<title>
		<?php if(is_front_page() || is_home()){
			echo get_bloginfo('name');
		} else{
			echo the_title();
		}?>
	</title>
	<?php wp_head(); ?>
</head>

<body>
	<header>
		<div class="headerBox">
			<div class="container">
				<div class="marcas">
					<a href="<?php echo home_url(); ?>" title="Página inicial"><img src="<?php bloginfo('template_url'); ?>/imagens/marca-indicaifba-horizontal.svg" alt="Marca do IndicaIFBA" /></a>
					<a href="https://portal.ifba.edu.br" title="Portal do IFBA"><img src="<?php bloginfo('template_url'); ?>/imagens/marca-ifba-reduzida-horizontal.svg" alt="Marca do IFBA" /></a>
				</div>
				<div class="menuHeader">
					<?php wp_nav_menu(); ?>
				</div>
				<div class="pesquisar">
					<span class="lupa"></span>
					<?php get_search_form(); ?>
				</div>
				<div class="menuHamburguer">
					<div class="listMenu">
						<?php wp_nav_menu(); ?>
					</div>
					<label for="check">
						<input type="checkbox" id="check" />
						<span></span>
						<span></span>
						<span></span>
					</label>
				</div>
			</div>
		</div>
	</header>