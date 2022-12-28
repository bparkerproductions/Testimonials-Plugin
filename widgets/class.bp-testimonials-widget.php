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
      BP_TESTIMONIALS_URL . 'assets/css/frontend.css',
      array(),
      BP_TESTIMONIALS_VERSION,
      'all'
    );
  }

  public function form( $instance ) {
    $title = isset( $instance['title'] ) ? $instance['title'] : '';
    $number = isset( $instance['number'] ) ? (int) $instance['number'] : 5;
    $company = isset( $instance['company'] ) ? (bool) $instance['company'] : true;
    $project = isset( $instance['project'] ) ? (bool) $instance['project'] : true;
    $name = isset( $instance['name'] ) ? (bool) $instance['name'] : true;
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

    <p>
      <label for="<?= $this->get_field_id( 'company' ) ?>">
        <?php esc_html_e( 'Show company title', 'bp-testimonials' ); ?>
      </label>
      <input 
        type="checkbox"
        class="checkbox" id="<?= $this->get_field_id( 'company' ) ?>"
        name="<?= $this->get_field_name( 'company' ) ?>"
        <?php checked( $company ) ?>
      />
    </p>

    <p>
      <label for="<?= $this->get_field_id( 'name' ) ?>">
        <?php esc_html_e( 'Show client name', 'bp-testimonials' ); ?>
      </label>
      <input 
        type="checkbox"
        class="checkbox" id="<?= $this->get_field_id( 'name' ) ?>"
        name="<?= $this->get_field_name( 'name' ) ?>"
        <?php checked( $name ) ?>
      />
    </p>

    <p>
      <label for="<?= $this->get_field_id( 'project' ) ?>">
        <?php esc_html_e( 'Show project link', 'bp-testimonials' ); ?>
      </label>
      <input 
        type="checkbox"
        class="checkbox" id="<?= $this->get_field_id( 'project' ) ?>"
        name="<?= $this->get_field_name( 'project' ) ?>"
        <?php checked( $project ) ?>
      />
    </p>

    <?php
  }

  public function widget( $args, $instance ) {
    $default_title = 'BP Testimonials';
    $title = !empty( $instance['title'] ) ? $instance['title'] : $default_title;
    $number = !empty( $instance['number'] ) ? $instance['number'] : 5;
    $company = !empty( $instance['company'] ) ? $instance['company'] : true;
    $company = !empty( $instance['name'] ) ? $instance['name'] : true;
    $company = !empty( $instance['project'] ) ? $instance['project'] : true;

    echo $args['before_widget'];
    echo $args['before_title'] . $title . $args['after_title'];
    require( BP_TESTIMONIALS_PATH . 'views/bp-testimonials_widget.php');
    echo $args['after_widget'];
  }

  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['number'] = $new_instance['number'];
    $instance['company'] = !empty( $new_instance['company'] ) ? 1 : 0;
    $instance['name'] = !empty( $new_instance['name'] ) ? 1 : 0;
    $instance['project'] = !empty( $new_instance['project'] ) ? 1 : 0;
    return $instance;
  }
}