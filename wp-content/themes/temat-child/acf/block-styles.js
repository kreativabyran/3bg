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

registerBlockStyle('core/group', {
  name: 'col-image',
  label: __('Kolumn med text och bild', 'temat-child'),
  isDefault: false,
});

registerBlockStyle('core/columns', {
  name: 'center',
  label: __('Centrerad', 'temat-child'),
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

registerBlockStyle('core/columns', {
  name: 'columns-small-content',
  label: __('Smalt innehåll', 'temat-child'),
  isDefault: false,
});
