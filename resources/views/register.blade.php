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
    <div class="title">Register</div>
      <form method="post">
        @csrf
        <input type="text" placeholder="Name" name="name">
        @error('name') <div class="error">{{ $message }}</div> @enderror
        <input type="email" placeholder="Email" name="email">
        @error('email') <div class="error">{{ $message }}</div> @enderror
        <input type="password" placeholder="Password" name="password">
        @error('password') <div class="error">{{ $message }}</div> @enderror
        <button type="submit">Register</button>
      </form>
      <div class="footer">
        <p>Already have an account? <a href="/login">Log In</a></p>
      </div>
  </div>
</div>
</body>
</html>