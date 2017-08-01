<?php
/**
 * Created by PhpStorm.
 * User: splasher
 * Date: 8/1/17
 * Time: 10:30 PM
 */
?>
<?php if($nodes): ?>
<div id="slider-wrap">
    <div class="flexslider">
        <ul class="slides">
            <?php foreach($nodes as $node):?>
            <li>
                <a href="<?php print url($node->field_link[LANGUAGE_NONE][0]['value']) ?>" title="Qualified Doctors" class="img-hover">
                    <?php print theme('image_style',array('path'=>$node->field_image[LANGUAGE_NONE][0]['uri'],'style_name'=>'slide')); ?>
                </a>
            </li>
        <?php endforeach; ?>

        </ul>
        <ul class="slide-nav slides-5">
            <?php foreach($nodes as $n): ?>
            <li>
                <h4><?php print $n->title ?></h4>
            </li>
            <?php endforeach; ?>

        </ul><!-- end of slider nav -->
    </div>
</div><!-- end of slider-wrap -->
<?php endif; ?>
