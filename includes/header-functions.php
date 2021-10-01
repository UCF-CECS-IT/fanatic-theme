<?php

/**
 * Filter callback function that checks if the query is for a Course Archive.
 * If so, it updates the header_type to the archive type.
 *
 * @since 0.2.0
 * @param string $headerType
 * @param mixed $obj	-	WP_Post or WP_Term object
 * @return string
 */
function fan_header_type( $headerType, $obj ) {

	global $wp_query;

	if ($wp_query->is_archive && $obj->name == 'course') {
		$headerType = 'archive';

	}

	return $headerType;
}

add_filter( 'ucfwp_get_header_type', 'fan_header_type', 10, 2 );
