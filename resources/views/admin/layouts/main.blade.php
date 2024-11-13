<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
  <div class="topnav">
    <div class="menu">
      <div onclick="showMenu(this);" class="icon fas fa-bars"></div>
      <a href="#"><div class="icon fas fa-home"></div></a>
    </div>
    <div class="admin">
      <a href="#"><span class="name">Howdy, Samuel</span><img src="https://raw.githubusercontent.com/ToxicAura60/Manedwolf/main/images/wolf_white.png"></a>
    </div>
  </div>
  <div class="sidebar">
    <ul class="menu-list">
      <li class="{{ Request::is('admin') ? 'active' : ''}}"><a href="/admin"><div class="icon fas fa-border-all"></div>Dashboard</a></li>
      <li class="{{ Request::is('admin/menu*') ? 'active' : ''}}"><a href="/admin/menu"><div class="icon fas fa-book"></div>Menu</a></li>
      <li class="{{ Request::is('admin/category*') ? 'active' : ''}}"><a href="/admin/category"><div class="icon fas fa-object-group"></div>Category</a></li>
      <li class="{{ Request::is('admin/user*') ? 'active' : ''}}"><a href="/admin/user"><div class="icon fas fa-user"></div>User</a></li>

    </ul>
  </div>

  <div class="content">
  @yield('content')
</div>

  <script src="{{ asset('js/script.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>