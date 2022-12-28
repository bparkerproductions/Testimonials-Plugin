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
    $title = 'Testimonials Title';
    $number = 5;
    $company = true;
    $project = true;
    $name = true;
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

  }

  public function update( $new_instance, $old_instance ) {

  }
}