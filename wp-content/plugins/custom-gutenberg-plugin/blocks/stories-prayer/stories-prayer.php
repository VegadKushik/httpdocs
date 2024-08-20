<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <section class="latest" <?= blockStyling( $block ) ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 latest__stories">
                    <h2><?php the_field( 'title1' ) ?></h2>
                    <div class="latest__stories-listing">
						<?php
						// Цикл
						$query = new WP_Query( array(
							'post_type'      => 'news',
                            'cat' => 36,
							'posts_per_page' => 4
						) );
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								?>
                                <article>
                                    <div class="thumbnail">
										<?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="content">
                                        <div class="summary-details"><?= get_the_term_list( get_the_ID(), 'post_tag' ); ?>
                                            | <?= get_the_date( 'M j, Y' ) ?>
                                        </div>
                                        <div class="excerpt">
                                            <a href="<?=get_the_permalink()?>"><?php the_title(); ?></a>
                                        </div>
                                    </div>
                                </article>
								<?php
							}
						}
						?>

                        <a href="<?php the_permalink( get_option( 'page_for_posts' ) ) ?>" class="view-more">View
                            more</a>
                    </div>
                </div>
                <div class="col-lg-8 latest__prayer">
                    <h2><?php the_field( 'title2' ) ?></h2>
                    <div class="latest__prayer-listing">
						<?php if ( have_rows( 'items' ) ) {
							$i = 0;
							?>
							<?php while ( have_rows( 'items' ) ): the_row();
								$i ++;
								?>
                                <article>
                                    <div class="action-label"><?= get_sub_field( 'title' ) ?></div>
                                    <div class="excerpt"><?= get_sub_field( 'content' ) ?></div>
									<?php if ( $i == 3 ) { ?>
                                        <div class="alert alert-danger invisible mt-2 summary-details alert-dismissible summary-details"
                                             id="summary-errors" role="alert">
                                            <a aria-label="close" class="close" data-dismiss="alert" href="#">×</a>
                                        </div>
		
														  
										<div class="wpcf7 js" id="wpcf7-f172-p11601-o1" lang="uk" dir="ltr">
<div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
<form id="subscribe-form" action="/#wpcf7-f172-p11601-o1" method="post">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="172">
<input type="hidden" name="_wpcf7_version" value="5.9.6">
<input type="hidden" name="_wpcf7_locale" value="uk">
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f172-p11601-o1">
<input type="hidden" name="_wpcf7_container_post" value="11601">
<input type="hidden" name="_wpcf7_posted_data_hash" value="">
<input type="hidden" name="_wpcf7cf_hidden_group_fields" value="[]">
<input type="hidden" name="_wpcf7cf_hidden_groups" value="[]">
<input type="hidden" name="_wpcf7cf_visible_groups" value="[]">
<input type="hidden" name="_wpcf7cf_repeaters" value="[]">
<input type="hidden" name="_wpcf7cf_steps" value="{}">
<input type="hidden" name="_wpcf7cf_options" value="{&quot;form_id&quot;:172,&quot;conditions&quot;:[],&quot;settings&quot;:{&quot;animation&quot;:&quot;yes&quot;,&quot;animation_intime&quot;:200,&quot;animation_outtime&quot;:200,&quot;conditions_ui&quot;:&quot;normal&quot;,&quot;notice_dismissed&quot;:false}}">
<input type="hidden" name="_wpcf7_recaptcha_response" value="03AFcWeA5BQcA-Z-2syDt_9q3NlVjoga_dEFe0oA1vyhVaeRmejUoSxmUOPeZJBYJkzadrqp5jE6Lwbfo1C3UcyENxvIe4U1_zubecjaRy7-B6RsS7F0wCHNO500lRqJz62a1gDWkmqd_SmGo9qjeOLi9PxOFVzcE6A4fkG0AyeW0_J2uj4vnCvZxNRSW7LndofvpmgVFW_ZtvNDD7IoioKGaNj_4QlBpxVMLqF3tSbv5gHtSFnnF719MAI-qsZoM5mxpmChtjmuGwZdoh5FEWAfUXbCWRzJ0NuGkL_xOmmwQG9C0Iw0RY_QPAeY-2DEL_wE9jE9DbRSp3af4d1kwKryLrgg5Ol7c5K5sXR9JS-UAuRgIQeQargNbMMlUSxU6GQXdWSvCCbK08_l_iBBZlvL1j6uauLNxxgkoYcsP2HIMNfsrG8F0zS8j0esmB0dxtE00arY-rQejrbDjoJXh0l3sFzC3gdeaY4ADnG8dArHxguIXmwK-KR3QUcCx2PunpoE2Fxn49oGlGXP7Jv1zDNm293KRhZGUtrdfUmSR2FS2uhj34kqrJGM-sbgCkBnD6nbSLwXW-SK4orYpp5i9I3gnbOK9yrNpwvlh2dFphs9HktoLCPRHtDElMd19DUM-Zj1HQF96uzbS8QFqAwc2EWGh6yySs76pWiY9O4F1tEhXWIPBLxiuCna37m0vohESFZyhOAK9EvFVK2VllNX3cW8bJinhppyOEmfRkwd0ujvlPS6cDUT94GHoP0YaOoziRMpy9tF9Yl1ZO8ee5WPbjUqMlNDDN-ZhXgXqDjg9Dug17PXdau4WY7dyt3h5p_4hq2vhRwBM5iDe6sOp2QnVcQiaPbb6TYBNOmNRLTsrOXmR7RT-U25PNg0GRA48Gy2Sk07XYau-vqbTMBCK5488Ogr629tCgeLid4q4e9lvtc8wXdV2jJ1Sx897Hd9GBHrAk31dzJtZTJmeaDzzaxHtXf5tLFfNo_9zWbrOBabQMhJ7iXImWLL8ZKWrBdB8mJzuLlCG2JgjQLs2wyCWvocRVNG0hYqqqrbhkSV1Ofp91q2Eb0e4RVY76Z7vNHBKpFXKzY3a26QH7JNL7XZ-mVogrMHyz5emX01w05z9kXYD5tFgDCq7-uyvrLik6LKMmBeiT4Y6Xn0dknTE8ZIO66q2atT9SJ5TElynoXynyiX3rty3bAUBCHW7ge-5Bw5l7Bp1Wf1llMbI80ZofKUmU2l6-yAANHOEu0wQSwbH5y6SkiUh5ROiJPEas4-wliAEGd_iSpcVmCfztCmyh2nu0Ks1OY3xrT0z1qONIFls8OVhXh-fscTZsEM_Bq055tZq5ONrbEpn2obaN8UtYbktzJARd6_7Oct4CSvpmFG0aqvLL-BhKjV6cvZm68DZ_ycgx2STjlKjdwCncyckKMAJJvadwKS88frZ-2Kl8XRB-XXVLvCkztSerZ9ZVd7iwAFds6lA5RxHB6_UeA9H3Q5YabSqu4pdP-tXe83r93px3LITZ8MqPSrztbuvKRmS9g1qjgYODVJLHd1Qz14kmZu2tw_GLV986IQv18v_95NbtTkI80FNTF65TGWe-ryp4BkYEt6zwHi0uj_TUpOf7LBa2rWdouzxnpRsiQtmkdIycC1QqZoBEkxX3w6uT4ChfGNDGAuw6FIw2WDay5MoCAEvAdmaY8Weg1LMBxHDlYKf12zmrQitkrASkj_3CajM">
</div>
<style>
.wpcf7-response-output{
background-color: var(--wp--preset--color--purple);
color: white;
border-color: var(--wp--preset--color--purple) !important;
text-align: center;
padding: 6px;
}
.btn-primary:disabled{
            background-color: #6b3268 !important;
            border-color: #6b3268 !important;
            opacity: 0.5;
        }
</style>
<div class="form-row">
	<div class="form-group col-md-4">
		<p><label for="input-firstname">First name</label><span class="wpcf7-form-control-wrap" data-name="firstname">
                        <input size="40" maxlength="80" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" id="input-firstname" aria-required="true" aria-invalid="false" placeholder="" value="" type="text" name="firstname" required>
                    </span>
		</p>
	</div>
	<div class="form-group col-md-4">
		<p><label for="input-lastname">Last name</label><span class="wpcf7-form-control-wrap" data-name="lastname">
                        <input size="40" maxlength="80" class="form-control" id="input-lastname" value="" type="text" name="lastname" required>
                    </span>
		</p>
	</div>
	<div class="form-group col-md-4">
		<p><label for="input-email">Email</label><span class="wpcf7-form-control-wrap" data-name="email-267">
                        <input size="40" maxlength="80" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email form-control" id="input-email" aria-required="true" aria-invalid="false" value="" type="email" name="email-267" required>
                    </span>
		</p>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-md-8">
		<div class="form-group">
			<div class="form-check">
				<p><a href="https://www.opendoorsuk.org/privacy-policy/" target="_blank">Privacy Policy</a>
				</p>
			</div>
		</div>
	</div>
	<div class="form-group col-md-4">
		<p><button class="btn btn-primary" id="homepage-subscription" type="submit">Subscribe</button>
		</p>
	</div>
    <p style="
               display: none; 
               font-weight: 600;
               background-color: var(--wp--preset--color--purple);
                color: white;
                border-color: var(--wp--preset--color--purple);
                text-align: center;
                padding: 8px;
        " id="submit_message"></p>
</div><div class="wpcf7-response-output" aria-hidden="true" style="display:none"></div>
<input type="hidden" id="acquisition-code" name="acquisition-code" value="<?= get_field("acquisition_source_code");?>">
	            <p style="
               display: none; 
               font-weight: 600;
               background-color: var(--wp--preset--color--purple);
                color: white;
                border-color: var(--wp--preset--color--purple);
                text-align: center;
                padding: 8px;
                width: 100%;
        " id="submit_message"></p>
</form>
</div>		
																<?php //echo do_shortcode( '[contact-form-7 id="172" html_class="od-subscribe-form" title="Subscribe" ajax="true"]' );
														 } ?>
								
                                </article>
							<?php endwhile; ?>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

    <script>
    jQuery(document).ready(function ($) {
        $("#subscribe-form").on("submit", function (event) {
            event.preventDefault();
                $("#homepage-subscription").html("PLEASE WAIT").attr("disabled", "disabled");
                $.ajax({
                    url: "/wp-admin/admin-ajax.php",
                    context: document.body,
                    method: "POST",
                    data: {
                        action: 'ajax_individual_subscribe',
                        firstname: $("#input-firstname").val(),
                        surname: $("#input-lastname").val(), 
                        email: $("#input-email").val(), 
                        acquisitionCode: $("#acquisition-code").val(),
                        pageid: 48,
                        monthlyEmail: "true"
                    },
                    success: function (data) {
                        $("#submit_message").text("Thank you for signing up").css("color","white").show();
                        $("#homepage-subscription").html("SUBSCRIBE").prop("disabled", false);
                        $("#subscribe-form")[0].reset();
//                        }
                    }
                });
        });
    });
</script>