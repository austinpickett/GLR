<?php
/**
 * replaceMe
 *
 * Footer
 */
?>

<footer id="footer" itemscope itemtype="http://schema.org/WPFooter">
</footer>

<?=BackEnd::getOption('extra-scripts')?>
<?php wp_footer() ?>

<script src="<?=assetDir?>/js/bundle.js?v=<?=ASSET_VERSION?>"></script>

</body>
</html>