<?php 
/*Extra Options*/

        $wp_customize->add_section( 'lili_blog_extra_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Breadcrumb Settings', 'lili-blog' ),
            'panel'          => 'lili_blog_panel',
        ) );



        /*Breadcrumb Enable*/
        $wp_customize->add_setting( 'lili-blog-extra-breadcrumb', array(
            'capability'        => 'edit_theme_options',
            'transport' => 'refresh',
            'default'           => $default['lili-blog-extra-breadcrumb'],
            'sanitize_callback' => 'lili_blog_sanitize_checkbox'
        ) );

        $wp_customize->add_control( 'lili-blog-extra-breadcrumb', array(
            'label'     => __( 'Enable Breadcrumb', 'lili-blog' ),
            'description' => __( 'Breadcrumb will appear on all pages except home page. More settings will be on the premium version.', 'lili-blog' ),
            'section'   => 'lili_blog_extra_options',
            'settings'  => 'lili-blog-extra-breadcrumb',
            'type'      => 'checkbox',
            'priority'  => 15,
        ) );