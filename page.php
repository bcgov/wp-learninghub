<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

?>
<div class="container">
<div class="row">
<div class="col-12">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1><?php the_title() ?></h1>
	<div class="entry-content">
		<?php the_content() ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
</div>
</div>
</div>
<?php 	
endwhile; // End of the loop.

get_footer();
