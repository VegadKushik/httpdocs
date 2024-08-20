<?php
/**
 * Template Name: News Category
 * Template Post Type: news
 */
function get_filter($items, $name, $plural, $aq_str, $number, $slug = '')   {
        if(empty($slug)) $slug = strtolower($name); ?>
        <li>
        <h4 style="margin: 0;padding: 5px 0 10px 0;font-size: 16px;padding: 0;font-weight: 400;"><?php esc_html_e('Filter by:','opendoors'); ?> <em><strong><?php esc_html_e($name, 'opendoors'); ?></strong></em></h4>
            <label>
                <select id="redirectSelect_<?=$number?>" name="" class="" title="">
                    <?php if($items) { ?>
                        <option class="sf-level-0 " data-sf-depth="0" value="<?=build_url($slug, 'all')?>" <?=($aq_str[$slug]=='all'?'selected="true"':'')?>><?php esc_html_e('All '.$plural, 'opendoors'); ?></option>
                    <?php   } ?>
                    <?php foreach($items as $item) { ?>
                    <option class="sf-level-0 " data-sf-depth="0" value="<?=build_url($slug, $item->slug)?>" <?=($aq_str[$slug]==$item->slug?'selected="true"':'')?>><?php esc_html_e($item->name, 'opendoors'); ?></option>
                    <?php   } ?>
                </select>
            </label>
      </li>
<?php }
function build_url($key='', $value='')  {
    $r_url = parse_url($_SERVER['REQUEST_URI']);
    $q_str = $r_url['query'];
    parse_str($q_str, $aq_str);
    if($key&&$value) $aq_str[$key] = $value;
    $s_url = $_SERVER['SCRIPT_URI'];
    $new_aq_str = array_map(function($key, $value) {
        return "{$key}={$value}";
    }, array_keys($aq_str), $aq_str);
    $query = implode('&',$new_aq_str);
    if($query) $query = '?'.$query;
    return $s_url.$query;
}
get_header();
global $post;
$term = get_queried_object();
$r_url = parse_url($_SERVER['REQUEST_URI']);
$q_str = $r_url['query'];
parse_str($q_str, $aq_str);
?>

