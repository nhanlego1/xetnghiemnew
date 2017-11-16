<?php
/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */
function healthpress_html_head_alter(&$head_elements)
{
    $head_elements['system_meta_content_type']['#attributes'] = array(
        'charset' => 'utf-8'
    );
}

/**
 * Insert themed breadcrumb page navigation at top of the node content.
 */
function healthpress_breadcrumb($variables)
{
    $breadcrumb = $variables['breadcrumb'];
    if (!empty($breadcrumb)) {
        // Use CSS to hide titile .element-invisible.
        $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
        // comment below line to hide current page to breadcrumb
        $breadcrumb[] = drupal_get_title();
        $output .= '<nav class="breadcrumb">' . implode(' » ', $breadcrumb) . '</nav>';
        return $output;
    }
}

/**
 * Override or insert variables into the page template.
 */
function healthpress_preprocess_page(&$vars)
{
    //add css and Js
    drupal_add_css(drupal_get_path('theme', 'healthpress') . '/css/custom.css');
    drupal_add_css(drupal_get_path('theme', 'healthpress') . '/js/prettyPhoto/css/prettyPhoto.css');
    drupal_add_css(drupal_get_path('theme', 'healthpress') . '/js/flexslider/flexslider.css');
    drupal_add_css(drupal_get_path('theme', 'healthpress') . '/css/jquery.ui.all.css');
    drupal_add_css(drupal_get_path('theme', 'healthpress') . '/css/jquery.ui.theme.css.css');
    drupal_add_css(drupal_get_path('theme', 'healthpress') . '/css/media-queries.css');
    drupal_add_css(drupal_get_path('theme', 'healthpress') . '/style.css');

    //add js
    drupal_add_js(drupal_get_path('theme', 'healthpress') . '/js/prettyPhoto/js/jquery.prettyPhoto.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_js(drupal_get_path('theme', 'healthpress') . '/js/jquery.validate.min.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_js(drupal_get_path('theme', 'healthpress') . '/js/jquery.form.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_js(drupal_get_path('theme', 'healthpress') . '/js/jquery.ui.datepicker.min.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_js(drupal_get_path('theme', 'healthpress') . '/js/jquery.cycle.lite.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_js(drupal_get_path('theme', 'healthpress') . '/js/jquery.easing.1.3.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_js(drupal_get_path('theme', 'healthpress') . '/js/flexslider/jquery.flexslider-min.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_js(drupal_get_path('theme', 'healthpress') . '/js/jquery.isotope.min.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_js(drupal_get_path('theme', 'healthpress') . '/js/custom.js', array('type' => 'file', 'scope' => 'footer'));


    if (isset($vars['main_menu'])) {
        $vars['main_menu'] = theme('links__system_main_menu', array(
            'links' => $vars['main_menu'],
            'attributes' => array(
                'class' => array('links', 'main-menu', 'clearfix'),
            ),
            'heading' => array(
                'text' => t('Main menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
            )
        ));
    } else {
        $vars['main_menu'] = FALSE;
    }
    if (isset($vars['secondary_menu'])) {
        $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
            'links' => $vars['secondary_menu'],
            'attributes' => array(
                'class' => array('links', 'secondary-menu', 'clearfix'),
            ),
            'heading' => array(
                'text' => t('Secondary menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
            )
        ));
    } else {
        $vars['secondary_menu'] = FALSE;
    }
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function healthpress_menu_local_tasks(&$variables)
{
    $output = '';

    if (!empty($variables['primary'])) {
        $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
        $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
        $variables['primary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['primary']);
    }
    if (!empty($variables['secondary'])) {
        $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
        $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
        $variables['secondary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['secondary']);
    }
    return $output;
}

/**
 * Override or insert variables into the node template.
 */
function healthpress_preprocess_node(&$variables)
{
    $node = $variables['node'];
    if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
        $variables['classes_array'][] = 'node-full';
    }
    $variables['date'] = t('!datetime', array('!datetime' => date('j F Y', $variables['created'])));
}

function healthpress_page_alter($page)
{
//  // <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
//  $viewport = array(
//    '#type' => 'html_tag',
//    '#tag' => 'meta',
//    '#attributes' => array(
//    'name' =>  'viewport',
//    'content' =>  'width=device-width, initial-scale=1, maximum-scale=1'
//    )
//  );
//  drupal_add_html_head($viewport, 'viewport');
}