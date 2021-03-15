const { __ } = wp.i18n;
const { registerBlockStyle } = wp.blocks;

registerBlockStyle('core/group', {
  name: 'container',
  label: __('Container', 'temat-child'),
  isDefault: false,
});

registerBlockStyle('core/group', {
  name: 'container-fluid',
  label: __('Container fluid', 'temat-child'),
  isDefault: false,
});
