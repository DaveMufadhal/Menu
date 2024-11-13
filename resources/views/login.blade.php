<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
</head>
<body>
<div class="login">
  <div class="login-box">
    <div class="title">Login</div>
      <form method="post">
        @csrf
        <input type="email" placeholder="Email" name="email">
        @error('email') <div class="error">{{ $message }}</div> @enderror
        <input type="password" placeholder="Password" name="password">
        @error('password') <div class="error">{{ $message }}</div> @enderror
        <button type="submit">Login</button>
      </form>
      <div class="footer">
        <p>Don't have an account? <a href="/register">Sign Up</a></p>
      </div>
  </div>
</div>
</body>
</html>