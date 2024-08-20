<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" alt="">
<?php else:
    $colors = [ 'red'    => '#c01f1c',
        'orange' => '#e05c16',
        'yellow' => '#eba500'];
// Your block html goes here
    ?>
    <div class="map-section">
        <a name="map"></a>
        <div class="odCost">
            <div class="text-block">
                <div class="title"><?=get_field('title')?></div>
                <?php get_template_part('template-parts/content','countries-watch', ['class'=>'desktop']); ?>
            </div>
            <div class="map-block">
                <?php
                $color_1 = get_field('color_1');
                $color_2 = get_field('color_2');
                $is_gradient = $color_1&&$color_2;
                $corner = get_field('corner')?get_field('corner'):180;
                $percent_1 = get_field('percent_1')?get_field('percent_1'):0;
                $percent_2 = get_field('percent_2')?get_field('percent_2'):100;
                $sticker = get_field('sticker');
                $is_pattern = get_field('is_pattern');
                ?>
                <div <?=$is_gradient?'style="background: linear-gradient('.$corner.'deg,'.$color_1.' '.$percent_1.'%,'.$color_2.' '.$percent_2.'%);"':''?> class="map">
                    <div class="zoom"><a class="fancybox" href="#modal-map">zoom</a></div>
                    <?php
                    $countries = get_countries();
                    $code_countries = [];
                    foreach($countries as $country) $code_countries[$country['code']] = ['path' => $country['path'], 'title' => isset($country['title'])?$country['title']:'' ];
                    ?>
                    <svg viewBox="0 0 1009 652">
                        <?php
                        foreach(countries_data($code_countries) as $code=>$country) {
                            ?>
                                <!--<a <?=($country['permalink']&&$country['more_enable']?'href="'.$country['permalink'].'"':'')?>">-->
                                <a data-num="<?=$country['rank']?>" data-levelcolor="<?=$country['level']['value']?>" data-levellabel="<?=$country['level']['label']?>" data-text="<?=$country['text']?>" data-list="<?=$country['list']?>" data-list="<?=$country['list']?>" data-link="<?=$country['permalink']?>" data-enable="<?=$country['more_enable']?$country['more_enable']:'false'?>" data-name="<?=$country['name']?>">
                                    <?=$country['title']?'<title> “'.$code.'” – '.$country['title'].'</title>':''?>
                                    <?=str_replace('<path','<path  '.'onmouseover="this.style.fill=\'#87bcd2\'"'.' onmouseleave="this.style.fill=\''.$colors[$country['level']['value']].'\'"'.' '.($country['level']?'style="fill:'.$colors[$country['level']['value']].'"':'').' class="'.$code.'"',$country['path'])?>
                                </a>

                        <?php } ?>
                    </svg>
                </div>
                <?php get_template_part('template-parts/content','countries-watch', ['class'=>'mobile']); ?>
                <div class="map-info">
                    <div class="item item-1">
                        <h5><?=get_field('level_of_persecution_title')?></h5>
                        <ul class="level-list">
                            <?php if(get_field('levels')) foreach(get_field('levels') as $level) { ?>
                                <li><div class="select-result"><span class="select-result-color <?=$level['color']?>"><?=$level['color']?></span><?=$level['title']?></div></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="item item-2">
                        <div class="map-info-slider">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <?php if(get_field('slider')) foreach(get_field('slider') as $slide) { ?>
                                        <div class="swiper-slide">
                                            <strong class="title"><?=$slide['title']?></strong>
                                            <p><?=$slide['text']?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="item item-3">
                        <h5><?=get_field('ranking_title')?></h5>
                        <ol class="ranking-list">
                            <?php if(get_field('ranking_countries')) foreach(get_field('ranking_countries') as $country) { ?>
                                <li><?=$country['name']?></li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
            </div>
            <?php if(!empty($sticker)) { ?>
                <img class="bf-logo" src="<?= $sticker['url'] ?>" alt="<?= $sticker['src'] ?>">
            <?php } ?>
            <?php if($is_pattern) { ?>
            <div class="pattern horizontal"><img src="<?=get_template_directory_uri()?>/img/particles4.svg" alt="pattern"></div>
            <div class="pattern mobile"><img src="<?=get_template_directory_uri()?>/img/particles-mobile.svg" alt="pattern"></div>
            <?php } ?>

        </div>
    </div>
    <!-- Modal -->
    <?php
    $color_1 = get_field('color_1','option');
    $color_2 = get_field('color_2','option');
    $is_gradient = $color_1&&$color_2;
    $corner = get_field('corner','option')?get_field('corner','option'):180;
    $percent_1 = get_field('percent_1','option')?get_field('percent_1','option'):0;
    $percent_2 = get_field('percent_2','option')?get_field('percent_2','option'):100;
    ?>
    <div <?=$is_gradient?'style="background: linear-gradient('.$corner.'deg,'.$color_1.' '.$percent_1.'%,'.$color_2.' '.$percent_2.'%);"':''?> id="modal-map" class="modal">
        <div class="map">
            <?php
            $colors = [ 'red'    => '#c01f1c',
                'orange' => '#e05c16',
                'yellow' => '#eba500'];
            $countries = get_countries();
            $code_countries = [];
            foreach($countries as $country) $code_countries[$country['code']] = ['path' => $country['path'], 'title' => $country['title'] ];

            ?>
            <svg viewBox="0 0 1009 652">
                <?php
                foreach(countries_data($code_countries) as $code=>$country) { ?>
                    <a <?=($country['permalink']&&$country['more_enable']?'href="'.$country['permalink'].'"':'')?>">
                    <?=$country['title']?'<title> “'.$code.'” – '.$country['title'].'</title>':''?>
                    <?=str_replace('<path','<path  '.'onmouseover="this.style.fill=\'#87bcd2\'"'.' onmouseleave="this.style.fill=\''.$colors[$country['level']['value']].'\'"'.' '.($country['level']?'style="fill:'.$colors[$country['level']['value']].'"':'').' class="'.$code.'"',$country['path'])?>
                    </a>
                <?php } ?>
            </svg>
        </div>
    </div>
    <script>
        jQuery('#countries-watch li, .map svg a').on('click',
            function()  {
                var levelcolor = (jQuery(this).attr('data-levelcolor'));
                var levellabel = (jQuery(this).attr('data-levellabel'));
                var more_enable = (jQuery(this).attr('data-enable'));
                var text = jQuery(this).attr('data-text').split('#br#').join("<br>");
                //var list = jQuery(this).attr('data-list');
                var link = jQuery(this).attr('data-link');
                var name = jQuery(this).attr('data-name');
                var num = jQuery(this).attr('data-num');
                if(levellabel && levelcolor) {
                    jQuery('.country-info .select-result').html('<span class="select-result-color '+levelcolor+'">'+levelcolor+'</span>'+levellabel);
                    jQuery('.country-info p#level').html('<b>Level of persecution:</b>');
                }
                else {
                    jQuery('.country-info .select-result').html('');
                    jQuery('.country-info p#level').html('<b>This country does not feature on the current World Watch List, please choose another...</b>');
                }
                jQuery('.country-info p#text').html(text);
                jQuery('.country-info a#country_more').attr('href',link);
                jQuery('.country-info a#country_more span').html(name);
                if(more_enable == 'false') jQuery('.country-info a#country_more').hide();
                else jQuery('.country-info a#country_more').show();
                jQuery('.country-info').show();
                //jQuery('#countries-watch li').removeClass('active');
                if(num) jQuery('.custom-select span').text(num+'. '+name);
                else jQuery('.custom-select span').text(name);

            }
        );
    </script>
<?php endif; ?>
