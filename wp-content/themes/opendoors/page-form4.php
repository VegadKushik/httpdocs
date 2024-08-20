<?php
/*
  Template Name: Form 4
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
          <p>Subscribe to keep up to date by email alerts with ways to pray and act.</p>
          <p><label> First Name<br>
              <span class="wpcf7-form-control-wrap" data-name="first-name"><input type="text" id="first-name" name="first-name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </label></p>
          <p><label> Last Name<br>
              <span class="wpcf7-form-control-wrap" data-name="last-name"><input type="text" id="last-name" name="last-name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </label></p>
          <p><label> Email<br>
              <span class="wpcf7-form-control-wrap" data-name="your-email"><input type="email" id="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" aria-invalid="false"></span> </label></p>
          <p><label>Are you happy for us to keep you updated with ways to pray and act via email?<br>
              <span class="wpcf7-form-control-wrap" data-name="Areyouhappy"><span class="wpcf7-form-control wpcf7-checkbox wpcf7-exclusive-checkbox"><span class="wpcf7-list-item first"><label><input type="checkbox" name="Areyouhappy" value="Yes"><span class="wpcf7-list-item-label">Yes</span></label></span><span class="wpcf7-list-item last"><label><input type="checkbox" name="Areyouhappy" value="No"><span class="wpcf7-list-item-label">No</span></label></span></span></span></label></p>
          <p><input type="button" class="btn btn-primary" id="btnSubmit" value="Submit"></p>
          <p style="display: none; font-weight: 600;" id="submit_message"></p>
        </div>
        </form>
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
            form4: "true"
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
