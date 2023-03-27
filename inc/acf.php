<?php

// ACF Blocks
add_action('acf/init', 'my_acf_create_blocks');
add_filter('acf/format_value/name=sample', 'my_acf_format_sample', 10, 3);

add_action('acf/input/admin_footer', 'my_acf_change_color_palette');

/**
 * Create ACF gutenberg blocks
 * 
 * @action acf/init
 */
function my_acf_create_blocks() {
  // acf_register_block_type([
  //   'name' => 'acf-example',
  //   'title' => __('ACF Example'),
  //   'description' => __('A custom ACF Block'),
  //   'category' => 'design',
  //   'icon' => 'admin-comments',
  //   'mode' => 'edit',
  //   'render_callback' => '_my_render_acf_example'
  // ]);
}


/**
 * Customize the return value of ACF field by the name of 'sample'
 * 
 * @filter acf/format_value/name=sample 10
 */
function my_acf_format_sample($value, $post_id, $field) {
  return $value;
}

/**
 * @render acf-example
 */
function _my_render_acf_example($block, $content='', $is_preview=false, $post_id=0) {
  $args = [
    'id' => $block['id'],
    'className' => $block['className'] ?? '',
    'align' => $block['align'] ?? '',
    'anchor' => $block['anchor'] ?? '', // the ID attribute
    
    'title' => get_field('title'),
    'content' => get_field('content'),
  ];

  get_template_part('parts/acf-example', '', $args);
}


/**
 * Change the palette on ACF Color Picker
 * 
 * @action acf/input/admin_footer
 * @todo - don't forget to change accordingly if you use ACF Color Picker
 */
function my_acf_change_color_palette() { ?>
  <script>
  (function() {
    acf.add_filter('color_picker_args', function(args, $field) {
      args.palettes = [
        '#2c3e50', '#ffffff',
        '#3498db', '#deedf8',
        '#2ecc71', '#def7e8',
        '#e74c3c', '#fbdedb'
      ];
      return args;
    });
  })();
  </script>
<?php }
