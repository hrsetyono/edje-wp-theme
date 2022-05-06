import '../sass/my-editor.sass';

wp.domReady(() => {
  // wp.blocks.registerBlockStyle( 'core/button', {
  //   name: 'custom-style',
  //   label: 'Custom Style'
  // } );

});

wp.hooks.addFilter('blocks.registerBlockType', 'my/change_alignment', (settings, name) => {
  switch (name) {
    // These blocks only allowed to use Wide alignment
    case 'core/group':
      return lodash.assign({}, settings, {
        attributes: lodash.assign({}, settings.attributes, {
          align: {
            type: 'string', default: 'full',
          },
          layout: {
            type: [Object], default: { inherit: true },
          },
        }),
        supports: lodash.assign({}, settings.supports, {
          __experimentalLayout: false,
          layout: false,
          spacing: false,
        }),
      });
    default:
      break;
  }
  return settings;
});
