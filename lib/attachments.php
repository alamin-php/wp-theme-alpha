<?php 
define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen
add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance


function alpha_attachments( $attachments )
{
  $fields         = array(
    array(
    
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'alpha' ),    // label to display
    ),
  );

  $args = array(

    'label'         => 'Featured Slider',
    'post_type'     => array( 'post'),
    'filetype'      =>array('image'),
    'note'          => 'Add slider image',
    'button_text'   => __( 'Attach Files', 'alpha' ),
    'fields'        => $fields,

  );

  $attachments->register( 'slider', $args ); // unique instance name
}

add_action( 'attachments_register', 'alpha_attachments' );

