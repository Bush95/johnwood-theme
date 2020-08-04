<?php
    $footerColumnText   = get_field('footer_column_text', 'theme_settings');
    $address            = get_field('adres','theme_settings');
    $addressLink        = get_field('adres_link','theme_settings');
    $phone              = get_field('phone','theme_settings');
    $validatePhone      = str_replace(" ","", $phone);
    $email              = get_field('email','theme_settings');
    $openingHours       = get_field('opening_hours', 'theme_settings');

    // Social media
    $yt = get_field('youtube', 'theme_settings');
    $fb = get_field('facebook', 'theme_settings');
    $ig = get_field('instagram', 'theme_settings');
?>
    <footer class="page-footer">
        <div class="page-footer__upper">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-4">
                        <a href="<?php echo get_home_url(); ?>" class="page-footer__logo">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/johnwood-logo-white.svg'; ?>" alt="Johnwood.pl logo">
                        </a>
                        <?php if ($footerColumnText): ?>
                            <p class="page-footer__text"><?php echo $footerColumnText; ?></p>
                        <?php endif; ?>

                        <?php if ($address || $phone || $openingHours): ?>
                            <div class="page-footer__contact">
                                <?php if($validatePhone): ?>
                                    <p class="phone"><a href="tel:<?php echo $validatePhone ;?>"><i class="fas fa-phone-alt"></i><?php echo $phone ;?></a></p>
                                <?php endif; ?>
                                <?php if ($openingHours): ?>
                                    <p><i class="far fa-clock"></i><?php echo $openingHours; ?></p>
                                <?php endif; ?>
                                <?php if ($address): ?>
                                    <p><?php if ($addressLink): ?><a href="<?php echo $addressLink; ?>" target="_blank"><?php endif; ?><i class="fas fa-location-arrow"></i><?php echo $address ;?><?php if ($addressLink): ?></a><?php endif; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-auto">
                        <?php 
                            /*
                            $args = array(
                                'taxonomy'   => "product_cat"
                            );
                            $product_categories = get_terms($args);
                            */
                        ?>
                        <h2 class="page-footer__title"><?php the_field('footer_second_col_title', 'theme_settings'); ?></h2>
                        
                        <nav class="page-footer__nav">
                            <?php wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer_menu_upper',
                                        'container'=>false,
                                        'menu_class' => 'page-footer__link-list'
                                    )
                                );
                            ?>
                        </nav>
                        
                        <?php /*
                        <ul class="page-footer__link-list">
                            <?php foreach($product_categories as $category): ?>
                                <li><a href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        */ ?>
                    </div>

                    <div class="col-lg-4">
                        <h2 class="page-footer__title"><a href="<?php echo $ig; ?>" target="_blank">Instagram</a></h2>
                        <?php echo do_shortcode('[instagram-feed]'); ?>


                        <?php if ($yt || $fb || $ig): ?>
                            <ul class="page-footer__social text-right">
                                <?php if ($fb): ?>
                                    <li><a href="<?php echo $fb; ?>" target="_blank" class="fab fa-facebook-square"></a></li>
                                <?php endif; ?>
                                <?php if ($ig): ?>
                                    <li><a href="<?php echo $ig; ?>" target="_blank" class="fab fa-instagram"></a></li>
                                <?php endif; ?>
                                <?php if ($yt): ?>
                                    <li><a href="<?php echo $tw; ?>" target="_blank" class="fab fa-twitter"></a></li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
        
                </div>
            </div>
        </div>

        <div class="page-footer__lower">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="page-footer__copy">
                        &copy; <?php echo date('Y'); ?> johnwood.pl &nbsp; | &nbsp; Realizacja <a href="https://www.todes.pl/">todes.pl</a>
                    </div>
                    <div class="page-footer__copy-links">
                        <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'footer_menu',
                                    'container'=>false
                                )
                            );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>