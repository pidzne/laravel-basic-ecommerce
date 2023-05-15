<?php

namespace App\Http\Controllers\FrontEnd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index() {
        return view('frontend.cart');
    }

    public function saveCart(Request $request) {
        $validatedData = $request->validate([
            'prod_color' => 'required',
            'prod_sizes' => 'required',
        ], [
            'prod_color.required' => 'Hành động không hợp lệ! *',
            'prod_sizes.required' => 'Hành động không hợp lệ! *',
        ]);

        Cart::add(
            [
                'id' => $request->prod_id_hidden,
                'qty' => $request->prod_qty,
                'name' => $request->prod_name,
                'price' => $request->prod_price,
                'weight' => "123",
                'options' => array(
                    'image' => $request->prod_image,
                    'color' => $request->prod_color,
                    'size' => $request->prod_sizes
                ),
            ]
        );
        return redirect('cart');
    }

    public function deleteCart($rowId) {
        Cart::remove($rowId);
        return redirect('cart')->with('status', 'Xóa sản phẩm thành công!');
    }

    public function deleteAllCart() {
        Cart::destroy();
        return redirect('cart')->with('status', 'Xóa tất cả sản phẩm thành công!');
    }

    public function updateCart(Request $request) {
        $rowId = $request->rowIdCart;
        $qty = $request->cartQty;
        Cart::update($rowId, $qty);
        return redirect('cart')->with('status', 'Cập nhật giỏ hàng thành công!');
    }
}
