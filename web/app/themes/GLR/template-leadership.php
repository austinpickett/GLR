<?php
/**
 * GLR
 *
 * Template Name: Leadership
 */

get_header();
the_post();
?>

<!-- MASTHEAD -->
<?php get_template_part('masthead') ?>

<!-- CONTENT -->
<section id="content" role="main">
<div class="row wrapper">
	<!-- Page -->
	<div id="page" class="col s12" itemprop="MainContentOfPage">
        <?=Template::partial('intro.php') ?>
        <hr />
        
        <div class="center-align">
            <?php if ($leaders = CFS()->get('leaders')): ?>
            <div class="leaders">
                <?php foreach ($leaders AS $leader): ?>
                <figure>
                    <img src="<?=$leader['leader_image']?>" />

                    <figcaption>
                        <h3><?=$leader['leader_name']?></h3>
                        <strong><?=$leader['leader_title']?></strong>

                        <p><?=$leader['leader_copy']?></p>

                        <?php if ($email = $leader['leader_email']): ?>
                        <a href="mailto:<?=$email?>">
                            <?=FrontEnd::svg('mail-icon')?>
                        </a>
                        <?php endif ?>
                    </ficaption>
                </figure>
                <?php endforeach ?>
            </div>
            <?php endif ?>
		</div>
	</div>
</div>
</section>

<?php get_footer() ?>