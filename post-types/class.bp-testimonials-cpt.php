<?php

if ( !class_exists('BP_Testimonials_Post_Type') ) {
  class BP_Testimonials_Post_Type {
    public function __construct() {
      add_action('init', array( $this, 'create_post_type' ) );
      $this->register_fields();
    }

    public function create_post_type() {
      /* TESTIOMINALS post type */
      register_post_type( 'testimonials',
        [
        'labels' => [
            'name' => __( 'Testimonials' ),
            'singular_name' => __( 'Testimonial' )
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-editor-quote',
        'exclude_from_search' => true
        ]
      );
    }


    /**
     * Register the exported ACF fields for testimonial post types
     */
    public function register_fields() {
      if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
          'key' => 'group_5c834bd9ced66',
          'title' => 'Testimonial Fields',
          'fields' => array(
            array(
              'key' => 'field_5c834be1b8f7e',
              'label' => 'Text',
              'name' => 'text',
              'type' => 'textarea',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'maxlength' => '',
              'rows' => '',
              'new_lines' => '',
            ),
            array(
              'key' => 'field_5c834bf0b8f7f',
              'label' => 'Name',
              'name' => 'name',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_5c834c01b8f80',
              'label' => 'Company',
              'name' => 'company',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_5c834c1cb8f81',
              'label' => 'Classes',
              'name' => 'classes',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'field_5c85febc6b37e',
              'label' => 'Project',
              'name' => 'project',
              'type' => 'relationship',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'post_type' => array(
                0 => 'projects',
              ),
              'taxonomy' => '',
              'filters' => array(
                0 => 'search',
              ),
              'elements' => '',
              'min' => '',
              'max' => '',
              'return_format' => 'id',
            ),
          ),
          'location' => array(
            array(
              array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'testimonials',
              ),
            ),
          ),
          'menu_order' => 0,
          'position' => 'normal',
          'style' => 'default',
          'label_placement' => 'top',
          'instruction_placement' => 'label',
          'hide_on_screen' => array(
            0 => 'the_content',
          ),
          'active' => true,
          'description' => '',
          'show_in_rest' => false,
          'modified' => 1558684574,
        ));
        
        endif;	
    }
  }
}