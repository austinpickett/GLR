<?php
/**
 * GLR
 *
 * Footer
 */
?>

<footer id="footer" itemscope itemtype="http://schema.org/WPFooter">
    <div class="wrapper">
        <img src="<?=assetDir?>/img/logo-stacked.png" />

        <div>
            <p class="copy">Georgians for Lawsuit Reform is an organization focused on ensuring a fair, balanced and efficient civil justice system for all citizens.</p>

            <p class="copyright">&copy; <?=date('Y')?> georgians for lawsuit reform. ALL RIGHTS RESERVED.<a href="javascript:;">privacy & terms</a></p>
        </div>
    </div>
</footer>

<?=BackEnd::getOption('extra-scripts')?>
<?php wp_footer() ?>

<script src="<?=assetDir?>/js/dist/main.js?v=<?=ASSET_VERSION?>"></script>

</body>
</html>