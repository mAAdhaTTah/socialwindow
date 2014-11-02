<?php
/**
 * Some helper commands for the Socialwindow theme.
 */
class SocialWindow_Command extends WP_CLI_Command {

  /**
   * Update the link metadata from Embedly.
   * This is useful if you've been using
   * Custom Post Formats UI or Favepersonal.
   *
   * ## OPTIONS
   *
   * <id|all>
   * : The id of the post to update or all of them.
   *
   * ## EXAMPLES
   *
   *     wp socwin update 15
   *     wp socwin update all
   */
  function update( $args, $assoc_args ) {
    list( $arg ) = $args;

    if ( 'all' === $arg ) {
      $posts = get_posts( array(
        'nopaging'         => true,
        'post_type'        => 'post',
        'post_status'      => 'any',
        'suppress_filters' => true
      ) );

      foreach ( $posts as $post ) {

        $this->get_link_meta( $post->ID );
      }

      WP_CLI::success( __("Updated all post link meta.", 'roots' ) );
    } else {
      $this->get_link_meta( $arg );
    }
  }

  function get_link_meta( $post_id ) {
    $link_metas = array(
      '_format_link_url',
      '_format_quote_source_url',
      '_format_video_embed',
      '_format_audio_embed'
    );

    foreach ( $link_metas as $meta ) {
      $url = get_post_meta( $post_id, $meta, true );

      if ( ! empty( $url ) ) {
        try {
          get_embedly_metadata( $post_id, $url );
        } catch( Exception $e ) {
          WP_CLI::warning( __("Failed to update post {$post_id} with error message: ", 'roots' ) . $e->getMessage() );
          sleep(5);
          WP_CLI::line( __( "Retrying post {$post_id}...", 'roots' ) );
          $this->get_link_meta( $post_id );
        }

        WP_CLI::success( __("Updated post: {$post_id}", 'roots' ) );
      }
    }
  }
  /**
   * Sets the Embedly API key.
   *
   * ## OPTIONS
   *
   * <key>
   * : The API key for Embedly.
   *
   * ## EXAMPLES
   *
   *     wp socwin setkey 1234567890
   */
  function setkey( $args, $assoc_args ) {
    list( $key ) = $args;

    update_option( '_embedly_api_key', $key );

    WP_CLI::success( __("Updated Embedly API key", 'roots' ) );
  }
}

WP_CLI::add_command( 'socwin', 'SocialWindow_Command' );
