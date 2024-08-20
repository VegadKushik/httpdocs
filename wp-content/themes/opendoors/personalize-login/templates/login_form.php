<!-- Show errors if there are any -->
<?php if ( count( $attributes['errors'] ) > 0 ) : ?>
	<?php foreach ( $attributes['errors'] as $error ) : ?>
        <p class="login-error">
			<?php echo $error; ?>
        </p>
	<?php endforeach; ?>
<?php endif; ?>

<!-- Show logged out message if user just logged out -->
<?php if ( $attributes['logged_out'] ) : ?>
    <p class="login-info">
		<?php _e( 'You have signed out. Would you like to sign in again?', 'personalize-login' ); ?>
    </p>
<?php endif; ?>

<?php if ( $attributes['registered'] ) : ?>
    <p class="login-info">
		<?php
		printf(
			__( 'You have successfully registered to <strong>%s</strong>. We have emailed your password to the email address you entered.', 'personalize-login' ),
			get_bloginfo( 'name' )
		);
		?>
    </p>
<?php endif; ?>

<?php if ( $attributes['lost_password_sent'] ) : ?>
    <p class="login-info">
		<?php _e( 'Check your email for a link to reset your password.', 'personalize-login' ); ?>
    </p>
<?php endif; ?>

<?php if ( $attributes['password_updated'] ) : ?>
    <p class="login-info">
		<?php _e( 'Your password has been changed. You can sign in now.', 'personalize-login' ); ?>
    </p>
<?php endif; ?>

<form action="<?php echo wp_login_url(); ?>" class="od-narrow-form" method="post">
    <div class="form-horizontal newloginform">
        <h1>Sign in with your account</h1>

        <div class="form-group">
            <label class="control-label" for="Username">Username</label>
            <input class="form-control" required type="text" name="log" id="user_login">
        </div>

        <div class="form-group">
            <label class="control-label" for="Password">Password</label>
            <input class="form-control" required type="password" name="pwd" id="user_pass">
        </div>

        <div class="form-group">
            <div class="checkbox d-flex justify-content-between mt-4">

                <div class="loginlnk">
                    <a href="<?php the_permalink(1425); ?>"><small>Forgot Your Password?</small></a>
                </div>
            </div>
        </div>

        <input type="checkbox" name="remember" value="1" checked hidden>

        <div class="form-group">
            <button id="submit-signin-local" class="btn btn-primary">Sign in</button>

            <p>
                <small>Don't have an account? <a href="<?php the_permalink(1424); ?>">
                        Sign up</a>
                </small>
            </p>

        </div>
    </div>
</form>
