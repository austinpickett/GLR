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
	<div class="center-align">
		<img src="<?=assetDir?>/img/strive.png" />

		<h2>We Strive to Improve</h2>

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
				<div class="article">
					<figure>
						<img src="<?=assetDir?>/img/article-thumbnail.jpg" />
					</figure>

					<div class="excerpt">
						<div class="meta">Matt Rainwaters | 08-16-2017</div>
						<a href="javascript:;">Support Georgians For Lawsuit Reform to help eliminate this type of abuse towards small</a>

						<div class="tag">Business</div>
					</div>
				</div>

				<div class="article">
					<figure>
						<img src="<?=assetDir?>/img/article-thumbnail.jpg" />
					</figure>

					<div class="excerpt">
						<div class="meta">Matt Rainwaters | 08-16-2017</div>
						<a href="javascript:;">Support Georgians For Lawsuit Reform to help eliminate this type of abuse towards small</a>

						<div class="tag">Business</div>
					</div>
				</div>

				<div class="article">
					<figure>
						<img src="<?=assetDir?>/img/article-thumbnail.jpg" />
					</figure>

					<div class="excerpt">
						<div class="meta">Matt Rainwaters | 08-16-2017</div>
						<a href="javascript:;">Support Georgians For Lawsuit Reform to help eliminate this type of abuse towards small</a>

						<div class="tag">Business</div>
					</div>
				</div>
			</div>

			<a href="javascript:;">View All News + Events</a>
		</div>
	</div>

	<div class="join-callout center-align">
		<img src="<?=assetDir?>/img/scale.png" />

		<h2>Join Georgians for Lawsuit Reform</h2>

		<a href="javascript:;" class="btn light-blue">Join Now</a>
	</div>
</div>
</section>

<?php get_footer() ?>