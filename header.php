<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Teko:wght@300;400;500&display=swap" rel="stylesheet">
<title><?php wp_title(); ?></title>
<?php wp_head(); ?>
<?php $analyticsTrackingId = get_field('google_analytics_tracking_code', 'theme_settings'); ?>
<script>
    function runAnalytics(trackingID) {
        if (trackingID) {
            (function() {
                var s = document.createElement('script'),
                    sc = document.getElementsByTagName('script')[0];
                s.setAttribute('src','https://www.googletagmanager.com/gtag/js?id=' + trackingID);
                s.setAttribute('async', 'async');

                sc.parentNode.insertBefore(s,sc)
            })();

            window.dataLayer = window.dataLayer || [];

            function gtag(){
                dataLayer.push(arguments);
            }
            
            gtag('js', new Date());
            gtag('config', trackingID);
        }
    }
</script>

<?php if(isset($_COOKIE['acceptCookies']) && $_COOKIE['acceptCookies'] == 'true'): ?>
    <script>
        runAnalytics('<?php echo $analyticsTrackingId; ?>');
    </script>
<?php endif; ?>

</head>

<body <?php body_class(); ?>>
    <?php if (!isset($_COOKIE['acceptCookies']) && $analyticsTrackingId): ?>
        <?php get_template_part('template-parts/blocks/cookie-notice'); ?>

        <script>
            document.body.classList.add('cookie-notice-init');

            setTimeout(function() {
                document.body.classList.add('cookie-notice-open')
            }, 800);

            document.querySelector('.cookies-allow').addEventListener('click', function() {
                document.cookie = "acceptCookies=true;path=/";
                runAnalytics('<?php echo $analyticsTrackingId; ?>');
                document.body.classList.remove('cookie-notice-open');
            }, false);

            document.querySelector('.cookies-deny').addEventListener('click', function() {
                document.cookie = "acceptCookies=false;path=/";
                document.body.classList.remove('cookie-notice-open');
            }, false);
        </script>
    <?php endif; ?>

	<div class="page-navigation">
        <div class="page-navigation__overlay"></div>
		<div class="container">
			<nav class="main-nav">
                <div class="hamburger nav-burger d-lg-none">
                  <div class="burger">
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                  <div class="cross">
                    <span></span>
                    <span></span>
                  </div>
                </div>
                <a href="<?php echo get_home_url(); ?>" class="wp_header_logo" >
                    <img src="<?php echo get_logo_src(); ?>" alt="" class="header-logo-desktop">
                </a>
                <div class="d-lg-flex align-items-lg-center">
                    <div class="page-navigation__nav">
        				<?php wp_nav_menu(
            	            	array(
                                    'theme_location' => 'header_menu',
            	               	    'container'=>false
                                )
                            );
        	        	?>
                        <div class="d-lg-none">
                            <div role="search">
                                <form class="search-form" method="get" id="searchform2" action="/">
                                    <label class="screen-reader-text" for="s2">Szukaj:</label>
                                    <input type="text" value="" name="s" id="s2" placeholder="Szukaj..." />
                                    <button class="submit-btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="icon-search search-trigger"><i class="fa fa-search"></i></div>
                    
                    <div class="hamburger social-burger">
                      <div class="burger">
                        <span></span>
                        <span></span>
                        <span></span>
                      </div>
                      <div class="cross">
                        <span></span>
                        <span></span>
                      </div>
                    </div>
                </div>

                <?php if (get_field('erozrys_link', 'theme_settings')): ?>
                    <a href="<?php the_field('erozrys_link', 'theme_settings'); ?>" target="_blank" title="Przejdź do Erozrys" class="btn btn--erozrys-link">Logowanie do Erozrys</a>
                <?php endif; ?>
	        </nav>
            <div class="search-top-wrapper">
                <div role="search">
                    <form class="search-form" method="get" id="searchform" action="/">
                        <label class="screen-reader-text" for="s">Szukaj:</label>
                        <input type="text" value="" name="s" id="s" placeholder="Szukaj..." />
                        <button class="submit-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <button type="button" class="fa fa-times search-close-button"></button>
            </div>

        </div>
	</div>

    <?php 
        $phone1         = get_field('phone', 'theme_settings');
        $phone2         = get_field('phone_2', 'theme_settings');

        $validatePhone1 = str_replace(" ", "", $phone1);
        $validatePhone2 = str_replace(" ", "", $phone2);
    
        $address        = get_field('adres', 'theme_settings');
        $addressLink    = get_field('adres_link', 'theme_settings');
        $email          = get_field('email', 'theme_settings');

    ?>
    <div class="side-nav">
        <div class="side-nav__inner">
            <div class="side-nav__title-wrap">
                <strong class="side-nav__title"><span>Erozrys</span></strong>
                <div class="hamburger social-bar-close-btn">
                  <div class="cross">
                    <span></span>
                    <span></span>
                  </div>
                </div>
            </div>
            <p><?php the_field('erozrys_text', 'theme_settings'); ?></p>

            <?php if (get_field('erozrys_link', 'theme_settings')): ?>
                <a href="<?php the_field('erozrys_link', 'theme_settings'); ?>" target="_blank" title="Przejdź do Erozrys" class="btn btn--erozrys-link">Logowanie do Erozrys</a>
            <?php endif; ?>
            
            <strong class="side-nav__title">Kontakt</strong>
            <?php if ($phone1): ?>
                <p class="side-nav__link tel"><a href="tel:<?php echo $validatePhone1; ?>"><i class="fas fa-phone-alt"></i><?php echo $phone1; ?></a></p>
            <?php endif; ?>
            <?php if ($phone2): ?>
                <p class="side-nav__link tel"><a href="tel:<?php echo $validatePhone2; ?>"><i class="fas fa-phone-alt"></i><?php echo $phone2; ?></a></p>
            <?php endif; ?>

            <?php if ($address): ?>
                <p class="side-nav__link"><a href="<?php echo $addressLink; ?>"><i class="fas fa-location-arrow"></i><?php echo $address; ?></a></p>
            <?php endif; ?>
            <?php if ($email): ?>
                <p class="side-nav__link"><a href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope"></i><?php echo $email; ?></a></p>
            <?php endif; ?>
        </div>
    </div>