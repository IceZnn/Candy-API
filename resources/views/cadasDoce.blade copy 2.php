<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVERSWEET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="inicial.js"></script>
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

        .table thead th {
            background-color: var(--pastel-rosa);
            border-bottom: 2px solid var(--borda);
            color: var(--vinho);
            font-size: 0.85rem;
            text-transform: uppercase;
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

        .badge-estoque {
            background-color: var(--pastel-rosa);
            color: var(--vinho);
            border: 1px solid var(--primario-suave);
            padding: 6px 12px;
        }

        .action-btn {
            border: none;
            background: none;
            color: var(--vinho);
            transition: 0.2s;
        }

        .form-container {
            background-color: #fff;
            border: 1px solid var(--borda);
            border-radius: 15px;
            margin-bottom: 3rem;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="title-section text-center mb-5" id="headerPrincipal">
        <h1 class="display-4">EVERSWEET</h1>
    </div>

    <div class="form-container p-4 shadow-sm" id="containerFormulario">
        <div class="d-flex align-items-center mb-4 text-uppercase fw-bold border-bottom pb-2">
            <i class="fas fa-cookie-bite me-2 text-danger"></i> 
            <span>Cadastrar Novo Doce</span>
        </div>
        
        <form id="doceForm">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-uppercase">Nome</label>
                    <input type="text" class="form-control" id="inputNome" name="Nome" placeholder="Ex: Brigadeiro de Pistache">
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-uppercase">Sabor</label>
                    <input type="text" class="form-control" id="inputSabor" name="Sabor" placeholder="Ex: Doce / Amargo">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-uppercase">Preço (R$)</label>
                    <input type="text" class="form-control" id="inputPreço" name="Preço" placeholder="0.00">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-uppercase">Quantidade</label>
                    <input type="number" class="form-control" id="inputQuantidade" name="Quantidade" placeholder="0">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-uppercase">Alérgicos</label>
                    <input type="text" class="form-control" id="inputAlérgicos" name="Alérgicos" placeholder="Ex: Lactose">
                </div>
                <div class="col-12">
                    <label class="form-label small fw-bold text-uppercase">Ingredientes</label>
                    <input type="text" class="form-control" id="inputIngredientes" name="Ingredientes" placeholder="Liste os ingredientes">
                </div>
                <div class="col-12">
                    <label class="form-label small fw-bold text-uppercase">Descrição</label>
                    <textarea class="form-control" id="inputDescrição" name="Descrição" rows="2" placeholder="Breve descrição do doce"></textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="button" class="btn btn-add w-100" id="salvaBotao">
                    <i class="fas fa-save me-2"></i>SALVAR NO BANCO DE DADOS
                </button>
            </div>
        </form>
    </div>

    <div class="main-card p-4" id="containerLista">
        <h2 class="h4 mb-4 fw-bold">Itens Cadastrados</h2>
        <div class="table-responsive">
            <table class="table align-middle" id="tabelaDoces">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Sabor</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Alérgenos</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody id="corpoTabelaDoces">
                    <tr id="linhaExemplo">
                        <td class="fw-bold">Brigadeiro Gourmet</td>
                        <td>Chocolate Belga</td>
                        <td>R$ 7,50</td>
                        <td><span class="badge badge-estoque">30 un</span></td>
                        <td><span class="text-danger small">Lactose</span></td>
                        <td class="text-center">
                            <button class="action-btn btnEditar" data-id="1"><i class="fas fa-edit"></i></button>
                            <button class="action-btn btnExcluir" data-id="1"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>