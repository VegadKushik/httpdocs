<?php if ( count( $attributes['errors'] ) > 0 ) : ?>
	<?php foreach ( $attributes['errors'] as $error ) : ?>
        <p>
			<?php echo $error; ?>
        </p>
	<?php endforeach; ?>
<?php endif; ?>

<form id="lostpasswordform" action="<?php echo wp_lostpassword_url(); ?>" method="post">

    <h1>Forgot your password?</h1>

    <div class="form-group">
        <label class="col-sm-4 control-label" for="Email">Email</label>
        <div class="col-sm-8">
            <input class="form-control"
                   id="user_login" name="user_login" type="text" value="" required>
            <p class="help-block">Enter your email address to request a password reset.</p>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-3">
            <button id="submit-forgot-password" class="btn btn-primary">Reset Password</button>
        </div>
    </div>

</form>
