<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package firethorne-base
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
                            <?php
                                if ( is_category() ) :
                                    printf( __( 'Posts in the ', 'firethorne-base' ) );
                                    echo '<em>';
                                    single_cat_title();
                                    echo '</em> ' . __('category', 'firethorne-base') . ':';

                                elseif ( is_tag() ) :
                                    printf( __( 'Posts with the ', 'firethorne-base' ) );
                                    echo '<em>';
                                    single_tag_title();
                                    echo '</em> ' . __('tag', 'firethorne-base') . ':';

                                elseif ( is_author() ) :
                                    printf( __( 'Author: %s', 'firethorne-base' ), '<span class="vcard">' . get_the_author() . '</span>' );

                                elseif ( is_day() ) :
                                    printf( __( 'Posts from %s', 'firethorne-base' ), '<span>' . get_the_date() . '</span>' );

                                elseif ( is_month() ) :
                                    printf( __( 'Posts from %s', 'firethorne-base' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'firethorne-base' ) ) . '</span>' );

                                elseif ( is_year() ) :
                                    printf( __( 'Posts from %s', 'firethorne-base' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'firethorne-base' ) ) . '</span>' );

                                elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                                    _e( 'Asides', 'firethorne-base' );

                                else :
                                    _e( 'Archives', 'firethorne-base' );

                                endif;
                            ?>
				<?php
					
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
