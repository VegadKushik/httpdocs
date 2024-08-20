<section class="wwl-country-resources">
    <div class="container">
        <h4><?=get_field('resources_title','option')?></h4>

        <div class="row row-eq-height wwl-country-resources__listing js-apply-links-card">
            <?php while ( have_rows( 'items','option' ) ): the_row();
                ?>
                <div class="card col-md-6 col-lg-4">
                    <div class="wrap">
                        <a href="<?= get_sub_field( 'link' ) ?>">
                            <img alt="<?= get_sub_field( 'title' ) ?>"
                                 class="card-img-top"
                                 src="<?= get_sub_field( 'image' ) ?>">
                        </a>

                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?= get_sub_field( 'link' ) ?>"><?= get_sub_field( 'title' ) ?></a>
                            </h5>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>