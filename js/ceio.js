/* eslint-disable no-undef */
( function( $ ) {
	$( document ).ready( function() {
		// Open Blog Hero filters
		$( '.toogle-hero-filter' ).click( function() {
			$( '#hero-filter--container' ).slideToggle( 300 );
		} );
	} );
}( jQuery ) );

const acc = document.getElementsByClassName( 'accordion-btn' );
let i;

for ( i = 0; i < acc.length; i++ ) {
	acc[ i ].addEventListener( 'click', function() {
		this.classList.toggle( 'active' );
		const panel = this.nextElementSibling;
		if ( panel.style.maxHeight ) {
			panel.style.maxHeight = null;
		} else {
			panel.style.maxHeight = panel.scrollHeight + 'px';
		}
	} );
}
