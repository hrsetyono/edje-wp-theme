<section class="post-comments" id="comments">
  <?php if (get_comments_number()): ?>
    <h4>
      <?php echo sprintf(__('%d comments'), get_comments_number()); ?>
    </h4>
  <?php endif; ?>

  <?php comment_form(); ?>

  <ol class="comments-list">
    <?php wp_list_comments([
      'walker' => new H_Walker_Comment(),
      'avatar_size' => 60,
      'style' => 'ol',
    ]); ?>
  </ol>
</section>