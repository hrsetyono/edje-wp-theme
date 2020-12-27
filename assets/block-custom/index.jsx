import './style.sass';
import { registerBlockType } from '@wordpress/blocks';
import edit from './edit.jsx';

registerBlockType( 'my/block', {
  title: 'Custom Block',
  description: 'Example of a custom block',
  icon: 'id',
  category: 'layout',
  example: {},
  attributes: localizeBC.attributes,
  styles: [
    { name: 'style2', label: 'Style 2' },
  ],
  
  edit: edit
} );
