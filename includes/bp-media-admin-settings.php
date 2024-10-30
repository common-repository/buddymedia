<?php

/**
 * The bp_media_admin_settings function.
 */
function bp_media_admin_settings() {

    /* This is how you add a new section to BuddyPress settings */
    add_settings_section(
        /* the id of your new section */
        'bp_media_section',

        /* the title of your section */
        __( 'Media Settings',  'bp-media' ),

        /* the display function for your section's description */
        'bp_plugin_setting_callback_section',

        /* BuddyPress settings */
        'buddypress'
    );

    /* This is how you add a new field to your plugin's section */
    add_settings_field(
        /* the option name you want to use for your plugin */
        'bp-media-shared-gallery',

        /* The title for your setting */
        __( 'Shared Galleries', 'bp-media' ),

        /* Display function */
        'bp_media_setting_field_callback',

        /* BuddyPress settings */
        'buddypress',

        /* Your plugin's section id */
        'bp_media_section'
    );

    /*
       This is where you add your setting to BuddyPress ones
       Here you are directly using intval as your validation function
    */
    register_setting(
        /* BuddyPress settings */
        'buddypress',

        /* the option name you want to use for your plugin */
        'bp-media-shared-gallery',

        /* the validatation function you use before saving your option to the database */
        'intval'
    );

}
add_action( 'bp_register_admin_settings', 'bp_media_admin_settings', 999 );


/**
 * The bp_plugin_setting_callback_section function.
 */
function bp_plugin_setting_callback_section() {
    ?>
    <p class="description"><?php _e( 'Media Component Settings', 'bp-media' );?></p>
    <?php
}


/**
 * The bp_media_setting_field_callback function.
 */
function bp_media_setting_field_callback() {

    $bp_media_shared_gallery = bp_get_option( 'bp-media-shared-gallery' );
    ?>
    <input id="bp-media-shared-gallery" name="bp-media-shared-gallery" type="checkbox" value="1" <?php checked( $bp_media_shared_gallery ); ?> />
    <label for="bp-media-shared-gallery"><?php _e( 'Allow shared media galleries.', 'bp-media' ); ?></label>
    <p class="description"><?php _e( 'Shared galleries allow users to contribute to the same gallery.', 'bp-media' ); ?></p>
    <?php
}
