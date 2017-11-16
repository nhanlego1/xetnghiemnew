<?php

/**
 * @file
 * Theme functions for WaterFall Views
 *
 * @author Nhan Le <nhanlego1@gmail.com>
 */

/**
 * Prepares variables for waterfall views templates.
 *
 * @see waterfall-views.tpl.php.
 */
function template_process_waterfall_views(&$variables) {
  // Only run the preprocessor if it is a view
  if (!empty($variables['view'])) {
    //add js, css to waterfall render
    drupal_add_js(drupal_get_path('module', 'waterfall_views') . '/js/newWaterfall.js');
    drupal_add_js(drupal_get_path('module', 'waterfall_views') . '/js/waterfall_views.js');
    //add css default for waterfall
    drupal_add_css(drupal_get_path('module', 'waterfall_views').'/css/waterfall_views.css');
    // Prepare all data to be passed to theme_waterfall().
    $items = array();
    $view = $variables['view'];

    $row_plugin = $view->style_plugin->row_plugin;

    foreach ($variables['rows'] as $id => $row) {
      // Render the row into a slide
      $view->row_index = $id;
      $item['waterfall'] = $row_plugin->render($row);
      $items[] = $item;
    }
    // Add the items to the variables
    $variables['items'] = $items;
  }
  return $variables;
}
