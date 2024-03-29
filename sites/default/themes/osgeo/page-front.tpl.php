<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDF 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
	<?php print render($page['head'])?>
	<title><?php print render($page['head_title']) ?></title>
	<?php print render($page['styles'])?>
	<?php print render($page['scripts'])?>
	<script type="text/javascript" src="<?php print $base_path . $directory ?>/js/main.js"></script>
	<script type="text/javascript" src="<?php print $base_path . $directory ?>/js/ie-hover.js"></script>
	<!--[if lt IE 8]><?php print phptemplate_get_ie_styles(); ?><![endif]-->
</head>
<body>
	<div id="wrapper">
		<div class="wrapper-holder main-page">
			<div id="header">
				<h1 class="logo"><a href="<?php print $base_path;?>">OSGeo Your Open Source Compass</a></h1>
				<div class="header-holder">
					<?php print str_replace('value=""', 'value="Search"', render($page['header']));?>
					<?php if (isset($primary_links)) : ?>
						<div class="nav-holder">
						<?php print theme('links', $primary_links, array('id' => 'nav')); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div id="main">
				<?php print $main; ?>
				<div class="columns">
					<div class="columns-holder">
						<div class="columns-frame">
							<div class="column-box">
								<div class="column"><?php print render($page['menu1']); ?></div>
								<div class="column"><?php print render($page['menu2']); ?></div>
								<div class="column"><?php print render($page['menu3']); ?></div>
								<div class="column"><?php print render($page['menu4']); ?></div>
								<div class="column"><?php print render($page['menu5']); ?></div>
							</div>
						</div>
					</div>
				</div>
				<?php render($page['bottom']); ?>
			</div>
		</div>
	</div>
</body>
</html>
