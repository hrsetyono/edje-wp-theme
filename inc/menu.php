<?php

add_filter('wp_nav_menu_objects', 'my_menu_item_markup', 99, 2);
add_filter('nav_menu_submenu_css_class', 'my_submenu_classes', 10, 3);

/**
 * Change the Menu Item markup
 * 
 * @filter wp_nav_menu_objects
 */
function my_menu_item_markup($items, $args) {
  $mega_menu_ids = []; // used to check whether a children is under mega menu or not

  foreach ($items as &$i) {
    // remove the "menu-item-type-xxx" and "menu-item-object" class
    $i->classes[2] = '';
    $i->classes[3] = '';

    // If parent item, check for columns field
    if ($i->menu_item_parent === '0') {
      $columns = get_field('mega_menu', $i);

      if ($columns) {
        $i->classes[] = "mega-menu";
        $i->classes[] = "mega-menu-$columns-columns";
        $mega_menu_ids[] = $i->ID;
      }
    }

    // Change the "menu-item" class into "submenu-item" if it's a child menu
    if ($i->menu_item_parent !== '0' && $i->classes[1] == 'menu-item') {
      $i->classes[1] = 'submenu-item';
    }

    // If a first children of mega menu, become a Heading
    if (in_array($i->menu_item_parent, $mega_menu_ids)) {
      $i->classes[] = 'mega-menu__column';
    }

    // If title is "-", add empty class so it can be hidden
    if ($i->title === '-') {
      $i->classes[] = 'menu-item-empty-title';
    }

    // Add style as extra class
    $style = get_field('style', $i);
    if ($style) {
      $i->classes[] = "menu-item-$style";
    }


    // Variable for Output
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
  }

  return $items;
}

/**
 * Add depth to the submenu class
 * 
 * @filter nav_menu_submenu_css_class
 */
function my_submenu_classes($classes, $args, $depth) {
  // shorten the sub-menu class
  if ($classes[0] === 'sub-menu') {
    $classes[0] = 'submenu';
  }

  $depth += 1;
  $classes[] = "submenu-depth-{$depth}";
  return $classes;
}