<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('home', 'about' , 'contact');
    }

    public function home(){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $sliders = Slider::where('status', 1)->get();
        $categories = Category::get();
        $products = Product::where('status' , 1)->get();
        return view('client.home', ['cart_products' => $cart->items])->with('sliders', $sliders)->with('categories', $categories)->with('products', $products);
    }

    public function shop(){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $categories = Category::get();
        $products = Product::where('status' , 1)->get();
        return view('client.shop', ['cart_products' => $cart->items])->with('categories', $categories)->with('products',$products);
    }

    public function cart(){
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['cart_products' => $cart->items]);
    }

    public function add_to_cart($id){
        $product = Product::findOrfail($id);

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect( route('shop') );
    }

    public function update_cart(Request $request, $id){

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect( route('cart') );
    }

    public function remove_to_cart($id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect::to(route('cart'));
    }

    public function checkout (){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.checkout' , ['cart_products' => $cart->items]);
    }

    public function buy(Request $request){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);

        $this->validate($request, [ 'firstname' => 'required',
                                    'lastname' => 'required',
                                    'email' => 'required',
                                    'number' => 'required']
                                );

        /* Remplacez VOTRE_CLE_API par votre véritable clé API */
        \FedaPay\FedaPay::setApiKey("sk_sandbox_afrFW3F_L_6kQW_J8_18jD7Q");

        /* Précisez si vous souhaitez exécuter votre requête en mode test ou live */
        \FedaPay\FedaPay::setEnvironment('sandbox'); //ou setEnvironment('live');

        try {
            /* Créer la transaction */
            $transaction = \FedaPay\Transaction::create(array(
            "description" => "Transaction for john.doe@example.com",
            "amount" => $cart->totalPrice,
            "currency" => ["iso" => "XOF"],
            "callback_url" => route('history'),
            "customer" => [
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "email" => $request->email,
                "phone_number" => [
                    "number" => $request->number,
                    "country" => "bj"
                ]
            ]
            ));

            // $order = new Order();

            // $order->client_name = $request->firstname . " " . $request->lastname;
            // $order->payment_id = $transaction->id;
            // $order->telephone = $request->number;
            // $order->panier = serialize($cart);
            // $order->montant = $transaction->amount;
            // $order->status = $transaction->status;

            // $order->save();

            // dd($transaction->id);
            $token = $transaction->generateToken()->token;
            $mode = 'mtn'; // 'mtn', 'moov', 'mtn_ci', 'moov_tg'
            $transaction->sendNowWithToken($mode, $token);
            // $token = $transaction->generateToken();

            // dd($order);

            // return redirect($token->url);
            // return header('Location: ' . $token->url);
        }catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect( route('checkout') )->with('error' , $e->getMessage());
        }

        $order = Order::create([
            'client_name' => $request->firstname . " " . $request->lastname,
            'payment_id' => $transaction->id,
            'telephone' => $request->number,
            'panier' => serialize($cart),
            'montant' => $transaction->amount,
            'status' => $transaction->status
            //'category_id' => $request->category_id
        ]);

        // dd($order);

        $orders = Order::get();

        Session::forget('cart');
        // Session::put('success', 'Purchase accomplished successfully !');
        return redirect( route('history') )->with('status' , 'Achat effectué avec succès')->with('orders' , $orders);
    }

    public function history(){
        // if(!Session::has('cart')){
        //     return view('client.cart');
        // }


        $orders = Order::get();

        $orders->transform(function($order , $key){
            $order->panier = unserialize($order->panier);
            // dd($order);
            return $order;
        });

        // \FedaPay\FedaPay::setApiKey("sk_sandbox_afrFW3F_L_6kQW_J8_18jD7Q");
        // $transaction = \FedaPay\Transaction::retrieve($order->payment_id);
        // $order->status = $transaction->status;
        // // dd($order);
        // $order->update();

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.history', ['cart_products' => $cart->items])->with('orders', $orders);
    }

    public function about (){
        return view('client.about');
    }

    public function contact (){
        return view('client.contact');
    }

}
