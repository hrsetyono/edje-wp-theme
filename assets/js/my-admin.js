import '../css/my-admin.sass';

// limit nav menu depth to 3rd level
if (window.wpNavMenu) {
  window.wpNavMenu.options.globalMaxDepth = 2;
}
