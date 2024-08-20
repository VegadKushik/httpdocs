<?php
/*
  Template Name: Thank you page
  Template Post Type: page
 */
?>
<?php get_header(); ?>

<!-- Tady je Ondro místo pro tvé PHP skripty -->
    
<main>

        <?php
        while (have_posts()) :
            the_post();

            the_content();

        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->

<?php
get_footer();
?>
<script>
    jQuery(document).ready(function ($) {
        var transactionReference = getUrlParameter("transactionreference");
        if(transactionReference){
            $("h2").text("Please wait...");
            $.ajax({
                url: "/ajax-subscribe",
                context: document.body,
                method: "POST",
                data: {
                    completeDonation: 1,
                    transactionreference: transactionReference
                },
                success: function (dataJson) {
                    console.log(dataJson);
                    $("h2").text("Thank you for your gift.");
                }
            });
        }
    });
    
    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };
</script>