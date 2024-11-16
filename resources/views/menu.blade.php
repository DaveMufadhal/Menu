<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
  
  <div class="header">
    <div class="title">Kedai Kokomo</div>
    <div class="table">
      <div>
        <div class="fa-solid fa-utensils"></div> Table
      </div>
      <div class="number">3</div>
    </div>
    <div class="category">
      <div class="button">
        <span class="fa-solid fa-table-cells-large"></span>
        Category
      </div>
      <ul>
      <li><a href="/menu" class="{{ Request::is('menu') ? 'active' : ''}}">All</a></li>
        @foreach($categories as $category)
        <li><a href="/menu/{{$category->slug}}" class="{{ Request::is('menu/' . $category->slug) ? 'active' : ''}}">{{$category->name}}</a></li>
        @endforeach
      </ul>
    </div>
  </div>

  <ul class="product">
    @if($selectedCategory)
      <li>
        <div class="category">{{ $selectedCategory->name}} </div>
        <ul>
          @foreach($menus as $menu)
          @if($menu->category_id == $selectedCategory->id)
          <li>
            <div class="image" style="background: url('{{$menu->imageURL}}'); background-size: cover;"></div>
          <div class="info">
            <div class="name">{{$menu->name}}</div>
            <div class="price"> 
              <div>Rp. {{$menu->price}}</div>
              <form method="post" action="/menu/{{ $menu-> slug }}/cart">
                @csrf
                <div class="quantity">
                  <button type="submit"><span class="fas fa-add"></span></button>
                </div>
              </form>
            </div>
          </div>
          </li>
          @endif
          @endforeach
        </ul>
      </li>
    @else
      @foreach($categories as $category)
      <li>
        <div class="category">{{ $category->name}} </div>
        <ul>
          @foreach($menus as $menu)
          @if($menu->category_id == $category->id)
          <li>
            <div class="image" style="background: url('{{$menu->imageURL}}'); background-size: cover;"></div>
          <div class="info">
            <div class="name">{{$menu->name}}</div>
            <div class="price">
              <div>Rp. {{$menu->price}}</div>
              <form method="post" action="/menu/{{ $menu-> slug }}/cart">
                @csrf
                <div class="quantity">
                  <button type="submit"><span class="fas fa-add"></span></button>
                </div>
              </form>
            </div>
          </div>
          </li>
          @endif
          @endforeach
        </ul>
      </li>
      @endforeach
    @endif
  </ul>

  @if($cart_count != 0)
    <a class="floating-cart" href="/cart">
      <div class="text">Keranjang</div> <div class="number">{{$cart_count}}</div>
    </a>
  @endif

</body>
</html>