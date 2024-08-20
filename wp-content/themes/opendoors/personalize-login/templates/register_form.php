<?php if ( count( $attributes['errors'] ) > 0 ) : ?>
	<?php foreach ( $attributes['errors'] as $error ) : ?>
        <p>
			<?php echo $error; ?>
        </p>
	<?php endforeach; ?>
<?php endif; ?>

<form action="<?php echo wp_registration_url(); ?>" class="od-narrow-form" method="post">
    <div class="form-horizontal form-container">
        <fieldset>
            <div class="row">
                <div class="w-75 p-3">
                    <h1>Register for a new account</h1>
                    <p>By filling out the information below, your details will automatically be included into the
                        relevant forms, such as ordering a resource or making a donation. Your details are safe, secure
                        and we will never pass on your details or call you to ask for money.</p>
                    <p>*denotes mandatory</p>
                </div>
            </div>

            <div class="form-group">
                <label class="required" for="firstname">First Name *</label>
                <input autocomplete="off" class="form-control form-control-lg" id="firstname" name="firstname" type="text"
                       value="" required>
            </div>

            <div class="form-group">
                <label class="required" for="lastname">Last Name</label>
                <input autocomplete="off" class="form-control form-control-lg" id="lastname" name="lastname" type="text"
                       value="">
            </div>

            <div class="form-group">
                <label class="required" for="Email">Email *</label>
                <input autocomplete="off" class="form-control form-control-lg" id="email" name="email" type="text"
                       value="" required>
            </div>

            <div class="form-group">
                <label class="required" for="username">Username *</label>
                <input autocomplete="off" class="form-control form-control-lg" id="username" name="username" type="text"
                       value="" required>
            </div>

            <div class="form-group">
                <label class="required" for="Password">Password</label>
                <input autocomplete="off" class="form-control form-control-lg" id="password" name="password"
                       type="password" required>
            </div>

			<?php if ( $attributes['recaptcha_site_key'] ) : ?>
                <div class="recaptcha-container">
                    <div class="g-recaptcha" data-sitekey="<?php echo $attributes['recaptcha_site_key']; ?>"></div>
                </div>
			<?php endif; ?>

            <div class="form-group">
                <button id="submit-signup-local" class="btn btn-primary register-button mt-4">Register</button>
                <p class="aligncenter mt-2">
                    <small>Already have a registered account? <a href="<?php the_permalink( 1422 ); ?>">Sign In</a>
                    </small>
                </p>
            </div>
        </fieldset>
    </div>
</form>