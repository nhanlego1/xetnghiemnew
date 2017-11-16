<?php
/**
 * @file
 * Contains core functions for the Views module support.
 */

/*
 * Implements hook_views_plugins().
 *
 * This function annnounces the style plugin for waterfall views.
 */
function waterfall_views_views_plugins() {
  return array(
    'style' => array(
      // Style plugin for the FlexSlider.
      'waterfall' => array(
        'title' => t('WaterFall'),
        'help' => t('Display the results in a WaterFall widget.'),
        'handler' => 'waterfall_views_plugin_style_waterfall',
        'theme' => 'waterfall_views',
        'theme file' => 'waterfall_views.theme.inc',
        'theme path' => drupal_get_path('module', 'waterfall_views') . '/theme',
        'uses row plugin' => TRUE,
        'uses fields' => TRUE,
        'uses options' => TRUE,
        'type' => 'normal',
        'even empty' => FALSE,
      ),
    ),
  );
}
