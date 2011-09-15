<?php
// $Id$
/**
 * @file
 * Output for individual aggregator feed item markup.
 */
?>
<article class="feed-item clearfix">
  <header>
    <h2 class="title feed-item-title"><a href="<?php print $feed_url; ?>"><?php print $feed_title; ?></a></h2>
    <div class="meta feed-item-meta">
      <?php if ($source_url) : ?>
        <a href="<?php print $source_url; ?>" class="feed-item-source"><?php print $source_title; ?></a> &ndash;
      <?php endif; ?>
      <span class="feed-item-date"><?php print $source_date; ?></span>
      <?php if ($categories) : ?>
        <span class="tags feed-item-categories">
          <h3 class="field-label"><?php print t('Categories'); ?>:</h3> <?php print implode(', ', $categories); ?>
      </span>
      <?php endif ;?>
    </div>
  </header>
  <?php if ($content) : ?>
  <div class="content clearfix feed-item-body">
    <?php print $content; ?>
  </div>
<?php endif; ?>
</article>
