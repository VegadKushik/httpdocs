<?php
/**
 * Template Name: Resources Category
 * Template Post Type: post, resources
 */

get_header();
$current_id = get_the_ID();
$content_of_page  = get_field( 'use_content_of');
?>
    <main>
		<?php if ($current_id != 8205 && $content_of_page ) : ?>
			<?php
			$blocks = parse_blocks(get_the_content(null, false, $content_of_page));
			foreach ( $blocks as $block ) {
				echo render_block( $block );
			}
            ?>
		<?php else: ?>
            <div class="container">
                <?php if(has_post_thumbnail()) : ?>
            <section class="home-hero alt-hero">
                    <div class="page-hero__banner-contents alt-hero__banner-contents">
                        <div class="row">
                            <div class="col-md-8 col-lg-6 mr-auto">
<!--                                 <div class="page-hero__banner-title">--><?php //the_title(); ?><!--</div>-->
                                <div style="color:<?= the_field('text_color')?>" class="page-hero__banner-title" >
                                    <?php
                                        echo get_field('banner');
                                    ?>
                                </div>
                                <?php if(get_field('description')) { ?>
                                <?php echo str_replace('<p>','<p class="home-hero__banner-description">',get_field('description')); ?>
                                <?php   } ?>
                                <?php if(isset(get_field('button')['title'])) { ?>
                                <p>
                                    <a class="btn btn-primary" href="<?=get_field('button')['url']?>">
                                        <?=get_field('button')['title']?>
                                    </a>
                                </p>
                                <?php   } ?>
                            </div>
                        </div>

                    </div>

                    <div class="img-wrap">
                        <?php the_post_thumbnail('full'); ?>
                    </div>

            </section>
                <?php endif;?>
            </div>
                    <section class="standard-page press" role="document">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                        <!--<figure>
                                            <?php the_post_thumbnail(); ?>
                                        </figure>-->
									<?php if ( have_rows( 'resources_categories', 'option' ) ): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="filter-buttons">
													<?php while ( have_rows( 'resources_categories', 'option' ) ): the_row(); ?>
                                                        <a class="btn"
                                                           href="<?= get_sub_field( 'link' ) ?>"><?= get_sub_field( 'name' ) ?></a>
													<?php endwhile; ?>
                                                </div>
                                            </div>
                                        </div>
									<?php endif; ?>
                                    <hr>
                                    <h1><?php the_title(); ?> </h1>
                                </div>

                            </div>
                        </div>
                    </section>
                    <div class="features-block__listing container">
						<?php
                        $params = array(
                            'numberposts' => -1, // количество выводимых постов - все
                            'post_type' => 'resources', // тип поста - любой
                            'post_status' => 'publish', // статус поста - любой
                            'post_parent' => get_the_id() // значение ID родительского элемента будет взято из $GLOBALS['post']
                        );
                        if ( get_children($params) ) :
                        foreach(get_children($params) as $post) { ?>

							<?php
							/* Start the Loop */
                                get_template_part( 'template-parts/content', 'rc-item' , ['post' => $post]);
                                ?>
							<?php
                            }
						else :

							echo '<div class="no-found">No posts found</div>';

						endif;
						?>
                    </div>
		<?php endif; ?>
    </main><!-- #main -->
<?php
get_footer();