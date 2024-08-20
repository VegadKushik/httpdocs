<?php
/*
  Template Name: Form Donation step 2
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

    <style>
        .btn-primary:disabled{
            background-color: #6b3268 !important;
            border-color: #6b3268 !important;
            opacity: 0.5;
        }
    </style>
    <div class="donate-steps__form-wrapper">
        <div class="row">
            <div class="col-lg-6 ml-auto mr-auto">

                <!-- progress indicator -->
                <div class="donation-progress">
                    <ul class="donation-progress__bar">                                           
                        <li class="active">1. Details</li>
                        <li>2. Validate</li>
                        <li>3. Confirmation</li>
                    </ul>
                </div>
            </div>
        </div>

        <!--          <form method="POST" action="https://payments.securetrading.net/process/payments/details">
                    <input type="hidden" name="sitereference" value="opendoors21207">
                    <input type="hidden" name="stprofile" value="gift">
                    <input type="hidden" name="currencyiso3a" value="GBP">
                    <input type="hidden" name="mainamount" value="100.00">
                    <input type="hidden" name="version" value="2">
                    <input type="submit" value="Pay">
                  </form>-->

        <div class="row">
            <div class="col-md-8 offset-md-2 col-lg-3 offset-lg-2">
                <div class="donate-steps__featured-image">
                    <div class="xrm-editable-html xrm-attribute"><div class="xrm-attribute-value"><p><img alt="" class="details-sideimg" src="https://media.opendoorsuk.org/Images/donation-feature-image.jpg"></p>
                        </div></div>
                </div>
            </div>

            <div class="col-md-8 offset-md-2 col-lg-4 offset-lg-1">

                <!-- direct debit form -->
                <div class="donate-steps__form">
                    <form name="formDirect" method="POST" action="https://payments.securetrading.net/process/payments/details"  id="form_direct" class="direct_debit">
                        <div class="aspNetHidden">
                            <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="">
                        </div>

                        <div class="aspNetHidden">

                            <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="30B6AE74">
                            <input type="hidden" name="__VIEWSTATEENCRYPTED" id="__VIEWSTATEENCRYPTED" value="">
                            <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="">
                        </div>	
                        <h6>Amount</h6>
                        <div class="donate-steps__amount-box-wrap">
                            <div class="donate-steps__amount-box">
                                <label for="amount" class="sr-only">Amount</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">£</div>
                                    </div>
                                    <input required id="regulargiftamt" name="mainamount" value="<?= (!empty($_GET['amount']) ? $_GET['amount'] : "1.00") ?>" type="text" placeholder="0.00" class="form-control form-control-lg">
                                </div>
                            </div>                                               
                            <!--<div class="donate-steps__context-note">per month *</div>-->
                        </div>

                        <div id="regamterror">&nbsp;</div>

                        <h6>Details</h6>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="gobochk">
                            <label class="form-check-label" for="gobo"><?php echo the_field('details_checkbox'); ?></label>
                        </div>

                        <div class="form-group" id="gobo-name" style="display:none;">
                            <label for="billingorgname">Organisation Name *</label>
                            <input id="billingorgname" name="billingorgname" type="text" value="" class="form-control form-control-lg">
                        </div>

                        <div class="form-group" id="gobo-postcode" style="display:none;">
                            <label for="billingorgpostcode">Organisation Postcode *</label>
                            <input id="billingorgpostcode" name="billingorgpostcode" type="text" value="" class="form-control form-control-lg">
                        </div>

                        <?php
                        $supporterId = $_GET["supporterid"];
                        if ($supporterId) {
                            $supporterData = opendoors_get_individual($supporterId);
                            $readOnly = "readonly";
                            ?>
                            <div class="form-group">
                                <label for="individualid" aria-required="true">Individual Number</label>
                                <input type="hidden" id="individualid">
                                <p style="font-weight: 600"><?= (isset($supporterData["number"]) ? $supporterData["number"] : "Not found") ?></p>
                            </div>
                        <?php } ?>

                        <div class="form-group">
                            <label for="billingtitle" aria-required="true">Title *</label>
                            <select required name="ctl00$ContentContainer$MainContent$billingprefixval" id="billingprefixval" class="form-control form-control-lg" aria-invalid="false" <?= $readOnly ?>>
                                <option <?= (isset($supporterData['title']) ? '' : 'selected="selected"') ?> disabled value="">-- Select Title --</option>
                                <?php foreach (opendoors_titles() as $title) {
                                    ?>
                                    <option <?= (isset($supporterData['title']) && $supporterData['title'] == $title["name"] ? 'selected="selected"' : '') ?> value="<?= $title["id"] ?>"><?= $title["name"] ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="billingfirstname">First Name *</label>
                            <input required id="billingfirstname" name="billingfirstname" type="text" value="<?= ($supporterId ? $supporterData['firstName'] : '') ?>" class="form-control form-control-lg" <?= $readOnly ?>>
                        </div>

                        <div class="form-group">
                            <label for="billinglastname">Last Name *</label>
                            <input required id="billinglastname" name="billinglastname" type="text" value="<?= ($supporterId ? $supporterData['lastName'] : '') ?>" class="form-control form-control-lg" <?= $readOnly ?>>
                        </div>

                        <div class="form-group">
                            <label for="billingemail">Email <?= ($supporterId ? "" : "*") ?></label>
                            <input id="billingemail" name="billingemail" type="email" value="<?= ($supporterId ? $supporterData['emailAddress'] : '') ?>" class="form-control form-control-lg" <?= ($supporterId ? "" : "required") ?>>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="under21" <?= $readOnly ?>>
                            <label class="form-check-label" for="under21">Under 21?</label>
                        </div>

                        <div id="selectdob" style="display: none;">
                            <div class="form-group">
                                <label for="billingdob"></label>
                                <input id="billingdob" name="billingdob" placeholder="dd/mm/yyyy" type="date" value="" class="form-control form-control-lg">
                            </div>
                        </div>  

                        <div class="divider"></div>

                        <div>
                            <h6 id="address-title">Your Address</h6>
                            <div class="form-group">
                                <label for="billingcountry">Country *</label>
                                <select class="form-control form-control-lg" id="billingcountry" name="billingcountry" <?= $readOnly ?>>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Republic of Ireland">Republic of Ireland</option>
                                </select>
                            </div>

                            <input id="billingstreet" type="hidden" name="billingstreet" value="">
                            
                            <div class="form-group">
                                <label for="billingstreet1">Address Line 1 *</label>
                                <input id="formatted_address_0" name="billingstreet1" type="text" value="<?= ($supporterId ? $supporterData['line1'] : '') ?>" class="form-control form-control-lg" autocomplete="shipping street-address" required <?= $readOnly ?>>
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
                                <input required id="town_or_city" name="billingtown" type="text" value="<?= ($supporterId ? $supporterData['city'] : '') ?>" class="form-control form-control-lg" <?= $readOnly ?>>
                            </div>

                            <div class="form-group">
                                <label for="billingcounty">County *</label>
                                <input required id="county" name="billingcounty" type="text" value="<?= ($supporterId ? $supporterData['county'] : '') ?>" class="form-control form-control-lg" <?= $readOnly ?>>
                            </div>

                            <div class="form-group">
                                <label for="billingpostcode">Postcode *</label>
                                <input required id="postcode" name="billingpostcode" type="text" value="<?= ($supporterId ? $supporterData['postcode'] : '') ?>" class="form-control form-control-lg" autocomplete="pca-override" <?= $readOnly ?>>
                            </div>

                            <!--div class="form-group">
                                <label for="billingtelephone">Phone</label>
                                <input id="billingtelephone" name="billingtelephone" type="text" value="" class="form-control form-control-lg">
                            </div-->

                            <!--                        <div class="divider"></div>
                            
                                                    <img src="https://www.opendoorsuk.org/act/donate/direct-debit-logo" alt="Direct Debit Guarantee" class="dd-logo"><br>-->

                            <!--                        <h6>Instructions to your bank</h6>
                                                    <p><small>By proceeding beyond this point you are confirming that you are the account holder and the only person required to authorise Direct Debits from this account. If you are not, please do not proceed but instead <a href="#">download a paper mandate</a> for completion.</small></p>
                            
                                                    <div class="form-group">
                                                        <label for="billingaccountholder">Name of account holder *</label>
                                                        <input id="billingaccountholder" name="billingaccountholder" type="text" value="  " class="form-control form-control-lg">
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="billingaccountno">Account no *</label>
                                                        <input id="billingaccountno" name="billingaccountno" value="" class="form-control form-control-lg" type="text">
                                                    </div>
                            
                                                    <div class="form-group">
                                                        <label for="billingsortcode">Sort Code *</label>
                                                        <input id="billingsortcode" name="billingsortcode" value="" class="form-control form-control-lg" type="text">
                                                    </div>
                            
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-sm-5 my-1">
                                                            <label for="billingpaymentstart">Start day *</label>
                                                            <select name="ctl00$ContentContainer$MainContent$billingpaymentstart" id="billingpaymentstart" class="form-control">
                                                                <option value="814370001">1st</option>
                                                                <option value="814370015">15th</option>
                                                                <option value="814370025">25th</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2 text-center">
                                                            &nbsp;<br>
                                                            /
                                                        </div>
                                                        <div class="col-sm-5 my-1">
                                                            <label for="billingpaymentmonth">Month and year *</label>
                                                            <select id="billingpaymentmonth" name="billingpaymentmonth" class="form-control">
                                                                <option value="05">May 2023</option><option value="06">Jun 2023</option><option value="07">Jul 2023</option><option value="08">Aug 2023</option>
                                                            </select>
                            
                                                        </div>
                                                        <small id="payment-start-help" class="col form-text text-muted">(MUST be at least 20 days from today)</small>
                                                        <label for="billingpaymentmonth" id="billingpaymentmonth-error" class="error"></label>
                                                    </div>
                                                    <div class="divider"></div>-->
                        </div>

                        <h6>Additional Details</h6>
                        <div class="form-group">
                            <label for="activitymotivation">What inspired you to give today?</label>
                            <select name="ctl00$ContentContainer$MainContent$actmot" id="actmot" class="form-control form-control-lg" aria-invalid="false">
                                <option selected="selected" value="">-- Select Motivation --</option>
                                <?php
                                if ($supporterId) {
                                    $motivations = opendoors_internal_motivations();
                                } else {
                                    $motivations = opendoors_motivations();
                                }

                                foreach ($motivations as $motivation) {
                                    ?>
                                    <option value="<?= $motivation["id"] ?>"><?= $motivation["name"] ?></option>
                                <?php }
                                ?>
                                <!--                                <option value="6b3e4201-ab30-eb11-a848-000d3a261b4c">Our church ran a service with a focus on Open Doors</option>
                                                                <option value="33d1f818-ab30-eb11-a848-000d3a261b4c">An Open Doors speaker came to my church</option>
                                                                <option value="d1a1a9ce-33de-ea11-a82a-000d3a2cff99">Magazine</option>
                                                                <option value="549678e7-33de-ea11-a82a-000d3a2cff99">Appeal Letter</option>
                                                                <option value="07785316-34de-ea11-a82a-000d3a2cff99">Website</option>
                                                                <option value="205e749a-35de-ea11-a82a-000d3a2cff99">Webinar</option>
                                                                <option value="7f165112-36de-ea11-a82a-000d3a2cff99">OD Speaker</option>
                                                                <option value="ef4ce746-36de-ea11-a82a-000d3a2cff99">Other/Unknown Event</option>
                                                                <option value="342704d8-36de-ea11-a82a-000d3a2cff99">Prayer DVD</option>
                                                                <option value="43cfc443-37de-ea11-a82a-000d3a2cff99">World Watch List</option>
                                                                <option value="b0368c71-37de-ea11-a82a-000d3a2cff99">Secret Church Devotional</option>
                                                                <option value="5cbfdea2-37de-ea11-a82a-000d3a2cff99">God's Smuggler</option>
                                                                <option value="9a51b6c8-38de-ea11-a82a-000d3a2cff99">Post It</option>
                                                                <option value="0328c72b-39de-ea11-a82a-000d3a2cff99">Tears of Gold</option>
                                                                <option value="32bd0285-39de-ea11-a82a-000d3a2cff99">Dangerous Faith</option>
                                                                <option value="c7019045-3ade-ea11-a82a-000d3a2cff99">Youth T-shirt</option>
                                                                <option value="7ed78077-3ade-ea11-a82a-000d3a2cff99">Hidden Word</option>
                                                                <option value="d64f38a0-3ade-ea11-a82a-000d3a2cff99">Secret Church Lockdown Edition</option>
                                                                <option value="287da5c4-3bde-ea11-a82a-000d3a2cff99">Isolated Church</option>
                                                                <option value="132e4704-3cde-ea11-a82a-000d3a2cff99">Blackout</option>
                                                                <option value="b36a5340-3cde-ea11-a82a-000d3a2cff99">Fundraising</option>
                                                                <option value="c088e072-3cde-ea11-a82a-000d3a2cff99">In Memory</option>
                                                                <option value="aadc3d88-3cde-ea11-a82a-000d3a2cff99">Other/Unknown</option>-->
                            </select>
                        </div>

                        <p><?php echo the_field('additional_details_title_content'); ?></p>

                        <?php if ($supporterId) { ?>
                            <h6>Source</h6>
                            <select name="internalSource" id="internalsource" class="form-control form-control-lg" aria-invalid="false">
                                <option selected="selected" value="">-- Select Source --</option>
                                <option value="Phone">Phone</option>
                                <option value="Post">Post</option>
                            </select>
                        <?php } ?>
                        <div class="divider"></div>

                        <h6>How would you like to stay in touch with us?</h6>

                        <div class="form-check">
                            <input id="chkemailweek" type="checkbox" name="chkemailweek" value="weekly" class="form-check-input" onclick="GdprOptin();">
                            <label class="form-check-label" for="check1">
                                Weekly email updates
                            </label>
                        </div>

                        <div class="form-check">
                            <input id="chkemailmonth" type="checkbox" name="chkmailmonth" value="monthly" class="form-check-input" onclick="GdprOptin();">
                            <label class="form-check-label" for="check2">
                                Monthly email updates
                            </label>
                        </div>

                        <div class="form-check">
                            <input id="chkpost" type="checkbox" name="chkpost" value="post" class="form-check-input" onclick="GdprOptin();">
                            <label class="form-check-label" for="check3">
                                Post
                            </label>
                        </div>

                        <!-- phone -->
                        <!--div class="form-check">
                            <input id="chkphone" type="checkbox" name="chkphone" value="phone" class="form-check-input" onclick="GdprOptin();">
                            <label class="form-check-label" for="check4">
                                Phone
                            </label>
                        </div-->

                        <div style="<?= ($supporterId == true && $supporterData['allowGiftAidAsk'] == false ? 'display: none;' : '') ?>">
                            <div class="divider"></div>
                            <h6 class="gift-title">Gift Aid</h6>
                            <p style="
                            <?php
                            if (!isset($supporterData['hasGiftAidDeclaration']) || ($supporterData['hasGiftAidDeclaration'] == false)) {
                                echo "display:none;";
                            }
                            ?>
                               ">Has Gift Aid Declaration: <span style="color: green; font-weight: 600;">Yes</span></p>
                            <div class="gift-aid form-group gao" style="
                            <?php
                            if (isset($supporterData['hasGiftAidDeclaration']) && $supporterData['hasGiftAidDeclaration'] == true) {
                                echo "display:none";
                            }
                            ?>
                                 ">
                                <p class="d-flex">
                                    <img class="gift-aid-logo" src="https://www.opendoorsuk.org/wp-content/uploads/2023/08/gift-aid-it_logo.gif" alt="Gift aid logo"><?php echo the_field('gift_aid_content'); ?></p>

                                <div class="form-check">
                                    <input id="giftaidchecked" class="form-check-input" name="giftaidchecked" type="checkbox" value="">
                                    <label class="form-check-label" for="giftaid"><?php echo the_field('gift_aid_checbox'); ?></label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="sitereference" value="<?= securetrading_api_site_code() ?>">
                        <input type="hidden" name="accounttypedescription" value="<?= ($supporterId ? 'MOTO' : 'ECOM') ?>">
                        <input type="hidden" name="stprofile" value="gift">
                        <input type="hidden" name="currencyiso3a" value="GBP">
                        <input type="hidden" name="version" value="2">
                        <input type="hidden" name="orderreference" id="orderreference" value="<?= getFundCode(); ?>">
                        <input type=hidden name="successfulurlredirect" value="<?= home_url() ?>/thank_you_donate">

                        <input id="btnSubmit" type="submit" name="ctl00$ContentContainer$MainContent$ctl00" value="Pay" class="btn btn-primary">
                        <label id="payment-error" class="error"></label>
                        <?php echo the_field('text_under_button'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main><!-- #main -->
<script>
    $(document).ready(function () {
        if ($("#under21").is(':checked')) {
            $("#selectdob").show();
        } else {
            $("#selectdob").hide();
        }

        $("#billingdob").on("change", function () {
            calculateAge($(this).val());
        });


        if ($("#gobochk").is(':checked')) {
            $("#gobo-name").show();
            $("#gobo-postcode").show();
            $(".gift-aid").hide();
            $(".gift-title").hide();
            $("#giftaidchecked").prop('checked', false);
        } else {
            $("#gobo-name").hide();
            $("#gobo-postcode").hide();
            $(".gift-aid").show();
            $(".gift-title").show();
        }

        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
        
        $("#formatted_address_0, #formatted_address_1, #formatted_address_2").on("change",function(){
            console.log("changed");
           addressChangeUpdate(); 
        });
        
        function addressChangeUpdate(){
        setTimeout(
          function() 
          {
            string = "";
            if($("#formatted_address_0").val() != ''){
                string += $("#formatted_address_0").val();
            }
            if($("#formatted_address_1").val() != ''){
                string += ", " + $("#formatted_address_1").val();
            }
            if($("#formatted_address_2").val() != ''){
                string += ", " +  $("#formatted_address_2").val();
            }
            $("#billingstreet").val(string);
            }, 2000);
        }
        
        addressChangeUpdate();
    });

    $("#under21").on("click", function () {
        if ($(this).is(':checked')) {
            $("#selectdob").show();
            var date = $("#billingdob").val();
            if (typeof date !== 'undefined') {
                calculateAge(date);
            }
        } else {
            $("#selectdob").hide();
            $("#btnSubmit").prop("disabled", false);
            $("#payment-error").html("");
        }

        //$("#selectdob").toggle();
    });

    $("#gobochk").on("click", function () {
        if ($(this).is(':checked')) {
            $("#gobo-name").show();
            $("#gobo-postcode").show();
            $(".gift-aid").hide();
            $(".gift-title").hide();
            $("#giftaidchecked").prop('checked', false);
        } else {
            $("#gobo-name").hide();
            $("#gobo-postcode").hide();
            $(".gift-title").show();
            $(".gift-aid").show();
        }

    });

    $("#form_direct").on("submit", function (event) {
        event.preventDefault();
        if (!$("#formatted_address_0").val()) {
            $("#formatted_address_0").focus();
        } else {
            $("#btnSubmit").val("PLEASE WAIT").attr("disabled", "disabled");
            $.ajax({
                url: "/ajax-subscribe",
                context: document.body,
                method: "POST",
                data: {
                    saveDonation: 1,
                    value: $("#regulargiftamt").val(),

                    onBehalfOfOrganisation: $("#gobochk").is(':checked'),
                    organisationName: $("#billingorgname").val(),
                    organisationPostcode: $("#billingorgpostcode").val(),

                    billingprefixval: $("#billingprefixval").val(),
                    billingpremise: $("#formatted_address_0").val(),
                    billingstreet: $("#formatted_address_1").val(),
                    billingstreet1: $("#formatted_address_2").val(),
                    billingtown: $("#town_or_city").val(),
                    billingcounty: $("#county").val(),
                    billingcountry: $("#billingcountry").val(),
                    billingpostcode: $("#postcode").val(),

                    giftAidAction: $("#giftaidchecked").is(':checked'),
                    motivationId: $("#actmot").val(),
                    internalsource: $("#internalsource").val(),

                    firstname: $("#billingfirstname").val(),
                    surname: $("#billinglastname").val(),
                    email: $("#billingemail").val(),
                    weeklyEmail: $("#chkemailweek").is(':checked'),
                    monthlyEmail: $("#chkemailmonth").is(':checked'),
                    postEmail: $("#chkpost").is(':checked'),
                    campid: "<?php echo $_GET["campid"]; ?>",
                    fundid: "<?php echo $_GET["fund"]; ?>",
                    billingDob: $("#billingdob").val(),
                    orderreference: $("#orderreference").val(),
                    supporterId: "<?= ($supporterId ? $supporterId : '') ?>",
                    supporterNumber: "<?= (isset($supporterData["number"]) ? $supporterData["number"] : '') ?>"
                },
                success: function (dataJson) {
                    $("#btnSubmit").val("PAY").prop("disabled", false);
                    console.log(dataJson);
                    document.formDirect.submit();
                }
            });
        }
    });

    function calculateAge(date) {
        dt1 = new Date(date);
        dt2 = new Date();

        var diff = (dt2.getTime() - dt1.getTime()) / 1000;
        // Convert the difference from milliseconds to days
        diff /= (60 * 60 * 24);
        // Calculate the approximate number of years by dividing the difference in days by the average number of days in a year (365.25)
        console.log(Math.abs(Math.round(diff / 365.25)));
        if (Math.abs(Math.round(diff / 365.25)) < 13) {
            $("#btnSubmit").attr("disabled", "disabled");
            $("#payment-error").html("You have to be at least 13 years old");
        } else {
            $("#btnSubmit").prop("disabled", false);
            $("#payment-error").html("");
        }
    }
</script>
<?php
get_footer();
