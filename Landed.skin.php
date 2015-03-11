<?php
/**
 * Landed.
 *
 * @file
 * @ingroup Skins
 * @author Lewis Cawte
 * @date 2015
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( -1 );
}

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @ingroup Skins
 */
class SkinLanded extends SkinTemplate {
	public $skinname = 'landed', $stylename = 'landed',
		$template = 'LandedTemplate', $useHeadElement = true;

	/**
	 * @param $out OutputPage
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );

		# Add css
		$out->addModuleStyles( 'skins.landed' );
		$out->addModuleScripts( 'skins.landed' );
	}
}
