<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>EVERSWEET</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
            position: flex;
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
            padding: 0 10px;
            width: 100%;
            text-align: center;
        }

        /* Caixa do EVERSWEET central.*/
        .welcome-box {
            background: white;
            border-radius: 30px;
            padding: 60px 40px;
            box-shadow: 0 20px 40px rgba(255, 100, 139, 0.19);
            margin-bottom: 40px;
        }

        .welcome-box h1 {
            color: #4a0012;
            font-size: 56px;
            margin-bottom: 20px;
        }

        .welcome-box p {
            color: #666;
            font-size: 20px;
            max-width: 600px;
            margin: 0 auto 30px;
        }

        .btn {
            background: #4a0012;
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 18px;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(74, 0, 18, 0.47);
        }

        .btn:hover {
            background: #6b1a2c92;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(74, 0, 18, 0.4);
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 40px;
        }

        .feature {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(74, 0, 18, 0.1);
            border: 1px solid #ffd7d7;
        }

        .feature i {
            font-size: 48px;
            color: #4a0012;
            margin-bottom: 20px;
        }

        .feature h3 {
            color: #4a0012;
            margin-bottom: 10px;
            font-size: 22px;
        }

        .feature p {
            color: #271313;
            line-height: 1.6;
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

        .footer-section h4 {
            color: white;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .footer-section {
            color: white;
            margin-bottom: 20px;
            font-size: 17px;
        }

        .footer-section p {
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ff0000;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .social-links a:hover {
            background: #4a0012;
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid #796363;
            color: #ffffff;
        }

        @media (max-width: 768px) {
            .features {
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
<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
            <span>EVERSWEET</span>
        </div>
        <div class="nav-links">
            <a href="/"> Início</a>
            <a href="/Login">Login</a>
            <a href="/Dashboard"> Dashboard</a>
            <a href="/Cadastro"> Cadastrar Doce</a>
            <a href="/doces"> Doces</a>
            <a href="/Sobre"> Sobre</a>
        </div>
        <div style="color: white;">
            <i class="fas fa-user-circle" style="font-size: 24px;"></i>
        </div>
    </div>
</nav>

<main class="main-content">
    <div class="welcome-box">
        <h1>EVERSWEET</h1>
        <p>Os melhores doces artesanais você encontra aqui! Feitos com amor e os melhores ingredientes.</p>
        <a href="/doces" class="btn">
            Ver Doces
        </a>
    </div>

    <div class="features">
        <div class="feature">
            <h3>Feito com dedicação</h3>
            <p>Só que quero dinheiro</p>
        </div>
        <div class="feature">
            <h3>Entrega Rápida</h3>
            <p>Flash só é rápido por que nois fornece o açucar</p>
        </div>
        <div class="feature">
            <h3>Qualidade</h3>
            <p>Um dos melhores doces.</p>
        </div>
    </div>
</main>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h4> EVERSWEET</h4>
            <p>Os melhores doces artesanais da região. Feitos com amor e ingredientes selecionados.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
        
        <div class="footer-section">
            <h4>Links Rápidos</h4>
            <p><a href="/">Início</a></p>
            <p><a href="/Dashboard">Dashboard</a></p>
            <p><a href="/Cadastro">Cadastrar Doce</a></p>
            <p><a href="/doces">Catálogo</a></p>
            <p><a href="/Sobre">Sobre Nós</a></p>
        </div>
        
        <div class="footer-section">
            <h4>Contato</h4>
            <p> (15) 99999-9999</p>
            <p> contato@eversweet.com</p>
            <p> São Paulo, SP</p>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p> 2026 EVERSWEET - Nenhum direito reservado </p>
    </div>
</footer>

</body>
</html>