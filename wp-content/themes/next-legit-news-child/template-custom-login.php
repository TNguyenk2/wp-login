<?php
/* 
* Template Name: Custom Login Form
*/
?>

<?php
if (!is_user_logged_in()) {
    if (empty($_GET['redirect_to'])) {
        wp_safe_redirect(home_url() . "/custom-login?login=notyet&redirect_to=" . urlencode(home_url()));
        exit;
    } else {
        get_header();
?>

        <main id="site-content" role="main">
            <div class="post-inner <?php echo is_page_template('templates/template-full-width.php') ? '' : 'thin'; ?> ">

                <div class="entry-content">

                    <?php
                    include_once "custom-login.php";
                    ?>

                </div><!-- .entry-content -->

            </div><!-- .post-inner -->

        </main><!-- #site-content -->

        <?php get_template_part('template-parts/footer-menus-widgets'); ?>

        <?php get_footer(); ?>

    <?php } ?>
<?php } else { ?>
    <?php
    wp_redirect(home_url());
    ?>
<?php }  ?>
