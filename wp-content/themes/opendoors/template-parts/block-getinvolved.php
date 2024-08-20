<section class="home-meet get-involved" <?= blockStyling( $block ) ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-10 ml-auto mr-auto section-intro">
                <h2 id="getinvolved"><?php the_field( 'get_involved_title', 'option' ) ?></h2>
                <p><?php the_field( 'get_involved_content', 'option' ) ?></p>
            </div>
        </div>
    </div>
    <?php
    $inversed = get_field( 'inversed', 'option' );
    if ( have_rows( 'get_involved_items', 'option' ) ): ?>
        <div class="get-involved-slider slider-get-involved">
                <?php while ( have_rows( 'get_involved_items', 'option' ) ): the_row();
                ?>
                <div class="get-involved-slider__slide <?php if ( $inversed ) {
                    echo "black-and-white";
                } ?>">
                    <img src="<?= get_sub_field( 'image' ) ?>">
                    <div class="title-wrapper">
                        <a class="title" data-event-action="Click" data-event-category="Homepage Box"
                           data-event-label="Box 1 (text)"
                           href="<?= get_sub_field( 'link' ) ?>"><?= get_sub_field( 'title' ) ?></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>