function cargarProvincias(){
    var coddep = $('#nivel1').val();
    $.getJSON('http://mysite.dev/myapp/libro/niv2', {
        idNivel1: coddep
    }, function(resp){
        $('#nivel2').empty();
        $.each(resp, function(indice, valor){
            option = $('<option></option>',{
                value: indice,
                text: valor
            });                            
            $('#nivel2').append(option);
        });
        cargarDistritos();
    }); 
}

function cargarNivel1(){
    var coddep = $('#nivel1').val();
    $.getJSON('http://mysite.dev/myapp/libro/niv2', {
        idNivel1: coddep
    }, function(resp){
        $('#nivel2').empty();
        $.each(resp, function(indice, valor){
            option = $('<option></option>',{
                value: indice,
                text: valor
            });                            
            $('#nivel2').append(option);
        });
        cargarDistritos();
    }); 
}


function cargarDistritos(){
    var codpro = $('#nivel2').val();

    obpro = eval('prov_' + codpro); 

    $('#nivel3').empty();

    for (var i = 0;  i < obpro.length;  i++) {
        option = $('<option></option>',{
            value: obpro[i][0],
            text: obpro[i][2]+" "+obpro[i][1]
        });
        $('#nivel3').append(option);
    }
    imprimirDetalle();
}
function imprimirDetalle(){
    obpro = eval('prov_' + $('#nivel2').val());                    
    id = $('#nivel3').prop('selectedIndex');
    $('#area').attr('value',obpro[id][2]);
}

