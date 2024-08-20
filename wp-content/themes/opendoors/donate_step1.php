<?php
/*
  Template Name: Donate step 1
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
    <div class="col-lg-8 ml-auto mr-auto">
        <div class="donate-step-one__form-wrapper">
            <form class="donate-step-one__form">

                <input type="hidden" name="campid" id="campid" value="<?php echo $_GET["campid"]; ?>">
                <input type="hidden" name="supporterid" id="supporterid" value="<?php echo $_GET["supporterid"]; ?>">

                <div class="donate-step-one__donation-type btn-group" role="group">
                    <div id="monthly" class="btn btn-secondary active MonthlyBtn">Monthly</div>
                    <div id="once" class="btn btn-secondary OnceBtn">Once</div>
                </div>
                <select name="fund" id="SelectedFund1" class="form-control valid SelectedFund" aria-invalid="false" disabled style="appearance: none;">
                    <?php
                    $supporterId = $_GET["supporterid"];
                    
                    if($supporterId){
                        $funds = opendoors_internal_funds();
                    } else {
                        $funds = opendoors_funds();
                    }
                    //Not the best solution as it was urgent
                    foreach ($funds as $fund) {
                        if ($fund["default"]) {
                            ?>
                            <option value="<?= $fund["id"] ?>"><?= $fund["name"] ?></option>
                            <?php
                            break;
                        }
                    }
                    ?>
                    <?php foreach ($funds as $fund) {
                        if ($fund["default"] == false) {
                            ?>
                            <option value="<?= $fund["id"] ?>"><?= $fund["name"] ?></option>
                    <?php }
                } ?>
                </select>

<?php

if (!isset($supporterId)) {
    ?>

                    <span><div class="donate-step-one__options">
                            <div class="option">
                                <div class="thumbnail one"><br> <span class="header">£22</span></div>
                                <span id="gift1">could provide a Bible to a believer facing extreme persecution</span></div>
                            <div class="option">
                                <div class="thumbnail two"><span class="header">£52</span></div>
                                <span id="gift2">could provide trauma care for two victims of violent persecution</span></div>
                            <div class="option">
                                <div class="thumbnail three"><span class="header">£56</span></div>
                                <span id="gift3">could support a persecuted Christian with urgent aid</span></div>
                        </div></span>
<?php } ?>

                <div id="PurchaseSummary" class="donate-step-one__amount-box">


                    <label id="amount" for="amount">Enter amount</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <input type="number" onchange="setTwoNumberDecimal" class="input-group-text" required name="amount" id="amountPrice" placeholder="0.00" step="0.01"><span>£</span>
                        </div>
                    </div>                              

                </div>                        

                <div class="form-check"></div><input type="button" value="Continue" onclick="processForm()" id="NextButton" class="btn btn-primary button next submit-btn">
            </form>
        </div>
    </div>

</main><!-- #main -->

<script>
    //https://dev-od.client-login.co.uk/donation-step-2/
    //https://www.committedgiving.uk.net/opendoors/staging2023RNC/?promocode=general&amount=5 
    $("#amountPrice").blur(function () {
        this.value = parseFloat(this.value).toFixed(2);
    });
    function processForm() {
        var amount = $("#amountPrice").val();
        var fund = $("#SelectedFund1 option:selected").attr("value");
        var campid = $("#campid").val();
        var supporterid = $("#supporterid").val();
//Test

        if ($(".MonthlyBtn").hasClass("active")) {
            var url = "<?= home_url() ?>/donation-comgive/?amount=" + amount + "&fund=" + fund;
            if (supporterid) {
                url += "&supporterid=" + supporterid;
            }
            if (campid) {
                url += "&campid=" + campid;
            }
            window.location.href = url;
        } else {
            var url = "<?= home_url() ?>/donation-step-2/?amount=" + amount + "&fund=" + fund;
            if (supporterid) {
                url += "&supporterid=" + supporterid;
            }
            if (campid) {
                url += "&campid=" + campid;
            }
            window.location.href = url;
        }
    }
</script>

<style>
    .input-group-prepend span {
        line-height: 38px;
        display: block;
        height: 38px;
        position: absolute;
        top: -1px;
        left: 10px;
        border-top: none;
        border-bottom: 0;
        font-weight: 400;
    }
    .donate-step-one__amount-box .input-group {
        overflow: auto;
    }
</style>

<?php
get_footer();
?>