<?php
global $post;

$related_posts = get_posts([
  'post_type' => 'post',
  'posts_per_page' => '3',
  'post__not_in' => [ $post->ID ],
  'orderby' => 'rand',
  // 'category__in' => array_map(function($term) {
  //   return $term->term_id;
  // }, get_the_category()),
]);

///// ?>

<?php the_post(); ?>
<?php get_header(); ?>

<main role="main">
<header
  class="post-hero / wp-block-cover alignfull"
  style="min-height:250px;"
>
  <span
    aria-hidden="true"
    class="has-color-1-light-background-color wp-block-cover__gradient-background"
  ></span>
  <div class="wp-block-cover__inner-container">

    <section class="wp-block-columns alignwide">
      <div class="wp-block-column">
        <h1 class="has-color has-text-color">
          <?php the_title(); ?>
        </h1>

        <div class="post-meta / alignwide">
          <span class="meta-categories">
            <?php foreach (get_the_category() as $term): ?>
              <a href="<?= get_category_link($term) ?>">
                <?= $term->name ?>
              </a>
            <?php endforeach; ?>
          </span>

          <span class="meta-author">
            By <?php the_author(); ?>
          </span>

          <time class="meta-date">
            <i></i>
            <?= get_the_date() ?>
          </time>

          <?php if (get_comments_number() !== '0'): ?>
            <span class="meta-comments">
              <i></i>
              <a href="#comments">
                <?= sprintf(__('%d Comments'), get_comments_number()) ?>
              </a>
            </span>
          <?php endif; ?>

          <?php if (has_tag()): ?>
            <span class="meta-tags">
              <i></i>
              <?php foreach (get_the_tags() as $tag): ?>
                <a href="<?= get_tag_link($tag) ?>">
                  <?= $tag->name ?>
                </a>
              <?php endforeach; ?>
            </span>
          <?php endif; ?>
        </div>

      </div>
      
      <?php if (has_post_thumbnail()): ?>
      <div class="wp-block-column" style="flex-basis:35%">
        <picture class="featured-image | wp-block-image">
          <source
            srcset="<?= get_the_post_thumbnail_url(null, 'medium'); ?>"
            media="(max-width: 480px)"
          >
          <?php the_post_thumbnail('large'); ?>
        </picture>

        <div class="wp-block-spacer is-style-h-negative" style="margin-bottom:-50px"></div>
      </div>
      <?php endif; ?>
    </section>

  </div>
</header>

<div class="post-columns / wp-block-columns alignwide">
  <article class="wp-block-column" style="flex-basis:66.66%">

    <?php the_content(); ?>

    <?php if (function_exists('sharing_display')) {
      do_shortcode('[h-jetpack-sharing]');
    } ?>

    <?php get_template_part('parts/author', ''); ?>

    <nav class="post-nav">
      <?php previous_post_link('%link', '%thumbnail <p>%label %title</p>'); ?>
      <?php next_post_link('%link', '%thumbnail <p>%label %title</p>'); ?>
    </nav>
  </article>

  <?php if (is_active_sidebar('sidebar')): ?>
    <aside class="sidebar / wp-block-column" style="flex-basis:33.33%">
      <div class="sidebar-inner">
        <?php dynamic_sidebar('sidebar'); ?>
      </div>
    </aside>
  <?php endif; ?>
</div>

  <footer class="related-posts / wp-block-group has-background has-text-invert-background-color alignfull">
    <div class="wp-block-group__inner-container">
      <h3 class="alignwide">
        <?= __('Related Posts') ?>
      </h3>
      <?php get_template_part('parts/posts', '', $related_posts); ?>
    </div>
  </footer>
</main>

<?php
  if (comments_open() || get_comments_number()) {
    comments_template();
  }
?>

<?php get_footer(); ?>