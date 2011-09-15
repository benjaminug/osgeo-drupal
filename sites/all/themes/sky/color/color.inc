<?php
// $Id$

/**
 * @file
 * Color module integration.
 */

// The preview looks like PURE crap when Sky is not the admin theme and alters
// to change the current theme temporarily have zero effect. Attempting to make
// the preview work with Seven or any other theme for that matter, would be a
// LOT of work that would negatively affect the code quality itself, which I'm
// not willing to do. As a result the preview is only supported when Sky is
// the active theme for that page, so I've created a module to handle this:
// http://drupal.org/project/colortheme

global $theme;
$css = ($theme == 'sky') ? 'color/preview.css' : array();
$js = ($theme == 'sky') ? 'color/preview.js' : array();


$info = array(
  'fields' => array(
    'page_background' => t('Background'),
    'text' => t('Foreground'),
    'site_name' => t('Site name'),
    'site_slogan' => t('Site slogan'),
    'navigation_background' => t('Background'),
    'navigation_foreground' => t('Foreground'),
    'title_page' => t('Page title'),
    'title_block' => t('Block title'),
    'title_linked' => t('Linked titles'),
    'link' => t('Links'),
    'link_hover' => t('Links hover'),
    'tab_background' => t('Background'),
    'tab_foreground' => t('Foreground'),
    'tab_background_active' => t('Background hover'),
    'tab_foreground_active' => t('Foreground hover'),
    'node_links_background' => t('Background'),
    'node_links_foreground' => t('Foreground'),
    'node_links_background_hover' => t('Background hover'),
    'node_links_foreground_hover' => t('Foreground hover'),
    'footer_background' => t('Background'),
    'footer_foreground' => t('Foreground'),
    'footer_links' => t('Links'),
    'footer_links_hover' => t('Links hover'),
    'header_foreground' => t('Foreground'),
    'header_links' => t('Links'),
    'header_links_hover' => t('Links hover'),
  ),
  'schemes' => array(
    'default' => array(
      'title' => t('Vanilla Sky (default)'),
      'colors' => array(
        'page_background' => '#efedea',
        'text' => '#000000',
        'tab_background' => '#fffffe',
        'tab_foreground' => '#101010',
        'tab_background_active' => '#efedeb',
        'tab_foreground_active' => '#111111',
        'site_name' => '#4c4742',
        'site_slogan' => '#837b72',
        'navigation_background' => '#e1dfdc',
        'navigation_foreground' => '#4d453e',
        'title_page' => '#100001',
        'title_block' => '#5e5247',
        'title_linked' => '#100011',
        'link' => '#1c6ea0',
        'link_hover' => '#42a9be',
        'node_links_background' => '#e7e5e3',
        'node_links_foreground' => '#100100',
        'node_links_background_hover' => '#d7d5d3',
        'node_links_foreground_hover' => '#100101',
        'footer_background' => '#e3e1df',
        'footer_foreground' => '#010101',
        'footer_links' => '#126598',
        'footer_links_hover' => '#127ba5',
        'header_foreground' => '#101000',
        'header_links' => '#0679be',
        'header_links_hover' => '#42a9ba',
      ),
    ),
    'blue' => array(
      'title' => t('Blue Sky'),
      'colors' => array(
        'page_background' => '#195594',
        'text' => '#000000',
        'tab_background' => '#eeeeee',
        'tab_foreground' => '#000000',
        'tab_background_active' => '#ededed',
        'tab_foreground_active' => '#000000',
        'site_name' => '#ffffff',
        'site_slogan' => '#ffffff',
        'navigation_background' => '#5d9dd0',
        'navigation_foreground' => '#ffffff',
        'title_page' => '#100001',
        'title_block' => '#888888',
        'title_linked' => '#000000',
        'link' => '#2897d7',
        'link_hover' => '#1473d7',
        'node_links_background' => '#eeeeee',
        'node_links_foreground' => '#000002',
        'node_links_background_hover' => '#aaaaaa',
        'node_links_foreground_hover' => '#000003',
        'footer_background' => '#eeeeee',
        'footer_foreground' => '#000000',
        'footer_links' => '#2897d7',
        'footer_links_hover' => '#1473d7',
        'header_foreground' => '#ffffff',
        'header_links' => '#78bbe2',
        'header_links_hover' => '#42a9be',
      ),
    ),
    'purple' => array(
      'title' => t('Purple'),
      'colors' => array(
        'page_background' => '#382d49',
        'text' => '#000000',
        'tab_background' => '#efedea',
        'tab_foreground' => '#000000',
        'tab_background_active' => '#382d48',
        'tab_foreground_active' => '#ffffff',
        'site_name' => '#ffffff',
        'site_slogan' => '#ccbcd2',
        'navigation_background' => '#ada2b4',
        'navigation_foreground' => '#000000',
        'title_page' => '#5f3276',
        'title_block' => '#666666',
        'title_linked' => '#482762',
        'link' => '#4f1b88',
        'link_hover' => '#8e45d3',
        'node_links_background' => '#ddd6e0',
        'node_links_foreground' => '#000000',
        'node_links_background_hover' => '#d7d5d3',
        'node_links_foreground_hover' => '#000000',
        'footer_background' => '#4a3f5a',
        'footer_foreground' => '#f8f2f2',
        'footer_links' => '#b195b0',
        'footer_links_hover' => '#42a9be',
        'header_foreground' => '#cccccc',
        'header_links' => '#997da6',
        'header_links_hover' => '#42a9be',
      ),
    ),
    'red' => array(
      'title' => t('Red'),
      'colors' => array(
        'page_background' => '#a21a2e',
        'text' => '#000000',
        'tab_background' => '#fffffe',
        'tab_foreground' => '#101010',
        'tab_background_active' => '#efedeb',
        'tab_foreground_active' => '#111111',
        'site_name' => '#ffffff',
        'site_slogan' => '#ffffff',
        'navigation_background' => '#8a0509',
        'navigation_foreground' => '#ffffff',
        'title_page' => '#000000',
        'title_block' => '#999999',
        'title_linked' => '#000000',
        'link' => '#cf3f54',
        'link_hover' => '#42a9be',
        'node_links_background' => '#e7e5e3',
        'node_links_foreground' => '#54493e',
        'node_links_background_hover' => '#d7d5d3',
        'node_links_foreground_hover' => '#42382e',
        'footer_background' => '#8a0509',
        'footer_foreground' => '#ffffff',
        'footer_links' => '#aaaaaa',
        'footer_links_hover' => '#42a9be',
        'header_foreground' => '#ffffff',
        'header_links' => '#aaaaaa',
        'header_links_hover' => '#42a9be',
      ),
    ),
  ),

  // Misc settings.
  'css' => array('css/colors.css'),
  'base_image' => 'color/base.png',
  'blend_target' => '#ffffff',
  'copy' => array('logo.png'),

  // Preview files.
  'preview_css' => $css,
  'preview_js' => $js,
  'preview_html' => 'color/preview.html',

  // Unused.
  'gradients' => array(),
  'fill' => array(),
  'slices' => array(),
);

