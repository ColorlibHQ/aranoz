import { EpsilonSectionRepeaterRow } from './row';

export default {
  /**
   * Adds a section to the repeater container
   * @param obj
   */
  addSection( obj ) {
    let template = _.memoize( this.template ),
        fields;

    if ( ! template ) {
      return false;
    }

    if ( 'undefined' === typeof this.$_instance.params.sections[ obj.type ] ) {
      return false;
    }

    fields = this.$utils.mergeData.call( this, obj.type );
    fields = this.$utils.setTemplateDefaults( fields, obj );
    fields.index = this.state.currentIndex;
    this.state.currentIndex += 1;

    template = template( fields );
    this.state.rows.push(
        new EpsilonSectionRepeaterRow( this, jQuery( template ).appendTo( this.repeaterContainer ), fields, obj.type )
    );

    if ( 1 === _.size( obj ) && obj.hasOwnProperty( 'type' ) ) {
      this.$connectors.addNewSection( this.$utils.pluckValues( { ...fields, ...obj } ) );
    }

    return this.state.rows[ fields.index ];
  },

  /**
   * Removes a section from the container
   * @param obj
   */
  removeSection( obj ) {
    this.loading = true;
    this.state.rows.splice( obj.index, 1 );
    let value = this.$connectors.getValue();
    value = value.filter( e => obj.index !== e.index );
    value = this.$utils.resetIndexes.call( this, value );
    this.$connectors.setValue( value );
    this.loading = false;
    this.state.currentIndex = this.state.rows.length;
    return obj.index;
  },

  /**
   * Sorts sections
   * @param e
   * @param data
   */
  sortSections( e, data ) {
    /**
     * small hack, wp editor needs to be destroyed/initiated when dom changes
     */
    data.item.trigger( 'epsilon-changed-position' );

    let i = 0;
    this.repeaterContainer.find( '.repeater-row' ).map( ( index, el ) => {
      jQuery( el ).attr( 'data-row', i );
      i ++;
    } );

    this.state.rows.map( e => e.forceResetIndex() );
    let value = this.$connectors.getValue();
    value.map( ( e, index ) => {
      value[ index ].index = this.state.rows[ index ].index;
    } );

    this.state.rows = _.sortBy( this.state.rows, ( e ) => e.index );
    value = _.sortBy( value, ( e ) => e.index );

    this.$connectors.setValue( value );
  },

};
