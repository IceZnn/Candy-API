<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Segoe+UI:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      background: linear-gradient(135deg, #fff5f5 0%, #ffe4e4 100%);
      font-family: 'Segoe UI', Roboto, system-ui, sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* ── NAVBAR ── */
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
    .logo { display: flex; align-items: center; gap: 10px; }
    .logo i { color: #ffb3c1; font-size: 28px; }
    .logo span { color: white; font-size: 24px; font-weight: 600; letter-spacing: -0.5px; }

    .nav-links { display: flex; gap: 30px; }
    .nav-links a {
      color: rgba(255,255,255,0.8);
      text-decoration: none;
      font-weight: 500;
      padding: 8px 0;
      position: relative;
      transition: color 0.3s;
    }
    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0;
      width: 0; height: 2px;
      background: #ffb3c1;
      transition: width 0.3s;
    }
    .nav-links a:hover { color: #ffb3c1; }
    .nav-links a:hover::after { width: 100%; }


    .main-content {
      flex: 1;
      max-width: 1200px;
      margin: 40px auto;
      padding: 0 20px;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
    }


    .welcome-card {
      background: linear-gradient(135deg, #4a0012 0%, #6b1a2c 100%);
      border-radius: 25px;
      padding: 35px 40px;
      margin-bottom: 28px;
      color: white;
      box-shadow: 0 15px 30px rgba(74, 0, 18, 0.3);
      position: relative;
      overflow: hidden;
      width: 100%;
      max-width: 560px;
    }
    /* Esse emoji é na onde ta escrito cire sua conta,achei bem bonito ent quando for alterar é aqui!*/
    .welcome-card::before {
      content: '🍫';
      position: absolute;
      right: 20px; bottom: -20px;
      font-size: 150px;
      opacity: 0.1;
      transform: rotate(15deg);
    }
    .welcome-card h1 {
      font-family: 'Playfair Display', serif;
      font-size: 38px;
      font-weight: 700;
      margin-bottom: 8px;
    }
    .welcome-card p { font-size: 16px; opacity: 0.85; margin-bottom: 18px; }
    .date-badge {
      background: rgba(255,255,255,0.2);
      display: inline-block;
      padding: 6px 18px;
      border-radius: 50px;
      font-size: 13px;
      backdrop-filter: blur(5px);
    }


    .form-card {
      background: white;
      border-radius: 25px;
      padding: 35px 40px;
      width: 100%;
      max-width: 560px;
      box-shadow: 0 15px 40px rgba(74, 0, 18, 0.12);
      border: 1px solid rgba(255, 215, 215, 0.5);
    }

    .form-group { margin-bottom: 1.2rem; }

    label {
      display: block;
      font-size: 12px;
      font-weight: 600;
      color: #4a0012;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin-bottom: 7px;
    }

    .input-wrap { position: relative; }
    .input-wrap i {
      position: absolute;
      left: 14px; top: 50%;
      transform: translateY(-50%);
      color: #c4748a;
      font-size: 14px;
      pointer-events: none;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"] {
      width: 100%;
      background: #fff5f5;
      border: 1.5px solid #ffd7d7;
      border-radius: 12px;
      padding: 0.72rem 1rem 0.72rem 2.6rem;
      color: #2d0008;
      font-family: 'Segoe UI', sans-serif;
      font-size: 0.95rem;
      outline: none;
    }
    input::placeholder { color: #c4a0a8; }
    input:focus {
      border-color: #4a0012;
      background: #fff;
      box-shadow: 0 0 0 3px rgba(74,0,18,0.08);
    }
    .input-wrap:focus-within i { color: #4a0012; }
    input.is-invalid { border-color: #e53e3e !important; box-shadow: 0 0 0 3px rgba(229,62,62,0.1) !important; }

    .field-error {
      display: none;
      font-size: 12px;
      color: #c53030;
      margin-top: 5px;
    }
    .field-error.show { display: block; }

    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      color: #c4a0a8;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      margin: 1.4rem 0;
    }
    .divider::before, .divider::after {
      content: ''; flex: 1;
      height: 1px;
      background: #ffd7d7;
    }

    .btn-cadastrar {
      width: 100%;
      padding: 0.9rem;
      background: linear-gradient(135deg, #4a0012 0%, #6b1a2c 100%);
      border: none;
      border-radius: 12px;
      color: white;
      font-family: 'Playfair Display', serif;
      font-size: 1.05rem;
      font-weight: 600;
      cursor: pointer;
      transition: transform 0.15s, box-shadow 0.2s, opacity 0.2s;
      margin-top: 0.4rem;
      letter-spacing: 0.02em;
    }
    .btn-cadastrar:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 30px rgba(74,0,18,0.35);
    }
    .btn-cadastrar:active { transform: translateY(0); }
    .btn-cadastrar:disabled { opacity: 0.65; cursor: not-allowed; transform: none; }

    .spinner {
      display: none;
      width: 20px; height: 20px;
      border: 2px solid rgba(255,255,255,0.3);
      border-top-color: white;
      border-radius: 50%;
      animation: spin 0.7s linear infinite;
      margin: 0 auto;
    }
    .btn-cadastrar.loading .btn-text { display: none; }
    .btn-cadastrar.loading .spinner { display: block; }

    .form-footer {
      text-align: center;
      margin-top: 1.2rem;
      font-size: 14px;
      color: #888;
    }
    .form-footer a {
      color: #4a0012;
      font-weight: 600;
      text-decoration: none;
    }
    .form-footer a:hover { text-decoration: underline; }

    /* ── TOAST ── */
    .toast {
      position: fixed;
      bottom: 2rem; left: 50%;
      transform: translateX(-50%) translateY(120px);
      background: white;
      border: 1px solid #ffd7d7;
      border-radius: 14px;
      padding: 14px 22px;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 10px;
      z-index: 9999;
      transition: transform 0.4s cubic-bezier(0.34,1.56,0.64,1);
      min-width: 260px;
      box-shadow: 0 20px 50px rgba(74,0,18,0.15);
    }
    .toast.show { transform: translateX(-50%) translateY(0); }
    .toast.success { border-color: #10b981; }
    .toast.error   { border-color: #e53e3e; }
    .toast-icon { font-size: 18px; }

    /* ── FOOTER ── */
    footer {
      background: #370707;
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
    .footer-section h4 { color: white; margin-bottom: 15px; font-size: 17px; }
    .footer-section p  { color: rgba(255,255,255,0.55); line-height: 1.7; font-size: 14px; margin-bottom: 6px; }

    .social-links { display: flex; gap: 12px; margin-top: 10px; }
    .social-links a {
      width: 38px; height: 38px;
      border-radius: 50%;
      background: #b20020;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-decoration: none;
      transition: 0.3s;
      font-size: 15px;
    }
    .social-links a:hover { background: #4a0012; transform: translateY(-3px); }

    .footer-bottom {
      text-align: center;
      padding-top: 25px;
      margin-top: 25px;
      border-top: 1px solid #553030;
      color: rgba(255,255,255,0.4);
      font-size: 13px;
    }

    @keyframes slideDown {
      from { opacity: 0; transform: translateY(-24px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    @media (max-width: 768px) {
      .nav-links { display: none; }
      .footer-content { grid-template-columns: 1fr; }
      .form-card, .welcome-card { padding: 25px 18px; }
      .welcome-card h1 { font-size: 28px; }
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
            <a href="/Login">Login</a>
            <a href="/Cadastro"> Cadastrar Doce</a>
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

    <div class="welcome-card">
      <h1>Crie sua conta</h1>
      <p>Preencha os dados abaixo.</p>
    </div>

    <div class="form-card">

      <div class="form-group">
        <label for="nome">Nome completo</label>
        <div class="input-wrap">
          <input type="text" id="nome" placeholder="Seu nome completo"/>
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="field-error" id="err-nome">Por favor, informe seu nome.</div>
      </div>

      <div class="form-group">
        <label for="email">E-mail</label>
        <div class="input-wrap">
          <input type="email" id="email" placeholder="voce@empresa.com"/>
          <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="field-error" id="err-email">Informe um e-mail válido.</div>
      </div>

      <div class="form-group">
        <label for="telefone">Telefone</label>
        <div class="input-wrap">
          <input type="tel" id="telefone" placeholder="(11) 9 0000-0000" maxlength="16"/>
          <i class="fa-solid fa-mobile-screen"></i>
        </div>
        <div class="field-error" id="err-telefone">Por favor, informe seu telefone.</div>
      </div>

      <div class="form-group">
        <label for="empresa">Empresa</label>
        <div class="input-wrap">
          <input type="text" id="empresa" placeholder="Nome da sua empresa"/>
          <i class="fa-solid fa-building"></i>
        </div>
        <div class="field-error" id="err-empresa">Por favor, informe sua empresa.</div>
      </div>

      <div class="divider">senha de acesso</div>

      <div class="form-group">
        <label for="senha">Senha</label>
        <div class="input-wrap">
          <input type="password" id="senha" placeholder="Mínimo 6 caracteres"/>
          <i class="fa-solid fa-lock"></i>
        </div>
        <div class="field-error" id="err-senha">A senha deve ter pelo menos 6 caracteres.</div>
      </div>

      <button class="btn-cadastrar" id="btnCadastrar">
        <span class="btn-text">Cadastrar</span>
        <div class="spinner"></div>
      </button>

      <div class="form-footer">
        Já tem uma conta? <a href="/Login">Entrar</a>
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


  <div class="toast" id="toast">
    <span class="toast-icon" id="toastIcon"></span>
    <span id="toastMsg"></span>
  </div>

  <script>
  $(function () {


    const now  = new Date();
    const opts = { weekday:'long', day:'2-digit', month:'long', year:'numeric' };
    $('#dateBadge').text(now.toLocaleDateString('pt-BR', opts));
    $('#year').text(now.getFullYear());


    $('#telefone').on('input', function () {
      let v = $(this).val().replace(/\D/g, '');
      if (v.length <= 10) {
        v = v.replace(/^(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
      } else {
        v = v.replace(/^(\d{2})(\d{1})(\d{4})(\d{0,4})/, '($1) $2 $3-$4');
      }
      $(this).val(v);
    });


    $('input').on('input', function () {
      const id = $(this).attr('id');
      $(this).removeClass('is-invalid');
      $('#err-' + id).removeClass('show');
    });


    function validate() {
      let valid   = true;
      const email = $('#email').val().trim();
      const senha = $('#senha').val();
      const reg   = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      function setErr(id, cond) {
        if (cond) {
          $('#' + id).addClass('is-invalid');
          $('#err-' + id).addClass('show');
          valid = false;
        }
      }

      setErr('nome',     !$('#nome').val().trim());
      setErr('email',    !email || !reg.test(email));
      setErr('telefone', !$('#telefone').val().trim());
      setErr('empresa',  !$('#empresa').val().trim());
      setErr('senha',    senha.length < 6);

      return valid;
    }


    function showToast(msg, type) {
      $('#toastIcon').text(type === 'success' ? '✅' : '❌');
      $('#toastMsg').text(msg);
      $('#toast').removeClass('success error').addClass(type + ' show');
      setTimeout(() => $('#toast').removeClass('show'), 3500);
    }


    $('#btnCadastrar').on('click', function () {
      if (!validate()) return;

      const $btn = $(this).addClass('loading').prop('disabled', true);

      $.ajax({
        url:         '/api/Cadastro_usuario',
        method:      'POST',
        contentType: 'application/json',
        data: JSON.stringify({
          nome:     $('#nome').val().trim(),
          email:    $('#email').val().trim(),
          telefone: $('#telefone').val().trim(),
          empresa:  $('#empresa').val().trim(),
          senha:    $('#senha').val(),
        }),
        success: function (res) {
          if (res.erro === 'n') {
            showToast('Usuário cadastrado com sucesso!', 'success');
            $('input').val('');
          } else {
            showToast(res.data || 'Erro ao cadastrar.', 'error');
          }
        },
        error: function () {
          showToast('Erro, tente de novo!', 'error');
        },
        complete: function () {
          $btn.removeClass('loading').prop('disabled', false);
        }
      });
    });

  });
  </script>

</body>
</html>