<?php
/**
 * GLR
 *
 * Template Name: About
 */

get_header();
the_post();

$groups = CFS()->get('sub_sections');
?>

<!-- MASTHEAD -->
<?php get_template_part('masthead') ?>

<!-- CONTENT -->
<section id="content" role="main">
<div class="row wrapper">
	<!-- Page -->
	<div id="page" class="col s12" itemprop="MainContentOfPage">
		<div class="center-align">
			<?php foreach ($groups AS $group): ?>
			<img src="<?=$group['subsection_icon']?>" />
			
			<h2><?=$group['subsection_title']?></h2>
			<p class="skinny">
				<?=$group['subsection_copy']?>
			</p>

			<a href="<?=$group['section_link_url']?>" class="btn blue">
				<?=$group['section_link_label']?>
			</a>

			<hr />
			<?php endforeach ?>	
		</div>
	</div>
</div>
<?=Template::partial('join-callout.php')?>
</section>

<?php get_footer() ?>