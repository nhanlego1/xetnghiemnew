<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<div id="wrapper">
  <!-- Starting Header of the website -->
  <header id="header">

    <!-- Website Logo Place -->
    <div class="header-container">
      <div id="logo-container">
          <?php if ($logo): ?>
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
            </a>
          <?php endif; ?>
      </div>
        <?php if ($page['header']): ?>
          <div class="header-region">
              <?php print render($page['header']); ?>
          </div>
        <?php endif; ?>
    </div>
    <div class="clearfix"></div>
    <div class="menu-bar">
      <nav class="main-nav clearfix">
        <!-- MAIN NAVIGATION -->
        <div class="menu-div">
            <?php
            $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
            print drupal_render($main_menu_tree);
            ?>
        </div>
        <!-- GLOBAL SEARCH -->
        <form method="get" action="/search/healthpress" id="topsearch">
          <p>
            <input type="text" placeholder="Search" name="keyword" id="tsearch">
            <input type="submit" id="topsubmit" value="">
          </p>
        </form>
      </nav>
    </div>
  </header><!-- ending of header of the website -->

    <?php if ($page['featured']): ?>
        <?php print render($page['featured']) ?>
    <?php endif; ?>
    <?php if ($page['preface_first']): ?>
      <div class="preface-wrapper">
        <div class="preface-block">
            <?php print render($page['preface_first']); ?>
        </div>
      </div>
    <?php endif; ?>
  <!--start content-->
  <div id="container">
      <?php if ($page['preface_middle'] || $page['preface_last']): ?>
        <div id="preface-wrap" class="site-preface clr">
          <div id="preface" class="clr">
              <?php if ($page['preface_first'] || $page['preface_middle'] || $page['preface_last']): ?>
                <div id="preface-block-wrap" class="clr">

                    <?php if ($page['preface_middle']): ?>
                      <div class="span_1_of_3 col col-2 preface-block ">
                        <?php print render($page['preface_middle']); ?>
                      </div><?php endif; ?>
                    <?php if ($page['preface_last']): ?>
                      <div class="span_1_of_3 col col-3 preface-block ">
                        <?php print render($page['preface_last']); ?>
                      </div><?php endif; ?>
                </div>
              <?php endif; ?>

          </div>
        </div>
      <?php endif; ?>
    <div class="official clearfix">
      <div class="home-left-side">
          <?php if ($breadcrumb): ?>
            <div id="breadcrumbs">
                <?php print $breadcrumb; ?>
            </div>
          <?php endif; ?>
          <?php print $messages; ?>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?><h1 class="page-title">Trung Tâm Xét Nghiệm ADN | Xet Nghiem ADN | Phân Tích ADN </h1><?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if (!empty($tabs['#primary'])): ?>
            <div class="tabs-wrapper clr"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <?php print render($page['content']); ?>
      </div><!-- home left side -->

      <!--Sidebar right-->
        <?php if ($page['sidebar_first']): ?>
          <aside id="sidebar" class="sidebar-container" role="complementary">
              <?php print render($page['sidebar_first']); ?>
          </aside>
        <?php endif; ?>
    </div>
  </div>
  <!--end content-->
  <div id="footer-wrap">
    <footer id="footer-wrap" class="clearfix">
        <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer']): ?>
          <div id="footer" class="clr">
              <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']): ?>
                <div id="footer-block-wrap" class="clr">
                    <?php if ($page['footer_first']): ?>
                      <div class="span_1_of_3 col col-1 footer-block ">
                        <?php print render($page['footer_first']); ?>
                      </div><?php endif; ?>
                    <?php if ($page['footer_second']): ?>
                      <div class="span_1_of_3 col col-2 footer-block ">
                        <?php print render($page['footer_second']); ?>
                      </div><?php endif; ?>
                    <?php if ($page['footer_third']): ?>
                      <div class="span_1_of_3 col col-3 footer-block ">
                        <?php print render($page['footer_third']); ?>
                      </div><?php endif; ?>
                </div>
              <?php endif; ?>

              <?php if ($page['footer']): ?>
                <div class="span_1_of_1 col col-1">
                    <?php print render($page['footer']); ?>
                </div>
              <?php endif; ?>
          </div>
        <?php endif; ?>
    </footer>
    <div id="footer-bottom-wrapper">
      <div id="footer-bottom">
        <p class="copyrights">Copyright © 2013 www.XetNghiemADN.net - All Rights Reserved.</p>

      </div><!-- footer-bottom -->
    </div>

  </div>

</div>
