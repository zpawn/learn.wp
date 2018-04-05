<?php

function wpdev_theme_opts_page () {
    $theme_opts = get_option( 'wpdev_opts' );
?>

    <div class="wrap">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><?php _e('WpDev Theme Settings', 'wpdev'); ?></h3>
            </div>

            <div class="panel-body">
                <form action="admin-post.php" method="post">

                    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_REQUEST['status']) && $_REQUEST['status'] == 1) : ?>
                        <div class="alert alert-success"><?php _e( 'Success!', 'wpdev' ); ?></div>
                    <?php endif; ?>

                    <input type="hidden" name="action" value="wpdev_save_options">
                    <?php wp_nonce_field( 'wpdev_options_verify' ); ?>

                    <h4><?php _e( 'Social Icons', 'wpdev' ); ?></h4>

                    <div class="form-group">
                        <label><?php _e( 'Twitter', 'wpdev' ); ?></label>
                        <input class="form-control" type="text" name="wpdev_inputTwitter" value="<?= $theme_opts['twitter'] ?>">
                    </div>

                    <div class="form-group">
                        <label><?php _e( 'Facebook', 'wpdev' ); ?></label>
                        <input class="form-control" type="text" name="wpdev_inputFacebook" value="<?= $theme_opts['facebook'] ?>">
                    </div>

                    <div class="form-group">
                        <label><?php _e( 'YouTube', 'wpdev' ); ?></label>
                        <input class="form-control" type="text" name="wpdev_inputYoutube" value="<?= $theme_opts['youtube'] ?>">
                    </div>

                    <h4><?php _e( 'Logo', 'wpdev' ); ?></h4>

                    <div class="form-group">
                        <label><?php _e( 'Logo Type', 'wpdev' ); ?></label>
                        <select class="form-control" name="wpdev_inputLogoType">
                            <option value="1" <?php if ($theme_opts['logo_type'] == 1 ) echo 'selected="selected"' ?>><?php _e( 'Site Name', 'wpdev' ); ?></option>
                            <option value="2" <?php if ($theme_opts['logo_type'] == 2 ) echo 'selected="selected"' ?>><?php _e( 'Image', 'wpdev' ); ?></option>
                        </select>
                    </div>
                    
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Logo Image" name="wpdev_inputLogoImg" value="<?= $theme_opts['logo_img'] ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button" id="wpdev_uploadLogoImgBtn"><?php _e( 'Upload', 'wpdev' ); ?></button>
                        </span>
                    </div>

                    <h4><?php _e( 'Footer', 'wpdev' ); ?></h4>

                    <div class="form-group">
                        <label><?php _e( 'Footer Text (HTML Allowed)', 'wpdev' ); ?></label>
                        <textarea class="form-control" name="wpdev_inputFooter"><?= stripslashes_deep( $theme_opts['footer'] ) ?></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><?php _e( 'Save', 'wpdev' ); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
}
