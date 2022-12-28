<?php

class BP_Testimonials_Widget extends WP_Widget {
  public function __construct() {
    $options = array(
      'description' => __('A widget to display recent testimonials', 'bp-testimonials')
    );

    parent::__construct(
      'bp-testimonials',
      'BP Testimonials',
      $options
    );

    add_action(
      'widgets_init',
      function() {
        register_widget('Bp_Testimonials_Widget');
      }
    );
  }

  public function form( $instance ) {

  }

  public function widget( $args, $instance ) {

  }

  public function update( $new_instance, $old_instance ) {

  }
}