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
            position: relative;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: white;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #ffb3c1;
            transition: 0.3s;
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

        .welcome-card {
            background: linear-gradient(135deg, #4a0012 0%, #6b1a2c 100%);
            border-radius: 25px;
            padding: 35px;
            margin-bottom: 35px;
            color: white;
            box-shadow: 0 15px 30px rgba(74, 0, 18, 0.3);
            position: relative;
            overflow: hidden;
        }

        .welcome-card::before {
            content: '🍬';
            position: absolute;
            right: 20px;
            bottom: -20px;
            font-size: 150px;
            opacity: 0.1;
            transform: rotate(15deg);
        }

        .welcome-card h1 {
            font-size: 42px;
            font-weight: 600;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .welcome-card p {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .date-badge {
            background: rgba(255, 255, 255, 0.2);
            display: inline-block;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 14px;
            backdrop-filter: blur(5px);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(74, 0, 18, 0.1);
            transition: 0.3s;
            border: 1px solid rgba(255, 215, 215, 0.5);
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(74, 0, 18, 0.15);
        }

        .stat-icon {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 40px;
            color: #4a0012;
            opacity: 0.1;
        }

        .stat-card h3 {
            color: #666;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 48px;
            font-weight: 700;
            color: #4a0012;
            margin-bottom: 5px;
        }

        .stat-trend {
            color: #10b981;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .orders-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(74, 0, 18, 0.1);
        }

        .orders-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .orders-header h3 {
            color: #4a0012;
            font-size: 22px;
            font-weight: 600;
        }

        .view-all {
            color: #4a0012;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 15px;
            border-radius: 50px;
            background: #fff0f0;
            transition: 0.3s;
        }

        .view-all:hover {
            background: #4a0012;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 15px;
            background: #fff0f0;
            color: #4a0012;
            font-weight: 600;
            font-size: 14px;
            border-radius: 10px 10px 0 0;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ffe0e0;
        }

        .badge {
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge.entregue {
            background: #d1fae5;
            color: #065f46;
        }

        .badge.preparando {
            background: #fef3c7;
            color: #92400e;
        }

        .badge.pendente {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            border: 1px solid #4a0012;
            background: transparent;
            color: #4a0012;
            cursor: pointer;
            transition: 0.3s;
        }

        .action-btn:hover {
            background: #4a0012;
            color: white;
        }

        .footer {
            background: #1a1a1a;
            color: #999;
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
            background: #333;
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
            border-top: 1px solid #333;
            color: #666;
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

<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
            <span>EVERSWEET</span>
        </div>
        <div class="nav-links">
            <a href="/Inicio"> Inicio</a>
            <a href="/Cadastro"> Cadastrar</a>
            <a href="/doces"> Doces</a>
            <a href="/Sobre"> Sobre</a>
        </div>
        <!-- Bagulho nem funciona kkkkkkkkkkkkkkk  mas n pode puxar o login do laravel normal(eu acho)-->
        <div style="color: white;">
            <i class="fas fa-user-circle" style="font-size: 24px;"></i>
        </div>
    </div>
</nav>


<main class="main-content">

    <div class="stats-grid">
        <div class="stat-card">
            <h3> Total de Doces</h3>
            <div class="stat-number">156</div>
        </div>
        
        <div class="stat-card">
            <h3> Pedidos Hoje</h3>
            <div class="stat-number">23</div>
        </div>
        
        <div class="stat-card">
            <h3> Faturamento</h3>
            <div class="stat-number">R$ 1.245</div>           
        </div>
    </div>

    <div class="orders-card">
        <div class="orders-header">
            <h3> Últimos Pedidos</h3>
            <a href="#" class="view-all">Ver todos <i class="fas fa-arrow-right" style="margin-left: 5px;"></i></a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Pedido</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>#00008</strong></td>
                    <td>Odnei</td>
                    <td>01/04/2026</td>
                    <td><strong>R$ 1.000.000</strong></td>
                    <td><span class="badge entregue"><i class="fas fa-check-circle"></i> Entregue</span></td>
                    
                </tr>
                <tr>
                    <td><strong>#00006</strong></td>
                    <td>Soares</td>
                    <td>28/02/2026</td>
                    <td><strong>R$ 77,77</strong></td>
                    <td><span class="badge preparando"><i class="fas fa-clock"></i> Preparando</span></td>
                    
                </tr>
                <tr>
                    <td><strong>#00005</strong></td>
                    <td>Bonome</td>
                    <td>31/02/2026</td>
                    <td><strong>R$ 120,00</strong></td>
                    <td><span class="badge pendente"><i class="fas fa-hourglass"></i> Pendente</span></td>
                    
                </tr>
            </tbody>
        </table>
    </div>
</main>


<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h4><i class="fas fa-candy-cane" style="margin-right: 8px;"></i> EVERSWEET</h4>
            <p>Um dos doces artesanais da região.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
        
        <div class="footer-section">
            <h4>Links Rápidos</h4>
            <p><a href="/Dashboard" style="color: #999; text-decoration: none;">Dashboard</a></p>
            <p><a href="/Cadastro" style="color: #999; text-decoration: none;">Cadastrar Doce</a></p>
            <p><a href="/doces" style="color: #999; text-decoration: none;">Catálogo</a></p>
            <p><a href="/Sobre" style="color: #999; text-decoration: none;">Sobre Nós</a></p>
        </div>
        
        <div class="footer-section">
            <h4>Contato</h4>
            <p><i class="fas fa-phone" style="margin-right: 8px;"></i> (15) 99999-9999</p>
            <p><i class="fas fa-envelope" style="margin-right: 8px;"></i> email@eversweet.com</p>
            <p><i class="fas fa-map-marker-alt" style="margin-right: 8px;"></i> São Paulo, SP</p>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>© 2026 EVERSWEET - Nenhum direito reservados</p>
    </div>
</footer>

</body>
</html>