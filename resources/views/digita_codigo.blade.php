<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Autenticação de dois fatores</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="autenticacao_dupla.js"></script>
</head>
<body>
    <h2>Digite o código de verificação</h2>
    <input type="text" id="codigo" placeholder="Código">
    <input type="text" id="email" name="email" placeholder="Email">
    <button id="enviar_codigo">Enviar</button>
</body>
</html>