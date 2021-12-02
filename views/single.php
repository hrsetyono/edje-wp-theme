<?php the_post(); ?>

<section class="wp-block-cover is-style-post-hero / has-background-dim has-color-1-light-background-color alignfull"
  style="min-height:250px;">
  <div class="wp-block-cover__inner-container">

    <h1 class="has-color has-text-color">
      <?php the_title(); ?>
    </h1>

    <div class="post-meta">
      <span class="meta-categories">
        <?php foreach (get_the_category() as $term): ?>
          <a href="<?php echo get_category_link($term); ?>">
            <?php echo $term->name; ?>
          </a>
        <?php endforeach; ?>
      </span>

      <span class="meta-author">
        By <?php echo the_author(); ?>
      </span>

      <time class="meta-date">
        <i></i>
        <?php echo get_the_date(); ?>
      </time>

      <?php if (get_comments_number() !== '0'): ?>
        <span class="meta-comments">
          <i></i>
          <a href="#comments">
            <?php echo get_comments_number() . ' ' . __('Comments'); ?>
          </a>
        </span>
      <?php endif; ?>

      <?php if (has_tag()): ?>
        <span class="meta-tags">
          <i></i>
          <?php foreach (get_the_tags() as $tag): ?>
            <a href="<?php echo get_tag_link($tag); ?>">
              <?php echo $tag->name; ?>
            </a>
          <?php endforeach; ?>
        </span>
      <?php endif; ?>
    </div>

  </div>
</section>

<div class="post-grid" data-grid>
  <article class="post-column" data-column="8-12">

    <main role="main">
      <?php if (has_post_thumbnail()): ?>
        <div class="featured-image">
          <picture data-image-fit="2:1">
            <source
              srcset="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>"
              media="(max-width: 480px)"
            >
            <?php the_post_thumbnail('large'); ?>
          </picture>
        </div>
      <?php endif; ?>

      <?php the_content(); ?>
    </main>

    <?php if (function_exists('sharing_display')) {
      do_shortcode('[h-jetpack-sharing]');
    } ?>

    <?php get_template_part('views/_author', '', $args); ?>

    <nav class="post-nav">
      <?php previous_post_link('%link', '%thumbnail <p>%label %title</p>'); ?>
      <?php next_post_link('%link', '%thumbnail <p>%label %title</p>'); ?>
    </nav>
  </article>

  <?php if (is_active_sidebar('sidebar')): ?>
    <aside class="sidebar" data-column="4-12">
      <div class="sidebar-inner">
        <?php dynamic_sidebar('sidebar'); ?>
      </div>
    </aside>
  <?php endif; ?>
</div>

<aside class="related-posts">
  <div data-grid> <div data-column="12">
    <h3>
      <?php echo __('Related Posts'); ?>
    </h3>
    <?php get_template_part('views/_posts', '', $args); ?>
  </div> </div>
</aside>

<?php
  if (comments_open() || get_comments_number()) {
    comments_template();
  }
?>
