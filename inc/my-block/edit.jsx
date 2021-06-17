import { RichText,
  BlockControls,
  AlignmentToolbar,
  InspectorControls,
  PanelColorSettings } from '@wordpress/block-editor';
import { PanelBody,
  SelectControl,
  ToggleControl } from '@wordpress/components';


export default function( props ) {
  let atts = props.attributes;  

  const colorSettings = [
    {
      label: 'Text Color',
      value: atts.textColor,
      onChange: (value) => {
        props.setAttributes( { textColor: value ? value : 'none' } )
      }
    },
    {
      label: 'Background Color',
      value: atts.bgColor,
      onChange: (value) => {
        props.setAttributes( { bgColor: value ? value : 'none' } )
      }
    },
  ];

  // Extra toolbar icons
  const blockControls = [
    {
      icon: 'table-col-before',
      title: 'Toolbar 1',
      className: atts.toolbar === 'left' ? 'is-pressed' : '',
      onClick: () => {
        props.setAttributes( { toolbar: 'left' } );
      },
    },
    {
      icon: 'table-col-after',
      title: 'Toolbar 2',
      className: atts.toolbar === 'right' ? 'is-pressed' : '',
      onClick: () => {
        props.setAttributes( { toolbar: 'right' } );
      },
    },
  ];


  return ( <div className={`
      ${ props.className }
    `}
    style={{
      '--textColor': atts.textColor,
      '--bgColor': atts.bgColor
    }}>

    <InspectorControls>
      <PanelBody title="Settings" initialOpen="true">
        <SelectControl label="Select"
          options={[
            { label: 'Option 1', value: 'option1' },
            { label: 'Option 2', value: 'option2' },
            { label: 'Option 3', value: 'option3' },
          ]}
          value={ atts.select }
          onChange={ value => props.setAttributes( { select: value } ) } />
        
        <ToggleControl label="Toggle"
          checked={ atts.toggle }
          onChange={ value => props.setAttributes( { toggle: value } ) } />
      </PanelBody>

      <PanelColorSettings title="Color"
        initialOpen="true"
        colorSettings={ colorSettings } />
    </InspectorControls>

    <BlockControls key="controls" controls={ blockControls }>
      <AlignmentToolbar value={ atts.align }
        onChange={ ( value ) => {
          props.setAttributes( { align: value ? value : 'none' } );
        } } />
    </BlockControls>

    <RichText tagName='p'
      placeholder='Enter description…'
      value={ atts.description }
      onChange={ value => props.setAttributes({ description: value }) } />
  </div> );
}