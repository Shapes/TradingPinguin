$(document).ready(function(){
    
    $( "#module" ).toggle(
      function() {
        $( this ).removeClass( "module-hidden" ).addClass( "module-visible" );
      }, function() {
        $( this ).removeClass( "module-visible" ).addClass( "module-hidden" );
      }
    );
    
    // Ime produkta
    var name = new LiveValidation('productName');
    var nameTrue = name.add( Validate.Presence );
    // Cena novega
    var cena = new LiveValidation('price');
    var cenaTrue = cena.add( Validate.Numericality, { onlyInteger: true } );
    // Vsebina
    var content = new LiveValidation('content');
    var contentTrue = content.add( Validate.Presence );
    // Opis
    var desc = new LiveValidation('desc');
    var descTrue = desc.add( Validate.Presence );
    // teza
    var teza = new LiveValidation('weight');
    var tezaTrue = teza.add( Validate.Presence );
});