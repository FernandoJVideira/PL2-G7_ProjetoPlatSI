$( "#gerarCodigo" ).click(function() {

    let chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    let str = '';
    for (let i = 0; i < 5; i++) {
        str += chars.charAt(Math.floor(Math.random() * chars.length));
    }

    $('#code').val(str);
});
