<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1,minimal-ui,user-scalable=no">
<?php print $head; ?>
<title><?php print $head_title; ?></title>
  <link href='//fonts.googleapis.com/css?family=Open+Sans:400italic,400,800,700,300' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
  <?php print $styles; ?>
<?php print $scripts; ?>

<!--[if lt IE 9]><script src="<?php print base_path() . drupal_get_path('theme', 'healthpress') . '/js/html5.js'; ?>"></script><![endif]-->
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <!--Start of Zopim Live Chat Script-->
  <script type="text/javascript">
      window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
          d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
      _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
          $.src='//v2.zopim.com/?1v7Q0XSNVnOcpB3oSQ8U22vFU2YbbP9R';z.t=+new Date;$.
              type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
  </script>
  <!--End of Zopim Live Chat Script-->
</body>
</html>