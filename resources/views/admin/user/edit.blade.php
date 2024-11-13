@extends('admin.layouts.main')
@section('content')
<form method="post" class="form" action="/admin/user/{{ $user->id }}">
  @method('put')
  @csrf
  <label for="name">Name</label>
  <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
  @error('name') <div class="error"> {{ $message }}</div> @enderror
  <label for="email">Email</label>
  <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
  @error('email') <div class="error"> {{ $message }}</div> @enderror
  <label for="password">Password</label>
  <input type="password" id="password" name="password">
  @error('password') <div class="error"> {{ $message }}</div> @enderror
  <label for="role">Role</label>
  <select id="role" name="role">
    @if(old('role', $user->role) == 'user')
      <option value="user" selected>user</option>
    @else
      <option value="user">user</option>
    @endif
    @if(old('role', $user->role) == 'admin')
      <option value="admin" selected>admin</option>
    @else
      <option value="admin">admin</option>
    @endif
  </select>
  @error('role') <div class="error"> {{ $message }}</div> @enderror
  <button type="submit">Edit</button>
</form>

@endsection