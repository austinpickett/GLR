<?php
/**
 * GLR
 *
 * Single post
 */

get_header();
the_post();
?>

<!-- CONTENT -->
<section id="content" role="main">
<div class="row wrapper">
	<figure>
		<img src="<?=get_the_post_thumbnail_url()?>" />
	</figure>

	<h1><?=the_title()?></h1>
	<?=the_content()?>
</div>
</section>

<?php get_footer() ?>
