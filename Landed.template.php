<?php
/**
* Main skin class
* @ingroup Skins
*/
class LandedTemplate extends BaseTemplate {

	/**
	 * Template filter callback for Landed skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	function execute() {

		$user = $this->getSkin()->getUser();

// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

		$this->html( 'headelement' );
		?>

		<!-- Header -->
		<header id="header">
			<h1 id="logo"><a href="index.html">Landed</a></h1>
			<nav id="nav">
				<ul>
					<?php
						$navigation = $this->doNavigation();

						if ( is_array( $navigation ) && isset( $navigation[0] ) ) {
						$counter = 0;
						foreach ( $navigation[0]['children'] as $level0 ) {
						$hasChildren = isset( $navigation[$level0]['children'] );
						?>
					<li class="page_item<?php echo ( $hasChildren ? ' page_item_has_children' : '' ) ?>">
						<a class="nav<?php echo $counter ?>_link" href="<?php echo $navigation[$level0]['href'] ?>"><?php echo $navigation[$level0]['text'] ?></a>
						<?php if ( $hasChildren ) { ?>
						<ul class="children">
						<?php
							foreach ( $navigation[$level0]['children'] as $level1 ) {
						?>
							<li class="page_item">
								<a href="<?php echo $navigation[$level1]['href'] ?>"><?php echo $navigation[$level1]['text'] ?></a>
								<?php
								if ( isset( $navigation[$level1]['children'] ) ) {
									echo '<ul class="children">';
									foreach ( $navigation[$level1]['children'] as $level2 ) {
								?>
									<li class="page_item">
										<a href="<?php echo $navigation[$level2]['href'] ?>"><?php echo $navigation[$level2]['text'] ?></a>
									</li>
								<?php
									}
									echo '</ul>';
									$counter++;
								}
								?>
							</li>
							<?php
							}
							echo '</ul>';
							$counter++;
						} // hasChildren
						echo '</li>';
						} // top-level foreach
						} // is_array( $navigation )
						?>
				</ul>
			</nav>
		</header>

		<!-- Main -->
		<div id="main" class="wrapper style1">
			<div class="container">
				<header class="major">
					<h2>Elements</h2>
				</header>

				<!-- Text -->
				<section>
					<?php $this->html( 'bodytext' ) ?>
				</section>
			</div>
		</div>

		<!-- Footer -->
		<footer id="footer">
			<?php
			$footerIcons = $this->doFooterSocialMedia();
			if ( $footerIcons !== null && !empty( $footerIcons ) ) {
				echo '<ul class="icons">';
				foreach ( $footerIcons as $icon ) {
					echo $icon;
				}
				echo '</ul>';
			}
			?>
			<ul class="copyright">
				<li>&copy; Untitled. All rights reserved.</li>
				<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
			</ul>
		</footer>

		<?php
		$this->printTrail();
		echo Html::closeElement( 'body' );
		echo Html::closeElement( 'html' );
		wfRestoreWarnings();
	}

	private function doNavigation() {
		$nmp = new NestedMenuParser();
		$nav = $nmp->parseMessage(
			'landed-sidebar',
			array( 10, 10, 10, 10, 10, 10 ),
			60 * 60 * 3
		);

		return $nav;
	}

	private function doFooterSocialMedia() {
		$out = array();

		if( wfMessage( 'Landed-twitter' )->exists() ) {
			$out[] = '<li><a href="//twitter.com/' . wfMessage( 'Landed-twitter' )->plain() . '" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>';
		}
		if( wfMessage( 'Landed-facebook' )->exists() ) {
			$out[] = '<li><a href="//twitter.com/' . wfMessage( 'Landed-facebook' )->plain() . '" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>';
		}
		if( wfMessage( 'Landed-linkedin' )->exists() ) {
			$out[] = '<li><a href="//linkedin.com/' . wfMessage( 'Landed-linkedin' )->plain() . '" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>';
		}
		if( wfMessage( 'Landed-instagram' )->exists() ) {
			$out[] = '<li><a href="//instagram.com/' . wfMessage( 'Landed-instagram' )->plain() . '" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>';
		}
		if( wfMessage( 'Landed-github' )->exists() ) {
			$out[] = '<li><a href="//github.com/' . wfMessage( 'Landed-github' )->plain() . '" class="icon alt fa-github"><span class="label">GitHub</span></a></li>';
		}
		return $out;
	}
}