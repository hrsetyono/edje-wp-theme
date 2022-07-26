<?php
  $headers = $args['headers'] ?? [];
  $offcanvas = $args['offcanvas'] ?? null;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="main-container">
<?php foreach ($headers as $id => $header): ?>
  <?php if ($header['widgets']): ?>
    <header
      class="header-row <?= $id ?>"
      data-columns="<?= $header['columns'] ?>"
      role="navigation"
    >
      <div class="widget-row">
        <ul class="widget-column">
          <?= $header['widgets'] ?>
        </ul>
      </div>
    </header>
  <?php endif; ?>
<?php endforeach; ?>

<?php if ($offcanvas): ?>
  <div class="offcanvas" role="navigation">
    <ul class="offcanvas__inner-wrapper">
      <?= $offcanvas['widgets'] ?>
    </ul>
    <a href="#menu">
      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 320 512"><path d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"/></svg>
      <span>Close</span>
    </a>
  </div>
<?php endif; ?>