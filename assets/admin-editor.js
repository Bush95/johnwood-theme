wp.domReady( function() {

	wp.blocks.registerBlockStyle( 'core/image' , {
		name: 'default',
		label: 'Default',
		isDefault: true,
	});

	wp.blocks.registerBlockStyle( 'core/image', {
		name: 'full-width',
		label: 'Pełna szerokość',
		isDefault: false,
	});
} );