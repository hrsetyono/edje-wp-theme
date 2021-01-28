<?php

if( is_admin() ) {
  my_register_block_pattern();
}


/**
 * Create custom patterns
 * 
 * How to format: Create the block in editor, copy it, paste it in https://codebeautify.org/json-escape-unescape
 */
function my_register_block_pattern() {
  register_block_pattern( 'my/features', [
    'title' => 'Features',
    'description' => '3 Images and a short text below it',
    'content' => "<!-- wp:columns -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Heading</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Heading</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Heading</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->"
  ] );
}