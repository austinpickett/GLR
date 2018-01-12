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
		<div class="issue-callouts flex-fluid">
			<figure class="issue-callout">
				<img src="<?=assetDir?>/img/legislative.png" />
				
				<figcaption>
					<h4>Legislative</h4>
					<p>Scorecard bills & advocate civil justice issues</p>
				</figcaption>
			</figure>

			<figure class="issue-callout">
				<img src="<?=assetDir?>/img/judicial.png" />
				
				<figcaption>
					<h4>Judicial</h4>
					<p>Scorecard bills & advocate civil justice issues</p>
				</figcaption>
			</figure>

			<figure class="issue-callout">
				<img src="<?=assetDir?>/img/bar.png" />
				
				<figcaption>
					<h4>Bar</h4>
					<p>Scorecard bills & advocate civil justice issues</p>
				</figcaption>
			</figure>

			<figure class="issue-callout">
				<img src="<?=assetDir?>/img/political.png" />
				
				<figcaption>
					<h4>Political</h4>
					<p>Scorecard bills & advocate civil justice issues</p>
				</figcaption>
			</figure>

			<figure class="issue-callout">
				<img src="<?=assetDir?>/img/public-relations.png" />
				
				<figcaption>
					<h4>Public Relations</h4>
					<p>Scorecard bills & advocate civil justice issues</p>
				</figcaption>
			</figure>
		</div>
	</div>

	<div class="news">
		<div class="center-align">
			<img src="<?=assetDir?>/img/news-events.png" />

			<h2>News + Events</h2>

			<div class="articles">
			<?=Template::loop('post')?>
			</div>

			<a href="javascript:;">View All News + Events</a>
		</div>
	</div>
</div>

<?=Template::partial('join-callout.php')?>
</section>

<?php get_footer() ?>