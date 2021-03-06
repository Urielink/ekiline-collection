<?php 
/**
 * TOAST.
 * Javascript en linea para toast.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_script_is/
 */

function ekiline_block_toast_inline_script() {
	// Condición para mostrar js en front.
	if ( !is_admin() && is_singular() && ! has_block( 'ekiline-blocks/ekiline-toast' ) ) {
		return;
	}
	// Si existe Ekiline Theme, apoyar de su manejador, o ocupar nuevo manejador.
	$script_handle = ( wp_script_is( 'ekiline-layout', 'enqueued' ) ) ? 'ekiline-layout' : 'ekiline-blocks-inline' ;
	wp_add_inline_script( $script_handle, ekiline_block_toast_scripts_code(), 'after' );
}
add_action( 'wp_enqueue_scripts', 'ekiline_block_toast_inline_script', 100 );

/**
 * Código JS complementario.
 */
function ekiline_block_toast_scripts_code() {
$code = '
// Abrir un toast programado.
function ekiline_launch_toast(){
	// Bucar un toast programado.
	var toastProgramado = document.querySelectorAll(\'[data-ek-launch-time]\');
	// Si existe ejecutar.
	if(0!==toastProgramado.length){
		toastProgramado.forEach(function (toastItem) {
			// Toast programado.
			var nuevoToast = new bootstrap.Toast(toastItem, {
				autohide: false
			});
			// Tiempo de lanzado.
			var toastData = toastItem.dataset.ekLaunchTime;
			setTimeout(
				function() {
					// Mostrar.
					nuevoToast.show();
				},
				// tiempo.
				toastData
			);
		});
	}
}
ekiline_launch_toast();

// Abrir un toast con scroll.
function ekiline_scroll_toast(){
	// Buscar un toast programado.
	var toastScroll = document.querySelectorAll(\'.launch-scroll\');
	// Si existe ejecutar.
	if(0!==toastScroll.length){
		toastScroll.forEach(function (toastItem) {
			// Toast programado.
			var nuevoToast = new bootstrap.Toast(toastItem, {
				autohide: false
			});
			// Activacion por scroll.
			window.addEventListener(\'scroll\',
				function() {
					if( (window.innerHeight + window.scrollY) >= (document.body.offsetHeight - 200) ) {
						nuevoToast.show();
					} 
				}
			);

		});
	}
}
ekiline_scroll_toast();
';
return $code;
}
