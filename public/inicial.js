$(document).ready(function() {
    console.log("Token no inicial:", $.cookie("token")); 
    $("#salvaBotao").click(function(e) {
        e.preventDefault();

        $.ajax({
            url: "http://127.0.0.1:8000/api/salva_doce",
            type: "POST",
            data: {
                token: $.cookie("token"),
                Nome: $("#inputNome").val(),
                Sabor: $("#inputSabor").val(),
                Preco: $("#inputPreco").val(),
                Quantidade: $("#inputQuantidade").val(),
                Alergicos: $("#inputAlergicos").val(),
                Ingredientes: $("#inputIngredientes").val(),
                Descricao: $("#inputDescricao").val()
            },
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