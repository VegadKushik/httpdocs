<?php
/*
  Template Name: testing
 */
?>

<?php get_header(); ?>

<button id="test" onclick="clicked();" style="margin: 200px;">Test</button>

<script>
    function clicked(){
       $.ajax({
                    url: "/wp-admin/admin-ajax.php",
                    context: document.body,
                    method: "POST",
                    data: {
                        action: 'cronRetryOptionRequests'

                    },
                    success: function (dataJson) {
                        console.log(dataJson);

                    }
                });
    };

</script>
    
<?php
get_footer();
?>

