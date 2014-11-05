$(document).ready(function(){
    // Ime produkta
    var name = new LiveValidation('productName');
    var nameTrue = name.add( Validate.Presence );
    // Cena novega
    var cena = new LiveValidation('price');
    var cenaTrue = cena.add( Validate.Numericality, { onlyInteger: true } );
    // 
    
});