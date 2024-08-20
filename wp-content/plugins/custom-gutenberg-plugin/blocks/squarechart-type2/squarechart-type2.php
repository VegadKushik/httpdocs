<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="col">
        <div class="canvas" id="cc3"></div>
    </div>

    <script>
        window.addEventListener('load', function () {
            const dinFont = "'din-2014', sans-serif";
            const color = "#f1f3f3";
            const color1 = getComputedStyle(document.documentElement).getPropertyValue('--wp--preset--color--purple');
            const color2 = getComputedStyle(document.documentElement).getPropertyValue('--wp--preset--color--blue');
            const color3 = getComputedStyle(document.documentElement).getPropertyValue('--wp--preset--color--greyfirst');

            CanvasJS.addColorSet("csopt2",
                [
                    color3,
                    color3,
                    "#3B4037"
                ]);

            var opt2 = new CanvasJS.Chart("cc2", {
                height: 225,
                animationEnabled: true,
                colorSet: "csopt2",
                title: {
                    text: "<?php the_field( 'sq_bottom_text' ) ?>",
                    verticalAlign: "bottom",
                    fontSize: 18,
                    fontFamily: dinFont
                },
                toolTip: {
                    fontFamily: dinFont,
                    fontColor: "#fff",
                    fontSize: "14",
                    backgroundColor: color1,
                    borderThickness: 0,
                    borderColor: color1,
                    cornerRadius: 6,
                    content: "<div style='max-width:350px;' class='wordwrap'>{legendText}</div>",
                    updated: function (e) {
                        if (e.content.contains(0) || e.content.contains(9)) {
                            $('.wordwrap').css('display', 'none');
                        }
                    },
                    dockInsidePlotArea: true,
                },
                subtitles: [{
                    text: null
                }, {
                    text: "<?php the_field( 'sq_text_center' ) ?>",
                    fontSize: 34,
                    fontFamily: dinFont,
                    verticalAlign: "center",
                }],

                data: [{
                    type: "doughnut",
                    startAngle: 280,
                    innerRadius: "60%",
                    showInLegend: false,
                    legendText: "{label}",
                    dataPoints: [
						<?php
						while ( have_rows( 'sq2_items' ) ) : the_row(); ?>
                        {
                            y: <?= get_sub_field( 'percent' ); ?>,
                            legendText: "<div class='p-3'><?= get_sub_field( 'content' ) ?></div>"
                        },
						<?php endwhile; ?>
                    ]
                }]
            });
            opt2.render();
        })
    </script>
<?php endif; ?>
