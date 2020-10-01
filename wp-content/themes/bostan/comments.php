	<div class="new_section row-fluid content_boxes">
		<div class="single_comments span12">
        <h3 class="page-header"><?php _e('Комментарии','asalah'); ?></h3>
            <div class="single_comments_box row-fluid">
			<?php if ( post_password_required() ) : ?>
                <p class="nopassword"><?php _e( 'Эта новость защищена паролем. Введите пароль для просмотра комментариев.', 'asalah' ); ?></p>
    </div>
    </div>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'asalah' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'asalah' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'asalah' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ul class="media-list comments_list span12">
			<?php
				wp_list_comments( array( 'callback' => 'asalah_comment' ) );
			?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'asalah' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'asalah' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'asalah' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'asalah' ); ?></p>
	<?php endif; ?>
	<?php if (comments_open( )) { ?>
    <div class="comment_form_wrapper">
    <div class="comment_form span12">
		<?php

		$args = array(
		    'id_form' => 'commentform',
		    'id_submit' => 'submit',
		    'title_reply' => '',
		    'title_reply_to' => '',
		    'cancel_reply_link' => __('Отменить ответ', 'asalah'),
		    'label_submit' => __('Отправить комментарий', 'asalah'),
		    'comment_field' => '<div class="comment_textarea_wrapper"><textarea id="comment" name="comment" aria-required="true" class="span12" rows="3"></textarea></div>',
		    'must_log_in' => ' ',
		    'logged_in_as' => '<h4>'.__('', 'asalah').'</h4><h3 id="reply-title" class="comment-reply-title">Оставить комментарий:</h3>',
		    'comment_notes_before' => '<h4>'.__('', 'asalah').'</h4><h3 id="reply-title" class="comment-reply-title">Оставить комментарий:</h3><p class="comment-notes">' . __( 'Ваш email адрес не будет опубликован.', 'asalah' ) . '</p>',
		    'comment_notes_after' => '',
		    'fields' => apply_filters('comment_form_default_fields', array(
		        'author' => '<div><input id="author" name="author" class="span6" type="text" placeholder="'.__('Имя', 'asalah').'"></div>',
		        'email' => '<div class="col-md-4"><input id="email" name="email" class="form-control col-md-12" type="text" placeholder="'.__('Email', 'asalah').'"></div>',
		        'email' => '<div><input id="email" name="email" class="span6" type="text" placeholder="'.__('Email', 'asalah').'"></div>'
		        )
		    )
		);

		comment_form($args);
		?>

    </div>
    </div>
		<?php } ?>
</div>
</div>
</div><!-- #comments -->
