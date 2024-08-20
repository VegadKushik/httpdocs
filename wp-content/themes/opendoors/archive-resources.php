<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test
 */

get_header();
$default_category = get_field('resources_default_category', 'option');
?>

    <main>

        <section class="standard-page press" role="document">
            <div class="container">
                <section class="standard-page press" role="document">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <figure>
                                    <img alt="<?= $default_category->name ?>"
                                         src="<?php the_field( 'resources_image_before', 'option' ) ?>">
                                </figure>
								<?php if ( have_rows( 'resources_categories', 'option' ) ): ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="filter-buttons">
												<?php while ( have_rows( 'resources_categories', 'option' ) ): the_row(); ?>
                                                    <a class="btn" href="<?= get_sub_field('link') ?>"><?= get_sub_field('name') ?></a>
												<?php endwhile; ?>
                                            </div>
                                        </div>
                                    </div>
								<?php endif; ?>
                                <hr>
                                <h2><?= $default_category->name ?> resources</h2>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="features-block__listing ">
                    <div class="features-block__item">
                        <div class="features-block__thumbnail">
                            <a href="#">
                                <img alt="Explore the 50 countries where being a christian costs the most"
                                     src="images/dist/posts/Map-explore-760-520.jpg">
                            </a>
                            <div class="features-block__label">
                                <span>Explore the top 50</span>
                            </div>
                        </div>
                        <div class="features-block__contents">
                            <a class="title" href="#">Discover the 50 countries in which following Jesus costs the most:
                                read stories, testimonies and prayer points for each country.</a>
                            <a class="btn btn-secondary" href="#">Take a closer look</a>
                        </div>
                    </div>
                    <div class="features-block__item">
                        <div class="features-block__thumbnail">
                            <a href="#">
                                <img alt="Give a Gift" src="images/dist/posts/Top-10-donation-760-520.jpg">
                            </a>
                            <div class="features-block__label">
                                <span>Give a gift</span>
                            </div>
                        </div>
                        <div class="features-block__contents">
                            <a class="title" href="#">Your gift today can support Christians facing extreme persecution
                                – with vital food and medicine, precious Bibles and long-term support.</a>
                            <a class="btn btn-secondary" href="#">Take a closer look</a>
                        </div>
                    </div>
                    <div class="features-block__item">
                        <div class="features-block__thumbnail">
                            <a href="#">
                                <img alt="World Watch List Resources" src="images/dist/posts/Resources-760-520.jpg">
                            </a>
                            <div class="features-block__label">
                                <span>World Watch List resources</span>
                            </div>
                        </div>
                        <div class="features-block__contents">
                            <a class="title" href="#">Free Open Doors World Watch List 2022 resources can help you, your
                                family and your church learn about and pray for the persecuted church.</a>
                            <a class="btn btn-secondary" href="#">Take a closer look</a>
                        </div>
                    </div>
                    <div class="features-block__item">
                        <div class="features-block__thumbnail">
                            <a href="#">
                                <img alt="Prayer for Afghanistan"
                                     src="images/dist/posts/Afg-country-profile-760-520.jpg">
                            </a>
                            <div class="features-block__label">
                                <span>Pray for Afghanistan</span>
                            </div>
                        </div>
                        <div class="features-block__contents">
                            <a class="title" href="#">Join us in praying throughout the year for Afghan Christians and
                                their country.</a>
                            <a class="btn btn-secondary" href="#">Take a closer look</a>
                        </div>
                    </div>
                    <div class="features-block__item">
                        <div class="features-block__thumbnail">
                            <a href="#">
                                <img alt="Trends in Persecution" src="images/dist/posts/Trends-760-520.jpg">
                            </a>
                            <div class="features-block__label">
                                <span>Methodology &amp;&nbsp;persecution trends</span>
                            </div>
                        </div>
                        <div class="features-block__contents">
                            <a class="title" href="#">How does Open Doors create the World Watch List? And how has
                                Christian persecution changed in the past year?</a>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>
                                        <a class="btn btn-secondary" href="#">A1 Map</a>
                                    </p>
                                </div>
                                <p>
                                    <a class="btn btn-secondary" href="#">A2 Map</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="features-block__item">
                        <div class="features-block__thumbnail">
                            <a href="#">
                                <img alt="WWL Launch" src="images/dist/posts/760-2201-wwl-launch-fa.jpg">
                            </a>
                            <div class="features-block__label">
                                <span>WWL launch webinar</span>
                            </div>
                        </div>
                        <div class="features-block__contents">
                            <a class="title" href="#">Catch up with the Open Doors World Watch List 2022 launch webinar
                                from 19 January 2022.</a>
                            <p>
                                <a class="btn btn-secondary" href="#">Find Out More</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				the_content();

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

    </main><!-- #main -->

<?php
get_footer();
