<main role="main">
  <div class="wp-block-cover has-background-dim has-main-light-background-color alignfull" style="min-height:200px;">
    <div class="wp-block-cover__inner-container">
      <h1 class="has-color has-text-color has-text-align-center">
        <?php echo $args['title']; ?>
      </h1>
      <?php if (isset($args['description'])) {
        echo H::markdown($args['description']);
      } ?>
    </div>
  </div>
  
  <?php get_template_part('views/_posts', '', $args); ?>
  <?php get_template_part('views/_pagination', '', $args); ?>
</main>