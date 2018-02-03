<?php 
/*
 * Social Data Build
 */
?>

<div class="item">
	<?php if($image = CFS()->get('social_photo')): ?>
	<img src="<?=$image?>" />
    <?php endif ?>
    
    <?php the_content() ?>
    
	
	<div class="social-footer">
		<div class="meta">
			<a href="<?=CFS()->get('social_url')?>">
				<h4>GALawsuitReform</h4>
			</a>
			<span><?=get_the_date()?></span>
		</div>

		<i class="ss-<?=CFS()->get('social_source')?>"></i>
	</div>
</div>