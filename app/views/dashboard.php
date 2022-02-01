<!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><title>Dashboard</title>
<style>body{font-family:Arial;max-width:800px;margin:0 auto;padding:40px}
h1{color:#333}.nav{background:#1877f2;padding:15px;border-radius:8px;margin-bottom:20px}
.nav a{color:white;margin-right:20px;text-decoration:none}
.card{background:white;padding:20px;border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,0.1);margin-bottom:15px}</style></head>
<body>
<div class="nav"><strong>Auth System</strong><a href="/dashboard">Dashboard</a><a href="/profile">Perfil</a><a href="/logout">Sair</a></div>
<div class="card"><h1>Dashboard</h1><p>Bem-vindo, <?=htmlspecialchars($user->name)?>!</p></div></body></html>
