<?php
/**
 * GLR
 *
 * Single post
 */

get_header();
the_post();
?>

<!-- MASTHEAD -->
<?php get_template_part('masthead') ?>

<!-- CONTENT -->
<section id="content" role="main">
<div class="wrapper">
    <div class="row">
        <div class="col s4 issue-img">
            <img src="<?=assetDir?>/img/legislative-big.png" />
        </div>
        <div class="col s8 issue-intro">
            <h1><?=the_title()?></h1>
            <?=the_content()?>
        </div>
    </div>

    <hr />

    <div class="issue-problem">
        <div class="center-align">
            <img src="<?=assetDir?>/img/issue-topics.png" />
            <h2>Problem</h2>
        </div>
        <div class="problem-copy">
            <?=CFS()->get('problem_copy'); ?>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col s6 clr-position">
            <h4>
                <img src="<?=assetDir?>/img/clr-position.png" /> CLR Position
            </h4>

            <?=CFS()->get('clr_position_copy'); ?>
        </div>
        
        <div class="col s6 opp-position">
            <h4>
                <img src="<?=assetDir?>/img/opp-position.png" /> Opposition Position
            </h4>

            <?=CFS()->get('opposition_position_copy'); ?>
        </div>
    </div>
</div>

<div class="join-callout dark-blue" />
    <div class="wrapper center-align">
        <h2>Take Action</h2>
        <p>Lorem ipsum dolor sit amet consectetur<br />adipisicing elit. Aut, provident.</p>
    </div>
</div>

<div class="reforms">
    <div class="wrapper center-align">
        <img src="<?=assetDir?>/img/reforms.png" />
        <h2>Policy Analysis</h2>
    </div>

    <?php get_search_form() ?>

    <div class="row wrapper">
        <div class="col s12 m8">
            <?php if ($policys = CFS()->get('policys')): ?>
            <div class="policys">
                <?php foreach ($policys AS $policy): ?>
                <div class="policy">
                    <h4><?=$policy['policy_title']?></h4>
                    <strong><?=date('m-d-Y', strtotime($policy['policy_date']))?></strong>

                    <p><?=$policy['policy_copy']?></p>

                    <?php if ($pdf = $policy['policy_pdf']): ?>
                    <a href="<?=$pdf?>" class="download">
                        <img src="<?=assetDir?>/img/pdf.png" />
                        Download PDF
                    </a>
                    <?php endif ?>
                    <hr />
                </div>
                <?php endforeach ?>
            </div>
            <?php endif ?>
        </div>

        <div class="col s12 m4">
            <?php if ($resources = CFS()->get('related_resources')): ?>
            <div class="related-resources">
                <h4>Related Resources</h4>
                <ul>
                <?php foreach ($resources AS $resource): ?>
                    <li>
                        <a href="<?=the_permalink($resource)?>">
                            <?=get_post($resource)->post_title?>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <?php endif ?>

            <div class="related-resources view-all">
                <a href="/resources/">View All Resources</a>
            </div>
        </div>
    </div>
</div>
</section>

<?php get_footer() ?>
