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
					<li><a href="index.html">Home</a></li>
					<li>
						<a href="">Layouts</a>
						<ul>
							<li><a href="left-sidebar.html">Left Sidebar</a></li>
							<li><a href="right-sidebar.html">Right Sidebar</a></li>
							<li><a href="no-sidebar.html">No Sidebar</a></li>
							<li>
								<a href="">Submenu</a>
								<ul>
									<li><a href="#">Option 1</a></li>
									<li><a href="#">Option 2</a></li>
									<li><a href="#">Option 3</a></li>
									<li><a href="#">Option 4</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="elements.html">Elements</a></li>
					<li><a href="#" class="button special">Sign Up</a></li>
				</ul>
			</nav>
		</header>

		<!-- Main -->
		<div id="main" class="wrapper style1">
			<div class="container">
				<header class="major">
					<h2><?php $this->html( 'title' ) ?></h2>
					<p>Ipsum dolor feugiat aliquam tempus sed magna lorem consequat accumsan</p>
				</header>

				<!-- Text -->
				<section>
					<?php $this->html( 'bodytext' ) ?>
				</section>
			</div>
		</div>

		<!-- Footer -->
		<footer id="footer">
			<ul class="icons">
				<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
				<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
				<li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
			</ul>
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
}