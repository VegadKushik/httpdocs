<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
// Your block html goes here
$title = get_field('title');
$list_items = get_field('list_items');
$colors = [];
$contents = [];
foreach ($list_items as $item) {
    $item['text'] = trim($item['text'], " \n\r\t\v\x00");
    if (!empty($item['color'])) $colors[] = '"' . $item['color'] . '"';
    else $colors[] = '"#6B3267"';
    $content = 'y: '.$item['number_1'].','.PHP_EOL;
    $content .= '                         legendText: ';
    $link = '';
    if (!empty($item['button'])) {
        $link = '<a '.($item['button']['target']?'target="'.$item['button']['target'].'"':'').' href="'.$item['button']['url'].'">'.$item['button']['title'].'</a>';
    }
    $div = '<div class=\'p-3\'><p class=\'h6 font-weight-bold\'>'.$item['title_1'].'<br>'.$item['number_2'].'</p>'.$item['text'].'<br><br><a href=\''.$item['button']['url'].'\' target=\'_blank\'>'.$item['button']['title'].'</a><br></div>';
    $img = '';
    if (!empty($item['image'])) {
        $img ="<img src='".$item['image']['url']."' alt='".$item['image']['alt']."'>";
    }
    if($item['picture_above']) $content .= '"'.$div.$img.'"';
    else $content .= '"'.$img.$div.'"';
    $content .= ', indexLabel: "'.$item['title_2'].'", exploded: true';
    $item['text'] = trim($item['text']," \n\r\t\v\x00");
    if(!$item['picture_above'])
    $contents[] =  '{y: '.$item['number_1'].',
                    legendText: "'.$div.$img.'",  indexLabel: "'.$item['title_2'].'", exploded: true
                }';
    else $contents[] =  '{y: '.$item['number_1'].',
                    legendText: "'.$img.$div.'",  indexLabel: "'.$item['title_2'].'", exploded: true
                }';
    }
?>
<div class="row mt-5">
    <div class="col">
        <div id="cc3">&nbsp;</div>
    </div>
</div>
<p class="text-center small text-muted"><em>Hover over for more info</em></p>
<script type="text/javascript">$(function() {
        let dinFont = "'din-2014', sans-serif";
        let color = "#f1f3f3";
        CanvasJS.addColorSet("csopt3",
            [<?=implode(',',$colors)?>]);

        var opt3 = new CanvasJS.Chart("cc3", {
            height: 500,
            animationEnabled: true,
            toolTip: {
                fontFamily: dinFont,
                fontColor: "#6B3267",
                fontSize: "12",
                backgroundColor: "#E3E6E8",
                borderThickness: 0,
                borderColor: "#F6F7F8",
                cornerRadius: 5,
                animationEnabled: true,
                content: "<div style='max-width:400px;' class='wordwrap quote'>{legendText}</div>"
            },
            colorSet: "csopt3",
            title: {
                text: "<?=get_field('title')?>",
                fontFamily: dinFont,
                fontWeight: 800,
                fontSize: 50,
                verticalAlign: "top"
            },
            data: [{
                indexLabelFontSize: 12,
                indexLabelFontFamily: dinFont,
                type: "pie",
                valueFormatString: "#,##0##",
                startAngle: 250,
                showInLegend: false,
                legendText: "{label}",
                dataPoints: [<?=implode(',',$contents)?>]
            }]
        });
        opt3.render();

    });</script>
<?php endif; ?>