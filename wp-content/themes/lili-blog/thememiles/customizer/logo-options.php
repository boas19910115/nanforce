<?php 
/*Logo Section*/
$wp_customize->add_setting( 'lili_blog_logo_width_option', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['lili_blog_logo_width_option'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'lili_blog_logo_width_option', array(
   'label'     => __( 'Logo Width', 'lili-blog' ),
   'description' => __('Adjust the logo width. Minimum is 100px and maximum is 1300px.', 'lili-blog'),
   'section'   => 'title_tagline',
   'settings'  => 'lili_blog_logo_width_option',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 100,
          'max' => 1300,
        ),
) );