<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" href="logo.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVERSWEET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --vinho: #4a0012;
            --vinho-claro: #6b1a2c;
            --rosa-suave: #ffb3c1;
            --creme: #fff9f5;
            --borda: #ead1d1;
            --texto: #2d0a12;
            --danger: #c0392b;
            --danger-bg: #fff5f5;
        }

        body {
            background-color: var(--creme);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            color: var(--texto);
        }

        .navbar {
            background: rgba(74, 0, 18, 0.97);
            backdrop-filter: blur(16px);
            padding: 0 2.5rem;
            position: sticky; top: 0; z-index: 1000;
            box-shadow: 0 2px 30px rgba(74, 0, 18, 0.25);
            height: 68px; display: flex; align-items: center;
        }
        .nav-container { max-width: 1200px; margin: 0 auto; width: 100%; display: flex; justify-content: space-between; align-items: center; }
        .logo span { color: white; font-family: 'Playfair Display', serif; font-size: 22px; font-weight: 700; letter-spacing: 2px; }
        .nav-links { display: flex; gap: 32px; }
        .nav-links a { color: rgba(255,255,255,0.7); text-decoration: none; font-size: 13px; font-weight: 500; letter-spacing: 0.5px; padding: 4px 0; border-bottom: 1px solid transparent; transition: color .2s, border-color .2s; }
        .nav-links a:hover { color: var(--rosa-suave); border-color: var(--rosa-suave); }
        .nav-user { color: rgba(255,255,255,0.6); font-size: 22px; cursor: pointer; }

        /* ── PAGE HEADER ── */
        .page-header { text-align: center; padding: 56px 20px 40px; }
        .page-header .eyebrow { font-size: 11px; font-weight: 700; letter-spacing: 3px; text-transform: uppercase; color: var(--danger); margin-bottom: 10px; }
        .page-header h1 { font-family: 'Playfair Display', serif; font-size: clamp(32px, 5vw, 52px); font-weight: 700; color: var(--vinho); letter-spacing: -1px; }

        /* ── MAIN CARD ── */
        .delete-card {
            background: white;
            border-radius: 28px;
            border: 1px solid var(--borda);
            box-shadow: 0 8px 40px rgba(74, 0, 18, 0.07);
            padding: 40px;
            max-width: 600px;
            margin: 0 auto 60px;
        }

        /* ── WARNING BANNER ── */
        .warning-banner {
            background: var(--danger-bg);
            border: 1.5px solid rgba(192, 57, 43, 0.2);
            border-radius: 18px;
            padding: 24px;
            text-align: center;
            margin-bottom: 28px;
        }
        .warning-banner .icon-wrap {
            width: 56px; height: 56px;
            background: rgba(192, 57, 43, 0.1);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 12px;
        }
        .warning-banner .icon-wrap i { font-size: 22px; color: var(--danger); }
        .warning-banner h4 { color: var(--danger); font-family: 'Playfair Display', serif; font-size: 18px; margin-bottom: 4px; }
        .warning-banner p { color: #9b4040; font-size: 13px; }

        /* ── INFO GRID ── */
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 28px; }
        .info-grid.full { grid-template-columns: 1fr; }

        .info-item {
            background: #fafafa;
            border: 1px solid var(--borda);
            border-left: 3px solid var(--vinho);
            border-radius: 12px;
            padding: 12px 16px;
        }
        .info-label { font-size: 10px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; color: #b07080; margin-bottom: 4px; }
        .info-value { font-size: 14px; font-weight: 500; color: var(--texto); word-break: break-word; }

        .section-divider {
            font-size: 10px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase;
            color: #c0a0a8; margin-bottom: 14px; padding-bottom: 10px; border-bottom: 1px solid var(--borda);
        }

        /* ── ACTIONS ── */
        .btn-actions { display: flex; gap: 14px; margin-top: 8px; }

        .btn-delete {
            flex: 1; background: var(--danger); color: white; border: none;
            padding: 14px 24px; font-family: 'DM Sans', sans-serif;
            font-size: 14px; font-weight: 600; border-radius: 50px; cursor: pointer;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            transition: all .25s; box-shadow: 0 6px 20px rgba(192, 57, 43, 0.25);
        }
        .btn-delete:hover { background: #a93226; transform: translateY(-2px); box-shadow: 0 10px 28px rgba(192, 57, 43, 0.35); }

        .btn-voltar {
            background: transparent; color: #7a4050; border: 1.5px solid var(--borda);
            padding: 14px 24px; font-family: 'DM Sans', sans-serif;
            font-size: 14px; font-weight: 600; border-radius: 50px; cursor: pointer;
            text-decoration: none; display: flex; align-items: center; gap: 8px;
            transition: all .25s; white-space: nowrap;
        }
        .btn-voltar:hover { border-color: var(--vinho); color: var(--vinho); transform: translateY(-2px); }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .delete-card { padding: 24px 18px; }
            .info-grid { grid-template-columns: 1fr; }
            .btn-actions { flex-direction: column-reverse; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-container">
        <div class="logo"><span>EVERSWEET</span></div>
        <div class="nav-links">
            <a href="/Inicio">Início</a>
            <a href="/Login">Login</a>
            <a href="/Dashboard">Dashboard</a>
            <a href="/doces">Doces</a>
            <a href="/Sobre">Sobre</a>
        </div>
        <i class="fas fa-user-circle nav-user"></i>
    </div>
</nav>

<div class="container px-3">
    <div class="page-header">
        <p class="eyebrow">Ação Irreversível</p>
        <h1>Deletar Doce</h1>
    </div>

    <div class="delete-card">

        <div class="warning-banner">
            <div class="icon-wrap"><i class="fas fa-exclamation-triangle"></i></div>
            <h4>Atenção!</h4>
            <p>Esta ação não pode ser desfeita. O doce será removido permanentemente.</p>
        </div>

        <p class="section-divider">Informações do Doce</p>

        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">ID</div>
                <div class="info-value">#{{ $doce->id ?? $id }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Nome</div>
                <div class="info-value">{{ $doce->Nome ?? 'Não informado' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Sabor</div>
                <div class="info-value">{{ $doce->Sabor ?? 'Não informado' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Preço</div>
                <div class="info-value">R$ {{ number_format($doce->Preco ?? 0, 2, ',', '.') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Quantidade</div>
                <div class="info-value">{{ $doce->Quantidade ?? 0 }} un</div>
            </div>
            <div class="info-item">
                <div class="info-label">Alérgicos</div>
                <div class="info-value">{{ $doce->Alergicos ?? 'Nenhum' }}</div>
            </div>
        </div>

        <div class="info-grid full">
            <div class="info-item">
                <div class="info-label">Ingredientes</div>
                <div class="info-value">{{ $doce->Ingredientes ?? 'Não informado' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Descrição</div>
                <div class="info-value">{{ $doce->Descricao ?? 'Sem descrição' }}</div>
            </div>
        </div>

        <form id="deleteForm" action="{{ url('/deletar/' . $id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="token" value="{{ request()->query('token') }}">

            <div class="btn-actions">
                <a href="/doces" class="btn-voltar"><i class="fas fa-arrow-left"></i> Voltar</a>
                <button type="button" class="btn-delete" id="btnDeletar">
                    <i class="fas fa-trash-alt"></i> Deletar Doce
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('btnDeletar').addEventListener('click', function () {
        Swal.fire({
            title: 'Tem certeza?',
            text: 'Você não poderá reverter esta ação!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#c0392b',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sim, deletar!',
            cancelButtonText: 'Cancelar',
            reverseButtons: true,
            borderRadius: '16px'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    });
</script>
</body>
</html>