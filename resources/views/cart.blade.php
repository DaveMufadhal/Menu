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
    <div class="title">Cart</div>
  </div>
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
                <div class="quantity">
                  <form method="post" action="/cart/{{$menu->slug}}/min">
                    @csrf
                    <button type="submit"><span class="fas fa-minus"></span></button>
                  </form>
                  {{$menu->quantity}}
                  <form method="post" action="/cart/{{$menu->slug}}/add">
                    @csrf
                    <button type="submit"><span class="fas fa-add"></span></button>
                  </form>
                </div>
            
              </div>
            </div>
          </li>
        @endforeach
      </ul>
    </li>
   
  </ul>

  <div class="total-price">
    <div>
      <div class="text">Total</div>
      <div class="price">Rp {{ $totalPrice }} </div>
    </div>  
    <form method="post">
      @csrf
      <button type="submit">Order</button>
    </form>
  </div>

 

</body>
</html>