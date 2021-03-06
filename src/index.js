/**
 * Internal dependencies
 */
import './collection/index';
import './accordion/index';
import './collapse/index';
import './popovers/index';
import './progress/index';
import './toast/index';
import './tabs/index';
import './modal/index';
import './carousel/index';

/**
 * Incorporar bloques a coleccion.
 */
import { registerBlockCollection } from '@wordpress/blocks';
registerBlockCollection( 'ekiline-blocks', {
    title: 'Ekiline Blocks',
    icon: 'layout',
} );
