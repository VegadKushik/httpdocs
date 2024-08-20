<?php
/*
  Template Name: Form Donation step 3
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
<div class="donate-steps__form-wrapper">
                        <div class="row">
                            <div class="col-lg-6 ml-auto mr-auto">

                                <!-- progress indicator -->								
								<div class="donation-progress">
                                    <ul class="donation-progress__bar">                                       
                                        <li class="done">2. Details</li>
                                        <li class="active">3. Payment</li>
                                        <li>4. Confirmation</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-2 col-lg-3 offset-lg-2">
                                <div class="donate-steps__featured-image">
                                    <img class="details-sideimg" src="https://www.opendoorsuk.org/act/donate/donate-details-placeholder" alt="Donate Details">
                                </div>
                            </div>

                            <div class="col-md-8 offset-md-2 col-lg-4 offset-lg-1">
                                <!-- form -->
                                <div class="donate-steps__form">
                                    <form name="paymentsdetails" id="paymentsdetails" method="post" action="details" novalidate="novalidate">
                                        

                                        <h6><i class="fas fa-lock"></i> Secure card payment</h6>

                                        <div class="form-group">
                                            <label for="card-type">Card Type</label>
                                            <select required="required" id="st-paymenttypedescription-dropdown" name="paymenttypedescription" class="form-control form-control-lg"><option value=""></option><option value="MAESTRO">Maestro</option><option value="MASTERCARD">Mastercard</option><option value="MASTERCARDDEBIT">Mastercard Debit</option><option selected="selected" value="VISA">Visa</option><option value="DELTA">Visa Debit</option><option value="ELECTRON">Visa Electron</option><option value="PURCHASING">Visa Purchasing</option><option value="VPAY">VPay</option></select>
                                        </div>

                                        <div class="form-group">
                                            <label for="card-number">Card Number</label>
                                            <input name="pan" required="required" value="" autocomplete="off" type="tel" id="st-pan-textfield" class="form-control form-control-lg donate-steps__card-number">
                                        </div>

                                        <div class="form-group row  align-items-center">
                                            <div class="col-sm-5 my-1">
                                                <label for="expiry-date">Expiry Month</label>
                                                <select required="required" id="st-expirymonth-dropdown" name="expirymonth" class="form-control form-control-lg"><option selected="selected" value=""></option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>
                                            </div>

                                            <div class="col-sm-2 text-center">&nbsp;<br>/</div>

                                            <div class="col-sm-5 my-1">
                                                <label for="expiry-month">Expiry Year</label>
                                                <select required="required" id="st-expiryyear-dropdown" name="expiryyear" class="form-control form-control-lg"><option selected="selected" value=""></option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option><option value="2036">2036</option><option value="2037">2037</option><option value="2038">2038</option><option value="2039">2039</option><option value="2040">2040</option><option value="2041">2041</option><option value="2042">2042</option><option value="2043">2043</option></select>
                                            </div>
                                        </div>

                                        <div class="form-group row align-items-center">
                                            <div class="col-sm-4">
                                                <label for="security-code">Security code</label>
                                                <input name="securitycode" required="required" value="" autocomplete="off" type="tel" id="st-securitycode-textfield" class="form-control form-control-lg">
                                            </div>
                                            <div class="col-sm-8">
                                                <button type="button" class="btn btn-link btn-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Enter the last 3 digits printed on the signature strip on the back of your card. This is also known as the CVV or CVC.">
                                                    Enter card's CVV number <i class="far fa-question-circle"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <input type="submit" value="Complete My Donation" id="submit" name="process" class="btn btn-primary">
                                        <script>

                                            $("#submit").click(function () {
                                                var isValid = $("#paymentsdetails").valid();
                                                if (isValid) {
                                                    $("#submit").val("processing");
                                                    $.blockUI({ message: null });
                                                }
                                                return isValid;
                                            });

                                            $("#paymentsdetails").validate({
                                                focusInvalid: true,
                                                onkeyup: false,
                                                rules: {
                                                    paymenttypedescription: { required: true },
                                                    pan: { required: true, digits: true },
                                                    expirymonth: { required: true, digits: false },
                                                    expiryyear: { required: true, digits: true },
                                                    securitycode: { required: true, digits: false }
                                                },
                                                debug: false
                                            });

                                        </script>

                                        <p><small>Open Doors takes data protection seriously and stores your data securely. We will not pass on your details to any third party or call you to ask for money.</small></p>
                                        <p><small><a href="https://www.opendoorsuk.org/about/privacy-policy">Privacy Policy</a></small></p>

                                        <input type="hidden" name="sitereference" id="sitereference" value="opendoors21207">
                                        <input type="hidden" name="currencyiso3a" value="GBP">
                                        <input type="hidden" name="stprofile" value="gift">
                                        <input type="hidden" name="version" value="2">
                                        <input type="hidden" name="camp" value="WB0001">
                                        <input type="hidden" name="orderreference" value="QUO-866262-B5F6Y8 --- Web Default">
                                        <input type="hidden" name="inputamount" value="1.00">
                                        <input type="hidden" name="acknowledgementcopy" value="">
                                        <input type="hidden" name="emailbody" value="">
                                        <input type="hidden" name="emailsubject" value="VGhhbmsreW91K2Zvcit5b3VyK2dpZnQrdG8rc3VwcG9ydCtwZXJzZWN1dGVkK0NocmlzdGlhbnM=">
                                        <input type="hidden" name="recievedon" value="6/9/2023 7:02:23 AM">
                                        <input type="hidden" name="fund" value="Where Most Needed">
                                        <input type="hidden" name="quote" value="a0d1a38e-9306-ee11-a81c-000d3a27c8ae">
                                        <input type="hidden" name="supporter" value="9fd1a38e-9306-ee11-a81c-000d3a27c8ae">
                                        <input type="hidden" name="creategad" value="">
                                        <input type="hidden" name="gdpropt" value="">
                                        <input type="hidden" name="dob" value="">
                                        <input type="hidden" name="billingprefixval" value="814370000">
                                        <input type="hidden" value="Mr">
										<input type="hidden" value="">
                                        <input type="hidden" value="">
                                        <input type="hidden" value="test">
                                        <input type="hidden" value="test">
                                        <input type="hidden" value="MariÃ¡nskÃ© LÃ¡znÄ 1">
                                        <input type="hidden" value="PlzeÅskÃ¡ Ä.Ev. 4">
                                        <input type="hidden" value="">
                                        <input type="hidden" value="Drmoul">
                                        <input type="hidden" value="KarlovarskÃ½ Kraj">
                                        <input type="hidden" value="353 01">
                                        <input type="hidden" value="United Kingdom">
                                        <input type="hidden" value="vaclav@webpagesoftware.co.uk">
                                        <input type="hidden" value="">
										<input type="hidden" name="extref" value="">
                                        <input type="hidden" name="activitymotivation" value="">
                                        <input type="hidden" name="customfield1" value="gift">
										<input type="hidden" name="anonid" value="c55770b5-f3ff-4270-aad3-d2b0b712b430"> 
										<input type="hidden" id="cartma" name="cartma" value="1.00">
										<input type="hidden" name="quantity" value="1.00">
                                        <div class="st-block" id="st-block-hiddendiv">
  <input type="hidden" name="_charset_"><input type="hidden" id="sttoken-hidden" name="sttoken" data-st-name="sttoken" value="55-f9ca03dc5a855de00ca1400ef748a14aed257f435b763417f01b0ebb2ea0556e">
  <input data-st-name="stnonce" type="hidden" id="stnonce-hidden" value="55-61094a9cc50b5e1c3a932c16a31de5aa" name="stnonce">
</div>

                                    <input name="fraudcontroltransactionid" type="hidden" value=""></form>
                                </div>
                            </div>
                        </div>
                    </div>
    </main><!-- #main -->
<script>
$( "#under21" ).on( "click", function() {
  $( "#selectdob" ).toggle();
});
</script>
<?php
get_footer();