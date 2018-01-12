<?php 

/*
 * Intro Partial
 */

if (($heading = CFS()->get('intro_heading')) && 
    ($image = CFS()->get('intro_image'))): ?>

<div class="center-align">
    <img src="<?=$image?>" />

    <h2><?=$heading?></h2>

    <?php if ($shortCopy = CFS()->get('intro_short_copy')): ?>
    <p class="skinny">
        <?=$shortCopy?>
    </p>
    <?php endif;
    
    if ($longCopy = CFS()->Get('intro_long_copy')): ?>
    <div class="two-col">
        <p class="left-align">
            <?=$longCopy?>
        </p>
    </div>
    <?php endif ?>
</div>
<?php endif ?>