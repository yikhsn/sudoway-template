<?php if ( post_password_required() ) {
	return;
} ?>
	<div id="comments" class="comments-area">
		<?php if ( have_comments() ) : ?>
			<h3 class="comments-title">
				<?php
				printf( _nx( 'One comment on “%2$s”', '%1$s comments on “%2$s”', get_comments_number(), 'comments title'),
					number_format_i18n( get_comments_number() ), get_the_title() );
				?>
			</h3>
			<ul class="comment-list">
				<?php 
				wp_list_comments( 'type=comment&callback=mytheme_comment');
				?>
			</ul>
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments">
				<?php _e( 'Comments are closed.' ); ?>
			</p>
		<?php endif; 
		
		$args = array(
    'fields' => apply_filters(
        'comment_form_default_fields', array(
						'author' =>
						'<div class="form-row">' .
						'<div class="col-sm-6 col-12">' .
						'<div class="form-group">' .
						'<p class="comment-form-author">' . 
						'<input class="form-control form-control-sm" id="author" placeholder="Nama :" name="author" type="text" value=""' .
                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
						'</p>' .
						'</div>' .
						'</div>',

						'email'  => 
						'<div class="col-sm-6 col-12">' .
						'<div class="form-group">' .						
						'<p class="comment-form-email">' .
						'<input class="form-control form-control-sm" id="email" placeholder="Email :" name="email" type="text" value=""' 
						. esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' />'  .
								'</p>' .
						'</div>' .
						'</div>' .
						'</div>'
        )
    ),
		'comment_field' =>

		'<div class="form-group">' .
		'<p class="comment-form-comment">' .
        '<textarea class="form-control form-control-sm" id="comment" name="comment" placeholder="Biarkan kami tau jika kamu punya komentar, pertanyaan dan saran!" cols="45" rows="8" aria-required="true"></textarea>' .
				'</p>',
				
    'comment_notes_after' => '',
		
		'title_reply' => '<div class="comment-form-title title-widget"> <h5>Tinggalkan Komentar</h5></div>',

		'class_submit'      => 'btn btn-sm btn-primary float-right',

		'id_submit'         => 'submit-button-form',
		
		'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Email kamu tidak akan dipublikasikan' ) . ( $req ? $required_text : '' ) .
		'</p>',
		
		'title_reply_before' => '<h5 id="reply-title" class="comment-reply-title">',

		'title_reply_after' => '</h5>' . '</div>',

		'label_submit'=>__('Kirim')
);
	?>
		<div class="comment-form-sudoway">
			<!-- <div class="container"> -->
			<?
			comment_form( $args ); 
			?>
			<!-- </div> -->
		</div>
	</div>