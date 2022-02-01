<!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><title>Perfil</title>
<style>body{font-family:Arial;max-width:800px;margin:0 auto;padding:40px}
.nav{background:#1877f2;padding:15px;border-radius:8px;margin-bottom:20px}
.nav a{color:white;margin-right:20px;text-decoration:none}
.card{background:white;padding:20px;border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,0.1)}</style></head>
<body>
<div class="nav"><strong>Auth System</strong><a href="/dashboard">Dashboard</a><a href="/profile">Perfil</a><a href="/logout">Sair</a></div>
<div class="card"><h1>Meu Perfil</h1>
<p><strong>Nome:</strong> <?=htmlspecialchars($user->name)?></p>
<p><strong>Email:</strong> <?=htmlspecialchars($user->email)?></p>
<p><strong>Criado em:</strong> <?=$user->created_at?></p></div></body></html>
