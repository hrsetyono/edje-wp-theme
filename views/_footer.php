<?php
  $footers = $args['footers'] ?? [];
?>

<footer class="main-footer">
  <?php foreach ($footers as $id => $footer): ?>
    <?php if ($footer['widgets']): ?>
      <div
        class="footer footer-<?= $id ?>"
        data-columns="<?= $footer['columns'] ?>"
      >
        <div class="widget-row">
          <ul class="widget-column">
            <?= $footer['widgets'] ?>
          </ul>
        </div>
      </div>
    <?php endif ?>
  <?php endforeach; ?>
</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>