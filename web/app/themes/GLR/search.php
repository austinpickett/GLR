<?php
/**
 * GLR
 *
 * Single post
 */

get_header();
$s = get_search_query();
$args = array('s' => $s);
$the_query = new WP_Query( $args );
?>

<!-- CONTENT -->
<section id="content" role="main">
<div class="the-posts row wrapper news search">
<h2>Search results for: <em><?=get_query_var('s') ?></h2>


<div class="articles">
<?php
if ($the_query->have_posts()):
while ($the_query->have_posts()):
    $the_query->the_post();
    get_template_part('build', get_post_type());
endwhile;

else:
    echo '<p>Sorry, there are no posts at the moment. Please check back again later!</p>';
endif;
?>
</div>
</div>
</section>

<?php get_footer(); ?>