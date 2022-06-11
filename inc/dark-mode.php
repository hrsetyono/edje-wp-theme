<?php

add_action('wp_head', 'my_check_dark_mode_onload', 5);

function my_check_dark_mode_onload() { ?>
<script>
  (function() { 'use strict';
    let darkMode = localStorage.darkMode == 'true';
    if( darkMode ) {
      document.querySelector('body').classList.add('is-dark-mode');
      document.querySelector('#dark-toggle').checked = true;
    }
  })();
</script>
<?php }

// <label class='dark-toggle'>
//       <input type='checkbox' id='dark-mode'>
//       <span></span>
//       <strong>{$label}</strong>
//     </label>