// Helper function to initialize our carousel.
initializeBlock = function() {
	var flkty = new Flickity( '.is-carousel', {
		cellAlign: 'left',
		contain: true,
		wrapAround: true,
		draggable: false,
	});
}


if( window.acf ) {
	// Initialize dynamic block preview (editor).
	window.acf.addAction( 'render_block_preview/type=carousel', initializeBlock );
} else {
	// Initialize on the frontend.
	initializeBlock();
}