<?php

add_filter('wp_nav_menu_objects', 'my_menu_item_markup', 10, 2);
add_filter('nav_menu_submenu_css_class', 'my_submenu_classes', 10, 3);

/**
 * Change the Menu Item markup
 * 
 * @filter wp_nav_menu_objects
 */
function my_menu_item_markup($items, $args) {
  $items = array_map(function($i) {
    // If parent item, check for columns field
    if ($i->menu_item_parent === '0') {
      $columns = get_field('mega_menu', $i);

      if ($columns) {
        $i->classes[] = "mega-menu";
        $i->classes[] = "mega-menu-$columns-columns";
      }
    }

    // Change the "menu-item" class into "submenu-item" if it's a child menu
    if ($i->menu_item_parent !== '0' && $i->classes[1] == 'menu-item') {
      $i->classes[1] = 'sub-menu-item';
    }

    // Add style as extra class
    $style = get_field('style', $i);
    if ($style) {
      $i->classes[] = "menu-item-$style";
    }

    $title = $i->title;
    $description = H::markdown($i->post_content, true);
    $image_src = '';
    $image_alt = '';
    $bg_color = '';
    
    // Check for image
    if (in_array($style, ['has-image', 'has-icon'])) {
      $image = get_field('image', $i);

      if ($image) {
        $image_src = $style === 'has-image'
          ? $image['sizes']['medium']
          : $image['sizes']['thumbnail'];
        $image_alt = $image['alt'];
      }
    }

    // Check for background
    if (in_array($style, ['has-background'])) {
      $bg_color = get_field('background_color', $i);
      $i->classes[] = "menu-background-{$bg_color}";
    }

    ob_start(); ?>
      <?php if ($image_src): ?>
        <img src="<?= $image_src ?>" alt="<?= $image_alt ?>">
      <?php endif; ?>

      <?php if ($description): ?>
        <dt>
          <?= $title ?>
        </dt>
        <dd>
          <?= $description ?>
        </dd>
      <?php else: ?>
        <?= $title ?>
      <?php endif; ?>
    <?php

    $i->title = ob_get_clean();
    return $i;
  }, $items);

  return $items;
}

/**
 * Add depth to the submenu class
 * 
 * @filter nav_menu_submenu_css_class
 */
function my_submenu_classes($classes, $args, $depth) {
  $depth += 1;
  $classes[] = "sub-menu-depth-{$depth}";
  return $classes;
}
