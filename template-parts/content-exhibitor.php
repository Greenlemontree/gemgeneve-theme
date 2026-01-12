<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gemgeneve
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="single-exhibitor-layout">

	<div class="single-exhibitor-layout-col">
		<div class="single-exhibitor-layout-col-media">
				<?php the_post_thumbnail('large'); ?>
		</div><!--  .single-exhibitor-layout-col-media-->
	</div><!-- .single-exhibitor-layout-col -->

	<div class="single-exhibitor-layout-col">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					gemgeneve_posted_on();
					gemgeneve_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php
			$country_value = get_field('country');
			if ( $country_value ) {
				echo '<p class="exhibitor-country">'.esc_html( $country_value).'</p>';
			}
		?>



		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gemgeneve' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			?>

			<div class="exhibitor-info-box">

				<?php
					$taxonomy_slug = 'exhibitors-category';

					$terms = get_the_terms( get_the_ID(), $taxonomy_slug );

					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						echo '<div class="taxonomy-list taxonomy-' . esc_attr( $taxonomy_slug ) . '">';
						echo '<strong>Categories:</strong> ';

						$term_links = array();

						foreach ( $terms as $term ) {
							$term_links[] = '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a>';
						}

						echo implode( ', ', $term_links );

						echo '</div>';
					}
					?>

				<!-- <h4>Informations</h4> -->
				<?php
						$contact_name_value = get_field('contact_name');
						if ( $contact_name_value ) {
							echo '<div class="exhibitor-info-line"><span class="exhibitor-info-line-legend">Contact:</span> ' . esc_html( $contact_name_value ) . '</div>';
						}

						$place_value = get_field('place');
						if ( $place_value ) {
							echo '<div class="exhibitor-info-line"><span class="exhibitor-info-line-legend">Place:</span> ' . esc_html( $place_value ) . '</div>';
						}

						$phone_value = get_field('phone');
						if ( $phone_value ) {
							echo '<div class="exhibitor-info-line"><span class="exhibitor-info-line-legend">Phone:</span> ' . esc_html( $phone_value ) . '</div>';
						}

						$email_value = get_field('email');
						if ( $email_value ) {
							echo '<div class="exhibitor-info-line"><span class="exhibitor-info-line-legend">Email:</span> ' . esc_html( $email_value ) . '</div>';
						}
						?>
			</div>	

			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gemgeneve' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->


	</div><!-- .single-exhibitor-layout-col -->

</div><!-- .single-exhibitor-layout  -->

	

	<footer class="entry-footer">
		<?php gemgeneve_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
