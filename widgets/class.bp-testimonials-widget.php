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

    if ( is_active_widget( false, false, $this->id_base ) ) {
      add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
    }
  }

  public function enqueue() {
    wp_enqueue_style(
      'bp-testimonials-style-css',
      BP_TESTIMONIALS_URL . 'assets/testimonial.css',
      array(),
      BP_TESTIMONIALS_VERSION,
      'all'
    );

    wp_enqueue_script(
      'bp-testimonials-style-js',
      BP_TESTIMONIALS_URL . 'assets/testimonial.js',
      array(),
      BP_TESTIMONIALS_VERSION,
      'all'
    );
  }

  public function form( $instance ) {
    $title = isset( $instance['title'] ) ? $instance['title'] : '';
    $number = isset( $instance['number'] ) ? (int) $instance['number'] : 5;
    ?>

    <p>
      <label for="<?= $this->get_field_id( 'title' ) ?>">
        <?php esc_html_e( 'Title', 'bp-testimonials' ); ?>
      </label>
      <input 
        type="text"
        class="widefat" id="<?= $this->get_field_id( 'title' ) ?>"
        name="<?= $this->get_field_name( 'title' ) ?>"
        value="<?= esc_attr( $title ) ?>"
      />
    </p>

    <p>
      <label for="<?= $this->get_field_id( 'number' ) ?>">
        <?php esc_html_e( 'Number of testimonials to show', 'bp-testimonials' ); ?>
      </label>
      <input 
        type="number"
        class="tiny-text" id="<?= $this->get_field_id( 'number' ) ?>"
        name="<?= $this->get_field_name( 'number' ) ?>"
        step="1"
        min="1"
        value="<?= esc_attr( $number ) ?>"
      />
    </p>
    <?php
  }

  public function widget( $args, $instance ) {
    $default_title = 'BP Testimonials';
    $title = !empty( $instance['title'] ) ? $instance['title'] : $default_title;
    $number = !empty( $instance['number'] ) ? $instance['number'] : 5;

    echo $args['before_widget'];
    require( BP_TESTIMONIALS_PATH . 'views/bp-testimonials_widget.php');
    echo $args['after_widget'];
  }

  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['number'] = $new_instance['number'];
    return $instance;
  }
}