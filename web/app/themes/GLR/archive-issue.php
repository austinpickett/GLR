<?php
/**
 * GLR
 *
 * Archive Name: Issues
 */

get_header();
the_post();

$terms = get_terms('issue_topic');
?>

<?php if ($bgImage = CFS()->get('masthead_bg_image', ISSUES)): ?>
<section id="masthead" role="banner" style="background-image: url(<?=$bgImage?>)">
    <div class="wrapper">
        <p><?=CFS()->get('masthead_copy', ISSUES)?></p>
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

        if (($heading = CFS()->get('intro_heading', ISSUES)) && 
            ($image = CFS()->get('intro_image', ISSUES))): ?>

        <div class="center-align">
            <img src="<?=$image?>" />

            <h2><?=$heading?></h2>

            <?php if ($shortCopy = CFS()->get('intro_short_copy', ISSUES)): ?>
            <p class="skinny">
                <?=$shortCopy?>
            </p>
            <?php endif;
            
            if ($longCopy = CFS()->Get('intro_long_copy', ISSUES)): ?>
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
                    <?php $pod = pods('issue_topic', $term->term_id); ?>
                    <figure>
                        <img src="<?=wp_get_attachment_url($pod->field('topic_image')['ID'])?>" />
                        <h2><?=$term->name?></h2>
                        <p>
                            <?=$pod->field('topic_description') ?>
                        </p>
                    </figure>


                    <?php
                        $posts = get_posts(array(
                            'post_type' => 'issue',
                            'tax_query' => array(array(
                                'taxonomy' => 'issue_topic',
                                'field' => 'term_id',
                                'terms' => $term->term_id,
                            ))
                        ));
                    ?>
                    <div class="links">
                        <ul>
                            <?php foreach ($posts AS $post): ?>
                            <li>
                                <a href="<?=get_the_permalink($post)?>"><?=get_the_title($post)?> <span>View</span></a>
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