<main>
    <section class="standard-page latest-stories" role="document">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>

            <!-- form filtering -->
            <div class="row latest-stories__filter">
                <?php
                //echo str_replace("/news/","/news/latest-news/",do_shortcode( '[searchandfilter id="615"]' ));
                $path_1 = parse_url($_SERVER['REQUEST_URI']);
                if(isset($path_1['query'])) {
                    $order = explode('=', $path_1['query']);
                    $order = strtoupper(str_replace('date+', '', $order[1]));
                }
                else $order = '';
                $tags = get_tags(array(
                    'hide_empty' => true
                ));
                $formats = get_terms(array(
                    'taxonomy' => 'post_formats',
                    'hide_empty' => true
                ));
                $field = get_field_object('field_65c4b2c9db985');
                $items = $field['choices'];
                $r_types = [];
                foreach($items as $key=>$item) {
                    $r_types[] = (object)['slug' => $key, 'name' => $item];
                }
                $field = get_field_object('field_65c4b33065e65');
                $items = $field['choices'];
                $f_types = [];
                foreach($items as $key=>$item) {
                    $f_types[] = (object)['slug' => $key, 'name' => $item];                }
                ?>
                <form action="" class="searchandfilter">
                <ul>
                <?php if($post->post_name != 'church-resources') {
                    get_filter($tags, 'Country', 'Countries', $aq_str, '1');
                    get_filter($formats, 'Format', 'Formats', $aq_str, '2');
                    ?>
                <li>
                    <h4 style="margin: 0;padding: 5px 0 10px 0;font-size: 16px;padding: 0;font-weight: 400;"><?php esc_html_e('Sort by:','opendoors'); ?></h4>		<label>
                        <select id="redirectSelect_3" name="" class="" title="">
                            <option class="sf-level-0 sf-item-0 sf-option-active" selected="selected" data-sf-depth="0" value=""><?php esc_html_e('Sort Results By','opendoors'); ?></option>
                            <option class="sf-level-0 " data-sf-depth="0" value="<?=build_url('orderby','date_asc')?>" <?=($aq_str['orderby']=='date_asc'?'selected="true"':'')?>><?php esc_html_e('ASC','opendoors'); ?></option>
                            <option class="sf-level-0 " data-sf-depth="0" value="<?=build_url('orderby','date_desc')?>" <?=($aq_str['orderby']=='date_desc'?'selected="true"':'')?>><?php esc_html_e('DESC','opendoors'); ?></option>
                        </select>
                    </label>
                </li>
                <?php   }
                else {
                    get_filter($formats, 'Theme', 'Themes', $aq_str, '1', 'format');
                    get_filter($r_types, 'Resource Type', 'Resource Types', $aq_str, '2', 'resource_type');
                    get_filter($f_types, 'File Type', 'File Types', $aq_str, '3', 'file_type');
                    get_filter($tags, 'Country', 'Countries', $aq_str, '4', 'country');
                } ?>
                </ul>
                </form>
            </div>

            <div class="row">
                <div class="col">
                    <div class="latest-stories__header">
                        <h6><?php the_title(); ?></h6>
                    </div>
                </div>
            </div>

            <div id="main">

                <div class="latest-stories__listing">
                    <div class="latest-stories__row">
                        <!-- Start repeatable template block of 8 items -->
                        <?php
                        $paged = 1;
                        $args = [
                            'post_type' => 'news',
                            'paged' => $paged,
                            'posts_per_page' => 8,
                            'meta_query' =>[],
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'slug',
                                    'terms' => [$post->post_name],
                                ),
                            ),
                        ];
                        $path_1 = parse_url($_SERVER['REQUEST_URI']);
                        if(isset($path_1['query'])) {
                            parse_str($path_1['query'], $query_str);
                            if(isset($query_str['orderby'])) {
                                $order = $query_str['orderby'];
                                $args['orderby'] = 'date';
                                $args['order'] = strtoupper(str_replace('date_', '', $order));
                            }
                                if(isset($query_str['country'])&&$query_str['country']!='all') {
                                    $args['tax_query'][] = array(
                                        'taxonomy' => 'post_tag',
                                        'field' => 'slug',
                                        'terms' => [$query_str['country']]
                                    );
                                }
                                if(isset($query_str['format'])&&$query_str['format']!='all') {
                                    $args['tax_query'][] = array(
                                        'taxonomy' => 'post_formats',
                                        'field' => 'slug',
                                        'terms' => [$query_str['format']]
                                    );
                                }
                                if(isset($query_str['resource_type'])&&$query_str['resource_type']!='all') {
                                    $args['meta_query'][] =
                                            ['key' => 'resource_type', 'value' => $query_str['resource_type'], 'compare' => '='];
                                }
                                if(isset($query_str['file_type'])&&$query_str['file_type']!='all') {
                                    $args['meta_query'][] =
                                            ['key' => 'file_type', 'value' => $query_str['file_type'], 'compare' => '='];
                                }
                        }
                        $query = new WP_Query($args);
                        $max_pages = $query->max_num_pages;
                        if ( $query->have_posts() ) :
                            $i = 0;
                            /* Start the Loop */
                            while ( $query->have_posts() ) :
                                $query->the_post();
                                $i++;
                                ob_start();
                                if ( $i === 1 ) {
                                    $size = 'large';
                                    get_template_part( 'template-parts/posts/content', 'post', ['i'=>$i] );
                                } elseif ( $i === 2 ) {
                                    echo '<div class="latest-stories__column small-stack">';
                                    get_template_part( 'template-parts/posts/content', 'post', ['i'=>$i] );
                                } elseif ( $i === 3 ) {
                                    get_template_part( 'template-parts/posts/content', 'post', ['i'=>$i] );
                                    echo '</div>';
                                } elseif ( $i > 5 ) {
                                    $size = 'small';
                                    get_template_part( 'template-parts/posts/content', 'post', ['i'=>$i] );
                                } else {
                                    $size = 'medium';
                                    get_template_part( 'template-parts/posts/content', 'post', ['i'=>$i] );
                                }

                                $contents = ob_get_contents();
                                ob_end_clean();
                                if ( $i === 1 || $i > 3 ) {
                                    echo '<div class="latest-stories__column ' . $size . '">' . $contents . '</div>';
                                } else {
                                    echo $contents;
                                }
                            endwhile;
                            wp_reset_query();
                        else:
                            echo 'No results found';
                        endif;
                        ?>

                    </div>
                </div>

                <?php if((integer)$query->max_num_pages > 1) { ?>
                    <div class="pagination">
                        <div id="load-more" class="btn btn-secondary"><?php esc_html_e('Load more news','opendoors'); ?></div>
                        <!--<?php wp_pagenavi( array( 'query' => $query )); ?> -->
                    </div>
                <?php   } ?>


            </div>
            <!-- Load more indicator -->
            <!--                <div class="row">-->
            <!--                    <div class="col text-center">-->
            <!--                        <div id="load-more" class="btn btn-secondary">Load more stories</div>-->
            <!--                        <p class="to-top"><a class="btn btn-secondary" href="#top">Top</a></p>-->
            <!--                    </div>-->
            <!--                </div>-->
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();
?>
<script>
    function redirect(goto){
        window.location = goto;
    }

    var selectEl_1 = document.getElementById('redirectSelect_1');
    var selectEl_2 = document.getElementById('redirectSelect_2');
    var selectEl_3 = document.getElementById('redirectSelect_3');
    var selectEl_4 = document.getElementById('redirectSelect_4');

    selectEl_1.onchange = function(){
        var goto = this.value;
        redirect(goto);
    };
    selectEl_2.onchange = function(){
        var goto = this.value;
        redirect(goto);
    };
    selectEl_3.onchange = function(){
        var goto = this.value;
        redirect(goto);
    };
    // Load more script
    jQuery(function(jQuery){
        var ajaxurl = '<?=site_url()?>/wp-admin/admin-ajax.php';
        var query = '<?=serialize($query->query_vars)?>';
        var current_page = '<?=isset($_POST['paged'])?$_POST['paged']:0?>';
        var max_pages = '<?=$max_pages?>';
        var main_tag = jQuery('.latest-stories__listing');
        var button = jQuery('#load-more');
        var current_page = 1;
        button.click(function(){
            current_page++;
            var text = jQuery(this).text();
            jQuery(this).text('Loading.....'); // изменяем текст кнопки, вы также можете добавить прелоадер
            var data = {
                'action': 'loadmore',
                'paged': current_page.toString(),
                'query': query
            };
            jQuery.ajax({
                url:ajaxurl, // обработчик
                data:data, // данные
                type:'POST', // тип запроса
                success:function(data){
                    if( data ) {
                        jQuery('.to-top').show();
                        button.text(text); // возвращаем прежний текст кнопке
                        main_tag.append('<div class="latest-stories__row">'+data+'</div>'); // вставляем новые посты
                        if(max_pages == current_page) button.remove();
                        if(current_page == 2) {
                            jQuery('.pagination').after('<p class="to-top"><a class="btn btn-secondary" href="#top"><?php esc_html_e('Top','opendoors'); ?></a></p>');
                            jQuery('.pagination').css('margin','0');
                        }
                    } else {
                        button.remove(); // если мы дошли до последней страницы постов, скроем кнопку
                    }
                }
            });
        });
    });

</script>
<style>
    #load-more {
        cursor:pointer;
        margin-bottom: 0px;
    }
    .latest-stories__row {
        margin-bottom: 20px;
    }
    .to-top {
        text-align: center;
    }

</style>

<!-- <script>jQuery(function($) {$('div.pagination a').on('click', function(e) {e.stopImmediatePropagation();});});</script> -->
