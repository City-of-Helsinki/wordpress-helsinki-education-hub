<?php

/**
 * Registers the `sponsors` post type.
 */
function sponsors_init() {
	register_post_type(
		'sponsor',
		[
			'labels'                => [
				'name'                  => __( 'Sponsors', 'wordpress-helfi-educationhub' ),
				'singular_name'         => __( 'Sponsors', 'wordpress-helfi-educationhub' ),
				'all_items'             => __( 'All Sponsors', 'wordpress-helfi-educationhub' ),
				'archives'              => __( 'Sponsors Archives', 'wordpress-helfi-educationhub' ),
				'attributes'            => __( 'Sponsors Attributes', 'wordpress-helfi-educationhub' ),
				'insert_into_item'      => __( 'Insert into sponsors', 'wordpress-helfi-educationhub' ),
				'uploaded_to_this_item' => __( 'Uploaded to this sponsors', 'wordpress-helfi-educationhub' ),
				'featured_image'        => _x( 'Featured Image', 'sponsors', 'wordpress-helfi-educationhub' ),
				'set_featured_image'    => _x( 'Set featured image', 'sponsors', 'wordpress-helfi-educationhub' ),
				'remove_featured_image' => _x( 'Remove featured image', 'sponsors', 'wordpress-helfi-educationhub' ),
				'use_featured_image'    => _x( 'Use as featured image', 'sponsors', 'wordpress-helfi-educationhub' ),
				'filter_items_list'     => __( 'Filter sponsors list', 'wordpress-helfi-educationhub' ),
				'items_list_navigation' => __( 'Sponsors list navigation', 'wordpress-helfi-educationhub' ),
				'items_list'            => __( 'Sponsors list', 'wordpress-helfi-educationhub' ),
				'new_item'              => __( 'New Sponsors', 'wordpress-helfi-educationhub' ),
				'add_new'               => __( 'Add New', 'wordpress-helfi-educationhub' ),
				'add_new_item'          => __( 'Add New Sponsors', 'wordpress-helfi-educationhub' ),
				'edit_item'             => __( 'Edit Sponsors', 'wordpress-helfi-educationhub' ),
				'view_item'             => __( 'View Sponsors', 'wordpress-helfi-educationhub' ),
				'view_items'            => __( 'View Sponsors', 'wordpress-helfi-educationhub' ),
				'search_items'          => __( 'Search sponsors', 'wordpress-helfi-educationhub' ),
				'not_found'             => __( 'No sponsors found', 'wordpress-helfi-educationhub' ),
				'not_found_in_trash'    => __( 'No sponsors found in trash', 'wordpress-helfi-educationhub' ),
				'parent_item_colon'     => __( 'Parent Sponsors:', 'wordpress-helfi-educationhub' ),
				'menu_name'             => __( 'Sponsors', 'wordpress-helfi-educationhub' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => ['title'],
			'has_archive'           => false,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-admin-post',
			'show_in_rest'          => true,
			'rest_base'             => 'sponsors',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

add_action( 'init', 'sponsors_init' );

/**
 * Sets the post updated messages for the `sponsors` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `sponsors` post type.
 */
function sponsors_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['sponsors'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Sponsors updated. <a target="_blank" href="%s">View sponsors</a>', 'wordpress-helfi-educationhub' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wordpress-helfi-educationhub' ),
		3  => __( 'Custom field deleted.', 'wordpress-helfi-educationhub' ),
		4  => __( 'Sponsors updated.', 'wordpress-helfi-educationhub' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Sponsors restored to revision from %s', 'wordpress-helfi-educationhub' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Sponsors published. <a href="%s">View sponsors</a>', 'wordpress-helfi-educationhub' ), esc_url( $permalink ) ),
		7  => __( 'Sponsors saved.', 'wordpress-helfi-educationhub' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Sponsors submitted. <a target="_blank" href="%s">Preview sponsors</a>', 'wordpress-helfi-educationhub' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Sponsors scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview sponsors</a>', 'wordpress-helfi-educationhub' ), date_i18n( __( 'M j, Y @ G:i', 'wordpress-helfi-educationhub' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Sponsors draft updated. <a target="_blank" href="%s">Preview sponsors</a>', 'wordpress-helfi-educationhub' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
}

add_filter( 'post_updated_messages', 'sponsors_updated_messages' );

/**
 * Sets the bulk post updated messages for the `sponsors` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `sponsors` post type.
 */
function sponsors_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['sponsors'] = [
		/* translators: %s: Number of sponsors. */
		'updated'   => _n( '%s sponsors updated.', '%s sponsors updated.', $bulk_counts['updated'], 'wordpress-helfi-educationhub' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 sponsors not updated, somebody is editing it.', 'wordpress-helfi-educationhub' ) :
						/* translators: %s: Number of sponsors. */
						_n( '%s sponsors not updated, somebody is editing it.', '%s sponsors not updated, somebody is editing them.', $bulk_counts['locked'], 'wordpress-helfi-educationhub' ),
		/* translators: %s: Number of sponsors. */
		'deleted'   => _n( '%s sponsors permanently deleted.', '%s sponsors permanently deleted.', $bulk_counts['deleted'], 'wordpress-helfi-educationhub' ),
		/* translators: %s: Number of sponsors. */
		'trashed'   => _n( '%s sponsors moved to the Trash.', '%s sponsors moved to the Trash.', $bulk_counts['trashed'], 'wordpress-helfi-educationhub' ),
		/* translators: %s: Number of sponsors. */
		'untrashed' => _n( '%s sponsors restored from the Trash.', '%s sponsors restored from the Trash.', $bulk_counts['untrashed'], 'wordpress-helfi-educationhub' ),
	];

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'sponsors_bulk_updated_messages', 10, 2 );
