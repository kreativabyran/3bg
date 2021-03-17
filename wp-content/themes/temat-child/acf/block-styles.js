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

registerBlockStyle('core/paragraph', {
  name: 'preamble',
  label: __('Ingress', 'temat-child'),
  isDefault: false,
});

registerBlockStyle('core/paragraph', {
  name: 'arrowlink',
  label: __('Länk med pil', 'temat-child'),
  isDefault: false,
});
