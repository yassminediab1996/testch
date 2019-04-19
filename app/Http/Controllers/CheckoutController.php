<?php

namespace App\Http\Controllers;

use App\User;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use Illuminate\Http\Request;
use App\TotalCart;
use App\Order;
use App\OrderProduct;
use App\FinalCart;
use App\AdminModel\Product;
use Mail;
use Illuminate\Support\Facades\Cookie;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $sumbtotal = 0;
        if(TotalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->count() > 0) {
            $get = TotalCart::whereUser_idOrAnonim(Auth()->user()->id, Cookie::get('cart'))->get();

            foreach ($get as $total) {
                $sumbtotal += $total->b_total;
            }

            $sumbtotal = $sumbtotal + User::GetFees(auth()->user()->id);
        }
        try {
            $charge = Stripe::charges()->create([

                'amount' => $sumbtotal,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Order From chefaa',
                'receipt_email' => 'yassmine@chefaa.com',
//                'metadata' => [
//                    // change to Order ID after we start using db
//                    'contents' => $contents,
//                    'quantity' => Cart::instance('default')->count(),
//                    'discount' => collect(session()->get('coupon'))->toJson(),
//                ],
            ]);

//            $order = $this->addToOrdersTables($request, null);
//            Mail::send(new OrderPlaced($order));
//
//            // Successful
//            Cart::instance('default')->destroy();
//            session()->forget('coupon');

            // return back()->with('success_message', 'Thank you! Your payment has been successfuly accepted!');
            //del cart total // del final cart
            $i = 0;
            $atotal=0;
            $discount=0;
            $gettotal = TotalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->get();
            $getcart =  FinalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->get();
            

            foreach($gettotal as $gettotalcart)
            {
                //  dd($gettotalcart->discount);
                $atotal +=  $gettotalcart->a_total;
                if($gettotalcart->discount != null)
                {
                    $discount += $gettotalcart->discount;
                }
            }

            $order = Order::create(['user_id' => auth()->user()->id , 'total' => $atotal  , 'discount' => $discount , 'payment' => "Credit Card",'numbers' => rand(100,100000)]);


            foreach($getcart as $products)
            {
                if($products->quantity < Product::where('id' , $products->product_id)->first()->qty) {
                    $price= Product::Price($products->product_id);
                    OrderProduct::create(['order_id' => $order->id,'price' => $price, 'product_id' => $products->product_id, 'qty' => $products->quantity]);
                    $qty = Product::where('id' , $products->product_id)->first()->qty;
                    if($qty > 0)
                        Product::where('id' , $products->product_id)->update(['qty' => ($qty - $products->quantity)]);
                }else{
                    $i = 1;
                    $order->delete();
                    return Product::find($products->product_id)->name_ar;
                }

            }
            // ams7 el final cart

            if($i == 0) {

                foreach($gettotal as $tcart)
                {
                    $tcart->delete();
                }
                foreach($getcart as $cart)
                {
                    $cart->delete();
                }

            }
             $email = User::find($order->user_id)->email;
                        $getproducts = OrderProduct::where('order_id',$order->id)->get();
                        Mail::send('website.mail.place',['getproducts' => $getproducts, 'order' => $order,'email'=> $email],function($message) use ($getproducts,$order,$email){
                      $message->to($email);
                      $message->subject('  تم ارسال طلبك');
                    });
            return redirect()->route('store')->with('success_message', 'تم ارسال طلبك بنجاح');
        } catch (CardErrorException $e) {
        dd($e->getMessage());
            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
