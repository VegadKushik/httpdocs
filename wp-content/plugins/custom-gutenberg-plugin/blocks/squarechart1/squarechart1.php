<!-- <?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="row mb-5" <?php if ( is_admin() && ! isset( $block['backgroundColor'] ) ) {
		echo 'style="padding: 30px 0; background: #ccc"';
	} ?>>
        <div class="col-md-6">
            <div class="canvas" id="cc1"></div>
        </div>
        <div class="col-md-6">
            <div class="canvas" id="cc2"></div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function () {
            const dinFont = "'din-2014', sans-serif";
            const color = "#f1f3f3";
            const color1 = getComputedStyle(document.body).getPropertyValue('--wp--preset--color--purple');
            const color2 = getComputedStyle(document.body).getPropertyValue('--wp--preset--color--blue');
            const color3 = getComputedStyle(document.body).getPropertyValue('--wp--preset--color--greyfirst');

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
                    text: "<?php the_field( 'sq_bottom_text1' ) ?>",
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
                    fontWeight: 34,
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
					    while ( have_rows( 'sq_items1' ) ) : the_row(); ?>
                        {
                            y: <?= get_sub_field( 'percent' ); ?>,
                            legendText: "<div class='p-3'><?= get_sub_field( 'content' ) ?></div>"
                        },
					    <?php endwhile; ?>
                    ]
                },]
            });
            opt1.render();

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
                    text: "<?php the_field( 'sq_bottom_text2' ) ?>",
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
                    text: "<?php the_field( 'sq_text_center2' ) ?>",
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
				        <?php  while ( have_rows( 'sq_items2' ) ) : the_row(); ?>
                        {
                            y: <?= get_sub_field( 'percent' ); ?>,
                            legendText: "<div class='p-3'><?= get_sub_field( 'content' ) ?></div>"
                        },
				        <?php endwhile;
				        ?>
                    ]
                }]
            });
            opt2.render();
        })
    </script>
<?php endif; ?> -->

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
        <div class="col-md-6">
            <div class="canvas 111" id="cc1"></div>

            <p class="text-center small text-muted"><em>Hover over for more info</em></p>
        </div>
        <div class="col-md-6">
            <div class="canvas" id="cc2"></div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function () {
            const dinFont = "'din-2014', sans-serif";
            const color = "#f1f3f3";
            const color1 = getComputedStyle(document.body).getPropertyValue('--wp--preset--color--purple');
            const color2 = getComputedStyle(document.body).getPropertyValue('--wp--preset--color--blue');
            const color3 = getComputedStyle(document.body).getPropertyValue('--wp--preset--color--greyfirst');

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
                    text: "<?php the_field( 'sq_bottom_text1' ) ?>",
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
    var content = e.entries[0].dataPoint.legendText; // Отримуємо текст легенди
    if (content.includes('1')) {
        $('.wordwrap').css({'background-color': color2, 'border-radius': '6px'});
    } else if (content.includes('2')) {
        $('.wordwrap').css({'background-color': '#87bcd2', 'border-radius': '6px'});
    } else if (content.includes('0')) {
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
					    while ( have_rows( 'sq_items1' ) ) : the_row(); ?>
                        {
                            y: <?= get_sub_field( 'percent' ); ?>,
                            legendText: "<div class='p-3'><?= get_sub_field( 'content' ) ?></div>"
                        },
					    <?php endwhile; ?>
                    ]
                },]
            });
            opt1.render();

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
                    text: "<?php the_field( 'sq_bottom_text2' ) ?>",
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
                    text: "<?php the_field( 'sq_text_center2' ) ?>",
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
				        while ( have_rows( 'sq_items2' ) ) : the_row(); ?>
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