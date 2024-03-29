
<?php

function osgeo_breadcrumb($breadcrumb) {
	if (!empty($breadcrumb)) {
		return '<div class="breadcrumb">'. $breadcrumb .'</div>';
	}
}

function osgeo_preprocess_comment_wrapper(&$vars) {
	if ($vars['content'] && $vars['node']->type != 'forum') {
		$vars['content'] = '<h2 class="comments">'. t('Comments') .'</h2>'.  $vars['content'];
	}
}

function osgeo_menu_local_tasks() {
	return menu_primary_local_tasks();
}

function osgeo_comment_submitted($comment) {
	return t('!datetime — !username',
		array(
			'!username' => theme('username', $comment),
			'!datetime' => format_date($comment->timestamp)
		));
}

function osgeo_node_submitted($node) {
	return t('!datetime — !username',
		array(
			'!username' => theme('username', $node),
			'!datetime' => format_date($node->created),
		));
}

function osgeo_get_ie_styles() {
	$iecss = '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/ie.css" />';
	return $iecss;
}

 function osgeo_preprocess_page(&$vars) {
	$vars['tabs'] = menu_primary_local_tasks();
	$vars['tabs2'] = menu_secondary_local_tasks();
	if (module_exists('path')) {
		$alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
		if ($alias != $_GET['q']) {
			$suggestions = array();
			$template_filename = 'page';
			foreach (explode('/', $alias) as $path_part) {
				$template_filename = $template_filename . '-' . $path_part;
				$suggestions[] = $template_filename;
			}
			$vars['template_files'] = array_merge((array) $suggestions, $vars['template_files']);
		}
	}
}

function osgeo_links ($links, $attributes = array('class' => 'links')) {
  global $language;
  $output = '';

    if (count($links) > 0) {
     $output = '<ul'. drupal_attributes($attributes) .'>';

     $num_links = count($links);
     $i = 1;

    foreach ($links as $key => $link) {
      $class = $key;

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class .= ' first';
      }
      if ($i == $num_links) {
        $class .= ' last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
          && (empty($link['language']) || $link['language']->language == $language->language)) {
        $class .= ' active';
      }
      $output .= '<li'. drupal_attributes(array('class' => $class)) .'>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $link['i'] = $i;
        $output .= l_2($link['title'], $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span'. $span_attributes .'>'. str_replace('[br]', '<br />', $link['title']) .'</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}

function l_2($text, $path, $options = array()) {
  global $language;
  // Merge in defaults.
  $options += array(
      'attributes' => array('class' => ''),
      'html' => TRUE,
  	   'i'	 => 0
    );

  $options['attributes']['class'] .= ' link'.$options['i'];
  // Remove all HTML and PHP tags from a tooltip. For best performance, we act only
  // if a quick strpos() pre-check gave a suspicion (because strip_tags() is expensive).
 // if (isset($options['attributes']['title']) && strpos($options['attributes']['title'], '<') !== FALSE) {
   // $options['attributes']['title'] = strip_tags($options['attributes']['title']);
  //}
  return '<a href="'. check_url(url($path, $options)) .'"'. drupal_attributes($options['attributes']) .'><span>'. str_replace('[br]', '<br />', $text) .'</span></a>';
}
?>
