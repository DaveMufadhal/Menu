@extends('admin.layouts.main')
@section('content')
<a class="link-button" href="/admin/category/create">
  Add Category
  <div class="circle"><div class="icon fas fa-add"></div></div>
</a>

<div style="overflow-x: auto;">
<table class="table">
  <tr>
    <th>Name</th>
    <th>Action</th>
  </tr>
  @foreach($categories as $category)
    <tr>
      <td>{{ $category->name }}</td>
      <td>
        <a href="/admin/category/{{ $category->slug }}/edit"><span class="fas fa-edit"></span></a> 
        <form method="post" action="/admin/category/{{ $category->slug }}">
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