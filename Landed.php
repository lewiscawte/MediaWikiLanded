<?php
/**
 * Landed skin derived from the Landed HTML5 theme and Greyskin skin backend
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup Skins
 * @date 2015
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not a valid entry point.' );
}

# Skin credits that will show up on Special:Version
$wgExtensionCredits['skin'][] = array(
	'path' => __FILE__,
	'name' => 'Landed',
	'version' => '0.9',
	'author' => array( 'Lewis Cawte' ),
	'descriptionmsg' => 'landed-desc',
	'url' => 'https://www.mediawiki.org/wiki/Skin:Landed'
);

$wgValidSkinNames['landed'] = 'Landed';
$wgConfigRegistry['landed'] = 'GlobalVarConfig::newInstance';

$wgAutoloadClasses['SkinLanded'] = __DIR__ . '/Landed.skin.php';
$wgAutoloadClasses['LandedTemplate'] = __DIR__ . '/Landed.template.php';
$wgAutoloadClasses['NestedMenuParser'] = __DIR__ . '/NestedMenuParser.php';
$wgExtensionMessagesFiles['SkinLanded'] = __DIR__ . '/Landed.i18n.php';

$wgResourceModules['skins.landed'] = array(
	'styles' => array(
		'css/skel.css',
		'css/style.css' => array( 'media' => 'screen' ),
		'css/style-xlarge.css' => array( 'media' => '(max-width: 1680px)' ),
		'css/font-awesome.min.css',
		'css/style-large.css' => array( 'media' => '(max-width: 1280px)' ),
		'css/style-medium.css' => array( 'media' => '(max-width: 980px)' ),
		'css/style-small.css' => array( 'media' => '(max-width: 736px)' ),
		'css/style-xsmall.css' => array( 'media' => '(max-width: 480px)' ),
	),
	'scripts' => array(
		'js/jquery.scrolly.min.js',
		'js/jquery.dropotron.min.js',
		'js/jquery.scrollex.min.js',
		'js/skel.min.js',
		'js/skel-layers.min.js',
		'js/init.js',
	),
	'remoteSkinPath' => 'Landed',
	'localBasePath' => __DIR__,
	'position' => 'top'
);
