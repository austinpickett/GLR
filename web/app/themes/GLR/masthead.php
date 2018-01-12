<?php
/**
 * GLR
 *
 * Master Header / Page Header
 */
?>
<?php if ($bgImage = CFS()->get('masthead_bg_image')): ?>
<section id="masthead" role="banner" style="background-image: url(<?=$bgImage?>)">
    <div class="wrapper">
        <p><?=CFS()->get('masthead_copy')?></p>
    </div>

    <div class="cover"></div>
</section>
<?php endif ?>