<?php
/**
 * @package firethorne-base
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="index-box">
       
	<header class="entry-header">
            
            <?php
            // Display a thumb tack in the top right hand corner if this post is sticky
                if (is_sticky()) {
                echo '<i class="fa fa-thumb-tack sticky-post"></i>';
                }
            ?>
           

	</header><!-- .entry-header -->

	<div class="entry-content">
             <?php the_content(); ?>
	<footer class="entry-footer continue-reading">
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
            
        </footer><!-- .entry-footer -->
		
    </div><!-- .index-box -->
</article><!-- #post-## -->

