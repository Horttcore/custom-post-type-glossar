<?php
/**
 * Custom Post Type Glossaries Admin
 *
 * @package Custom Post Type Glossaries
 * @author Ralf Hortt
 */
class Custom_Post_Type_Glossaries_Admin
{



	/**
	 * Plugin constructor
	 *
	 * @access public
	 * @since 1.0
	 * @author Ralf Hortt
	 **/
	public function __construct()
	{

		add_filter( 'post_updated_messages', array( $this, 'post_updated_messages' ) );

	} // END __construct


	/**
	 * Update messages
	 *
	 * @access public
	 * @param array $messages Messages
	 * @return array Messages
	 * @since 1.0
	 * @author Ralf Hortt
	 **/
	public function post_updated_messages( $messages )
	{

		$post             = get_post();
		$post_type        = 'glossary';
		$post_type_object = get_post_type_object( $post_type );

		$messages[$post_type] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Glossary updated.', 'custom-post-type-glossaeries' ),
			2  => __( 'Custom field updated.' ),
			3  => __( 'Custom field deleted.' ),
			4  => __( 'Glossary updated.', 'custom-post-type-glossaeries' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Glossary restored to revision from %s', 'custom-post-type-glossaeries' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => __( 'Glossary published.', 'custom-post-type-glossaeries' ),
			7  => __( 'Glossary saved.', 'custom-post-type-glossaeries' ),
			8  => __( 'Glossary submitted.', 'custom-post-type-glossaeries' ),
			9  => sprintf( __( 'Glossary scheduled for: <strong>%1$s</strong>.', 'custom-post-type-glossaeries' ), date_i18n( __( 'M j, Y @ G:i', 'custom-post-type-glossaeries' ), strtotime( $post->post_date ) ) ),
			10 => __( 'Glossary draft updated.', 'custom-post-type-glossaeries' )
		);

		if ( !$post_type_object->publicly_queryable )
			return $messages;

		$permalink = get_permalink( $post->ID );

		$view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View glossary', 'custom-post-type-glossaeries' ) );
		$messages[$post_type][1] .= $view_link;
		$messages[$post_type][6] .= $view_link;
		$messages[$post_type][9] .= $view_link;

		$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
		$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview glossary', 'custom-post-type-glossaeries' ) );
		$messages[$post_type][8]  .= $preview_link;
		$messages[$post_type][10] .= $preview_link;

		return $messages;

	} // END post_updated_messages



} // END class Custom_Post_Type_Glossaries_Admin

new Custom_Post_Type_Glossaries_Admin;
