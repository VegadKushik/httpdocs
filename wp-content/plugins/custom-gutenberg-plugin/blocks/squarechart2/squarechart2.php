<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="row mb-5" <?php if ( is_admin() && ! isset( $block['backgroundColor'] ) ) {
		echo 'style="padding: 30px 0; background: #ccc"';
	} ?>>
        <div class="col">
            <div class="canvas" id="cc3"></div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function () {
            const dinFont = "'din-2014', sans-serif";
            const color = "#f1f3f3";
            const color1 = getComputedStyle(document.documentElement).getPropertyValue('--wp--preset--color--purple');
            const color2 = getComputedStyle(document.documentElement).getPropertyValue('--wp--preset--color--blue');
            const color3 = getComputedStyle(document.documentElement).getPropertyValue('--wp--preset--color--greyfirst');

            CanvasJS.addColorSet("csopt3",
                [
                    "#a684a3",
                    color1,
                    color2,
                    "#885a85",
                    "#a684a3",
                    "#e1d6e0",
                    "#885a85",
                    "#e1d6e0",
                    color1,
                    "#885a85"
                ]);

            var opt3 = new CanvasJS.Chart("cc3", {
                height: 500,
                animationEnabled: true,
                toolTip: {
                    fontFamily: dinFont,
                    fontColor: color1,
                    fontSize: "12",
                    backgroundColor: "#E3E6E8",
                    borderThickness: 0,
                    borderColor: "#F6F7F8",
                    cornerRadius: 5,
                    animationEnabled: true,
                    content: "<div style='max-width:400px;' class='wordwrap quote'>{legendText}</div>"
                },
                colorSet: "csopt3",
                title: {
                    text: "<?php the_field( 'sq_title' ) ?>",
                    fontFamily: dinFont,
                    fontWeight: 800,
                    fontSize: 50,
                    verticalAlign: "top"
                },
                data: [{
                    indexLabelFontSize: 12,
                    indexLabelFontFamily: dinFont,
                    type: "pie",
                    valueFormatString: "#,##0##",
                    startAngle: 250,
                    showInLegend: false,
                    legendText: "{label}",
                    dataPoints: [
					    <?php
					    while ( have_rows( 'sq_items3' ) ) : the_row(); ?>
                        {
                            y: <?= get_sub_field( 'amount' ) ?>,
                            legendText: "<div class='p-3'><p class='h6 font-weight-bold'><?= get_sub_field( 'title' ) ?><br><?= get_sub_field( 'amount_text' ) ?></p><?= get_sub_field( 'content' ) ?><br><br><a href='<?= get_sub_field( 'link' ) ?>' target='_blank'>Read more</a><br></div><img src='<?= get_sub_field( 'image' ) ?>' />",
                            indexLabel: "<?= get_sub_field( 'title' ) ?>"
                        },
					    <?php endwhile; ?>
                    ]
                }]
            });
            opt3.render();
        })
    </script>
<?php endif; ?>
