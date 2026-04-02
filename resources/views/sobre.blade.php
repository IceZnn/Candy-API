<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" href="logo.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVERSWEET - Sobre</title>
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
            color: #2d0008;
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

        .hero {
            background: linear-gradient(135deg, #4a0012 0%, #6b1a2c 100%);
            padding: 70px 20px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '🍫';
            position: absolute;
            right: 60px; bottom: -30px;
            font-size: 180px;
            opacity: 0.06;
        }
        .hero::after {
            content: '🍫';
            position: absolute;
            left: 40px; top: -20px;
            font-size: 140px;
            opacity: 0.05;
        }
        .hero h1 { font-size: 48px; font-weight: 800; letter-spacing: -2px; margin-bottom: 12px; }
        .hero p  { font-size: 18px; opacity: 0.85; max-width: 520px; margin: 0 auto; line-height: 1.6; }

        .main-content { flex: 1; max-width: 1100px; margin: 60px auto; padding: 0 24px; width: 100%; }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #c4748a;
            margin-bottom: 10px;
        }
        .section-heading {
            font-size: 32px;
            font-weight: 800;
            color: #4a0012;
            letter-spacing: -1px;
            margin-bottom: 20px;
        }

        
        .projeto-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
            margin-bottom: 80px;
        }
        .projeto-text p {
            font-size: 15px;
            color: #555;
            line-height: 1.8;
            margin-bottom: 16px;
        }
        .projeto-visual {
            background: linear-gradient(135deg, #4a0012 0%, #7c2035 100%);
            border-radius: 28px;
            padding: 40px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            background: rgba(255,255,255,0.08);
            border-radius: 16px;
            padding: 16px 20px;
        }
        .feature-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            background: rgba(255,179,193,0.2);
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }
        .feature-text h4 { color: white; font-size: 15px; font-weight: 700; margin-bottom: 3px; }
        .feature-text p  { color: rgba(255,255,255,0.65); font-size: 13px; line-height: 1.5; }

        
        .tech-section { margin-bottom: 80px; text-align: center; }
        .tech-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            justify-content: center;
            margin-top: 30px;
        }
        .tech-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: white;
            border: 1px solid #ffd5d5;
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            color: #4a0012;
            box-shadow: 0 4px 12px rgba(74,0,18,0.06);
            transition: transform .2s, box-shadow .2s;
        }
        .tech-badge:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(74,0,18,0.12); }
        .tech-badge i { font-size: 16px; }

        
        .criadores-section { margin-bottom: 80px; }
        .criadores-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            margin-top: 30px;
        }
        .criador-card {
            background: white;
            border: 1px solid #ffd5d5;
            border-radius: 24px;
            padding: 36px 28px;
            text-align: center;
            box-shadow: 0 8px 24px rgba(74,0,18,0.07);
            transition: transform .25s, box-shadow .25s;
        }
        .criador-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(74,0,18,0.13); }
        .criador-avatar {
            width: 160px; height: 160px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4a0012, #7c2035);
            display: flex; align-items: center; justify-content: center;
            font-size: 32px;
            margin: 0 auto 18px;
            border: 3px solid #ffd5d5;
        }
        .criador-card h3 { font-size: 20px; font-weight: 800; color: #4a0012; margin-bottom: 6px; }
        .criador-card .cargo {
            display: inline-block;
            background: #fff0f0;
            color: #4a0012;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 4px 14px;
            border-radius: 50px;
            margin-bottom: 16px;
        }
        .criador-card p { font-size: 14px; color: #777; line-height: 1.7; }
        .criador-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            margin-top: 18px;
        }
        .skill-tag {
            background: #fff5f5;
            border: 1px solid #ffd5d5;
            color: #4a0012;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 6px;
        }

        
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 80px;
        }
        .stat-box {
            background: white;
            border: 1px solid #ffd5d5;
            border-radius: 20px;
            padding: 28px 20px;
            text-align: center;
            box-shadow: 0 4px 16px rgba(74,0,18,0.06);
        }
        .stat-box .num { font-size: 36px; font-weight: 800; color: #4a0012; letter-spacing: -1px; }
        .stat-box .lbl { font-size: 13px; color: #999; margin-top: 4px; font-weight: 500; }

        
        .footer { background: #370707; padding: 40px 0 20px; margin-top: 20px; }
        .footer-content { max-width: 1200px; margin: 0 auto; padding: 0 20px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; }
        .footer-section h4 { color: white; margin-bottom: 20px; font-size: 18px; }
        .footer-section p  { color: #999; line-height: 1.6; margin-bottom: 10px; font-size: 14px; }
        .footer-section a  { color: #999; text-decoration: none; }
        .footer-section a:hover { color: #ffb3c1; }
        .social-links { display: flex; gap: 15px; }
        .social-links a { width: 40px; height: 40px; border-radius: 50%; background: #ff0000; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: .3s; }
        .social-links a:hover { background: #4a0012; transform: translateY(-3px); }
        .footer-bottom { text-align: center; padding-top: 30px; margin-top: 30px; border-top: 1px solid #796363; color: white; font-size: 14px; }

        @media (max-width: 768px) {
            .projeto-grid, .criadores-grid { grid-template-columns: 1fr; }
            .stats-row { grid-template-columns: repeat(2, 1fr); }
            .footer-content { grid-template-columns: 1fr; }
            .nav-links { display: none; }
            .hero h1 { font-size: 32px; }
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

<div class="hero">
    <h1>Sobre o EVERSWEET</h1>
    <p>Conheça o projeto e as pessoas por trás desta plataforma de gestão de confeitaria.</p>
</div>

<main class="main-content">

    
    <div class="projeto-grid">
        <div class="projeto-text">
            <div class="section-title">O Projeto</div>
            <h2 class="section-heading">O que é o EVERSWEET?</h2>
            <p>O EVERSWEET é um sistema de gestão desenvolvido para confeitarias e produtores de doces artesanais. A plataforma centraliza o cadastro, controle e visualização de produtos, facilitando a organização.</p>
            <p>Com foco em simplicidade e eficiência, o sistema permite que cada produtor gerencie seu próprio catálogo de doces com total autonomia.</p>
            <p>O projeto nasceu de uma atividade do SENAI DS Tatuí pelos professores Vinicius e Daniel.</p>
        </div>
        <div class="projeto-visual">
            <div class="feature-item">
                <div class="feature-icon">🍬</div>
                <div class="feature-text">
                    <h4>Catalogo de Doces</h4>
                    <p>Gerencie todos os seus produtos em um só lugar.</p>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🔒</div>
                <div class="feature-text">
                    <h4>Controle por Usuario</h4>
                    <p>Cada doce pertence ao seu criador e as permissões são unicas deles. </p>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">📊</div>
                <div class="feature-text">
                    <h4>Dashboard</h4>
                    <p>Visualize informações essenciais.</p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="stats-row">
        <div class="stat-box">
            <div class="num">PROJETO</div>
            <div class="lbl">Educacional</div>
        </div>
        <div class="stat-box">
            <div class="num">2</div>
            <div class="lbl">Desenvolvedores</div>
        </div>
        <div class="stat-box">
            <div class="num">API</div>
            <div class="lbl">REST com Token</div>
        </div>
        <div class="stat-box">
            <div class="num">Laravel</div>
            <div class="lbl">Backend</div>
        </div>
    </div>

    
    <div class="tech-section">
        <div class="section-title">Stack</div>
        <h2 class="section-heading">Tecnologias utilizadas</h2>
        <div class="tech-grid">
            <span class="tech-badge"><i class="fab fa-laravel" style="color:#f9322c"></i> Laravel</span>
            <span class="tech-badge"><i class="fab fa-php" style="color:#777bb4"></i> PHP</span>
            <span class="tech-badge"><i class="fas fa-database" style="color:#4479a1"></i> MySQL</span>
            <span class="tech-badge"><i class="fab fa-js" style="color:#f7df1e"></i> JavaScript</span>
            <span class="tech-badge"><i class="fab fa-bootstrap" style="color:#7952b3"></i> Bootstrap</span>
            <span class="tech-badge"><i class="fab fa-html5" style="color:#e34f26"></i> HTML & CSS</span>
            <span class="tech-badge"><i class="fas fa-cookie-bite" style="color:#4a0012"></i> jQuery Cookie</span>
            <span class="tech-badge"><i class="fas fa-key" style="color:#f59e0b"></i> Auth por Token</span>
        </div>
    </div>

    
    <div class="criadores-section">
        <div class="section-title">Time</div>
        <h2 class="section-heading">Quem fez o EVERSWEET</h2>
        <div class="criadores-grid">
            <div class="criador-card">
                <div class="criador-avatar"><img src="/penpen.jpg" style="width:100%;height:100%;border-radius:50%;object-fit:cover;"></div>
                <h3>Kauã Soares</h3>
                <span class="cargo">Backend Developer</span>
                <p>Responsável pela API,autenticação por token, rotas e controllers.</p>
                <div class="criador-skills">
                    <span class="skill-tag">Laravel</span>
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">MySQL</span>
                    <span class="skill-tag">REST API</span>
                </div>
            </div>
            <div class="criador-card">
                <div class="criador-avatar"><img src="/grifo.jpg" style="width:100%;height:100%;border-radius:50%;object-fit:cover;"></div>
                <h3>Kauan Bonome</h3>
                <span class="cargo">Dev FrontEnd</span>
                <p>Responsável pelo design das interfaces,JS e Css</p>
                <div class="criador-skills">
                    <span class="skill-tag">HTML & CSS</span>
                    <span class="skill-tag">JavaScript</span>
                    <span class="skill-tag">Bootstrap</span>
                    <span class="skill-tag">jQuery</span>
                </div>
            </div>
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

</body>
</html>