<?php $theme_opts = get_option( 'wpdev_opts' ); ?>

    <footer class="footer">
        <div class="container">
            <?= stripslashes_deep($theme_opts['footer']); ?>
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>
