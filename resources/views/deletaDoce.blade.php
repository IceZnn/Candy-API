<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVERSWEET - Deletar Doce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --vinho: #4a0012;
            --pastel-creme: #fff9f5;
            --borda: #ead1d1;
        }

        body {
            background-color: var(--pastel-creme);
            font-family: 'Segoe UI', Roboto, sans-serif;
            min-height: 100vh;
            align-items: center;
            color: var(--vinho);
        }

        

        .card {
            border: 2px solid var(--borda);
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(74, 0, 18, 0.15);
            padding: 2rem;
            background: white;
        }

        .title-section h1 {
            color: var(--vinho);
            font-weight: 600;
            font-size: 2.5rem;
            letter-spacing: -1px;
        }

        .btn-danger-custom {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-danger-custom:hover {
            background-color: #bb2d3b;
            transform: translateY(-2px);
        }

        .btn-secondary-custom {
            background-color: #6c757d;
            color: white;
            padding: 12px 30px;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
            width: 100%;
            text-align: center;
        }

        .btn-secondary-custom:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
            color: white;
        }

        .info-box {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid var(--borda);
        }

        .info-item {
            background: white;
            border-radius: 10px;
            padding: 10px 15px;
            border-left: 4px solid var(--vinho);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            height: 100%;
        }

        .info-label {
            font-weight: 600;
            color: var(--vinho);
            display: block;
            font-size: 0.8rem;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .info-value {
            color: #2d2d2d;
            font-size: 1rem;
            font-weight: 500;
            display: block;
            word-break: break-word;
        }

        .alert-warning {
            background-color: rgba(220, 53, 69, 0.1);
            border: 2px solid #dc3545;
            border-radius: 15px;
            padding: 1rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .alert-warning i {
            font-size: 3rem;
            color: #dc3545;
            margin-bottom: 0.5rem;
        }

        .alert-warning h4 {
            color: #dc3545;
            font-weight: 600;
        }

        .navbar-sweet {
            background: rgba(74, 0, 18, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            position: sticky;
            width: 100%
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(74, 0, 18, 0.3);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo i {
            color: #ffb3c1;
            font-size: 28px;
        }

        .logo span {
            color: white;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            padding: 8px 0;
            position: relative; 
        }

        .nav-links a:hover {
            color: red; 
        }

        .nav-links a:hover::after {
            width: 100%;
        }
        .main-content {
            flex: 1;
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
            width: 100%;
        }
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
            
            .nav-links {
                display: none;
            }
        }
    
    </style>
</head>
<body>
    <nav class="navbar-sweet">
    <div class="nav-container">
        <div class="logo">
            <span>EVERSWEET</span>
        </div>
        <div class="nav-links">
            <a href="/Inicio"> Inicio</a>
            <a href="/Dashboard"> Dashboard</a>
            <a href="/doces"> Doces</a>
            <a href="/Sobre"> Sobre</a>
        </div>
        <!-- Bagulho nem funciona kkkkkkkkkkkkkkk  mas n pode puxar o login do laravel normal(eu acho)-->
        <div style="color: white;">
            <i class="fas fa-user-circle" style="font-size: 24px;"></i>
        </div>
    </div>
    </nav>    

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center title-section mb-4">
                    <h1 class="display-4">EVERSWEET</h1>
                    <p class="lead text-muted">Deletar Doce</p>
                </div>

                <div class="card">
                    <div class="alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        <h4>Atenção!</h4>
                        <p class="mb-0">Esta ação é irreversível</p>
                    </div>

                    <div class="info-box">
                        <h5 class="mb-3" style="color: var(--vinho);">
                            Informações do Doce
                        </h5>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="info-item">
                                    <span class="info-label">ID:</span>
                                    <span class="info-value">#{{ $doce->id ?? $id }}</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="info-item">
                                    <span class="info-label">Nome:</span>
                                    <span class="info-value">{{ $doce->Nome ?? 'Não informado' }}</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="info-item">
                                    <span class="info-label">Sabor:</span>
                                    <span class="info-value">{{ $doce->Sabor ?? 'Não informado' }}</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="info-item">
                                    <span class="info-label">Preço:</span>
                                    <span class="info-value">R$ {{ number_format($doce->Preco ?? 0, 2, ',', '.') }}</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="info-item">
                                    <span class="info-label">Quantidade:</span>
                                    <span class="info-value">{{ $doce->Quantidade ?? 0 }} un</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="info-item">
                                    <span class="info-label">Alérgicos:</span>
                                    <span class="info-value">{{ $doce->Alergicos ?? 'Nenhum' }}</span>
                                </div>
                            </div>
                        <!-- Pneu furou, acende o farol!. -->
                            <div class="col-12 mb-3">
                                <div class="info-item">
                                    <span class="info-label">Ingredientes:</span>
                                    <span class="info-value">{{ $doce->Ingredientes ?? 'Não informado' }}</span>
                                </div>
                            </div>
                            
                            <div class="col-12 mb-3">
                                <div class="info-item">
                                    <span class="info-label">Descrição:</span>
                                    <span class="info-value">{{ $doce->Descricao ?? 'Sem descrição' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form id="deleteForm" action="{{ url('/deletar', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <div class="d-grid gap-3">
                            <button type="button" class="btn btn-danger-custom" id="btnDeletar">
                                <i class="fas fa-trash-alt me-2"></i>DELETAR DOCE
                            </button>
                            <a href="/Cadastro" class="btn btn-secondary-custom">
                                <i class="fas fa-arrow-left me-2"></i>VOLTAR
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('btnDeletar').addEventListener('click', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter esta ação!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sim, deletar!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm').submit();
                }
            });
        });
    </script>
</body>
</html>