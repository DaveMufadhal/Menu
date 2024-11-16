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
  
  <ul class="product">
    <li>
      <ul>
        @foreach($menus as $menu)
          <li>
            <div class="image" style="background: url('{{$menu->imageURL}}'); background-size: cover;"></div>
            <div class="info">
              <div class="name">{{$menu->name}}</div>
              <div class="price">
                <div>Rp. {{number_format($menu->price)}}</div>
                <form method="post" action="/menu/1/cart">
                  @csrf
                  <div class="quantity">
                    <button type="submit"><span class="fas fa-minus"></span></button>
                    {{$menu->quantity}}
                    <button type="submit"><span class="fas fa-add"></span></button>
                  </div>
                </form>
              </div>
            </div>
          </li>
        @endforeach
      </ul>
    </li>
   
  </ul>

 

</body>
</html>