<?php 
//Template Name: Home
get_header(); ?>
<?php 
	$imagem_id = get_field('background_home');
	$background_large = wp_get_attachment_image_src( $imagem_id, 'large' );
	$background_medium = wp_get_attachment_image_src( $imagem_id, 'medium' );
?>
<style type="text/css">

.introducao {
	background: url('<?php echo $background_large[0] ?>') no-repeat center;
}
@media only screen and (max-width: 767px) {
.introducao {
	background: url('<?php echo $background_medium[0] ?>') no-repeat center;
}
}
</style>

	<section class="introducao">
			<div class="container">
				<h1><?php the_field('titulo_introducao'); ?></h1>
				<blockquote class="quote-externo">
					<p><?php the_field('quote_introducao'); ?></p>
					<cite><?php the_field('citacao_introducao'); ?></cite>
				</blockquote>
				<a href="/bicke/produtos/" class="btn">Orçamento</a>
			</div>
	</section>
		
	<section class="produtos container animar">
			<h2 class="subtitulo">Produtos</h2>
			<ul class="produtos_lista">
			<?php
	$args = array (
		'post_type' => 'produtos',
		'order' => 'ASC'
	);
	$the_query = new WP_Query ( $args );
?>

<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li class="grid-1-3">
					<a href="<?php the_permalink() ?>">
					<div class="produtos_icone">
						<img src="<?php the_field('icone_produto'); ?>" alt="Bikcraft Passeio">
					</div>
					<h3><?php the_title(); ?></h3>
					<p>Muito melhor do que passear pela orla a vidros fechados.</p>
					</a>
				</li>
				<?php endwhile; else: endif; ?>
			</ul>
			<div class="call">
				<p><?php the_field('chamada_produtos'); ?></p>
				<a href="bicke/produtos" class="btn btn-preto">Produtos</a>
			</div>

	</section>
		<!-- Fecha Produtos -->

	<section class="portfolio">
			<div class="container">
				<h2 class="subtitulo">Portfólio</h2>
				<?php include(TEMPLATEPATH . "/inc/cliente-portfolio.php" ) ?>
			</div>
	</section>
<?php include(TEMPLATEPATH . "/inc/qualidade.php" ) ?>

<?php get_footer(); ?>		