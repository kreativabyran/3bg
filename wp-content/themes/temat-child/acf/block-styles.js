const { __ } = wp.i18n;
const { registerBlockStyle } = wp.blocks;

registerBlockStyle('core/group', {
  name: 'container',
  label: __('Vanlig bredd', 'temat-child'),
  isDefault: true,
});

registerBlockStyle('core/group', {
  name: 'small',
  label: __('Smalt innehåll', 'temat-child'),
  isDefault: false,
});

registerBlockStyle('core/group', {
  name: 'info',
  label: __('Grön Inforuta', 'temat-child'),
  isDefault: false,
});

registerBlockStyle('core/group', {
  name: 'hero',
  label: __('Headerbild Startsida', 'temat-child'),
  isDefault: false,
});

registerBlockStyle('core/paragraph', {
  name: 'biglink',
  label: __('Stor länk', 'temat-child'),
  isDefault: false,
});

registerBlockStyle('core/paragraph', {
  name: 'arrowlink',
  label: __('Länk med pil', 'temat-child'),
  isDefault: false,
});

registerBlockStyle('core/paragraph', {
  name: 'arrowlinkdown',
  label: __('Länk med pil ner', 'temat-child'),
  isDefault: false,
});

registerBlockStyle('core/paragraph', {
  name: 'entry',
  label: __('Ingress', 'temat-child'),
  isDefault: false,
});
