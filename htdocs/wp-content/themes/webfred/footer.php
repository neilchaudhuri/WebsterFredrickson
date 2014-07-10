<div class="clear"></div>
</div>
<footer id="footer" role="contentinfo">
    <div id="copyright">
        <?php echo sprintf(__('%1$s %2$s %3$s. All Rights Reserved.', 'blankslate'), '&copy;', date('Y'), esc_html(get_bloginfo('name')));
        echo sprintf(__(' Theme By: %1$s.', 'blankslate'), '<a href="http://tidythemes.com/">TidyThemes</a>'); ?>
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