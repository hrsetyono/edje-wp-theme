<?php
  $align = $args['align'] ?? '';
  $className = $args['className'] ?? '';
  $anchor = $args['anchor'] ?? '';
  $title = $args['title'] ?? '';
  $content = $args['content'] ?? '';
?>

<section
  class="acf-block-sample <?= "{$align} {$className}" ?>"
  <?php if ($anchor): ?>
    id="<?= $anchor ?>"
  <?php endif; ?>
>
  <h3>
    <?= $title ?>
  </h3>
  <?= H::markdown($content) ?>
</section>