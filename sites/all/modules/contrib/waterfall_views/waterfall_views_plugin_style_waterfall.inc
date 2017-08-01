<?php
/**
 * @file
 * waterfall style plugin for the Views module.
 */

/**
  * Implements a style type plugin for the Views module.
  */
class waterfall_views_plugin_style_waterfall extends views_plugin_style {

  /**
   * Set default options.
   */
  function option_definition() {
    $options = parent::option_definition();
    return $options;
  }

  /**
   * Show a form to edit the style options.
   */
  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
  }

  /**
   * Performs some cleanup tasks on the options array before saving it.
   */
  function options_submit(&$form, &$form_state) {
    $options =& $form_state['values']['style_options'];
  }

  /**
   * Render the display in this style.
   */
  function render() {

    // Group the rows according to the grouping field, if specified.
    $sets = $this->render_grouping($this->view->result, $this->options['grouping']);

    // Render each group separately and concatenate.
    $output = '';

    foreach ($sets as $title => $rows) {
      // Add caption field if chosen.
      
      $output .= theme($this->theme_functions(),
        array(
          'view' => $this->view,
          'options' => $this->options,
          'rows' => $rows,
          'title' => $title
        )
      );
    }

    return $output;
  }
}
