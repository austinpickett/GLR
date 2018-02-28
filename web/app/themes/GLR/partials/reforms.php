<div class="reforms">
    <div class="wrapper center-align">
        <img src="<?=assetDir?>/img/reforms.png" />
        <h2><?=CFS()->get('analysis_header')?></h2>
    </div>

    <?php get_search_form() ?>

    <div class="row wrapper">
        <div class="col s12 m8">
            <?php if ($policys = CFS()->get('policys')): ?>
            <div class="policys">
                <?php foreach ($policys AS $policy): ?>
                <div class="policy">
                    <h4><?=$policy['policy_title']?></h4>
                    <strong><?=date('m-d-Y', strtotime($policy['policy_date']))?></strong>

                    <p><?=$policy['policy_copy']?></p>

                    <?php if ($pdf = $policy['policy_pdf']): ?>
                    <a href="<?=$pdf?>" class="download">
                        <img src="<?=assetDir?>/img/pdf.png" />
                        Download PDF
                    </a>
                    <?php endif ?>
                    <hr />
                </div>
                <?php endforeach ?>
            </div>
            <?php endif ?>
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
    </div>
</div>