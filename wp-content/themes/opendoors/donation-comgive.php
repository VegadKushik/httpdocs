<?php
/*
  Template Name: Form Donation Comgive
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
                    <form name="formDirect" id="form_direct" class="direct_debit">
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
                                        <div class="input-group-text">ÂŁ</div>
                                    </div>
                                    <input id="regulargiftamt" name="mainamount" value="<?= (!empty($_GET['amount']) ? $_GET['amount'] : "1.00") ?>" type="text" placeholder="0.00" class="form-control form-control-lg" required>
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
                        $readOnly = "";
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
                                <option <?= (isset($supporterData['title']) ? '' : 'selected="selected"') ?>  value="">-- Select Title --</option>
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
                            <input id="billingfirstname" name="billingfirstname" type="text" minlength="4" value="<?= ($supporterId ? $supporterData['firstName'] : '') ?>" class="form-control form-control-lg" required <?= $readOnly ?>>
                        </div>

                        <div class="form-group">
                            <label for="billinglastname">Last Name *</label>
                            <input id="billinglastname" name="billinglastname" type="text" minlength="4" value="<?= ($supporterId ? $supporterData['lastName'] : '') ?>" class="form-control form-control-lg" required <?= $readOnly ?>>
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
                            <h6 >Your Address</h6>
                            <div class="form-group">
                                <label for="billingcountry">Country <?= ($supporterId ? "" : "*") ?></label>
                                <select class="form-control form-control-lg" id="billingcountry" name="billingcountry" <?= $readOnly ?>>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Republic of Ireland">Republic of Ireland</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="billingpremise">Address Line 1 *</label>
                                <input id="formatted_address_0" name="billingpremise" type="text" value="<?= ($supporterId ? $supporterData['line1'] : '') ?>" class="form-control form-control-lg" autocomplete="shipping street-address" required <?= $readOnly ?>>
                                <!-- autocomplete="pca-override" -->
                            </div>

                            <div class="form-group">
                                <label for="billingstreet">Address Line 2</label>
                                <input id="formatted_address_1" name="billingstreet" type="text" value="<?= ($supporterId ? $supporterData['line2'] : '') ?>" class="form-control form-control-lg" <?= $readOnly ?>>
                            </div>

                            <div class="form-group">
                                <label for="billingstreet1">Address Line 3</label>
                                <input id="formatted_address_2" name="billingstreet1" type="text" value="<?= ($supporterId ? $supporterData['line3'] : '') ?>" class="form-control form-control-lg" <?= $readOnly ?>>
                            </div>

                            <div class="form-group">
                                <label for="billingtown">Town / City *</label>
                                <input id="town_or_city" name="billingtown" type="text" value="<?= ($supporterId ? $supporterData['city'] : '') ?>" class="form-control form-control-lg" required <?= $readOnly ?>>
                            </div>

                            <div class="form-group">
                                <label for="billingcounty">County *</label>
                                <input id="county" name="billingcounty" type="text" value="<?= ($supporterId ? $supporterData['county'] : '') ?>" class="form-control form-control-lg" required <?= $readOnly ?>>
                            </div>

                            <div class="form-group">
                                <label for="billingpostcode">Postcode *</label>
                                <input id="postcode" name="billingpostcode" type="text" minlength="6" value="<?= ($supporterId ? $supporterData['postcode'] : '') ?>" class="form-control form-control-lg" autocomplete="pca-override" required <?= $readOnly ?>>
                            </div>
                        </div>

                        <!--div class="form-group">
                            <label for="billingtelephone">Phone</label>
                            <input id="billingtelephone" name="billingtelephone" type="text" value="" class="form-control form-control-lg">
                        </div-->

                        <!--                        <div class="divider"></div>
                        
                                                <img src="https://www.opendoorsuk.org/act/donate/direct-debit-logo" alt="Direct Debit Guarantee" class="dd-logo"><br>-->

                        <h6><?php echo the_field('instructions_to_your_bank_title'); ?></h6>
                        <?php echo the_field('instructions_to_your_bank_content'); ?>

                        <div class="form-group">
                            <label for="billingaccountholder">Name of account holder *</label>
                            <input id="billingaccountholder" name="billingaccountholder" type="text" value="" class="form-control form-control-lg" required>
                        </div>

                        <div class="form-group">
                            <label for="billingaccountno">Account no *</label>
                            <input id="billingaccountno" name="billingaccountno" value="" class="form-control form-control-lg account-control" type="text" required>
                        </div>

                        <div class="form-group">
                            <label for="billingsortcode">Sort Code *</label>
                            <input id="billingsortcode" name="billingsortcode" value="" class="form-control form-control-lg account-control" type="text" required>
                        </div>
                        
                        <input type="hidden" id="account-verification" value="0">

                        <div class="form-group row align-items-center">
                            <div class="col-sm-5 my-1">
                                <label for="billingpaymentstart">Start day *</label>
                                <select name="ctl00$ContentContainer$MainContent$billingpaymentstart" id="billingpaymentstart" class="form-control" required>
                                    <option value="01">1st</option>
                                    <option value="15">15th</option>
                                    <option value="25">25th</option>
                                </select>
                            </div>
                            <div class="col-sm-2 text-center">
                                &nbsp;<br>
                                /
                            </div>
                            <div class="col-sm-5 my-1">
                                <label for="billingpaymentmonth">Month and year *</label>
                                <select id="billingpaymentmonth" name="billingpaymentmonth" class="form-control" required>
                                    <?php foreach (payment_date_options() as $key => $value) { ?>
                                        <option value="<?= $key ?>"><?= $value ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <small id="payment-start-help" class="col form-text text-muted">(MUST be at least 20 days from today)</small>
                            <label for="billingpaymentmonth" id="billingpaymentmonth-error" id="account-error" class="error accerror"></label>
                        </div>
                        <div class="divider"></div>

                        <h6><?php echo the_field('additional_details_title'); ?></h6>
                        <div class="form-group">
                            <label for="activitymotivation"><?php echo the_field('additional_details_label'); ?></label>
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

                        <h6><?php echo the_field('stay_in_touch_with_us'); ?></h6>

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
                        <div class="divider"></div>

                        <div style="<?= ($supporterId == true && $supporterData['allowGiftAidAsk'] == false ? 'display: none;' : '') ?>">
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
                                    <img class="gift-aid-logo" src="https://opendoorsuk.org/wp-content/uploads/2023/08/gift-aid-it_logo.gif" alt="Gift aid logo"><?php echo the_field('gift_aid_content'); ?></p>

                                <div class="form-check">
                                    <input id="giftaidchecked" class="form-check-input" name="giftaidchecked" type="checkbox" value="">
                                    <label class="form-check-label" for="giftaid"><?php echo the_field('gift_aid_checbox'); ?></label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="sitereference" value="test_opendoors35031">
                        <input type="hidden" name="stprofile" value="gift">
                        <input type="hidden" name="currencyiso3a" value="GBP">
                        <input type="hidden" name="version" value="2">
                        <input type=hidden name="successfulurlredirect" value="https://opendoorsuk.org/thank_you_donate">

                        <input id="btnSubmit" type="submit" name="ctl00$ContentContainer$MainContent$ctl00" value="Pay" class="btn btn-primary">
                        <label id="payment-error" class="error"></label>
                        <div class="xrm-attribute xrm-editable-html">
                            <div class="xrm-attribute-value"><?php echo the_field('text_under_button'); ?>

                                <p><input id="gdpropt" name="gdpropt" type="hidden"> <input id="startdate" name="startdate" type="hidden"> <input id="start" name="start" type="hidden"> <input id="today" name="today" type="hidden"> <input id="days" name="days" type="hidden"></p>

                                <p><a href="/about/privacy-policy">Privacy Policy</a></p>

                                <div class="form-grey-box">
								<?php echo the_field('direct_debit'); ?>
								</div>
                            </div>
                        </div>

<!--                        <input id="campid" name="campid" value="WB0001" type="hidden">
                        <input id="fundid" name="fundid" value="West Africa Violence Campaign (2023)" type="hidden">
                        <input id="sitereference" name="sitereference" value="opendoors21207" type="hidden">
                        <input id="stprofile" name="stprofile" type="hidden" value="gift">
                        <input id="currencyiso3a" name="currencyiso3a" type="hidden" value="GBP">
                        <input id="version" name="version" type="hidden" value="2">
                        <input id="stprofile" name="stprofile" type="hidden" value="gift">
                        <label for="days" id="days-error" class="error d-none"></label>-->

                    </form>
                </div>
            </div>
        </div>
    </div>
</main><!-- #main -->
<script>
$(document).ready(function() {
    const $daySelect = $('#billingpaymentstart');
    const $monthSelect = $('#billingpaymentmonth');
    const $dateForm = $('#form_direct');

    $monthSelect.on('change', disableDaysAndMonths);
    $dateForm.on('submit', validateForm);

    function disableDaysAndMonths() {
        const currentDate = new Date();
        const minValidDate = new Date(currentDate.getTime() + 20 * 24 * 60 * 60 * 1000);

        // First, check and disable days for the currently selected month
        disableDays(minValidDate);

        // Then, check and disable months if all days are invalid
        checkAndDisableMonths(minValidDate);
        selectFirstAvailableOption($daySelect);

        // Select the first available option from both selects
        //selectFirstAvailableOption($daySelect);
        //selectFirstAvailableOption($monthSelect);
    }

    function disableDays(minValidDate) {
        const selectedMonthValue = $monthSelect.val().split('-');
        const selectedYear = parseInt(selectedMonthValue[0], 10);
        const selectedMonth = parseInt(selectedMonthValue[1], 10) - 1; // JS months are 0-indexed

        let allDaysDisabled = true;

        $daySelect.children('option').each(function() {
            const $option = $(this);
            const selectedDay = parseInt($option.val(), 10);
            const selectedDate = new Date(selectedYear, selectedMonth, selectedDay);

            if (selectedDate < minValidDate) {
                $option.prop('disabled', true);
            } else {
                $option.prop('disabled', false);
                allDaysDisabled = false;
            }
        });

        return allDaysDisabled;
    }

    function checkAndDisableMonths(minValidDate) {
        $monthSelect.children('option').each(function() {
            const $option = $(this);
            const [year, month] = $option.val().split('-').map(Number);
            const selectedYear = year;
            const selectedMonth = month - 1; // JS months are 0-indexed

            let allDaysDisabled = true;

            $daySelect.children('option').each(function() {
                const $dayOption = $(this);
                const selectedDay = parseInt($dayOption.val(), 10);
                const selectedDate = new Date(selectedYear, selectedMonth, selectedDay);

                if (selectedDate >= minValidDate) {
                    allDaysDisabled = false;
                    return false; // Break the loop
                }
            });

            $option.prop('disabled', allDaysDisabled);
        });
    }

    function selectFirstAvailableOption($selectElement) {
        $selectElement.children('option').each(function() {
            const $option = $(this);
            if (!$option.prop('disabled')) {
                $selectElement.val($option.val());
                return false; // Break the loop
            }
        });
    }

    function validateForm(event) {
        let monthValid = false;
        let dayValid = false;

        $monthSelect.children('option').each(function() {
            if (!$(this).prop('disabled')) {
                monthValid = true;
                return false; // Break the loop
            }
        });

        $daySelect.children('option').each(function() {
            if (!$(this).prop('disabled')) {
                dayValid = true;
                return false; // Break the loop
            }
        });

        if (!monthValid || !dayValid) {
            event.preventDefault();
            alert('Please select a valid date.');
        }
    }

    // Initialize the disableDaysAndMonths function
    disableDaysAndMonths();
    selectFirstAvailableOption($monthSelect);
    $monthSelect.trigger("change");
    selectFirstAvailableOption($daySelect);
});
    
    
    $(".account-control").on("change", function () {
        var accountNumber = $("#billingaccountno").val();
        var accountSortcode = $("#billingsortcode").val();

        if (accountNumber && accountSortcode) {
            $.ajax({
                url: "/wp-admin/admin-ajax.php",
                method: "POST",
                data: {
                    action: 'comgive_account_validate',
                    accountNumber: accountNumber,
                    accountSortcode: accountSortcode
                },
                success: function (response) {
                    if (response.data.result === "Valid") {
                        $(".accerror").html("");
                        $("#account-verification").val(1);
                        $("#payment-error").html("");
                    } else {
                        $(".accerror").html("Sortcode/Account No. invalid");
                        $("#account-verification").val(0);
                    }
                }
            });
        }
    });

    $("#billingdob").on("change", function () {
        calculateAge($(this).val());
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
    });

    $("#gobochk").on("click", function () {
        $("#gobo-name").toggle();
        $("#gobo-postcode").toggle();
        $(".gift-aid").toggle();
        $(".gift-title").toggle();
        $("#giftaidchecked").prop('checked', false);
    });

    $("#form_direct").on("submit", function (event) {
        event.preventDefault();
        
        console.log($("#account-verification").val());
        if($("#account-verification").val() == 0){
            $("#payment-error").html("Account number is not valid");
        } else {

        $("#btnSubmit").val("PLEASE WAIT").attr("disabled", "disabled");
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            method: "POST",
            data: {
                action: 'comgive_account_payment',

                value: $("#regulargiftamt").val(),

                billingsortcode: $("#billingsortcode").val(),
                billingaccountno: $("#billingaccountno").val(),
                billingaccountholder: $("#billingaccountholder").val(),
                billingpaymentmonth: $("#billingpaymentmonth").val(),
                billingpaymentstart: $("#billingpaymentstart").val(),

                onBehalfOfOrganisation: $("#gobochk").is(':checked'),
                organisationName: $("#billingorgname").val(),
                organisationPostcode: $("#billingorgpostcode").val(),

                billingprefixval: $("#billingprefixval").val(),
                billingprefixvaltext: $("#billingprefixval option:selected").text(),
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
                billingDob: $("#billingdob").val(),
                //billingtelephone: $("#billingtelephone").val(), 
                weeklyEmail: $("#chkemailweek").is(':checked'),
                monthlyEmail: $("#chkemailmonth").is(':checked'),
                postEmail: $("#chkpost").is(":checked"),
                campid: "<?php echo $_GET["campid"]; ?>",
                fundid: "<?php echo $_GET["fund"]; ?>",
                supporterId: "<?= ($supporterId ? $supporterId : '') ?>",
                supporterNumber: "<?= (isset($supporterData["number"]) ? $supporterData["number"] : '') ?>"
                        //                        organisationIsChurch: $("#billingfirstname").val(),
//                        organisationRelationshipTypeId: $("#billingfirstname").val(),
//                        fundId: $("#billingfirstname").val(),
            },
            success: function (dataJson) {
                if (dataJson.data.success === 0 || dataJson.data.success === false) {
                    $("#btnSubmit").val("PAY").prop("disabled", false);
                    if(dataJson.data.result){
                        $("#payment-error").html(dataJson.data.result);
                    } else {
                        $("#payment-error").html(dataJson.data.message);
                    }
                    
                } else {
                    console.log(dataJson);
                    window.location.replace("<?= home_url() ?>/thank-you");
                }

            },
            error: function (dataJson) {
                $("#btnSubmit").val("PAY").prop("disabled", false);
                $("#payment-error").html(dataJson.data.result);
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
