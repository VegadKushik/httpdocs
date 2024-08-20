<?php
/**
 * The template for displaying campaign single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-campaign
 *
 * @package test
 */
get_header(); ?>

<main style="background: var(--wp--preset--color--greysecond);">   <?php if (has_post_thumbnail( $post->ID ) ): ?>
	  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<section class="alternative-page donate-step-one" role="document">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center text-uppercase">I WANT TO GIVE</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="donate-banner position-relative" style="background-image: url('<?php echo $image[0]; ?>')"></div>
                </div>
            </div>
            <style>
                .temp-head {
                    margin-top: 30px
                }

                .hidden {
                    display: none;
                }
            </style>
			 </div>
	 </section>
	<?php endif; ?>
  <div class="col-lg-8 ml-auto mr-auto" style="background: var(--wp--preset--color--greysecond);">
    <div class="donate-step-one__form-wrapper" style="margin:auto;">
      <form class="donate-step-one__form">
          <input type="hidden" name="campid" id="campid" value="<?php echo $_GET["campid"]; ?>">
        <div class="donate-step-one__donation-type btn-group" role="group">
          <div id="monthly" class="btn btn-secondary active MonthlyBtn">Monthly</div>
          <div id="once" class="btn btn-secondary OnceBtn">Once</div>
        </div>


        <span>  
        <h2><?php echo the_title(); ?></h2>
        <?php
  while (have_posts()) :
    the_post();

    the_content();

  endwhile; // End of the loop.
  ?></span>

        <div id="PurchaseSummary" class="donate-step-one__amount-box">


          <label id="amount" for="amount">Enter amount</label>
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <input type="number" class="input-group-text" step="0.01" class="input-group-text" required name="amount" id="amountPrice" placeholder="0.00"><span>£</span>
            </div>
          </div>                              

        </div>                        

        <div class="form-check"></div><input type="button" value="next" onclick="processForm()" id="NextButton" class="btn btn-primary button next submit-btn">
      </form>
    </div>
  </div>

</main><!-- #main -->

<script>
	$('#amountPrice').change(function() {
    this.value = parseFloat(this.value).toFixed(2);
});

    //https://dev-od.client-login.co.uk/donation-step-2/
    //https://www.committedgiving.uk.net/opendoors/staging2023RNC/?promocode=general&amount=5 
    function processForm(){
        var amount = $("#amountPrice").val();
        var fund = "<?=get_field( "select_campaign_id" )?>";
        var camid = $("#campid").val();
        console.log($(".MonthlyBtn").hasClass("active"));
        if($(".MonthlyBtn").hasClass("active")){
            window.location.href = "<?= home_url() ?>/donation-comgive/?amount=" + amount + "&fund=" + fund + "&campid=" + camid;
        } else {
            window.location.href = "<?= home_url() ?>/donation-step-2/?amount=" + amount + "&fund=" + fund + "&campid=" + camid;
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
  h2 {
font-size: 40px;
line-height: 50px;
}
.donate-banner {
width: 100%;
background-repeat: no-repeat;
background-size: cover;
vertical-align: middle;
border-style: none;
height: 0;
padding-top: 25.64%;
}
	@media (min-width: 992px) {
.donate-step-one__form-wrapper {
    margin-top: -25px !important;
}
		}
</style>

<?php
get_footer();
?>