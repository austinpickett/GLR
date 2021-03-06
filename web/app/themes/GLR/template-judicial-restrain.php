<?php
/**
 * GLR
 *
 * Template Name: Judicial Restrain Elections
 * Template Post Type: issue
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
        <div class="col s12 m4 issue-img">
            <img src="<?=assetDir?>/img/legislative-big.png" />
        </div>
        <div class="col s12 m8 issue-intro">
            <h1><?=the_title()?></h1>
            <?=the_content()?>
        </div>
    </div>

    <hr />

    <?=Template::partial('problem.php') ?>

    <?=Template::partial('positions.php') ?>
</div>

<?=Template::partial('reforms.php') ?>

<?=Template::partial('take-action.php') ?>
</section>

<?php get_footer() ?>
