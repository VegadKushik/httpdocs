<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="col-md-6">
        <div class="canvas" id="cc1"></div>
    </div>

    <script>
        window.addEventListener('load', function () {
            const dinFont = "'din-2014', sans-serif";
            const color = "#f1f3f3";
            const color1 = getComputedStyle(document.documentElement).getPropertyValue('--wp--preset--color--purple');
            const color2 = getComputedStyle(document.documentElement).getPropertyValue('--wp--preset--color--blue');
            const color3 = getComputedStyle(document.documentElement).getPropertyValue('--wp--preset--color--greyfirst');

            CanvasJS.addColorSet("csopt1",
                [
                    color1,
                    color2,
                    color3,
                ]);

            var opt1 = new CanvasJS.Chart("cc1", {
                height: 225,
                animationEnabled: true,
                colorSet: "csopt1",
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
                    animationEnabled: false,
                    content: "<div style='max-width:350px;' class='wordwrap'>{legendText}</div>",
                    updated: function (e) {
                        if (e.content.contains(1)) {
                            $('.wordwrap').css({'background-color': color2, 'border-radius': '6px'});
                        } else if (e.content.contains(2)) {
                            $('.wordwrap').css({'background-color': color1, 'border-radius': '6px'});
                        } else if (e.content.contains(0)) {
                            $('.wordwrap').css('display', 'none');
                        }
                    },
                    dockInsidePlotArea: true,
                },
                subtitles: [{
                    text: null
                }, {
                    text: "<?php the_field('sq_text_center') ?>",
                    fontSize: 34,
                    fontFamily: dinFont,
                    verticalAlign: "center",
                    dockInsidePlotArea: false,
                    backgroundColor: "#fff"
                }],
                data: [{
                    type: "doughnut",
                    startAngle: 280,
                    innerRadius: "60%",
                    showInLegend: false,
                    legendText: "{label}",
                    dataPoints: [
				        <?php
				        while ( have_rows( 'sq1_items' ) ) : the_row(); ?>
                        {
                            y: <?= get_sub_field( 'percent' ); ?>,
                            legendText: "<div class='p-3'><?= get_sub_field( 'content' ) ?></div>"
                        },
				        <?php endwhile; ?>
                    ]
                },]
            });
            opt1.render();
        })
    </script>
<?php endif; ?>
