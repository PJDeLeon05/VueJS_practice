$j = jQuery.noConflict();

$j(document).ready( function () {
  if( $j( '.toggleSwitch > input' ).is( ':checked' ) ) {
    $j( '#col1' ).css( "background-color", "#edf7f4" );
    $j( '#col1' ).css( "font-weight", "normal" );
    $j( '#col3' ).css( "background-color", "#9ce675" );
    $j( '#col3' ).css( "font-weight", "bold" );
  }
  else {
    $j( '#col1' ).css( "background-color", "#9ce675" );
    $j( '#col1' ).css( "font-weight", "bold" );
    $j( '#col3' ).css( "background-color", "#edf7f4" );
    $j( '#col3' ).css( "font-weight", "normal" );
  }
  $j('.toggleSwitch > input').click( function() {
    if( $j( this ).is( ':checked' ) ) {
      $j( '#col1' ).css( "background-color", "#edf7f4" );
      $j( '#col1' ).css( "font-weight", "normal" );
      $j( '#col3' ).css( "background-color", "#9ce675" );
      $j( '#col3' ).css( "font-weight", "bold" );
    }
    else {
      $j( '#col1' ).css( "background-color", "#9ce675" );
      $j( '#col1' ).css( "font-weight", "bold" );
      $j( '#col3' ).css( "background-color", "#edf7f4" );
      $j( '#col3' ).css( "font-weight", "normal" );
    }
  })
})
