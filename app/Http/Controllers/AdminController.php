<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function orders(){
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
        $categories = Category::get();
        return view('admin.orders')
                        ->with('categories', $categories)
                        ->with('orders', $orders);
    }

    public function users(){
        $users = User::get();

        return view('admin.users')->with('users', $users);
    }

    public function activeradmin($id){
        $user = User::findOrFail($id);

        $user->admin = 1;

        $user->update();

        return redirect(route('users'))->with('status', 'Administrateur activé avec succès.');
    }

    public function desactiveradmin($id){
        $user = User::findOrFail($id);

        $user->admin = 0;

        $user->update();

        return redirect(route('users'))->with('status', 'Administrateur désactivé avec succès.');
    }

    public function deleteuser($id){
        $user = User::findOrFail($id);

        $user->delete();

        return redirect(route('users'))->with('status', 'Utilisateur supprimé avec succès. ');
    }
}
