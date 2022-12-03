<?php
  $title = $args['title'] ?? 'Blog';
  $description = $args['description'] ?? '';
?>

<div
  class="wp-block-cover alignfull"
  style="min-height:200px;"
>
  <span
    aria-hidden="true"
    class="has-color-1-light-background-color wp-block-cover__gradient-background"
  ></span>
  <div class="wp-block-cover__inner-container">
    <?php if ($title): ?>
      <h1 class="has-color has-text-color has-text-align-center">
        <?= $title ?>
      </h1>
    <?php endif; ?>

    <?php if ($description): ?>
      <?= H::markdown($description) ?>
    <?php endif; ?>
  </div>
</div>