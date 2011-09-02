<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

	<?php print $user_picture; ?>

	<?php print render($title_prefix); ?>
	<?php if (!$page): ?>
		<h2><a href="<?php print	 $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
	<?php endif; ?>

	<?php if ($submitted): ?>
		<span class="submitted"><?php print $submitted; ?></span>
	<?php endif; ?>

	<div class="content">
		<?php print render($content); ?>
	</div>

	<div class="meta">
		<?php //if ($terms): ?>
		<div class="terms"><?php print render($content['terms']); ?></div>
		<?php //endif;?>
	</div>

	<?php if ($links): ?>
	<div class="links"><?php print render($links); ?></div>
	<?php endif; ?>

</div>
