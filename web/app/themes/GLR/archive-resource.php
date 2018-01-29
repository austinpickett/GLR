<?php
/**
 * GLR
 *
 * Archive Name: Resources
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
get_header();
the_post();

$terms = get_terms('resource_type');
?>

<?php if ($bgImage = CFS()->get('masthead_bg_image', RESOURCES)): ?>
<section id="masthead" role="banner" style="background-image: url(<?=$bgImage?>)">
    <div class="wrapper">
        <p><?=CFS()->get('masthead_copy', RESOURCES)?></p>
    </div>

    <div class="cover"></div>
</section>
<?php endif ?>

<!-- CONTENT -->
<section id="content" role="main">
<div class="row wrapper">
	<!-- Page -->
	<div id="page" class="col s12" itemprop="MainContentOfPage">
        <?php 

        /*
        * Intro Partial
        */

        if (($heading = CFS()->get('intro_heading', RESOURCES)) && 
            ($image = CFS()->get('intro_image', RESOURCES))): ?>

        <div class="center-align">
            <img src="<?=$image?>" />

            <h2><?=$heading?></h2>

            <?php if ($shortCopy = CFS()->get('intro_short_copy', RESOURCES)): ?>
            <p class="skinny">
                <?=$shortCopy?>
            </p>
            <?php endif;
            
            if ($longCopy = CFS()->Get('intro_long_copy', RESOURCES)): ?>
            <div class="two-col">
                <p class="left-align">
                    <?=$longCopy?>
                </p>
            </div>
            <?php endif ?>
        </div>
        <?php endif ?>

        <div class="center-align">
            <div class="issues">
                <?php foreach ($terms AS $term): ?>
                <div class="issue">
                    <?php $pod = pods('resource_type', $term->term_id); ?>
                    <figure>
                        <img src="<?=wp_get_attachment_url($pod->field('resource_image')['ID'])?>" />
                        <h2><?=$term->name?></h2>
                        <p>
                            <?=$pod->field('resource_description') ?>
                        </p>
                    </figure>


                    <?php
                        $posts = get_posts(
                            array(
                                'post_type' => 'resource',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'resource_type',
                                        'field' => 'term_id',
                                        'terms' => $term->term_id,
                                    )
                                )
                            )
                        );
                    ?>
                    <div class="links">
                        <ul>
                            <?php foreach ($posts AS $post): ?>
                            <li>
                                <a href="<?=get_the_permalink($post)?>"><?=get_the_title($post)?> <span>View</span></a>
                                <small><?=get_the_author_meta('display_name')?>  |  <?=get_the_date('m-d-Y')?></small>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
		</div>
	</div>
</div>
</section>

<?php get_footer() ?>