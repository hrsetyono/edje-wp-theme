(function() { 'use strict';

if( window.jQuery ) { $ = jQuery; }
$( onReady );
$( window ).on( 'load', onLoad );

function onReady () {
  myShop.init();
}

// functions that needs to run only after everything loads
function onLoad() {
}


var myShop = {
  init: function() {
  }
};

})();
