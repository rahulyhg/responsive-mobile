<?php
/**
 * Sitemap Template
 *
 *
 * @package      ${PACKAGE}
 * @license      license.txt
 * @copyright    ${YEAR} ${COMPANY}
 * @since        ${VERSION}
 *
 * Please do not edit this file. This file is part of the ${PACKAGE} Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
responsive_entry_before(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php responsive_entry_top(); ?>

		<div class="post-entry">
			<div class="widget-area sitemap-sidebar">

				<div class="sitemap-widget widget_categories">
					<div class="widget-title"><h3><?php _e( 'Categories', 'responsive' ); ?></h3></div>
					<ul><?php wp_list_categories( 'sort_column=name&optioncount=1&hierarchical=0&title_li=' ); ?></ul>
				</div><!-- .sitemap-widget -->

				<div class="sitemap-widget widget_recent_entries">
					<div class="widget-title"><h3><?php _e( 'Latest Posts', 'responsive' ); ?></h3></div>
					<ul><?php $archive_query = new WP_Query( 'posts_per_page=-1' );
						while( $archive_query->have_posts() ) : $archive_query->the_post(); ?>
							<li>
								<a href="<?php the_permalink() ?>" rel="bookmark"
								   title="<?php printf( __( 'Permanent Link to %s', 'responsive' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
							</li>
						<?php endwhile; ?>
					</ul>
				</div><!-- .sitemap-widget -->

				<div class="sitemap-widget widget_pages">
					<div class="widget-title"><h3><?php _e( 'Pages', 'responsive' ); ?></h3></div>
					<ul><?php wp_list_pages( "title_li=" ); ?></ul>
				</div><!-- .sitemap-widget -->

			</div><!-- end of .sitemap-widgets -->
			<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
		</div><!-- .post-entry -->

		<?php edit_post_link( __( 'Edit', 'responsive' ), '<div class="post-edit">', '</div>' ); ?>
		</div><!-- #post-<?php the_ID(); ?> -->

		<?php get_template_part( 'template-parts/post-data' ); ?>

		<?php responsive_entry_bottom(); ?>
	</article><!-- #post-## -->
<?php responsive_entry_after(); ?>