<?php
/**
 * Theme Name: GLR
 * Version: 1.0
 * Author: Austin Pickett
 * Author URI: http://www.austinkpickett.com
 */

get_header();
$term = get_query_var('term');
?>

<!-- MASTHEAD -->
<?php get_template_part('masthead') ?>

<!-- CONTENT -->
<section id="content" role="main">
<div class="the-posts row wrapper news">
	<?php $pod = pods('resource_type', $term); ?>
	<figure class="center-align">
		<img src="<?=wp_get_attachment_url($pod->field('resource_image')['ID'])?>" />
		<h2><?=$term?></h2>
		<p>
			<?=$pod->field('resource_description') ?>
		</p>
	</figure>
</div>

<form class="filters">
<div class="wrapper">	
	<select>
		<option>Sort By All</option>
	</select>
	<select>
		<option>Sort By All</option>
	</select>
	<input type="text" id="search" class="search" name="s" />
</div>
</form>

<div class="row wrapper">
	<div class="col s12 m8">
		<?php
		if (have_posts()):
		while (have_posts()):
			the_post();
			get_template_part('build', 'resource_type');
		endwhile;

		else:
			echo '<p>Sorry, there are no posts at the moment. Please check back again later!</p>';
		endif;
		?>
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
			<a href="/issues/">View All Issues</a>
		</div>
	</div>
</div>
</section>

<?php get_footer() ?>