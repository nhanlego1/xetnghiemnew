<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $display_submitted: whether submission information should be displayed.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>
<?php if (!$page): ?>
  <header>
<?php endif; ?>
<?php print render($title_prefix); ?>
<?php if (!$page): ?>
  <h2 class="title" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a>
  </h2>
<?php endif; ?>
<?php print render($title_suffix); ?>

<?php if (isset($node->field_author[LANGUAGE_NONE])): ?>
  <ul class="meta clr clearfix">
    <li><i class="fa fa-clock-o"></i> <span><?php print $date; ?></span></li>
    <li><i class="fa fa-user"></i> <span><?php print $node->field_author[LANGUAGE_NONE][0]['value']; ?></span></li>
  </ul>
<?php endif; ?>

<?php if (!$page): ?>
  </header>
<?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
      <?php
      // Hide comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
      ?>
      <?php if ($node->field_price_item[LANGUAGE_NONE][0]['value'] > 0): ?>
          <?php foreach ($node->field_price_item[LANGUAGE_NONE] as $pr): ?>
              <?php $price = entity_load('field_collection_item', array($pr['value'])); ?>
              <?php $price = reset($price); ?>
          <div class="price-item">
              <?php if (isset($price->field_title[LANGUAGE_NONE])): ?>
                <div class="price-title"><?php print $price->field_title[LANGUAGE_NONE][0]['value'] ?></div>
              <?php endif; ?>
              <?php if (isset($price->field_description[LANGUAGE_NONE])): ?>
                <div class="description-price"><?php print $price->field_description[LANGUAGE_NONE][0]['value'] ?></div>
              <?php endif; ?>
              <?php if (isset($price->field_prices[LANGUAGE_NONE])): ?>
                <table class="adn-price">
                    <?php if ($price->field_prices[LANGUAGE_NONE][0]['value'] > 0): ?>
                        <?php foreach ($price->field_prices[LANGUAGE_NONE] as $key => $it): ?>
                            <?php $items = entity_load('field_collection_item', array($it['value'])) ?>
                            <?php $item = reset($items); ?>
                            <?php if ($key == 0): ?>
                          <thead>
                          <?php if (!empty($item->field_price_info[LANGUAGE_NONE][0]['value'])): ?>
                          <th><?php print $item->field_price_info[LANGUAGE_NONE][0]['value'] ?></th>
                        <?php endif; ?>
                          <?php if (!empty($item->field_price1[LANGUAGE_NONE][0]['value'])): ?>
                          <th><?php print $item->field_price1[LANGUAGE_NONE][0]['value'] ?></th>
                        <?php endif; ?>
                          <th><?php print $item->field_price2[LANGUAGE_NONE][0]['value'] ?></th>
                          <th><?php print $item->field_price3[LANGUAGE_NONE][0]['value'] ?></th>
                          <?php if (!empty($item->field_price4[LANGUAGE_NONE][0]['value'])): ?>
                          <th><?php print $item->field_price4[LANGUAGE_NONE][0]['value'] ?></th>
                        <?php endif; ?>
                          <?php if (!empty($item->field_price5[LANGUAGE_NONE][0]['value'])): ?>
                            <th><?php print $item->field_price5[LANGUAGE_NONE][0]['value'] ?></th>
                          <?php endif; ?>
                          <?php if (!empty($item->field_price6[LANGUAGE_NONE][0]['value'])): ?>
                            <th><?php print $item->field_price6[LANGUAGE_NONE][0]['value'] ?></th>
                          <?php endif; ?>
                          </thead>
                            <?php else: ?>
                                <?php $class = 'price-top'; ?>
                                <?php if ($key % 2 == 0): ?>
                                    <?php $class = 'price-bottom'; ?>
                                <?php endif; ?>
                          <tr class="<?php print $class ?>">
                          <?php if (!empty($item->field_price_info[LANGUAGE_NONE][0]['value'])): ?>
                           <td>
                              <strong><?php print $item->field_price_info[LANGUAGE_NONE][0]['value'] ?></strong>
                            </td>
                          <?php endif; ?>
                            <?php if (!empty($item->field_price1[LANGUAGE_NONE][0]['value'])): ?>
                            <td><?php print $item->field_price1[LANGUAGE_NONE][0]['value'] ?></td>
                          <?php endif ?>
                            <td><?php print $item->field_price2[LANGUAGE_NONE][0]['value'] ?></td>
                            <td><?php print $item->field_price3[LANGUAGE_NONE][0]['value'] ?></td>
                             <?php if (!empty($item->field_price4[LANGUAGE_NONE][0]['value'])): ?>
                            <td><?php print $item->field_price4[LANGUAGE_NONE][0]['value'] ?></td>
                          <?php endif; ?>
                              <?php if (!empty($item->field_price5[LANGUAGE_NONE][0]['value'])): ?>
                                <td><?php print $item->field_price5[LANGUAGE_NONE][0]['value'] ?></td>
                              <?php endif; ?>
                              <?php if (!empty($item->field_price6[LANGUAGE_NONE][0]['value'])): ?>
                                <td><?php print $item->field_price6[LANGUAGE_NONE][0]['value'] ?></td>
                              <?php endif; ?>
                          </tr>

                            <?php endif; ?>
                        <?php endforeach; ?>

                    <?php endif; ?>

                </table>
              <?php endif; ?>
            <?php if(isset($price->field_notice[LANGUAGE_NONE])): ?>
            <p><?php print $price->field_notice[LANGUAGE_NONE][0]['value'] ?></p>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>

      <?php endif; ?>
      <?php if (isset($node->field_content_bottom[LANGUAGE_NONE])): ?>
          <?php print $node->field_content_bottom[LANGUAGE_NONE][0]['value'] ?>

      <?php endif; ?>
  </div>

<?php if (!empty($content['links'])): ?>
  <footer>
      <?php print render($content['links']); ?>
  </footer>
<?php endif; ?>

<?php print render($content['comments']); ?>
<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>