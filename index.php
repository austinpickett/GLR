<?php
/**
 * Theme Name: replaceMe
 * Version: 1.0
 * Author: Talasan Nicholson
 * Author URI: http://www.nwsco.org
 */

get_header();
?>

<!-- MASTHEAD -->
<?php get_template_part('masthead') ?>

<!-- CONTENT -->
<section id="content" role="main">
<div class="row wrapper">
	<!-- Sidebar -->
	<?php get_sidebar() ?>

	<!-- Page -->
	<div id="page" class="col s12 m8">
	<?php
	if (have_posts()):
	while (have_posts()):
		the_post();
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