<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" href="logo.png" type="image/png">
    <meta charset="UTF-8">
    <title>EVERSWEET</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
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
        .nav-container { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; }
        .logo span { color: white; font-size: 24px; font-weight: 600; letter-spacing: -0.5px; }
        .nav-links { display: flex; gap: 30px; }
        .nav-links a { color: rgba(255,255,255,0.8); text-decoration: none; font-weight: 500; padding: 8px 0; transition: color .2s; }
        .nav-links a:hover { color: #ffb3c1; }

        .main-content { flex: 1; max-width: 1200px; margin: 30px auto; padding: 0 20px; width: 100%; }

        .welcome-card {
            background: linear-gradient(135deg, #4a0012 0%, #6b1a2c 100%);
            border-radius: 25px;
            padding: 35px;
            margin-bottom: 30px;
            color: white;
            box-shadow: 0 15px 30px rgba(74,0,18,0.3);
            position: relative;
            overflow: hidden;
        }
        .welcome-card::before { content: ''; position: absolute; right: 20px; bottom: -20px; font-size: 150px; opacity: 0.1; transform: rotate(15deg); }
        .welcome-card h1 { font-size: 36px; font-weight: 700; margin-bottom: 6px; letter-spacing: -0.5px; }
        .welcome-card p { font-size: 16px; opacity: 0.85; }
        .user-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.15); padding: 6px 16px; border-radius: 50px; font-size: 13px; margin-top: 14px; backdrop-filter: blur(5px); }
        .welcome-actions { display: flex; gap: 12px; margin-top: 20px; flex-wrap: wrap; }
        .btn-welcome {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 10px 22px; border-radius: 50px; font-size: 14px; font-weight: 600;
            text-decoration: none; transition: all .2s; cursor: pointer; border: none;
        }
        .btn-welcome.primary { background: white; color: #4a0012; }
        .btn-welcome.primary:hover { background: #ffe4e4; transform: translateY(-2px); }
        .btn-welcome.secondary { background: rgba(255,255,255,0.15); color: white; border: 1px solid rgba(255,255,255,0.3); }
        .btn-welcome.secondary:hover { background: rgba(255,255,255,0.25); transform: translateY(-2px); }
        .btn-welcome.pdf { background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2); }
        .btn-welcome.pdf:hover { background: rgba(255,255,255,0.2); transform: translateY(-2px); }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 16px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border-left: 4px solid #4a0012;
            box-shadow: 0 2px 12px rgba(74,0,18,0.06);
            transition: transform .2s, box-shadow .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(74,0,18,0.1);
        }

        .stat-card h3 {
            color: #999;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .stat-number {
            font-size: 42px;
            font-weight: 800;
            color: #4a0012;
            letter-spacing: -1px;
            line-height: 1;
            margin-bottom: 6px;
        }

        .stat-sub { font-size: 12px; color: #bbb; }

        .destaques-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .destaque-card {
            background: white;
            border-radius: 16px;
            padding: 20px 22px;
            box-shadow: 0 2px 12px rgba(74,0,18,0.06);
            display: flex;
            align-items: center;
            gap: 16px;
            transition: transform .2s, box-shadow .2s;
        }

        .destaque-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(74,0,18,0.1);
        }

        .destaque-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: #fff0f3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .destaque-label { font-size: 10px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; color: #bbb; margin-bottom: 3px; }
        .destaque-nome { font-size: 15px; font-weight: 700; color: #2d0008; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 180px; }
        .destaque-preco { font-size: 20px; font-weight: 800; color: #4a0012; }
        .destaque-sabor { font-size: 11px; color: #bbb; margin-top: 1px; }

        .chart-card {
            background: white;
            border-radius: 16px;
            padding: 26px;
            box-shadow: 0 2px 12px rgba(74,0,18,0.06);
            margin-bottom: 30px;
        }

        .chart-card h3 {
            color: #4a0012;
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .chart-wrap { position: relative; height: 280px; }

        .footer { background: #370707; color: #683838; padding: 40px 0 20px; margin-top: 20px; }
        .footer-content { max-width: 1200px; margin: 0 auto; padding: 0 20px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; }
        .footer-section h4 { color: white; margin-bottom: 20px; font-size: 18px; }
        .footer-section p { color: #999; line-height: 1.6; margin-bottom: 10px; font-size: 14px; }
        .footer-section a { color: #999; text-decoration: none; }
        .footer-section a:hover { color: #ffb3c1; }
        .social-links { display: flex; gap: 15px; }
        .social-links a { width: 40px; height: 40px; border-radius: 50%; background: #ff0000; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: .3s; }
        .social-links a:hover { background: #4a0012; transform: translateY(-3px); }
        .footer-bottom { text-align: center; padding-top: 30px; margin-top: 30px; border-top: 1px solid #796363; color: white; font-size: 14px; }

        @media (max-width: 900px) {
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .destaques-grid { grid-template-columns: 1fr; }
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
        <div style="color:white;">
            <i class="fas fa-user-circle" style="font-size:24px"></i>
        </div>
    </div>
</nav>

<main class="main-content">

    <div class="welcome-card">
        <h1>Dashboard</h1>
        <p>Visão geral do sistema EVERSWEET</p>
        <div class="welcome-actions">
            <a href="/Cadastro" class="btn-welcome primary">Cadastrar Doce</a>
            <a href="/doces" class="btn-welcome secondary">Ver Catálogo</a>
            <button class="btn-welcome pdf" id="null">
                 Exportar PDF
            </button>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total de Doces</h3>
            <div class="stat-number" id="statTotal">—</div>
            <div class="stat-sub">cadastrados no sistema</div>
        </div>
        <div class="stat-card">
            <h3>Sabores Únicos</h3>
            <div class="stat-number" id="statSabores">—</div>
            <div class="stat-sub">variedades diferentes</div>
        </div>
        <div class="stat-card">
            <h3>Preço Médio</h3>
            <div class="stat-number" id="statPreco">—</div>
            <div class="stat-sub">por doce</div>
        </div>
    </div>

    <div class="destaques-grid">
        <div class="destaque-card">
            <div>
                <div class="destaque-label">Doce mais caro</div>
                <div class="destaque-nome" id="maiorNome">—</div>
                <div class="destaque-preco" id="maiorPreco">—</div>
                <div class="destaque-sabor" id="maiorSabor">—</div>
            </div>
        </div>
        <div class="destaque-card">
            
            <div>
                <div class="destaque-label">Doce mais barato</div>
                <div class="destaque-nome" id="menorNome">—</div>
                <div class="destaque-preco" id="menorPreco">—</div>
                <div class="destaque-sabor" id="menorSabor">—</div>
            </div>
        </div>
    </div>

    <div class="chart-card">
        <h3> Doces Cadastrados por Mês</h3>
        <div class="chart-wrap">
            <canvas id="graficoMeses"></canvas>
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

    const MESES = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];
    let grafico = null;
    let todosDoces = [];

    $.ajax({
        url: '/api/todos_doces',
        method: 'GET',
        success: function (res) {
            if (res.erro !== 'n') return;

            todosDoces = res.doces;
            const total = todosDoces.length;
            const sabores = [...new Set(todosDoces.map(d => d.Sabor.trim().toLowerCase()))].length;
            const media = total > 0
                ? (todosDoces.reduce((s, d) => s + parseFloat(d.Preco), 0) / total).toFixed(2)
                : '0.00';

            $('#statTotal').text(total);
            $('#statSabores').text(sabores);
            $('#statPreco').text('R$ ' + media.replace('.', ','));

            if (total > 0) {
                const maior = todosDoces.reduce((a, b) => parseFloat(a.Preco) > parseFloat(b.Preco) ? a : b);
                const menor = todosDoces.reduce((a, b) => parseFloat(a.Preco) < parseFloat(b.Preco) ? a : b);

                $('#maiorNome').text(maior.Nome);
                $('#maiorPreco').text('R$ ' + parseFloat(maior.Preco).toFixed(2).replace('.', ','));
                $('#maiorSabor').text(maior.Sabor);

                $('#menorNome').text(menor.Nome);
                $('#menorPreco').text('R$ ' + parseFloat(menor.Preco).toFixed(2).replace('.', ','));
                $('#menorSabor').text(menor.Sabor);
            }

            const contagem = Array(12).fill(0);
            todosDoces.forEach(function (d) {
                if (d.created_at) {
                    contagem[new Date(d.created_at).getMonth()]++;
                }
            });

            const ctx = document.getElementById('graficoMeses').getContext('2d');
            if (grafico) grafico.destroy();

            grafico = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: MESES,
                    datasets: [{
                        label: 'Doces cadastrados',
                        data: contagem,
                        backgroundColor: 'rgba(74,0,18,0.08)',
                        borderColor: '#4a0012',
                        borderWidth: 2,
                        borderRadius: 6,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: { callbacks: { label: ctx => ` ${ctx.parsed.y} doce(s)` } }
                    },
                    scales: {
                        x: { grid: { display: false }, ticks: { color: '#999', font: { size: 12 } } },
                        y: { beginAtZero: true, ticks: { stepSize: 1, color: '#999', font: { size: 12 } }, grid: { color: '#fff0f0' } }
                    }
                }
            });
        }
    });

    $('#btnPdf').on('click', function () {
        if (!todosDoces.length) {
            alert('Nenhum doce cadastrado para exportar.');
            return;
        }

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        const agora = new Date().toLocaleDateString('pt-BR');

        const total   = todosDoces.length;
        const sabores = [...new Set(todosDoces.map(d => d.Sabor.trim().toLowerCase()))].length;
        const media   = (todosDoces.reduce((s, d) => s + parseFloat(d.Preco), 0) / total).toFixed(2);
        const maior   = todosDoces.reduce((a, b) => parseFloat(a.Preco) > parseFloat(b.Preco) ? a : b);
        const menor   = todosDoces.reduce((a, b) => parseFloat(a.Preco) < parseFloat(b.Preco) ? a : b);

        let y = 15;

        doc.setFontSize(14);
        doc.setFont('helvetica', 'bold');
        doc.text('EVERSWEET - Relatorio de Doces', 14, y);
        y += 7;

        doc.setFontSize(9);
        doc.setFont('helvetica', 'normal');
        doc.text('Gerado em: ' + agora, 14, y);
        y += 10;

        doc.setFontSize(10);
        doc.setFont('helvetica', 'bold');
        doc.text('Resumo', 14, y);
        y += 6;

        doc.setFont('helvetica', 'normal');
        doc.setFontSize(9);
        doc.text('Total de doces: ' + total, 14, y); y += 5;
        doc.text('Sabores unicos: ' + sabores, 14, y); y += 5;
        doc.text('Preco medio: R$ ' + media.replace('.', ','), 14, y); y += 5;
        doc.text('Mais caro: ' + maior.Nome + ' - R$ ' + parseFloat(maior.Preco).toFixed(2).replace('.', ','), 14, y); y += 5;
        doc.text('Mais barato: ' + menor.Nome + ' - R$ ' + parseFloat(menor.Preco).toFixed(2).replace('.', ','), 14, y); y += 10;

        doc.setFontSize(10);
        doc.setFont('helvetica', 'bold');
        doc.text('Lista de Doces', 14, y);
        y += 6;

        doc.autoTable({
            startY: y,
            head: [['#', 'Nome', 'Sabor', 'Preco (R$)', 'Qtd', 'Alergicos']],
            body: todosDoces.map((d, i) => [
                i + 1,
                d.Nome,
                d.Sabor,
                parseFloat(d.Preco).toFixed(2).replace('.', ','),
                d.Quantidade,
                d.Alergicos || '-'
            ]),
            styles: { fontSize: 9 },
            margin: { left: 14, right: 14 },
        });

        doc.save('eversweet-relatorio-' + agora.replace(/\//g, '-') + '.pdf');
    });

});
</script>

</body>
</html>