<?php
/**
 * GLR
 *
 * Build: post
 */

?>
<article post_class() class="article" role="article" itemscope itemtype="http://schema.org/BlogPosting">
    <figure>
        <img src="<?=get_the_post_thumbnail_url()?>" />
    </figure>

    <div class="excerpt">
        <div class="meta"><?=get_the_author()?> | <?=get_the_date()?></div>
        <a href="<?=get_the_permalink()?>"><?=the_title()?></a>

        <div class="tag"><?=get_the_category()[0]->cat_name?></div>
    </div>
</article>