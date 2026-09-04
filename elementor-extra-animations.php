<?php
/**
 * Elementor Extra Animations — Elementor panel controls.
 * Version: 1.0.0
 *
 * Adds 5 custom entrance animations to Elementor's own Entrance Animation
 * dropdown. Speed/duration/delay are controlled entirely by Elementor's
 * native Motion Effects > Entrance Animation fields — nothing custom to
 * configure. See README.md.
 *
 * Install: WPCode > Add Snippet > PHP Snippet > Run Everywhere.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter(
	'elementor/controls/animations/additional_animations',
	function ( $additional_animations ) {
		$additional_animations['Elementor Extra'] = array(
			'eea-rise'      => esc_html__( 'Rise', 'elementor-extra' ),
			'eea-blur-in'   => esc_html__( 'Blur In', 'elementor-extra' ),
			'eea-scale-up'  => esc_html__( 'Scale Up', 'elementor-extra' ),
			'eea-reveal-up' => esc_html__( 'Reveal Up', 'elementor-extra' ),
			'eea-drift-in'  => esc_html__( 'Drift In', 'elementor-extra' ),
		);

		return $additional_animations;
	}
);
