$(document).ready(function(){
    $("#enviar_codigo").click(function(){
        
        $.ajax({
            type: "GET",
            url: "api/enviar_codigo",
            data: {
                codigo: $("#codigo").val(),
                email: $("#email").val(),
            },
            dataType: "json",
            success: function(response) {
                if(response.erro === 'n') {
                    alert(response.data);
                    $.cookie('token', response.token, { expires: 7, path: '/' });
                    $.cookie('user_id', response.user_id, { expires: 7, path: '/' });

                    setTimeout(() => window.location.href = '/Inicio?token=' + res.token, 2000);
                } else {
                    alert(response.data);
                }
            },
            error: function(xhr) {
                alert('Erro na requisição');
            }
        });
    });
});