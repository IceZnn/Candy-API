$(document).ready(function() {
    $("#salvaBotao").click(function() {
        const dadosDoce = {
            Nome: $("#inputNome").val(),
            Sabor: $("#inputSabor").val(),
            Preco: $("#inputPreco").val(), 
            Quantidade: $("#inputQuantidade").val(),
            Alergicos: $("#inputAlergicos").val(),
            Ingredientes: $("#inputIngredientes").val(),
            Descricao: $("#inputDescricao").val()
        };

        $.ajax({
            url: "http://127.0.0.1:8000/api/salva_doce",
            type: "POST",
            data: dadosDoce,
            success: function(res) {
                console.log(res);
                $("#doceForm")[0].reset();
                Swal.fire("Sucesso!", "Doce salvo com sucesso.", "success");
            },
            error: function(error) {
                Swal.fire("Deu não fiote", "Erro ao salvar.", "error");
                console.log(error);
            }
        });
        
    });
});