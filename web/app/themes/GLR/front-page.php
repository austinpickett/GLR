<?php
/**
 * GLR
 *
 * Front page
 */

get_header();
?>

<!-- MASTHEAD -->
<?php get_template_part('masthead') ?>

<!-- CONTENT -->
<section id="content" role="main" itemprop="MainContentOfPage">
<div class="wrapper">
	<?=Template::partial('intro.php') ?>
	
	<div class="center-align">
		<?php if ($callouts = CFS()->get('callout')): ?>
		<div class="issue-callouts flex-fluid">
			<?php foreach ($callouts AS $callout): ?>
			<figure class="issue-callout">
				<img src="<?=$callout['callout_image']?>" />
				
				<figcaption>
					<h4><?=$callout['callout_title']?></h4>
					<p><?=$callout['callout_short_desc']?></p>
				</figcaption>
			</figure>
			<?php endforeach ?>
		</div>
		<?php endif ?>
	</div>

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

<?=Template::partial('join-callout.php')?>
</section>

<div class="social-feed">
	<div class="wrapper">
		<div class="feed">
			<?php
			Template::loop('social', [
				'post_type' => 'social',
				'posts_per_page' => 8,
			]);
			?>
		</div>
	</div>
</div>

<?php get_footer() ?>