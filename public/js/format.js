
$(document).ready(function(){
    $('#value').mask('000.000.000,00', {reverse: true});
});

$(document).ready(function(){
    $('#productForm').submit(function(event){
        var value = $('#value').val();

        if (value.includes(',') && value.includes('.')) {
            value = value.replace('.', '');
        }

        if (value.includes('..')) {
            value = value.replace(/^(\.\.)/, '');
        }

        if (value.includes(',')) {
            value = value.replace(',', '.');
        }

        $('#value').val(value);
    });
});
