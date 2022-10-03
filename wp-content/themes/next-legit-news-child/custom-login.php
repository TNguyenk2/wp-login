<div class="tab_container_login">
    <div id="tab1_login" class="tab_content_login">
        <h3>Bạn đã có tài khoản?</h3>

        <?php
        if (isset($_GET['login']) && $_GET['login'] == 'notyet') {
        ?>
            <div id="login-error" class="border-5px login" style="background-color: #f2dede;border:1px solid #ebccd1;color:#a94442;padding:10px;margin-bottom: 20px">
                <p style="margin:0;">Bạn cần phải đăng nhập !</p>
            </div>
        <?php
        }
        if (isset($_GET['login']) && $_GET['login'] == 'failed') {
        ?>
            <div id="login-error" class="border-5px" style="background-color: #f2dede;border:1px solid #ebccd1;color: #a94442;padding:10px;margin-bottom: 20px">
                <p style="margin:0;">Thất bại: username hoặc password không đúng. Vui lòng thử lại !</p>
            </div>
        <?php
        }
        if (isset($_GET['login']) && $_GET['login'] == 'token_error') { ?>
            <div id="login-error" class="border-5px" style="background-color: #dff0d8;border:1px solid #d6e9c6; color:#468847; padding:10px;margin-bottom: 20px">
                <p style="margin:0;">Session hết hạn. Vui lòng thử lại !</p>
            </div>
        <?php
        }
        ?>
        <form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
            <div class="username">
                <label for="user_login"><?php _e('Username'); ?>: </label>
                <input type="text" name="log" value="<?php echo $_REQUEST['log'] ?>" />
            </div>
            <div class="password">
                <label for="user_pass"><?php _e('Password'); ?>: </label>
                <input type="password" name="pwd" value="" size="20" id="user_pass" />
            </div>
            <div class="login_fields">
                <?php do_action('login_form'); ?>
                <input type="submit" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14" class="user-submit login-button border-5px" />
                <input type="hidden" name="redirect_to" value="<?php echo $_GET['redirect_to']; ?>" />
                <input type="hidden" name="user-cookie" value="1" />
                <input type="hidden" name="custom_login" value="1" />
                <input type="hidden" name="custom_token_login" value="<?php echo wp_create_nonce('custom_nonce') ?>">
            </div>
        </form>
    </div>
</div>