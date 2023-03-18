<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;

class PdfController extends Controller
{
    public function voir_pdf($id){

        Session::put('id', $id);
        try{
            $pdf = App::make('dompdf.wrapper')->setPaper('a4', 'landscape');
            $pdf->loadHTML($this->convert_orders_data_to_html());
            // dd($pdf);

            return $pdf->stream();
        }
        catch(\Exception $e){
            dd($e);
            return redirect(route('home'))->with('error', $e->getMessage());
        }
    }

    public function convert_orders_data_to_html(){

        $orders = Order::where('id',Session::get('id'))->get();

        foreach($orders as $order){
            $name = $order->client_name;
            $telephone = $order->telephone;
            $montant = $order->Montant;
            $date = $order->created_at;
        }

        $orders->transform(function($order, $key){
            $order->panier = unserialize($order->panier);

            return $order;
        });

        $output = '<link rel="stylesheet" href="frontend/css/main.css">
                    <link rel="stylesheet" type="text/css" href="frontend/css/main.css">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th>Client Name : '.$name.'<br> Téléphone : '.$telephone.' <br> Date : '.$date.'</th>
                            </tr>
                        </table>
                        <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            <tbody>';

        foreach($orders as $order){
            foreach($order->panier->items as $item){

                $output .= '<tr class="table_row">
                                <td class="image-prod column-1"><img src="storage/' .$item['product_image'].'" alt="" style = "height: 80px; width: 80px;"></td>
                                <td class="product-name column-2">
                                    <h3>'.$item['product_name'].'</h3>
                                </td>
                                <td class="price column-3">'.$item['product_price'].' CFA</td>
                                <td class="qty column-4">'.$item['qty'].'</td>
                                <td class="total column-5">'.$item['product_price']*$item['qty'].' CFA</td>
                            </tr><!-- END TR-->
                            </tbody>';

            }

            $totalPrice = $order->panier->totalPrice;

        }

        $output .='</table>
        </div>';

        $output .='<table class="table-shopping-cart">
                            <tr class="table_head">
                                    <th>Total</th>
                                    <th>'.$totalPrice.' CFA</th>
                            </tr>
                    </table>';


        return $output;



    }

}
