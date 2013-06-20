<?php

get_header(); ?>

    <!------ TITLE HOME ------>

    <div class="page-404 left">

                <h1>404</h1>
                <h2><?php _e('Looks like the page you we’re looking <br /> for doesn’t exist. Sorry about that.', tk_theme_name); ?></h2>

                <p><?php _e('Check the web address for typos or visit the home page.', tk_theme_name); ?></p>

                <div class="button-404">
                    <a href="index.php">
                        <div class="red">
                            <div class="red-left"></div>
                            <div class="red-center"><a href="<?php echo home_url(); ?>"><?php _e('Home Page', tk_theme_name); ?></a></div>
                            <div class="red-right"></div>
                        </div>
                    </a>
                </div><!--/form-button-->
            </div><!--/page-404-->

<?php get_footer(); ?>