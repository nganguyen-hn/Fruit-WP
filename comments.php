<?php

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : /*comment list*/ ?>
		<h6 class="comments-title">
			<?php echo sprintf( _nx( 'Comment ( 1 )', '%s Comments ', get_comments_number(), 'comment count' ), get_comments_number() ); //phpcs:ignore ?>
		</h6>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :/*comment navigation*/ ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation' ); ?></h2>
				<div class="cmt-previous"><?php previous_comments_link( esc_html__( 'Older Comments' ) ); ?></div>
				<div class="cmt-next"><?php next_comments_link( esc_html__( 'Newer Comments ' ) ); ?></div>
			</nav>
		<?php endif; ?>
		<div class="comment-list">
			<?php
				wp_list_comments(
					array(
						'avatar_size' => '50',
						'callback'    => 'fruit_comment_list',
					)
				);
			?>
		</div>
	<?php endif; ?>
	<?php if ( ! comments_open() ) : /*comment disable*/ ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.' ); ?></p>
		<?php
		/*comment form*/
		else :
			$commenter = wp_get_current_commenter();
			$fields = array(
				'author' => '<input id="author" type="text" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . esc_attr__( 'Your Name' ) . '" required>',
				'email'  => '<input id="email" type="email" name="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_attr__( 'Your Email' ) . '" required>',
				
			);
			$args = array(
				'title_reply_before' => '<h6 id="reply-title" class="comment-reply-title">',
				'title_reply'        => esc_html__( 'Leave a comment' ),
				'title_reply_after'  => '</h6>',
				'fields'             => apply_filters( 'comment_form_default_fields', $fields ),
				'comment_field'      => '<textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Your Comment' ) . '" required></textarea>',
				'label_submit'       => esc_html__( 'Submit' ),
			);
			comment_form( $args );
			/*remove novalidate on form */
			wp_add_inline_script(
				'jost-custom',
				"document.addEventListener( 'DOMContentLoaded', function(){
					var cmtForm = document.getElementById( 'commentform' );
					if( ! cmtForm ) return;
					cmtForm.removeAttribute( 'novalidate' );
				} );",
				'after'
			);
		endif;
		?>
</div>