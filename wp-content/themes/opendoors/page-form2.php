<?php
/*
  Template Name: Form 2
  Template Post Type: page
 */

get_header();
global $post;
?>
<main>
    <section class="standard-page" role="document">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 ml-auto mr-auto">
                    <figure class=""><?php the_post_thumbnail(); ?></figure>

                    <h1><?php echo get_the_title() ?></h1>

                    <div class="wp-block-contact-form-7-contact-form-selector">
                        <div role="form" class="wpcf7" id="wpcf7-f4131-p4132-o1" lang="en-GB" dir="ltr">
                            <div class="screen-reader-response">
                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                <ul></ul>
                            </div>
                            <form id="page_subscribe_form" class="wpcf7-form cf7mls-no-scroll cf7mls-no-moving-animation init col-lg-12 latest__prayer pl-3">
                                <div class="container col-lg-12 pl-5 pr-5" style="max-width: 100%;">
                                    <div style="font-size: 20px;
                                         font-weight: 400;
                                         line-height: 30px;">
                                         <?php
                                         while (have_posts()) :
                                             the_post();
                                             the_content();
                                         endwhile; // End of the loop.
                                         ?>
                                    </div>
                                    <p><label> First name (Primary Contact) *<br>
                                            <span class="wpcf7-form-control-wrap" data-name="first-name"><input required type="text" id="first-name" name="first-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </label></p>
                                    <p><label> Last name (Primary Contact) *<br>
                                            <span class="wpcf7-form-control-wrap" data-name="last-name"><input required type="text" id="last-name" name="last-name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </label></p>
                                    <p><label> Church name *<br>
                                            <span class="wpcf7-form-control-wrap" data-name="chur-name"><input required type="text" id="church-name" name="chur-name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </label></p>
                                    <p><label> Church postcode *<br>
                                            <span class="wpcf7-form-control-wrap" data-name="chur-postcode"><input required type="text" id="church-postcode" name="chur-postcode" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </label></p>
                                    <p><label> Email *<br>
                                            <span class="wpcf7-form-control-wrap" data-name="your-email"><input required type="email" id="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span> </label></p>
                                    <input type="hidden" id="acquisition-code" name="acquisition-code" value="<?= get_field("acquisition_source_code"); ?>">
                                    <p><a href="<?php echo get_permalink(3) ?>">Privacy Policy</a><br>
                                    <p><input type="submit" class="btn btn-primary" id="btnSubmit456" value="Subscribe"></p>
                                    <p style="
                                       display: none;
                                       font-weight: 600;
                                       background-color: var(--wp--preset--color--purple);
                                       color: white !important;
                                       border-color: var(--wp--preset--color--purple);
                                       text-align: center;
                                       padding: 6px;
                                       " id="submit_message"></p>
                                </div>
                                <p style="display: none !important;"><label>Δ<textarea name="_wpcf7_ak_hp_textarea" cols="45" rows="8" maxlength="100"></textarea></label><input type="hidden" id="ak_js_1" name="_wpcf7_ak_js" value="1685442411135"><script>document.getElementById("ak_js_1").setAttribute("value", (new Date()).getTime());</script></p>
                                <div class="wpcf7-response-output" aria-hidden="true"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->


<script>
    jQuery(document).ready(function ($) {
        $("#page_subscribe_form").on("submit", function (event) {
            event.preventDefault();
            $("#btnSubmit456").val("PLEASE WAIT").attr("disabled", "disabled");
            $.ajax({
                url: "/wp-admin/admin-ajax.php",
                context: document.body,
                method: "POST",
                data: {
                    action: 'ajax_individual_subscribe',
                    firstname: $("#first-name").val(),
                    surname: $("#last-name").val(),
                    email: $("#email").val(),
                    churchName: $("#church-name").val(),
                    churchPostcode: $("#church-postcode").val(),
                    form2: "true",
                    acquisitionCode: $("#acquisition-code").val()
                },
                success: function (data) {
                    $("#submit_message").text("<?php echo get_field('subscription_message', '7571') ?>").css("color", "white").show();
                    $("#page_subscribe_form")[0].reset();
                    $("#btnSubmit456").val("Submit").prop("disabled", false);
                }
            });
        });
    });
</script>
<?php
get_footer();
