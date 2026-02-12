<?php

/**
 * head_start.php
 *
 * Author: pixelcave
 *
 * The first block of code used in every page of the template
 *
 */
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $dm->title; ?></title>

  <meta name="description" content="<?php echo $dm->description; ?>">
  <meta name="author" content="<?php echo $dm->author; ?>">
  <meta name="robots" content="<?php echo $dm->robots; ?>">

  <!-- Open Graph Meta -->
  <meta property="og:title" content="<?php echo $dm->title; ?>">
  <meta property="og:site_name" content="<?php echo $dm->name; ?>">
  <meta property="og:description" content="<?php echo $dm->description; ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo $dm->og_url_site; ?>">
  <meta property="og:image" content="<?php echo $dm->og_url_image; ?>">

  <!-- Icons -->
  <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <link rel="shortcut icon" href="<?php echo $dm->assets_folder; ?>/media/favicons/favicon.png">
  <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $dm->assets_folder; ?>/media/favicons/favicon-192x192.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $dm->assets_folder; ?>/media/favicons/apple-touch-icon-180x180.png">
  <!-- END Icons -->

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo $dm->assets_folder; ?>/css/all.min.css">
  <link rel="stylesheet" id="css-main" href="<?php echo $dm->assets_folder; ?>/css/dashmix.min.css">
  <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
  <?php if ($dm->theme) { ?>
    <link rel="stylesheet" id="css-theme" href="<?php echo $dm->assets_folder; ?>/css/themes/<?php echo $dm->theme; ?>.min.css">
  <?php } ?>
  <!-- END Stylesheets -->

  <!-- Page -->
  <div id="page-container" <?php $dm->page_classes(); ?>>
    <?php if (isset($dm->page_loader) && $dm->page_loader) { ?>
      <!-- Page loader (functionality is initialized in Template._uiHandlePageLoader()) -->
      <!-- If #page-loader markup and also the "show" class is added, the loading screen will be enabled and auto hide once the page loads -->
      <!-- Default background color is the primary color but you can use a bg-* class for a custom bg color -->
      <div id="page-loader" class="show"></div>

    <?php } ?>
    <?php if (isset($dm->inc_side_overlay) && $dm->inc_side_overlay) {
      include($dm->inc_side_overlay);
    } ?>
    <?php if (isset($dm->inc_sidebar) && $dm->inc_sidebar) {
      include($dm->inc_sidebar);
    } ?>
    <?php if (isset($dm->inc_header) && $dm->inc_header) {
      include($dm->inc_header);
    } ?>

    <!-- Main Container -->
    <main id="main-container">