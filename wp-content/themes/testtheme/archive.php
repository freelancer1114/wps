<?php
/**
 * The template for displaying archive pages
 *
  * Template Name: архивная страница
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package testtheme
 */

get_header();
?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
<div class="row"> 
<div class="col-sm-12">
			<?php
			$args = array(
	'post_type' => 'articles',
	'articles_category' => 'sport'
);
query_posts($args);
			  
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div></div></div></div><!-- #primary -->

<?php

get_footer();
