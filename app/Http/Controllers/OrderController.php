<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index', [
            'orders' => Order::all()
        ]);

        
    }

    public function destroy(Order $order)
    {
        Order::destroy($order->id);
        return redirect('admin/order')->with('success', 'Order deleted successfully!');
    }
}
