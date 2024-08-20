<?php
/*
  Template Name: Form 3
  Template Post Type: page
 */
?>
<?php get_header(); ?>
<main>
  <?php
  while (have_posts()) :
    the_post();
    the_content();
  endwhile; // End of the loop.
  ?>
  <div class="wp-block-contact-form-7-contact-form-selector"><div role="form" class="wpcf7" id="wpcf7-f4131-p4132-o1" lang="en-GB" dir="ltr">
      <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
      <form id="page_subscribe_form" class="wpcf7-form cf7mls-no-scroll cf7mls-no-moving-animation init" novalidate="novalidate" data-status="init">
        <div class="container" style="margin-top:70px;margin-bottom:80px">
          <label>Name<br>
            <span class="wpcf7-form-control-wrap" data-name="first-name"><input type="text" id="first-name" name="first-name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="first"></span> </label><br>
          <span class="wpcf7-form-control-wrap" data-name="last-name"><input type="text" id="last-name" name="last-name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="last"></span><br>
          <label>Church Name<br>
            <span class="wpcf7-form-control-wrap" data-name="ChurchName"><input type="text" name="ChurchName" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span></label><p></p>
          <p><label>Church Postcode<br>
              <span class="wpcf7-form-control-wrap" data-name="ChurchPostcode"><input type="text" name="ChurchPostcode" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span></label></p>
          <p><label>Church Role<br>
              <span class="wpcf7-form-control-wrap" data-name="ChurchRole"><select name="ChurchRole" class="wpcf7-form-control wpcf7-select" aria-invalid="false"><option value="">---</option><option value="Church Leader">Church Leader</option><option value="Youth Leader">Youth Leader</option><option value="Missions Coordinator">Missions Coordinator</option></select></span></label></p>
          <p><label> Your email<br>
              <span class="wpcf7-form-control-wrap" data-name="your-email"><input type="email" id="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" aria-invalid="false"></span> </label></p>
          <p><label> Phone<br>
              <span class="wpcf7-form-control-wrap" data-name="phone"><input type="text" id="phone" name="phone" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </label></p>
          <p><label> Your message (optional)<br>
              <span class="wpcf7-form-control-wrap" data-name="your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </label></p>
         <input type="hidden" id="acquisition-code" name="acquisition-code" value="<?= get_field("acquisition_source_code");?>"> 
              <p>Please note, this information is being gathered by our approved supplier Cognito forms. By filling in this form your data will be held in the United States, but your data will only ever be used by Open Doors UK &amp; Ireland for the purpose described by this form. Cognito Forms is a fully signed-up member of the US-EU Privacy Shield, which is approved by the ICO, any queries can be addressed here. Please see these links for more information on the Open Doors Privacy Policy.</p>
          <p><input type="button" class="btn btn-primary" id="btnSubmit" value="Submit"></p>
                        <p style="display: none; font-weight: 600;" id="submit_message"></p>
        </div>
        <p style="display: none !important;"><label>Δ<textarea name="_wpcf7_ak_hp_textarea" cols="45" rows="8" maxlength="100"></textarea></label><input type="hidden" id="ak_js_1" name="_wpcf7_ak_js" value="1685442411135"><script>document.getElementById("ak_js_1").setAttribute("value", (new Date()).getTime());</script></p><div class="wpcf7-response-output" aria-hidden="true"></div></form></div></div>
</main><!-- #main -->
<script>
  jQuery(document).ready(function ($) {
    $("#btnSubmit").on("click", function () {
      $("#btnSubmit").val("PLEASE WAIT").attr("disabled", "disabled");
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        context: document.body,
        method: "POST",
        data: {
            action: 'ajax_individual_subscribe',
            firstname: $("#first-name").val(),
            surname: $("#last-name").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            form3: "true",
            acquisitionCode: $("#acquisition-code").val()
        },
        success: function (data) {
            $("#submit_message").text("<?php echo get_field(subscription_message) ?>").css("color","white").show();
            $("#page_subscribe_form")[0].reset();
            $("#btnSubmit").val("Submit").prop("disabled", false);
        }
    }); 
      
    });
  });
</script>
<?php
get_footer();
