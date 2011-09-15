<?php
// $Id$

/**
 * @file
 * template.php!
 */

/**
 * Override or insert variables into the html template.
 */
function sky_preprocess_html(&$vars) {
  global $theme_path;

  // Add conditional CSS for IE7 and below.
  drupal_add_css($theme_path . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
}

/**
 * Implements template_preprocess_page().
 */
function sky_preprocess_page(&$vars) {
  // Shorten the sidebar variable names.
  $sidebar_1 = $vars['page']['sidebar_first'];
  $sidebar_2 = $vars['page']['sidebar_second'];
  // Grid size for sidebars for 2-column layout.
  $width = 4;
  // Grid size for sidebars for 3-column layout.
  if (!empty($sidebar_1) && !empty($sidebar_2)) {
    $width = 3;
  }
  // Define grid classes for page.tpl.php
  $vars['content_grid_classes'] = sky_ns('grid-16', $sidebar_1, $width, $sidebar_2, $width) . ' ' . sky_ns('push-' . $width, !$sidebar_1,  $width);
  $vars['sidebar_first_grid_classes'] = 'grid-' . $width . ' ' . sky_ns('pull-' . (16 - $width), $sidebar_2, $width);
  $vars['sidebar_second_grid_classes'] = 'grid-' . $width;

  // Add text for unpublished nodes.
  if (isset($vars['node']) && $vars['node']->status == 0) {
    $vars['title'] =  drupal_get_title() . ' <span class="marker">(' . t('Unpublished') . ')</span>';
  }
}

/**
 * Implements template_process_html().
 */
function sky_process_html(&$vars) {
  // Apply color module scheme.
  if (module_exists('color')) {
    _color_html_alter($vars);
  }
}

/**
 * Implements template_preprocess_region().
 */
function sky_preprocess_region(&$vars) {
  // Grid classes.
  if ($vars['region'] == 'header') {
    $vars['classes_array'][] = 'grid-6';
  }
  if ($vars['region'] == 'copyright' || $vars['region'] == 'navigation') {
    $vars['classes_array'][] = 'grid-16';
    $vars['classes_array'][] = 'alpha';
    $vars['classes_array'][] = 'omega';
  }
  if ($vars['region'] == 'collapsible') {
    $vars['classes_array'][] = 'container-16';
  }
}

/**
 * Implements template_preprocess_node().
 */
function sky_preprocess_node(&$vars) {
  // Add decent classes for node titles.
  $vars['title_attributes_array']['class'][] = 'title';
  $vars['title_attributes_array']['class'][] = 'node-title';

  // Add the article ARIA role.
  $vars['attributes_array']['role'] = 'article';
}

/**
 * Implements template_preprocess_block().
 */
function sky_preprocess_block(&$vars) {
  // Add decent classes for block titles.
  $vars['title_attributes_array']['class'][] = 'title';
  $vars['title_attributes_array']['class'][] = 'block-title';

  // Flag the first block in each region.
  if ($vars['block_id'] == 1) {
    $vars['classes_array'][] = 'first';
  }

  // Hide the block titles in the header by default.
  if ($vars['block']->region == 'navigation') {
    $vars['title_attributes_array']['class'][] = 'element-invisible';
  }
}

/**
 * Implements hook_html_head_alter().
 * Overwrite the default meta character type tag with HTML5 version.
 */
function sky_html_head_alter(&$head_elements) {
  // Modify the meta tag for HTML5.
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8',
  );
  // Force IE to always run the latest rendering engine.
  $head_elements['sky_edge_chrome'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array('http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge,chrome=1'),
  );
}

/**
 * Implements hook_css_alter().
 */
