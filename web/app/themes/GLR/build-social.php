<?php 
/*
 * Social Data Build
 */
?>

<div class="item">
	<?php if($image = CFS()->get('photo')): ?>
	<img src="<?=$image?>" />
    <?php endif ?>
    
    <?php the_content() ?>
    
	<a href="<?=CFS()->get('url')?>">
		<h4>GALawsuitReform</h4>
    </a>
    
	<div class="meta">
		<span><?=get_the_date()?></span>
		<i class="<?=CFS()->get('source')?>"></i>
	</div>
</div>