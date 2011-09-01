<div class="comment<?php print ($comment->new) ? ' comment-new' : ''; print ' '. $status; print ' '. $zebra; ?>">

	<?php if ($submitted): ?>
		<span class="submitted"><?php print $submitted; ?></span>
	<?php endif; ?>

	<?php if ($comment->new) : ?>
		<span class="new"><?php print drupal_ucfirst($new) ?></span>
	<?php endif; ?>

	<?php print $user_picture ?>

	<h3><?php print $title ?></h3>

	<div class="content">
		<?php print $content ?>
		<?php if ($signature): ?>
			<?php print $signature ?>
		<?php endif; ?>
	</div>

	<?php if ($links): ?>
		<div class="links"><?php print $links ?></div>
	<?php endif; ?>
</div>
