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
<div class="row wrapper">
	<figure class="news-featured-image">
		<img src="<?=get_the_post_thumbnail_url()?>" />

        <div class="tag"><?=get_the_category()[0]->cat_name?></div>
	</figure>

	<div class="article single-article">
		<div class="meta"><?=get_the_author()?> | <?=get_the_date()?></div>
		<h1><?=the_title()?></h1>
		<?=the_content()?>
	</div>

	<div class="center-align">
		<a href="javascript:;" class="share">Share Article</a>
	</div>

	<hr />

	<div class="news">
		<div class="center-align">
			<img src="<?=assetDir?>/img/news-events.png" />

			<h2>News + Events</h2>

			<div class="articles">
				<?=Template::loop('post', [])?>
			</div>

			<a href="/news/" class="view-all">View All News + Events</a>
		</div>
	</div>
</div>
</section>

<?php get_footer() ?>
