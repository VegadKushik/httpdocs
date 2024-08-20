<?php
// Image preview when the block is in the list of blocks
if ( $block['data']['preview_image_help'] ) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" alt="">
<?php else:
    // Your block html goes here
    ?>
    <div class="col-xl-5 offset-xl-2 wwl__dropdown-nav">
        <div class="od-dropdown dropdown">
            <button aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" id="dropdown-menu-btn" type="button">Jump to a country profile</button>
            <div aria-labelledby="dropdown-menu-btn" class="dropdown-menu scrollable-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 50px, 0px);">
                <a class="dropdown-item" href="#">Afghanistan</a>
            </div>
        </div>
    </div>
<?php endif; ?>