function sky_css_alter(&$css) {
  $path = drupal_get_path('theme', 'sky');

  // Remove some core default stylesheets.
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
  unset($css[drupal_get_path('module', 'node') . '/node.css']);
  unset($css[drupal_get_path('module', 'aggregator') . '/aggregator.css']);

  // Use the theme's version of user.css.
  $user_css = drupal_get_path('module', 'user') . '/user.css';
  if (isset($css[$user_css])) {
    $css[$user_css]['data'] = $path . '/css/user.css';
  }
  // Use the theme's version of book.css.
  $book_css = drupal_get_path('module', 'book') . '/book.css';
  if (isset($css[$book_css])) {
    $css[$book_css]['data'] = $path . '/css/book.css';
  }
  // Use the theme's version of search.css.
  $search_css = drupal_get_path('module', 'search') . '/search.css';
  if (isset($css[$search_css])) {
    $css[$search_css]['data'] = $path . '/css/search.css';
  }
  // Use the theme's version of jquery.ui.theme.css.
  if (isset($css['misc/ui/jquery.ui.theme.css'])) {
    $css['misc/ui/jquery.ui.theme.css']['data'] = $path . '/css/jquery.ui.theme.css';
  }
}

/**
 * Implements hook_page_alter().
 */
function sky_page_alter(&$page) {
  // Remove the block template wrapper from the main content block.
  if (!empty($page['content']['system_main'])) {
    $page['content']['system_main']['#theme_wrappers'] = array_diff($page['content']['system_main']['#theme_wrappers'], array('block'));
  }
  // Remove sidebars on administrative pages.
  if (arg(0) == 'admin') {
    unset($page['sidebar_first']);
    unset($page['sidebar_second']);
  }
}

/**
 * Overrides theme_status_messages().
 * Shows the message headers instead of hiding them.
 */
function sky_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= "<div class=\"messages $type\">\n";
    $output .= '<h2 class="message-title">' . t(drupal_ucfirst($type)) . "</h2>\n";
    $output .= '<div class="content">';
    if (count($messages) > 1) {
      $output .= "<ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
    $output .= "</div>\n";
  }
  return $output;
}

/**
 * Overrides theme_field().
 */
function sky_field($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . '&nbsp;</h3>';
  }

  // Render the items.
  $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}


/**
 * Implements hook_theme().
 */
function sky_theme() {
  return array(
    'color_scheme_form' => array(
      'render element' => 'form',
      'path' =>  drupal_get_path('theme', 'sky') . '/templates',
      'template' => 'color-scheme-form',
    ),
  );
}

/**
 * Implements template_preprocess_color_scheme_form().
 */
function sky_preprocess_color_scheme_form(&$variables) {
  $form = $variables['form'];
  $info = $form['info']['#value'];
  $path = drupal_get_path('theme', 'sky') . '/';

  // Add the preview.css file.
  drupal_add_css($path . $info['preview_css'], array('group' => CSS_THEME, 'preprocess' => FALSE));

  // Add the preview.js file.
  $preview_js_path = isset($info['preview_js']) ? $path . $info['preview_js'] : drupal_get_path('module', 'color') . '/' . 'preview.js';
  drupal_add_js($preview_js_path, array('group' => JS_THEME));

  // Create a variable for the preview.html file contents.
  $preview_html_path = DRUPAL_ROOT . '/' . (isset($info['preview_html']) ? $path . '/' . $info['preview_html'] : drupal_get_path('module', 'color') . '/preview.html');
  $variables['preview'] = file_get_contents($preview_html_path);
}

/**
 * Taken from the Ninesixty project to help generate grid classes.
 * @see http://drupal.org/project/ninesixty
 */
function sky_ns() {
  $args = func_get_args();
  $default = array_shift($args);
  // Get the type of class, i.e., 'grid', 'pull', 'push', etc.
  // Also get the default unit for the type to be procesed and returned.
  list($type, $return_unit) = explode('-', $default);

  // Process the conditions.
  $flip_states = array('var' => 'int', 'int' => 'var');
  $state = 'var';
  foreach ($args as $arg) {
    if ($state == 'var') {
      $var_state = !empty($arg);
    }
    elseif ($var_state) {
      $return_unit = $return_unit - $arg;
    }
    $state = $flip_states[$state];
  }
  $output = '';
  // Anything below a value of 1 is not needed.
  if ($return_unit > 0) {
    $output = $type . '-' . $return_unit;
  }
  return $output;
}
