<?php
/**
 * @file
 * Stub template file to call the main WaterFall theme
 *
 * We can't set the Views display to use the other theme directly since it
 * aggressively changes settings of the core theme function if we do.
 * So we have to have this stub theme instead.
 *
 * @author Nhan Le <nhanlego1@gmail.com>
 */
?>
<?php if ($items): ?>
  <ul id="waterfall_views" class="waterfall">
  <?php foreach ($items as $item): ?>
      <li>
        <div class="waterfall-item"><?php print $item['waterfall']; ?></div>
      </li>
      <?php endforeach; ?>
  </ul> 
  <?php endif; ?>
