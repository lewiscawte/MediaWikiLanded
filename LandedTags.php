<?php
/**
 * Parser hook-based extension display Landed's content boxes.
 *
 * @file
 * @ingroup Extensions
 * @author Lewis Cawte <lewis@lewiscawte.me>
 * @copyright © 2015 Lewis Cawte
 * @licence GNU General Public Licence 2.0 or later
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301
 * USA
 *
 * @TODO Validate / checks on input etc.
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo "This is a MediaWiki extension.\n";
	exit( 1 );
}

$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
	'name' => 'LandedTags',
	'url' => 'https://www.mediawiki.org/wiki/Extension:YouTube',
	'version' => '0.9',
	'author' => 'Lewis Cawte',
	'descriptionmsg' => 'landedtags-desc',
);

$wgHooks['ParserFirstCallInit'][] = 'landedtag';

function landedTag( &$parser ) {
	$parser->setHook( 'landedtag', 'embedLandedTag' );
	return true;
}

function embedLandedTag( $input, $argv ) {
	$pos = $argv['pos'];
	$effect = $argv['effect'];
	$img = $argv['img'];
	$header = $argv['header'];
	$subtext = $argv['subtext'];

	$out = "<section class=\"spotlight {$pos} {$effect}\">";
	$out .= "<span class=\"image fit main\"><img src=\"{$img}\" alt=\"\" /></span>";
	$out .= "<div class=\"content\"><div class=\"container\"><div class=\"row\">";
	$out .= "<div class=\"4u 12u$(medium)\"><header>";
	$out .= "<h2>{$header}</h2>";
	$out .= "<p>{$subtext}</p>";
	$out .= "</header></div><div class=\"4u 12u$(medium)\">";
	$out .= "<p>{$input}</p>";
	$out .= "</div></div></div></div></section>";

	return $out;
}