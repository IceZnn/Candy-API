<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVERSWEET - Detalhes do Doce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        .btn-voltar {
            background-color: var(--vinho);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 400;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-voltar:hover {
            background-color: #ffa7a7;
            color: white;
            transform: translateY(-2px);
        }

        .btn-editar {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 400;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-editar:hover {
            background-color: #5a6268;
            color: white;
            transform: translateY(-2px);
        }

        .info-card {
            background-color: var(--pastel-rosa);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid var(--borda);
        }

        .info-label {
            font-size: 0.85rem;
            text-transform: uppercase;
            color: #6c757d;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .info-value {
            font-size: 1.1rem;
            color: var(--vinho);
            font-weight: 500;
            word-break: break-word;
        }

        .badge-alergico {
            background-color: #ffebee;
            color: #c62828;
            border: 1px solid #ef9a9a;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .badge-estoque {
            background-color: var(--pastel-rosa);
            color: var(--vinho);
            border: 1px solid var(--primario-suave);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 1rem;
        }
    </style>
</head>
<body>

<div class="container py-5">
    

    @if(isset($doce) && $doce)
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="main-card p-5">
                
                <div class="text-center mb-4">
                    <h2 class="display-6 fw-bold">{{ $doce->Nome ?? 'Sem nome' }}</h2>
                    <span class="badge badge-estoque mt-2">{{ $doce->Quantidade ?? 0 }} un</span>
                </div>

                
                <div class="info-card mt-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="info-label">Sabor</div>
                            <div class="info-value">{{ $doce->Sabor ?? 'Não informado' }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-label">Preço</div>
                            <div class="info-value fw-bold">R$ {{ number_format($doce->Preço ?? 0, 2, ',', '.') }}</div>
                        </div>
                        <div class="col-12">
                            <div class="info-label">Alérgicos</div>
                            <div class="info-value">
                                @if($doce->Alérgicos)
                                    <span class="badge-alergico">{{ $doce->Alérgicos }}</span>
                                @else
                                    <span class="text-muted">Nenhum</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="info-label">Ingredientes</div>
                            <div class="info-value">{{ $doce->Ingredientes ?? 'Não informado' }}</div>
                        </div>
                        <div class="col-12">
                            <div class="info-label">Descrição</div>
                            <div class="info-value">{{ $doce->Descrição ?? 'Sem descrição' }}</div>
                        </div>
                        <div class="col-12">
                            <div class="info-label">Código do Produto</div>
                            <div class="info-value small text-muted">#{{ $doce->id ?? '-' }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @else
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <div class="main-card p-5">
                <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                <h3>Doce não encontrado!</h3>
                <p class="text-muted">O doce que você está procurando não existe ou foi removido.</p>
                <a href="/doces" class="btn-voltar mt-3">
                    <i class="fas fa-arrow-left me-2"></i>VOLTAR PARA LISTA
                </a>
            </div>
        </div>
    </div>
    @endif
</div>

</body>
</html>