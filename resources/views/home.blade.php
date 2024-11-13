<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
</head>
<body>
<div class="welcome-screen">
  <div class="content">
    <div class="title">KoKoMenu</div>
    @auth
    <form method="post" action="/logout">
        @csrf
        <button type="submit">Log Out</button>
      </form>
      
    @else
    <a href="/login">Login</a>
    @endauth
    <a href="/menu">Langsung ke menu</a>
  </div>
</div>
</body>
</html>