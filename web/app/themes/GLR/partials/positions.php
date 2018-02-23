<?
/*
 * Partial: positions
 * 
 */
?>

<div class="row">
    <?php if ($glrPos = CFS()->get('clr_position_copy')): ?>
    <div class="col s6 clr-position">
        <h4>
            <img src="<?=assetDir?>/img/clr-position.png" /> GLR Position
        </h4>

        <?=$glrPos?>
    </div>
    <?php endif ?>
    
    <?php if ($oppPos = CFS()->get('opposition_position_copy')): ?>
    <div class="col s6 opp-position">
        <h4>
            <img src="<?=assetDir?>/img/opp-position.png" /> Opposition Position
        </h4>

        <?=$oppPos?>
    </div>
    <?php endif ?>
</div>