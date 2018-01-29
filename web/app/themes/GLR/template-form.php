<?php
/**
 * GLR
 *
 * Template Name: Form
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

		<div class="center-align">
            <?php the_content() ?>
		</div>
	</div>
</div>
</section>

<?php get_footer() ?>