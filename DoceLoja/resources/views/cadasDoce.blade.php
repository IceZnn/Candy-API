<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoceLoja - Gestão Completa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { background-color: #30000a; color: #4a3035; }
        .card { border-radius: 15px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .btn-primary { background-color: #ff85a1; border: none; }
        .btn-primary:hover { background-color: #2b000b; }
        .table thead { background-color: #ff85a1; color: white; }
        .form-label { font-weight: 600; font-size: 0.9rem; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="display-4 fw-bold" style="color: #ffffff;">DoceLoja </h1>
    </div>

    <div class="card p-4 mb-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 m-0">Cardápio de Doces</h2>
            <button class="btn btn-primary px-4" onclick="toggleForm()">+ Novo Doce</button>
        </div>

        <div id="formulario" class="card p-4 mb-4 bg-light" style="display: none; border: 1px dashed #ff85a1;">
            <h3 class="h5 mb-3">Cadastrar Novo Item</h3>
            <form id="doceForm">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Ex: Brigadeiro">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Sabor</label>
                        <input type="text" class="form-control" id="sabor" placeholder="Ex: Doce/Amargo">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Preço</label>
                        <input type="text" class="form-control" id="preco" placeholder="R$ 0,00">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ingredientes</label>
                        <input type="text" class="form-control" id="ingredientes">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Alérgicos</label>
                        <input type="text" class="form-control" id="alergicos" placeholder="Ex: Lactose">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Descrição curta</label>
                        <textarea class="form-control" rows="2" id="desc"></textarea>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="button" class="btn btn-success px-4" onclick="salvarDoce()">Salvar Doce</button>
                    <button type="button" class="btn btn-secondary px-4" onclick="toggleForm()">Cancelar</button>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sabor</th>
                        <th>Preço</th>
                        <th>Qtd</th>
                        <th>Alérgicos</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Brigadeiro Gourmet</strong></td>
                        <td>Doce</td>
                        <td>R$ 6,00</td>
                        <td>20 un</td>
                        <td><span class="badge bg-warning text-dark">Lactose</span></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info">Editar</button>
                            <button class="btn btn-sm btn-outline-danger" onclick="excluirDoce()">Excluir</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function toggleForm() {
        const f = document.getElementById('formulario');
        f.style.display = f.style.display === 'none' ? 'block' : 'none';
    }

    function salvarDoce() {
        Swal.fire({
            title: 'Delícia Cadastrada!',
            text: 'O item foi adicionado com sucesso.',
            icon: 'success',
            confirmButtonColor: '#ff85a1'
        });
        toggleForm();
        document.getElementById('doceForm').reset();
    }

    function excluirDoce() {
        Swal.fire({
            title: 'Remover Doce?',
            text: "Este doce sairá do cardápio permanentemente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sim, remover',
            cancelButtonText: 'Manter'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Removido!', 'O item foi excluído.', 'success');
            }
        })
    }
</script>

</body>
</html>