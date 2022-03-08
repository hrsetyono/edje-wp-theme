<footer class="main-footer">
  <?php foreach ($args['footers'] as $id => $footer): ?>
    <?php if ($footer['widgets']): ?>
      <div
        class="footer footer-<?php echo $id; ?>"
        data-columns="<?php echo $footer['columns']; ?>"
      >
        <div class="widget-row">
          <ul class="widget-column">
            <?php echo $footer['widgets']; ?>
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