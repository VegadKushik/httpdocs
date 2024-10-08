<div class="login-form-container">
	<?php if ($attributes['show_title']) : ?>
		<h2><?php esc_html_e('Sign In', 'personalize-login'); ?></h2>
	<?php endif; ?>

	<!-- Show errors if there are any -->
	<?php if (count($attributes['errors']) > 0) : ?>
		<?php foreach ($attributes['errors'] as $error) : ?>
			<p class="login-error">
				<?php echo $error; ?>
			</p>
		<?php endforeach; ?>
	<?php endif; ?>

	<!-- Show logged out message if user just logged out -->
	<?php if ($attributes['logged_out']) : ?>
		<p class="login-info">
			<?php esc_html_e('You have signed out. Would you like to sign in again?', 'personalize-login'); ?>
		</p>
	<?php endif; ?>

	<!-- Show change password -->
	<?php if ($attributes['password_updated']) : ?>
		<p class="login-info">
			<?php esc_html_e('Your password has been changed. You can sign in now.', 'personalize-login'); ?>
		</p>
	<?php endif; ?>

	<?php
	wp_login_form(
		array(
			'label_username' => esc_html('Email', 'personalize-login'),
			'label_log_in'   => esc_html('Sign In', 'personalize-login'),
			'redirect'       => $attributes['redirect'],
		)
	);
	?>

	<a class="forgot-password" href="<?php echo wp_lostpassword_url(); ?>">
		<?php esc_html_e('Forgot your password?', 'personalize-login'); ?>
	</a>
</div>

<!-- <div class="login-form-container">
    <form method="post" action="<?php // echo wp_login_url();
								?>">
        <p class="login-username">
            <label for="user_login"><?php // esc_html_e( 'Email', 'personalize-login' );
									?></label>
            <input type="text" name="log" id="user_login">
        </p>
        <p class="login-password">
            <label for="user_pass"><?php // esc_html_e( 'Password', 'personalize-login' );
									?></label>
            <input type="password" name="pwd" id="user_pass">
        </p>
        <p class="login-submit">
            <input type="submit" value="<?php // esc_html_e( 'Sign In', 'personalize-login' );
										?>">
        </p>
    </form>
</div> -->
