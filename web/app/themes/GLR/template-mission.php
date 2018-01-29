<?php
/**
 * GLR
 *
 * Template Name: Mission
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
		<div class="center-align">
            <div id="mission">
                <img src="<?=CFS()->get('mission_icon')?>" />
                
                <h2><?=CFS()->get('mission_title')?></h2>
                <p class="skinny">
                    <?=CFS()->get('mission_intro_text')?>
                </p>

                <div class="two-col">
                    <p class="left-align">
                        <?=CFS()->get('mission_two_column_text')?>
                    </p>
                </div>
                <hr />
            </div>
            
            <div id="partnerships">
                <img src="<?=CFS()->get('partnership_icon')?>" />
                
                <h2><?=CFS()->get('partnership_title')?></h2>
                <p class="skinny">
                    <?=CFS()->get('partnership_intro_text')?>
                </p>

                <?php if ($groups = CFS()->get('partnership_groups')): ?>
                <div class="groups left-align">

                    <?php foreach ($groups AS $group): ?>
                    <div class="group">
                        <h4><?=$group['group_title']?></h4>

                        <div class="row">
                            <div class="col s12 m6 group-copy">
                                <p>
                                    <?=$group['group_description']?>
                                </p>
                            </div>
                            
                            <?php if ($links = $group['group_links']): ?>
                            <div class="col s12 m4 group-links">
                                <ul>
                                    <?php foreach ($links AS $link): ?>
                                    <li><a href="<?=$link['group_link_url']?>">
                                        <?=$link['group_link_title']?>
                                    </a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <?php endif ?>
            </div>
		</div>
	</div>
</div>
</section>

<?php get_footer() ?>