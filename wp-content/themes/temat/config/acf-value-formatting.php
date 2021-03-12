<?php
/**
 * Contains escaping and formatting rules for acf fields
 * Should use escaping functions found here: https://developer.wordpress.org/plugins/security/securing-output/
 *
 * @package Temat
 * @since 3
 */

/**
 * Escapes ACF field data as URL
 *
 * @param   [str] $value    Value of URL to be escaped.
 *
 * @return  [str]           URL escaped for output.
 */
function t_acf_esc_url( $value ) {
	return esc_url( $value );
}


/**
 * Escapes ACF field data as HTML attribute content
 *
 * @param   [str] $value    Data to be escaped.
 *
 * @return  [str]           Data escaped for output.
 */
function t_acf_esc_attr( $value ) {
	return esc_attr( $value );
}


/**
 * Escapes ACF field data as HTML code
 *
 * @param   [str] $value    Data to be escaped.
 *
 * @return  [str]           Data escaped for output.
 */
function t_acf_esc_html( $value ) {
	return esc_html( $value );
}


/**
 * Escapes ACF field data as HTML code, allows all HTML that is permitted in post content.
 *
 * @param   [str] $value    Data to be escaped.
 *
 * @return  [str]           Data escaped for output.
 */
function t_acf_wp_kses_post( $value ) {
	return wp_kses_post( $value );
}
