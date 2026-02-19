<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVERSWEET - Editar Doce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        :root {
            --vinho: #4a0012;
            --pastel-rosa: #fce4ec;
            --pastel-creme: #fff9f5;
            --primario-suave: #ffb3c1;
            --borda: #ead1d1;
        }

        body {
            background-color: var(--pastel-creme);
            color: var(--vinho);
            font-family: 'Segoe UI', Roboto, sans-serif;
            min-height: 100vh;
        }

        .main-card {
            background: white;
            border-radius: 20px;
            border: 1px solid var(--borda);
            box-shadow: 0 8px 30px rgba(74, 0, 18, 0.05);
        }

        .title-section h1 {
            color: var(--vinho);
            font-weight: 400;
            letter-spacing: -1px;
        }

        .btn-add {
            background-color: var(--vinho);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 400;
            transition: all 0.3s;
        }

        .btn-add:hover {
            background-color: #ffa7a7;
            transform: translateY(-2px);
        }

        .btn-voltar {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 400;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-voltar:hover {
            background-color: #5a6268;
            color: white;
            transform: translateY(-2px);
        }

        .form-control {
            border: 1px solid var(--borda);
            border-radius: 8px;
            padding: 10px;
            background-color: #fff;
        }

        .form-control:focus {
            border-color: var(--vinho);
            box-shadow: 0 0 0 0.25rem rgba(74, 0, 18, 0.1);
        }

        .form-container {
            background-color: #fff;
            border: 1px solid var(--borda);
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="title-section text-center mb-5">
        <h1 class="display-4">EVERSWEET</h1>
        <p class="lead text-muted">Editar Doce</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-container p-4 shadow-sm">
                <div class="d-flex align-items-center mb-4 text-uppercase fw-bold border-bottom pb-2">
                    <i class="fas fa-edit me-2 text-danger"></i> 
                    <span>Alterar Dados do Doce</span>
                </div>
                
                <form id="editaDoceForm">
                    <input type="hidden" id="doceId" value="{{ $doce->id ?? '' }}">
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase">Nome</label>
                            <input type="text" class="form-control" id="inputNome" name="Nome" value="{{ $doce->Nome ?? '' }}" placeholder="Ex: Brigadeiro de Pistache">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase">Sabor</label>
                            <input type="text" class="form-control" id="inputSabor" name="Sabor" value="{{ $doce->Sabor ?? '' }}" placeholder="Ex: Doce / Amargo">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase">Preço (R$)</label>
                            <input type="text" class="form-control" id="inputPreco" name="Preco" value="{{ $doce->Preco ?? '' }}" placeholder="0.00">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase">Quantidade</label>
                            <input type="number" class="form-control" id="inputQuantidade" name="Quantidade" value="{{ $doce->Quantidade ?? '' }}" placeholder="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase">Alérgicos</label>
                            <input type="text" class="form-control" id="inputAlergicos" name="Alergicos" value="{{ $doce->Alergicos ?? '' }}" placeholder="Ex: Lactose">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase">Ingredientes</label>
                            <input type="text" class="form-control" id="inputIngredientes" name="Ingredientes" value="{{ $doce->Ingredientes ?? '' }}" placeholder="Liste os ingredientes">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase">Descrição</label>
                            <textarea class="form-control" id="inputDescricao" name="Descricao" rows="2" placeholder="Breve descrição do doce">{{ $doce->Descricao ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <a href="/Cadastro" class="btn-voltar">
                            <i class="fas fa-arrow-left me-2"></i>VOLTAR
                        </a>
                        <button type="button" class="btn btn-add flex-grow-1" id="atualizaBotao">
                            <i class="fas fa-save me-2"></i>ATUALIZAR DOCE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#atualizaBotao").click(function() {
            const id = $("#doceId").val();
            
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
                url: `http://127.0.0.1:8000/api/atualiza_doce/${id}`,
                type: "PUT",
                data: dadosDoce,
                success: function(res) {
                    Swal.fire({
                        title: "Sucesso!",
                        text: "Doce atualizado.",
                        icon: "success",
                        confirmButtonColor: "#4a0012"
                    }).then(() => {
                        window.location.href = "/doces";
                    });
                },
                error: function(error) {
                    Swal.fire({
                        title: "Erro!",
                        text: "Deu não fiote: " + (error.responseJSON?.message),
                        icon: "error",
                        confirmButtonColor: "#4a0012"
                    });
                    console.log(error);
                }
            });
        });
    });
</script>

</body>
</html>