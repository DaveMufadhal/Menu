@extends('admin.layouts.main')
@section('content')
<form method="post" class="form" action="/admin/menu">
  @csrf
  <label for="name">Name</label>
  <input type="text" id="name" name="name" value="{{ old('name') }}">
  @error('name') <div class="error"> {{ $message }}</div> @enderror
  <label for="slug">Slug</label>
  <input type="text" id="slug" name="slug" value="{{ old('slug') }}">
  @error('slug') <div class="error"> {{ $message }}</div> @enderror
  <label for="price">Price</label>
  <input type="number" id="price" name="price" value="{{ old('price') }}">
  @error('price') <div class="error"> {{ $message }}</div> @enderror
  <label for="imageURL">Image</label>
  <input type="url" id="imageURL" name="imageURL" value="{{ old('imageURL') }}">
  @error('imageURL') <div class="error"> {{ $message }}</div> @enderror
  <label for="category">Category</label>
  <select id="category" name="category_id">
    @foreach($categories as $category)
      @if(old('category_id') == $category->id)
        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
      @else
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endif
    @endforeach
  </select>
  @error('category') <div class="error"> {{ $message }}</div> @enderror
  <label for="description">Description</label>
  <textarea id="description" name="description">{{ old('description') }}</textarea>
  @error('description') <div class="error"> {{ $message }}</div> @enderror
  <button type="submit">Add</button>
</form>

@endsection