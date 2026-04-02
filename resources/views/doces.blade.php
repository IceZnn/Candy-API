<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" href="logo.png" type="image/png">
    <meta charset="UTF-8">
    <title>EVERSWEET - Doces</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: linear-gradient(135deg, #fff5f5 0%, #ffe4e4 100%);
            font-family: 'Segoe UI', Roboto, system-ui, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: rgba(74, 0, 18, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            position: sticky;
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
        .logo span { color: white; font-size: 24px; font-weight: 600; letter-spacing: -0.5px; }
        .nav-links { display: flex; gap: 30px; }
        .nav-links a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-weight: 500;
            padding: 8px 0;
        }
        .nav-links a:hover { color: #ffb3c1; }

        .page-header {
            background: linear-gradient(135deg, #4a0012 0%, #6b1a2c 100%);
            padding: 40px 20px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .page-header::before {
            content: '🍫';
            position: absolute;
            right: 40px;
            bottom: -20px;
            font-size: 130px;
            opacity: 0.08;
        }
        .page-header h1 { font-size: 36px; font-weight: 700; margin-bottom: 8px; }
        .page-header p  { opacity: 0.85; font-size: 16px; }

        .main-content {
            flex: 1;
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
            width: 100%;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 12px;
            background: white;
            border-radius: 50px;
            padding: 10px 20px;
            box-shadow: 0 4px 15px rgba(74,0,18,0.1);
            margin-bottom: 30px;
            border: 1px solid #ffd5d5;
        }
        .search-bar i { color: #4a0012; opacity: 0.5; }
        .search-bar input {
            border: none;
            outline: none;
            width: 100%;
            font-size: 15px;
            background: transparent;
            color: #333;
        }

        .state-msg {
            text-align: center;
            padding: 60px 20px;
            color: #999;
            font-size: 16px;
        }
        .state-msg i { font-size: 40px; display: block; margin-bottom: 12px; color: #ffb3c1; }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 28px;
        }

        .card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(74,0,18,0.08);
            border: 1px solid rgba(255,215,215,0.5);
            transition: transform .25s, box-shadow .25s;
            display: flex;
            flex-direction: column;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 36px rgba(74,0,18,0.15);
        }

        .card-thumb {
            background: linear-gradient(135deg, #4a0012 0%, #7c2035 100%);
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 72px;
        }

        .card-body { padding: 24px; flex: 1; }
        .card-body h3 {
            font-size: 20px;
            font-weight: 700;
            color: #4a0012;
            margin-bottom: 6px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .card-body .sabor {
            font-size: 14px;
            color: #999;
            margin-bottom: 12px;
        }
        .card-body .descricao {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 16px;
        }
        .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }
        .preco { font-size: 22px; font-weight: 800; color: #4a0012; }
        .qtd {
            font-size: 13px;
            background: #fff0f0;
            color: #4a0012;
            padding: 5px 14px;
            border-radius: 50px;
            font-weight: 600;
        }

        .alergicos {
            font-size: 12px;
            color: #92400e;
            background: #fef3c7;
            border-radius: 8px;
            padding: 6px 10px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .card-actions {
            display: flex;
            gap: 10px;
            padding: 0 24px 24px;
            align-items: center;
        }

        .btn-ver {
            flex: 1;
            padding: 13px 18px;
            border-radius: 12px;
            border: none;
            background: #4a0012;
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background .2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
        }
        .btn-ver:hover { background: #6b1a2c; }

        .btn-editar, .btn-deletar {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
            transition: .2s;
            flex-shrink: 0;
        }
        .btn-editar { background: #fff0f0; color: #4a0012; border: 1px solid #ffd5d5; }
        .btn-editar:hover { background: #4a0012; color: white; }
        .btn-deletar { background: #fff0f0; color: #dc2626; border: 1px solid #fecaca; }
        .btn-deletar:hover { background: #dc2626; color: white; }

        .badge-dono {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 10px;
            background: #d1fae5;
            color: #065f46;
            border-radius: 50px;
            padding: 3px 8px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .footer {
            background: #370707;
            color: #683838;
            padding: 40px 0 20px;
            margin-top: 50px;
        }
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }
        .footer-section h4 { color: white; margin-bottom: 20px; font-size: 18px; }
        .footer-section p  { color: #999; line-height: 1.6; margin-bottom: 10px; font-size: 14px; }
        .footer-section a  { color: #999; text-decoration: none; }
        .footer-section a:hover { color: #ffb3c1; }
        .social-links { display: flex; gap: 15px; }
        .social-links a {
            width: 40px; height: 40px;
            border-radius: 50%;
            background: #ff0000;
            display: flex; align-items: center; justify-content: center;
            color: white; text-decoration: none; transition: .3s;
        }
        .social-links a:hover { background: #4a0012; transform: translateY(-3px); }
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid #796363;
            color: white;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .footer-content { grid-template-columns: 1fr; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-container">
        <div class="logo"><span>EVERSWEET</span></div>
        <div class="nav-links">
            <a href="/Inicio">Inicio</a>
            <a href="/Login">Login</a>
            <a href="/Cadastro">Cadastrar Doce</a>
            <a href="/doces">Doces</a>
            <a href="/Sobre">Sobre</a>
        </div>
        <div style="color: white;">
            <i class="fas fa-user-circle" style="font-size: 24px;"></i>
        </div>
    </div>
</nav>

<div class="page-header">
    <h1>Nossos Doces</h1>
    <p>Confira todos os doces disponíveis</p>
</div>

<main class="main-content">
    <div class="search-bar">
        <i class="fas fa-search"></i>
        <input type="text" id="busca" placeholder="Buscar por nome ou sabor...">
    </div>
    <div id="conteudo">
        <div class="state-msg">
            <i class="fas fa-spinner fa-spin"></i>
            Carregando doces...
        </div>
    </div>
</main>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h4>EVERSWEET</h4>
            <p>Um dos doces artesanais da região.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
        <div class="footer-section">
            <h4>Links Rápidos</h4>
            <p><a href="/Dashboard">Dashboard</a></p>
            <p><a href="/Cadastro">Cadastrar Doce</a></p>
            <p><a href="/doces">Catálogo</a></p>
            <p><a href="/Sobre">Sobre Nós</a></p>
        </div>
        <div class="footer-section">
            <h4>Contato</h4>
            <p><i class="fas fa-phone" style="margin-right:8px"></i>(15) 99999-9999</p>
            <p><i class="fas fa-envelope" style="margin-right:8px"></i>email@eversweet.com</p>
            <p><i class="fas fa-map-marker-alt" style="margin-right:8px"></i>São Paulo, SP</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2026 EVERSWEET - Nenhum direito reservados</p>
    </div>
</footer>

<script>
$(document).ready(function () {

    const token    = $.cookie("token");
    const userId   = parseInt($.cookie("user_id"));
    let todosDoces = [];

    function renderizar(doces) {
        if (doces.length === 0) {
            $('#conteudo').html(`
                <div class="state-msg">
                    
                    Nenhum doce encontrado.
                </div>
            `);
            return;
        }

        let html = '<div class="grid">';

        doces.forEach(function (d) {
            const eDono = userId && d.user_id === userId;

            const badgeDono = eDono
                ? ``
                : '';

            const btnEditar = (eDono && token)
                ? `<a class="btn-editar" href="/editar/${d.id}?token=${token}" title="Editar"><i class="fas fa-pen"></i></a>`
                : '';

            const btnDeletar = (eDono && token)
                ? `<a class="btn-deletar" href="/deletar/${d.id}?token=${token}" title="Deletar"><i class="fas fa-trash"></i></a>`
                : '';

            const btnVer = token
                ? `<a class="btn-ver" href="/doce/${d.id}?token=${token}"><i class="fas fa-eye"></i> Ver detalhes</a>`
                : `<span class="btn-ver" style="opacity:.5;cursor:default"><i class="fas fa-lock"></i> Faça login</span>`;

            html += `
                <div class="card" data-nome="${d.Nome.toLowerCase()}" data-sabor="${d.Sabor.toLowerCase()}">
                    <div class="card-thumb"></div>
                    <div class="card-body">
                        ${badgeDono}
                        <h3>${d.Nome}</h3>
                        <div class="sabor">${d.Sabor}</div>
                        <div class="descricao">${d.Descricao}</div>
                        <div class="card-meta">
                            <span class="preco">R$ ${parseFloat(d.Preco).toFixed(2)}</span>
                            <span class="qtd">${d.Quantidade} un.</span>
                        </div>
                        <div class="alergicos">
                            <i class="fas fa-exclamation-triangle"></i>
                            ${d.Alergicos}
                        </div>
                    </div>
                    <div class="card-actions">
                        ${btnVer}
                        ${btnEditar}
                        ${btnDeletar}
                    </div>
                </div>
            `;
        });

        html += '</div>';
        $('#conteudo').html(html);
    }

    function mostrarErro(msg) {
        $('#conteudo').html(`
            <div class="state-msg">
                <i class="fas fa-exclamation-circle" style="color:#dc2626"></i>
                ${msg}
            </div>
        `);
    }

    $.ajax({
        url: '/api/todos_doces',
        method: 'GET',
        success: function (res) {
            if (res.erro === 'n') {
                todosDoces = res.doces;
                renderizar(todosDoces);
            } else {
                mostrarErro('Não foi possível carregar os doces.');
            }
        },
        error: function () {
            mostrarErro('Erro ao conectar com o servidor.');
        }
    });

    $('#busca').on('input', function () {
        const termo = $(this).val().toLowerCase().trim();
        if (!termo) { renderizar(todosDoces); return; }
        const filtrado = todosDoces.filter(function (d) {
            return d.Nome.toLowerCase().includes(termo) || d.Sabor.toLowerCase().includes(termo);
        });
        renderizar(filtrado);
    });

});
</script>

</body>
</html>