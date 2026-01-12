<?php
/**
 * The template for displaying taxonomy exhibitors-category
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gemgeneve
 */

get_header();
?>
<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		
		
		<div class="archive-grid-exhibitors">
		<?php
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$term = get_queried_object();
		
		$args = array(
			'post_type'      => get_post_type(),
			'posts_per_page' => -1,
			'paged'          => $paged,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'tax_query'      => array(
				array(
					'taxonomy' => 'exhibitors-category',
					'field'    => 'slug',
					'terms'    => $term->slug,
				),
			),
		);

		
		$custom_query = new WP_Query( $args );
		
		if ( $custom_query->have_posts() ) :
		
			$current_letter = '';
		
			while ( $custom_query->have_posts() ) :
				$custom_query->the_post();
		
				$first_letter = strtoupper( mb_substr( get_the_title(), 0, 1 ) );
		
				if ( $first_letter !== $current_letter ) {
					if ( $current_letter !== '' ) {
						echo '</div><!-- .alphabetical-group -->';
					}
					echo '<div class="alphabetical-group">';
					echo '<div class="alphabetical-group-letter">' . esc_html( $first_letter ) . '</div>';
					$current_letter = $first_letter;
				}
		
				get_template_part( 'template-parts/content-archive-exhibitor', get_post_type() );
		
			endwhile;
		
			if ( $current_letter !== '' ) {
				echo '</div><!-- .alphabetical-group -->';
			}
		
			// the_posts_navigation();
		
			wp_reset_postdata();
		
		else :
		
			get_template_part( 'template-parts/content', 'none' );
		
		endif;
?>		

		</div><!-- .archive-grid -->


		<?php


	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
