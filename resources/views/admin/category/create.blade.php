@extends('admin.layouts.main')
@section('content')
<form method="post" class="form" action="/admin/category">
  @csrf
  <label for="name">Name</label>
  <input type="text" id="name" name="name" value="{{ old('name') }}">
  @error('name') <div class="error"> {{ $message }}</div> @enderror
  <label for="slug">Slug</label>
  <input type="text" id="slug" name="slug" value="{{ old('slug') }}">
  @error('slug') <div class="error"> {{ $message }}</div> @enderror
  <button type="submit">Add</button>
</form>

@endsection