<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\OrderDetails;
use App\Models\Orders;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CheckoutController extends Controller
{
   public function index() {
      $userId = Auth::user()->id;
      $dataAddress = Address::where('user_id', $userId)->get();
      return view('frontend.checkout')->with('address', $dataAddress);
   }
  
   public function placeOrder(Request $request) {
      // $request->validate([
      //   'order_address' => 'required',
      //   'order_ward' => 'required',
      //   'order_district' => 'required',
      //   'order_city' => 'required',
      //   'payment_method' => 'required',

      // ], [
      //   'order_address.required' => 'Không được để trống *',
      //   'order_ward.required' => 'Không được để trống *',
      //   'order_district.required' => 'Không được để trống *',
      //   'order_city.required' => 'Không được để trống *',
      //   'payment_method.required' => 'Không được để trống *',
      // ]);
      // $validation = $request->all();

      // lấy id người dùng đang đăng nhập
      $userId = Auth::user()->id;

      // lấy thông tin người mua và lưu vào bảng orders
      $order = new Orders();
      $order->user_id = $userId;
      $order->order_name = $request->order_name;
      $order->order_phone = $request->order_phone;
      $order->order_email = $request->order_email;
      $order->order_address = $request->order_address;
      $order->order_message = $request->order_message;
      $order->order_delivery = $request->order_delivery; 
      $order->order_total = Cart::totalFloat();
      $order->order_date = date('Y-m-d H:i:s');
      $order->po_number = 'isky'.rand(1111, 9999);
      $order->payment_method = $request->payment_method;
      // đẩy dữ liệu vào bảng orders 
      $order->save();
      //  lấy id của record (bản ghi) mới đẩy vào, thêm vào csdl
      $orderId = $order->id;

      $cartInfo = Cart::content();
      if (isset($cartInfo)) { // kiểm tra thông tin sản phẩm mua có tồn tại hay không
         foreach ($cartInfo as $cart) {
            $order_details = new OrderDetails();
            $order_details->order_id = $orderId;
            $order_details->prod_id = $cart->id;
            $order_details->quantity = $cart->qty;
            $order_details->size = $cart->options->size;
            $order_details->color = $cart->options->color;
            $order_details->price = $cart->price * $cart->qty;
            $order_details->save();
            // cập nhật lại trường prod_quantity trong bảng products
            $product = Product::findOrFail($cart->id);
            $product->decrement('prod_quantity', $cart->qty);
         }
      }
  
      if ($request->payment_method  == '0') {
         Cart::destroy();
         return redirect()->route('success.index');
      } else if ($request->payment_method  == '1') {
         $orders = Orders::findOrFail($orderId);
         $orders->update(['order_status' => 7]);
         Cart::destroy();
         return redirect()->route('success.index');
      }
      else {
         return back()->with('info', 'Có lỗi xảy ra trong quá trình xử lý!');
      } 
   }
}
