<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Registro</title>
<style>*{margin:0;padding:0;box-sizing:border-box}
body{font-family:Arial;background:#f0f2f5;display:flex;justify-content:center;align-items:center;height:100vh}
.card{background:white;padding:40px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,0.1);width:360px}
h1{margin-bottom:20px;text-align:center}input{width:100%;padding:12px;margin:8px 0;border:1px solid #ddd;border-radius:4px}
button{width:100%;padding:12px;background:#42b72a;color:white;border:none;border-radius:4px;font-size:16px;cursor:pointer}
.erro{color:#e74c3c;text-align:center;margin-bottom:10px}
p{text-align:center;margin-top:15px}a{color:#1877f2;text-decoration:none}</style></head>
<body>
<div class="card"><h1>Criar Conta</h1>
<?php if(isset($erro)):?><div class="erro"><?=$erro?></div><?php endif;?>
<form method="POST">
<input type="text" name="name" placeholder="Nome completo" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Senha" required>
<input type="password" name="confirm_password" placeholder="Confirmar senha" required>
<button type="submit">Registrar</button></form>
<p><a href="/login">Ja tem conta? Entre</a></p></div></body></html>
