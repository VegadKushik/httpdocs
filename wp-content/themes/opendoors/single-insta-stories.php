<!doctype html>
<html amp lang="en">
<head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-story" src="https://cdn.ampproject.org/v0/amp-story-1.0.js"></script>
    <script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
    <title>Stories in AMP</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php bloginfo( 'template_url' ); ?>/assets/images/favicon-32x32.png">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/assets/css/app.min.css">
    <style amp-boilerplate>
        body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }
    </style>
    <noscript>
        <style amp-boilerplate>
            body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }
        </style>
    </noscript>
    <style amp-custom>
        amp-story {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI ", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji ", "Segoe UI Emoji ", "Segoe UI Symbol ";
        }

        amp-story-page * {
            color: white;
            text-align: center;
        }

        [template=thirds] {
            padding: 0;
        }
    </style>
</head>

<body>
<?php
?>
<a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="amp-back">
    <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/dist/icons/icon-back.svg" alt="">
</a>

<amp-story standalone>
	<?php
	$i = 0;
	if ( have_rows( 'insta_story' ) ): ?>
		<?php while ( have_rows( 'insta_story' ) ): the_row();
			$i ++;
			?>

            <amp-story-page id="page-<?= $i ?>" auto-advance-after="video">
                <amp-story-grid-layer template="fill">
                    <amp-video autoplay loop
                               width="720"
                               height="960"
                               id="video" poster="<?= get_sub_field( 'poster' ) ?>"
                               layout="responsive">
                        <source src="<?= get_sub_field( 'video' ) ?>" type="video/mp4">
                    </amp-video>
                </amp-story-grid-layer>
            </amp-story-page>
		<?php endwhile; ?>
	<?php endif; ?>
</amp-story>
</body>
</html>