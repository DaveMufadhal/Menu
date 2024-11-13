@extends('admin.layouts.main')
@section('content')
<a class="link-button" href="/admin/user/create">
  Add User
  <div class="circle"><div class="icon fas fa-add"></div></div>
</a>

<div style="overflow-x: auto;">
<table class="table">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Action</th>
  </tr>
  @foreach($users as $user)
    <tr>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->role }}</td>
      <td>
        <a href="/admin/user/{{ $user->id }}/edit"><span class="fas fa-edit"></span></a> 
        <form method="post" action="/admin/user/{{ $user->id }}">
          @csrf
          @method('delete')
          <button type="submit"><span class="fas fa-trash"></span></button>
        </form>
     </td>
    </tr>
  @endforeach
</table>
</div>
@endsection