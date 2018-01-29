<?php
/**
 * Theme Name: GLR
 * Version: 1.0
 * Author: Austin Pickett
 * Author URI: http://www.austinkpickett.com
 */

get_header();
$query = new WP_Query(array(
	'posts_per_page' => 1,
))
?>

<!-- MASTHEAD -->
<?php get_template_part('masthead') ?>

<!-- CONTENT -->
<section id="content" role="main">
<div class="the-posts row wrapper news">
	<div class="center-align">
		<img src="<?=assetDir?>/img/news-events.png" />
		<h1>News + Events</h1>
	</div>

	<div class="articles">
	<?php
	if ($query->have_posts()):
	while ($query->have_posts()):
		$query->the_post();
		get_template_part('build', get_post_type());
	endwhile;

	else:
		echo '<p>Sorry, there are no posts at the moment. Please check back again later!</p>';
	endif;
	?>
	</div>
</div>

<?php get_search_form() ?>

<div class="the-posts row wrapper news">
	<div>
	<?php
	$query = new WP_Query(array(
		'offset' => 1,
	));
	if ($query->have_posts()):
	while ($query->have_posts()):
		$query->the_post();
		get_template_part('build', get_post_type());
	endwhile;

	else:
		echo '<p>Sorry, there are no posts at the moment. Please check back again later!</p>';
	endif;
	?>
	</div>
</div>
</section>

<?php get_footer() ?>