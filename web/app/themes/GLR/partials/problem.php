<?php if ($problem = CFS()->get('problem_copy')): ?>
    <div class="wrapper skinny">
    <div class="issue-problem">
        <div class="center-align">
            <img src="<?=assetDir?>/img/issue-topics.png" />
            <h2>Problem</h2>
        </div>
        <div class="problem-copy">
            <?=CFS()->get('problem_copy'); ?>
        </div>
    </div>
    </div>

    <hr />
<?php endif ?>