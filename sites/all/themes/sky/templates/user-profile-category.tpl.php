<?php
// $Id$
/**
 * @file
 * Output for user profile categories.
 */
?>
<?php if ($title) : ?>
  <h2><?php print $title; ?></h2>
<?php endif; ?>

<dl<?php print $attributes; ?>>
  <?php print $profile_items; ?>
</dl>
