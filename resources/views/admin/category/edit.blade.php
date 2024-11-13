@extends('admin.layouts.main')
@section('content')
<form method="post" class="form" action="/admin/category/{{ $category->slug }}">
  @method('put')
  @csrf
  <label for="name">Name</label>
  <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}">
  @error('name') <div class="error"> {{ $message }}</div> @enderror
  <label for="slug">Slug</label>
  <input type="text" id="slug" name="slug" value="{{ old('slug', $category->slug) }}">
  @error('slug') <div class="error"> {{ $message }}</div> @enderror
  <button type="submit">Edit</button>
</form>

@endsection