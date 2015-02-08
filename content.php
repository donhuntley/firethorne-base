<?php
/**
 * @package firethorne-base
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="index-box">
        <?php
            if (has_post_thumbnail()) {
            echo '<div class="small-index-thumbnail clear">';
            echo '<a href="' . get_permalink() . '" title="' . __('Click to read ', 'firethorne-base') . get_the_title() . '" rel="bookmark">';
            echo the_post_thumbnail('index-thumb');
            echo '</a>';
            echo '</div>';
            }
        ?>
	<header class="entry-header">
            
            <?php
            // Display a thumb tack in the top right hand corner if this post is sticky
                if (is_sticky()) {
                echo '<i class="fa fa-thumb-tack sticky-post"></i>';
                }
            ?>
            
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php firethorne_base_posted_on(); ?>
                        <?php 
                            if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { 
                                echo '<span class="comments-link">';
                                comments_popup_link( __( 'Leave a comment', 'firethorne-base' ), __( '1 Comment', 'firethorne-base' ), __( '% Comments', 'firethorne-base' ) );
                                echo '</span>';
                            }
                        ?>
                        <?php edit_post_link( __( ' | Edit', 'firethorne-base' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
             <?php the_excerpt(); ?>
	<footer class="entry-footer continue-reading">
            <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'firethorne-base') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
        </footer><!-- .entry-footer -->
		
	</footer><!-- .entry-footer -->
    </div><!-- .index-box -->
</article><!-- #post-## -->