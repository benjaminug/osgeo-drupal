<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDF 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
	<?php print render($page['head'])?>
	<title><?php print render($page['head_title']) ?></title>
	<?php print render($page['styles'])?>
	<?php print render($page['scripts'])?>
	<script type="text/javascript" src="<?php print $base_path . $directory ?>/js/main.js"></script>
	<script type="text/javascript" src="<?php print $base_path . $directory ?>/js/ie-hover.js"></script>
	<!--[if lt IE 8]><?php print osgeo_get_ie_styles(); ?><![endif]-->
</head>
<body>
	<div id="wrapper">
		<div class="wrapper-holder">
			<div id="header">
				<h1 class="logo"><a href="<?php print $base_path;?>">OSGeo Your Open Source Compass</a></h1>
				<div class="header-holder">
					<?php print str_replace('value=""', 'value="Search"', render($page['header']));?>
					<?php if (isset($primary_links)) : ?>
						<div class="nav-holder">
						<?php print theme('links', $primary_links, array('id' => 'nav')) ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div id="main">
				<div class="menu-holder">
					<?php print osgeo_links($secondary_menu, array('class' => 'menu')) ?>
				</div>
				<div class="twocolumns">
					<div class="c">
						<div class="twocolumns-holder">
							<div id="sidebar">
								<?php print render($page['left']);  ?>
								<?php print render($page['menu1']); ?>
								<?php print render($page['menu2']); ?>
								<?php print render($page['menu3']); ?>
								<?php print render($page['menu4']); ?>
								<?php print render($page['menu5']); ?>
							</div>
							<div id="content">
								<?php if (render($page['highlighted'])): print '<div id="highlighted">'. render($page['highlighted']) .'</div>'; endif; ?>
								<?php if ($tabs): print '<div id="tabs-wrapper">'; endif; ?>
								<?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
								<?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
								<?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
								<?php if ($show_messages && $messages): print $messages; endif; ?>
								<?php print render($page['help']); ?>
								<?php render($page['content']) ?>
							</div>
						</div>
					</div>
					<div class="b"></div>
				</div>
				<?php render($page['bottom']); ?>
			</div>
		</div>
	</div>
</body>
</html>

