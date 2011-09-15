<?php
// $Id$
/**
 * @file
 * Output for the color scheme form.
 */
?>
<?php $form['scheme']['#title'] = t('Color scheme'); ?>
<?php print render($form['scheme']); ?>
<div class="color-form clearfix">
  <div id="palette">
    <div class="grid-6 alpha">
      <fieldset>
        <legend><span class="fieldset-legend"><?php print t('Base colors') ?></span></legend>
        <div class="fieldset-wrapper">
          <?php print render($form['palette']['page_background']); ?>
          <?php print render($form['palette']['text']); ?>
          <?php print render($form['palette']['link']); ?>
          <?php print render($form['palette']['link_hover']); ?>
        </div>
      </fieldset>
      <fieldset>
        <legend><span class="fieldset-legend"><?php print t('Titles') ?></span></legend>
        <div class="fieldset-wrapper">
          <?php print render($form['palette']['site_name']); ?>
          <?php print render($form['palette']['site_slogan']); ?>
          <?php print render($form['palette']['title_page']); ?>
          <?php print render($form['palette']['title_block']); ?>
          <?php print render($form['palette']['title_linked']); ?>
        </div>
      </fieldset>
      <fieldset>
        <legend><span class="fieldset-legend"><?php print t('Main navigation') ?></span></legend>
        <div class="fieldset-wrapper">
          <?php print render($form['palette']['navigation_background']); ?>
          <?php print render($form['palette']['navigation_foreground']); ?>
        </div>
      </fieldset>
      <fieldset>
        <legend><span class="fieldset-legend"><?php print t('Footer') ?></span></legend>
        <div class="fieldset-wrapper">
          <?php print render($form['palette']['footer_background']); ?>
          <?php print render($form['palette']['footer_foreground']); ?>
          <?php print render($form['palette']['footer_links']); ?>
          <?php print render($form['palette']['footer_links_hover']); ?>
        </div>
      </fieldset>
    </div>

    <div class="grid-6 push-4 omega">
      <fieldset>
        <legend><span class="fieldset-legend"><?php print t('Header') ?></span></legend>
        <div class="fieldset-wrapper">
          <?php print render($form['palette']['header_foreground']); ?>
          <?php print render($form['palette']['header_links']); ?>
          <?php print render($form['palette']['header_links_hover']); ?>
        </div>
      </fieldset>
      <fieldset>
        <legend><span class="fieldset-legend"><?php print t('Tab navigation') ?></span></legend>
        <div class="fieldset-wrapper">
          <?php print render($form['palette']['tab_background']); ?>
          <?php print render($form['palette']['tab_foreground']); ?>
          <?php print render($form['palette']['tab_background_active']); ?>
          <?php print render($form['palette']['tab_foreground_active']); ?>
        </div>
      </fieldset>
      <fieldset>
        <legend><span class="fieldset-legend"><?php print t('Node/comment links') ?></span></legend>
        <div class="fieldset-wrapper">
          <?php print render($form['palette']['node_links_background']); ?>
          <?php print render($form['palette']['node_links_foreground']); ?>
          <?php print render($form['palette']['node_links_background_hover']); ?>
          <?php print render($form['palette']['node_links_foreground_hover']); ?>
        </div>
      </fieldset>
    </div>
  </div>
</div>
<?php print drupal_render_children($form); ?>
<?php print $preview; ?>