<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the <main> and all content after.
 *
 * @package tink-tank
 */
?>

                </main><!-- .main -->
            </div>
            <div class="grid_col--2 grid_col--oh">
                <?php get_template_part( 'includes/aside' ); ?>
            </div>
        </div><!-- .grid -->

        <footer class="footer"<?php if ( has_nav_menu( 'footer_links' ) ) : ?> role="contentinfo"<?php endif; ?>>
            <?php if ( has_nav_menu( 'footer_links' ) ) : ?>
                <?php wp_nav_menu( array(
                    'container'      => false,
                    'depth'          => 1,
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'menu_class'     => 'footer_links',
                    'theme_location' => 'footer_links'
                ) ); ?>
            <?php endif; // has_nav_menu() ?>

            <p>Carpe Diem</p>
        </footer><!-- .site-footer -->

        <script src="<?php bloginfo( 'template_directory' ); ?>/dist/init.min.js"></script>
        <?php wp_footer(); ?>
    </body>
</html>