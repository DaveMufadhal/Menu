@extends('admin.layouts.main')
@section('content')
<a class="link-button" href="/admin/menu/create">
  Add Menu
  <div class="circle"><div class="icon fas fa-add"></div></div>
</a>

<div style="overflow-x: auto;">
<table class="table">
  <tr>
    <th>Name</th>
    <th>Categories</th>
    <th>Price</th>
    <th>Action</th>
  </tr>
  @foreach($menus as $menu)
    <tr>
      <td>{{ $menu->name }}</td>
      <td>{{ $menu->category->name }}</td>
      <td>{{ $menu->price }}</td>
      <td>
        <a href="/admin/menu/{{ $menu->slug }}/edit"><span class="fas fa-edit"></span></a> 
        <form method="post" action="/admin/menu/{{ $menu->slug }}">
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