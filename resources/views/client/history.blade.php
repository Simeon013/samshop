@section('title')
    SamShop - Historique
@endsection

@extends('layout.app1')

{!! Form::hidden('',$increment=1) !!}

@section('contenu')
    <!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Historique
			</span>
		</div>
	</div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{Session::get('status')}}
        </div>
    @endif
    @if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif


	<!-- History Cart -->
    <div class="container">
        <div class="">
            <div class="m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-history-cart">
                        <table class="table-history-cart">
                            <tr class="table_head">
                                <th class="column-1">Order#</th>
                                <th class="column-2">Nom du client</th>
                                <th class="column-3">Panier</th>
                                <th class="column-4">Montant</th>
                                <th class="column-5">Date</th>
                                <th class="column-6">Action</th>
                            </tr>

                            @foreach ($orders as $order)
                                <tr class="table_row">
                                    <td class="column-1">{{$increment}}</td>
                                    <td class="column-2">{{$order->client_name}}</td>
                                    <td class="column-3">
                                        @foreach ($order->panier->items as $item)
                                            {{$item['qty'] . ' x '.$item['product_name'] . ' , '}}
                                        @endforeach
                                    </td>
                                    <td class="column-4">{{$order->Montant}} CFA</td>
                                    <td class="column-5">{{$order->created_at}}</td>
                                    <td class="column-6"><button onclick="window.location ='{{route('voir_pdf', $order->id)}}'">Voir</button></td>
                                </tr>
                                {!! Form::hidden('', $increment= $increment+1) !!}
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
