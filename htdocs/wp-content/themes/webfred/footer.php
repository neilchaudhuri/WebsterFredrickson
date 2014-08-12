<div class="clear"></div>
</div>
<footer id="footer" role="contentinfo" style="padding-top: 30px" class="col-lg-12 text-center">
    <div>
        <a href="tel:1-202-659-8510">202-659-8510</a> | <a href="mailto:firm@websterfredrickson.com">firm@websterfredrickson.com</a> | <span class="address">1775 K St. NW Washington, DC  20535</span>
    </div>
    <div id="copyright">
        <?php echo sprintf(__('%1$s %2$s %3$s. All Rights Reserved.', 'blankslate'), '&copy;', date('Y'), esc_html(get_bloginfo('name')));

        echo sprintf(__(' Powered By %1$s.', 'blankslate'), '<a href="http://www.vidyasource.com/">Vidya</a>'); ?>


    </div>
</footer>
</div>
<?php wp_footer(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $('.carousel').carousel()
    });

</script>
</body>
</html>