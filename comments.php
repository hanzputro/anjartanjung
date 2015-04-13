
<div class="form__comment__wrapper">
	<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>  	
		<?php die('You can not access this page directly!'); ?>  
	<?php endif; ?>

	<?php if(!empty($post->post_password)) : ?>
	  	<?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
			<p>This post is password protected. Enter the password to view comments.</p>
	  	<?php endif; ?>
	<?php endif; ?>
	
	<!-- form comments -->
	<?php if(comments_open()) : ?>
		<?php if(get_option('comment_registration') && !$user_ID) : ?>
			<p>
				You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.
			</p>

		<?php else : ?>
			<!-- comments loop -->
			<?php if($comments) : ?>
			  	<div class="comment__user__wrapper">
			    	<?php foreach($comments as $comment) : ?>
			  		<div class="comment__user__list" id="comment-<?php comment_ID(); ?>">  			
						<div class="comment__user__info">
							<p class="name__user"><?php comment_author_link(); ?></p>
							<p class="comment__date"><?php comment_date(); ?> at <?php comment_time(); ?></p>
						</div>
						<div class="comment__user__text"><?php comment_text(); ?></div>
						<div class="comment__approve">
							<?php if ($comment->comment_approved == '0') : ?>
								<p>awaiting approval</p>
							<?php endif; ?>
						</div>
			  		</div>
					<?php endforeach; ?>
				</div>

			<?php else : ?>
				<p>No comments yet</p><br>
			<?php endif; ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

				<?php if($user_ID) : ?>
					<div class="form__wrapper form__wrapper--comment">
						<p class="login__info__text" for="">
							Logged in as 
							<?php echo $user_identity; ?>. 
							<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a>
						</p>						
					</div>

				<?php else : ?>
					<div class="form__wrapper form__wrapper--comment">
						<input type="text" name="author" id="author" placeholder="Name" value="<?php echo $comment_author; ?>" />
						<input type="text" name="email" id="email" placeholder="Email" value="<?php echo $comment_author_email; ?>" />
					</div>					
				<?php endif; ?>

				<div class="form__wrapper form__wrapper--comment">
					<textarea name="comment" id="comment" placeholder="Comment..." rows="5"></textarea>					
				</div>
				<input class="send--button" name="submit" type="submit" id="submit" tabindex="5" value="Submit" />				
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				<div style="clear:both;"></div>
				<br>
				<?php do_action('comment_form', $post->ID); ?>

			</form>
		<?php endif; ?>


	<?php else : ?>
		<p>The comments are closed.</p>
	<?php endif; ?>
</div>
		