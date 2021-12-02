<section
  class="acf-block-sample <?php echo $args['align'] . ' ' . $args['className']; ?>"
  <?php if ($args['anchor']) {
    echo "id='{$args['anchor']}'";
  } ?>
>
  <h3>
    <?php echo $args['title']; ?>
  </h3>
  <?php echo H::markdown($args['content']); ?>
</section>