<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lili Blog
 */

$enable_slider = absint(lili_blog_get_options('lili_blog_enable_slider'));
$enable_box    = lili_blog_get_options('lili_blog_enable_promo');
$enable_header = absint(lili_blog_get_options('lili_blog_enable_top_header'));
$enable_menu   = absint(lili_blog_get_options('lili_blog_enable_top_header_menu'));
$enable_social = absint(lili_blog_get_options('lili_blog_enable_top_header_social'));
$offcanvas     = absint(lili_blog_get_options('lili_blog_enable_offcanvas'));
$search_header = absint(lili_blog_get_options('lili_blog_enable_search'));
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<script src="https://kit.fontawesome.com/2e1f1ade27.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>

<body <?php body_class(); ?>>
<?php
//wp_body_open hook from WordPress 5.2
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}else { 
    do_action( 'wp_body_open' ); 
}
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lili-blog' ); ?></a>
     
     <?php if( 1 == $offcanvas){ ?>
<div class="offCanvasNav canvi-navbar">
    
    <?php if ( is_active_sidebar('offcanvas') ) { ?>
        <div class="offcanvas sidebar">
            <?php dynamic_sidebar('offcanvas'); ?>
        </div>

    <?php }else{ ?> 
    <div class="offcanvas sidebar">
        <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
        <div class="widget widget_categories">
            <h4 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'lili-blog' ); ?></h4>
            <ul>
                <?php
                wp_list_categories( array(
                    'orderby'    => 'count',
                    'order'      => 'DESC',
                    'show_count' => 1,
                    'title_li'   => '',
                    'number'     => 10,
                ) );
                ?>
            </ul>
        </div>
    </div>
    <?php } ?>
</div>
<?php } ?>

<div class="js-canvi-content canvi-content">
    <header class="header-one">
            <?php if( $enable_header == 1 ){ ?>
                <section class="header-top">
                    <div class="container">
                        <?php if( $enable_menu == 1 ) { ?>
                            <div class="left">   
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'top',
                                        'menu_id'        => '',
                                        'container' => 'ul',
                                        'menu_class'      => 'menu'
                                    ) );
                                    ?> 
                            </div>
                        <?php } ?>
                        
                        <?php if( $enable_social == 1 ){ ?>
                            <div class="right">
                                <div class="social-links">
                                    <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'social',
                                            'menu_id'        => 'header-social-menu',
                                            'menu_class'     => 'social-menu',
                                        ) );
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </section>
                <?php } ?>  

        <?php $header_image = esc_url(get_header_image());
        $header_class = ($header_image == "") ? '' : 'header-image';
        ?>
        
        <section class="header-mid <?php echo esc_attr($header_class); ?>" style="background-image:url(<?php echo esc_url($header_image) ?>);">      
            <div class="logo-wrap"> 
                    <?php
                        the_custom_logo();
                        if ( is_front_page() && is_home() ) :
                            ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                    else :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                    endif;
                    $lili_blog_description = get_bloginfo( 'description', 'display' );
                    if ( $lili_blog_description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo $lili_blog_description; /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>          
            </div>

            <nav class="nav-wrap">
                <div class="container">                 
                    <nav id="site-navigation">
                        <?php if( 1 == $offcanvas ){ ?> 
                            <a href="#" class="js-canvi-open-button--left hamburger hamburger--collapse">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </a>
                        <?php } ?>

                        <div class="mid">
                            <button class="toggle-menu"> <?php _e('MENU', 'lili-blog'); ?> </button>
                            <div class="main-nav menu-caret">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                    'container' => 'ul',
                                    'menu_class'      => ''
                                ));
                                ?>
                            </div>
                        </div>

                        <?php if( 1 == $search_header ){ ?>
                            <div class="header-search">
                                <div class="search-wrapper"> 
                                        <button class="sch-btn">
                                            <i class="fa fa-search"></i>
                                            <i class="fa fa-times hide"></i>
                                        </button>  
                                    <div class="search-box">
                                        <?php echo get_search_form(); ?>
                                    </div>              
                                </div>
                            </div>
                        <?php } ?>                      
                    </nav><!-- #site-navigation -->
                </div>
            </nav>
    </setion><!-- #masthead -->
</header>

    <main id="main" class="site-content">

	 <?php if ($enable_slider == 1 && (is_home() || is_front_page())) { ?>
        <section class="slider-wrapper"> 
            <?php do_action('lili_blog_action_slider'); ?> 
        </section>
    <?php } ?>
    
  