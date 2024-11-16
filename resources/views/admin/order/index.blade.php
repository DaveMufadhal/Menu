@extends('admin.layouts.main')
@section('content')
  <div style="overflow-x: auto;">
    <table class="table">
      <tr>
        <th>No</th>
        <th>User</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Aksi</th>
      </tr>
      @foreach($orders as $order)
      <tr> 
        <td>{{ $loop->iteration }}</td>
        <td>{{ $order->user->name }}</td>
        <td>{{ $order->name }}</td>
        <td>{{ $order->price }}</td>
        <td>
          <div style="white-space: nowrap">
            <form action="/admin/order/{{ $order->id }}" method="post">
              @method('delete')
              @csrf
              <button type="submit"><span class="fas fa-trash"></span></button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </table>
  </div>  

  @if(session()->has('success'))
    <div class="alert success">
      <div class="message">{{ session('success') }}</div>
      <div class="close" onclick="closeAlert()"><span class="fas fa-times"></span></div>
    </div>
  @endif
@endsection