<?php
/*
  Template Name: Form 1
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
<section class="standard-page " role="document" style="">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 ml-auto mr-auto">


        <h1 class="wp-block-heading">Subscribe to emails</h1>



        <p>Sign up to read stories of those who are defying dictators, breaking rules, and risking their lives to follow Jesus, sent direct to your inbox. We’ll give you the latest information and inspiration, and tell you how you can be part of the story by praying, giving and speaking out for our courageous brothers and sisters.</p>



        <p>In addition to the weekly and monthly emails, you can subscribe for&nbsp;<a href="http://advocacy.oduk.org/page/18385/data/1">advocacy alerts</a></p>


        <div role="form" class="wpcf7" id="wpcf7-f4101-p58-o1" lang="en-GB" dir="ltr">
          <form action="" method="post" id="page_subscribe_form">
              <div class="form-field">
              <label for="first-name">First name *</label>
              <span class="wpcf7-form-control-wrap" data-name="first-name">
                <input type="text" name="first-name" value="" size="40" class="wpcf7-form-control wpcf7-text" id="first-name" aria-required="true" aria-invalid="false" placeholder="First name" required>
              </span>
            </div>
            <div class="form-field">
              <label for="surname">Surname *</label>
              <span class="wpcf7-form-control-wrap" data-name="surname">
                <input type="text" name="surname" value="" size="40" class="wpcf7-form-control wpcf7-text" id="surname" aria-required="true" aria-invalid="false" placeholder="Surname" required>
              </span>
            </div>
            <div class="form-field">
              <label for="email">Email *</label>
              <span class="wpcf7-form-control-wrap" data-name="email">
                <input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email" id="email" aria-required="true" aria-invalid="false" placeholder="Email" required>
              </span>
            </div>
            <div class="form-field">
              <span class="wpcf7-form-control-wrap" data-name="WeeklyEmail">
                <span class="wpcf7-form-control wpcf7-checkbox" id="WeeklyEmail">
                  <span class="wpcf7-list-item first last">
                    <label>
                      <input type="checkbox" name="WeeklyEmail" id="weekly_email" value="Weekly Email">
                      <span class="wpcf7-list-item-label">Weekly Email</span>
                    </label>
                  </span>                   
                </span>      
              </span>
            </div>
<!--            <p>Pray for persecuted Christians and respond to those in need.</p>-->
            <div class="form-field" style="margin-top:2px;">
              <span class="wpcf7-form-control-wrap" data-name="MonthlyEmail">
                <span class="wpcf7-form-control wpcf7-checkbox">
                  <span class="wpcf7-list-item first last">
                    <label>
                      <input type="checkbox" name="MonthlyEmail" id="monthly_email" value="Monthly Email">
                    <span class="wpcf7-list-item-label">Monthly Email</span>
                    </label>
                  </span>        
                </span>                 
              </span>
            </div>
<!--            <p>Keep informed with news, updates and prayer requests from the persecuted church.</p>-->
            <div class="form-field" style="margin-top:2px;">
              <span class="wpcf7-form-control-wrap" data-name="YouthEamil">
                <span class="wpcf7-form-control wpcf7-checkbox">
                  <span class="wpcf7-list-item first last">
                    <label>
                      <input type="checkbox" name="YouthEamil" id="youth_email" value="Youth Email">
                      <span class="wpcf7-list-item-label">Youth Email</span>
                    </label>            
                  </span>         
                </span>
              </span>
            </div>
            <div class="form-field" style="margin-top:2px; margin-bottom:15px;">
              <span class="wpcf7-form-control-wrap" data-name="YouthEamil">
                <span class="wpcf7-form-control wpcf7-checkbox">
                  <span class="wpcf7-list-item first last">
                    <label>
                      <input type="checkbox" name="YouthEamil" id="magazine_email" value="Youth Email">
                      <span class="wpcf7-list-item-label">Magazine and other print mailings</span>
                    </label>            
                  </span>         
                </span>
              </span>
            </div>
              
            <div id="address-section" style="display:none;">
                <h6 id="address-title">Your Address</h6>
                <div class="form-group">
                    <label for="billingcountry">Country *</label>
                    <select disabled class="form-control form-control-lg" id="billingcountry" name="billingcountry" <?= $readOnly ?>>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Republic of Ireland">Republic of Ireland</option>
                    </select>
                </div>

                <input id="billingstreet" type="hidden" name="billingstreet" value="">

                <div class="form-group">
                    <label for="billingstreet1">Address Line 1 *</label>
                    <input disabled id="formatted_address_0" name="billingstreet1" type="text" value="<?= ($supporterId ? $supporterData['line1'] : '') ?>" class="form-control form-control-lg" autocomplete="shipping street-address" required <?= $readOnly ?>>
                </div>

                <div class="form-group">
                    <label for="billingstreet2">Address Line 2</label>
                    <input id="formatted_address_1" name="billingstreet2" type="text" value="<?= ($supporterId ? $supporterData['line2'] : '') ?>" class="form-control form-control-lg" <?= $readOnly ?>>
                </div>

                <div class="form-group">
                    <label for="billingstreet3">Address Line 3</label>
                    <input id="formatted_address_2" name="billingstreet3" type="text" value="<?= ($supporterId ? $supporterData['line3'] : '') ?>" class="form-control form-control-lg" <?= $readOnly ?>>
                </div>

                <div class="form-group">
                    <label for="billingtown">Town / City *</label>
                    <input disabled required id="town_or_city" name="billingtown" type="text" value="<?= ($supporterId ? $supporterData['city'] : '') ?>" class="form-control form-control-lg" <?= $readOnly ?>>
                </div>

                <div class="form-group">
                    <label for="billingcounty">County *</label>
                    <input disabled required id="county" name="billingcounty" type="text" value="<?= ($supporterId ? $supporterData['county'] : '') ?>" class="form-control form-control-lg" <?= $readOnly ?>>
                </div>

                <div class="form-group">
                    <label for="billingpostcode">Postcode *</label>
                    <input disabled required id="postcode" name="billingpostcode" type="text" value="<?= ($supporterId ? $supporterData['postcode'] : '') ?>" class="form-control form-control-lg" autocomplete="pca-override" <?= $readOnly ?>>
                </div>
            </div>
              
           <input type="hidden" id="acquisition-code" name="acquisition-code" value="<?= get_field("acquisition_source_code");?>">
<!--            <p>A monthly email, designed specifically for under 21's, featuring the latest prayer news, actions you can take and articles about your global, persecuted family.<br>-->
             <p><strong>If you already receive communications from us, we'll continue to send them to you - plus any new options you've selected above.</strong></p>
            <p>Open Doors Privacy Pledge. We store your data securely and ensure the security of your data when dealing with banks and the postal service. We won’t share your details with anyone else and won’t call you to ask for money. You can change your preferences or opt out at any time by emailing inspire@opendoorsuk.org or calling 01993 460 015. You can read our updated privacy statement</p>
            <p><input type="submit" class="btn btn-primary" id="btnSubmit" value="Submit"></p>
            <p></p>
            <p style="
               display: none; 
               font-weight: 600;
               background-color: var(--wp--preset--color--purple);
                color: white;
                border-color: var(--wp--preset--color--purple);
                text-align: center;
                padding: 8px;
        " id="submit_message"></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
    </main><!-- #main -->

<?php
get_footer();
?>
<script>
    jQuery(document).ready(function ($) {
        $("#magazine_email").on("click",function(){
            if($(this).is(':checked')){
                $("#address-section").show();
                $("#address-section :input").attr("disabled", false);
            } else {
                $("#address-section").hide();
                $("#address-section :input").attr("disabled", true);
            }
            
        });
        
        $("#page_subscribe_form").on("submit", function (event) {
            event.preventDefault();
                $("#btnSubmit").val("PLEASE WAIT").attr("disabled", "disabled");
                $.ajax({
                    url: "/wp-admin/admin-ajax.php",
                    context: document.body,
                    method: "POST",
                    data: {
                        action: 'ajax_individual_subscribe',
                        firstname: $("#first-name").val(),
                        surname: $("#surname").val(), 
                        email: $("#email").val(), 
                        weeklyEmail: $("#weekly_email").is(':checked'),
                        monthlyEmail: $("#monthly_email").is(':checked'),
                        youthEmail: $("#youth_email").is(':checked'),
                        magazineEmail: $("#magazine_email").is(':checked'),
                        acquisitionCode: $("#acquisition-code").val(),
                        billingpremise: $("#formatted_address_0").val(),
                        billingstreet: $("#formatted_address_1").val(),
                        billingstreet1: $("#formatted_address_2").val(),
                        billingtown: $("#town_or_city").val(),
                        billingcounty: $("#county").val(),
                        billingpostcode: $("#postcode").val(),
                        billingcountry: $("#billingcountry").val()
                    },
                    success: function (data) {
                        $("#submit_message").text("Thank you for signing up").css("color","white").show();
                        $("#btnSubmit").val("Submit").prop("disabled", false);
                        $("#page_subscribe_form")[0].reset();
//                        if(data.success === 1){
//                            $("#submit_message").text("Thank you for signing up").css("color","white").show();
//                            $("#page_subscribe_form")[0].reset();
//                        } else {
//                            $("#submit_message").text("Error - Unable to submit your request. Please try it again later").css("color","red").show();
//                        }
                    }
                });
        });
    });
</script>