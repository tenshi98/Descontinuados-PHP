<?php /*
 * Template Name: Three Columns, Sidebars on the Left
 *
 * @package Cryout Creations
 * @subpackage tempera
 * @since tempera 0.5
 */
get_header(); ?>

		<section id="container" class="three-columns-left">
	
			<div id="content" role="main">
				<?php cryout_before_content_hook(); ?>

				<?php get_template_part( 'content/content', 'page'); ?>
				
				<?php cryout_after_content_hook(); ?>
			</div><!-- #content -->
			<?php get_sidebar('left'); get_sidebar('right'); ?>
		</section><!-- #container -->


<?php get_footer(); ?>