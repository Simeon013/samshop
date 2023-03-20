@section('title')
    SamShop - Panier
@endsection

@extends('layout.app1')


@section('contenu')
    <!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Panier
			</span>
		</div>
	</div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{Session::get('status')}}
        </div>
    @endif


	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
                                    <th class="column-1">&nbsp;</th>
									<th class="column-2">Produit</th>
									<th class="column-3">&nbsp;</th>
									<th class="column-4">Prix</th>
									<th class="column-5">Quantité</th>
									<th class="column-6">Total</th>
								</tr>

                                @if (Session::has('cart'))
								@foreach ($cart_products as $product)
                                    <tr class="table_row">
                                        <td class="column-1 product-remove"><a href="/retirer_produit/{{$product['product_id']}}"><span class="zmdi zmdi-close"></span></a></td>
                                        <td class="column-2">
                                            <a href="/retirer_produit/{{$product['product_id']}}">
                                                <div class="how-itemcart1">
                                                    <img src="{{asset('/storage/' . $product['product_image'])}}" alt="IMG">
                                                </div>
                                            </a>
                                        </td>
                                        <td class="column-3">{{$product['product_name']}}</td>
                                        <td class="column-4">{{$product['product_price']}} CFA</td>
                                        <td class="column-5">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{$product[ 'qty']}}">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="column-6">{{$product['product_price']*$product['qty']}} CFA</td>
                                    </tr>
                                @endforeach
                                @endif

							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Appliquer coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								<a href=""> Actualiser panier</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Total du panier
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Sous-total:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									@if (Session::has('cart'))
                                        {{Session::get('cart')->totalPrice}} CFA
                                    @else
                                        0 CFA
                                    @endif
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Frais de transaction
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
									2.9%
								</p>
								{{-- <p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p> --}}

								<div class="p-t-15">
									<span class="stext-112 cl8">
										Les frais de livraison sont a payés lors de la livraison
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Selectionner la ville</option>
											<option>Cotonou</option>
											<option>Porto-Novo</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Quartier">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="textarea" name="indication" placeholder="Indication précise">
									</div>



								</div>
							</div>
                            <div class="flex-w flex-t bor12 p-b-13">
                                <div class="size-150">
                                    <span class="stext-110 cl2">
                                        Frais de livraison : 1000 CFA
                                    </span>
                                </div>
                            </div>

                            {{-- <div class="flex-w">
                                <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                    Actualiser
                                </div>
                            </div> --}}
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									@if (Session::has('cart'))
                                        {{Session::get('cart')->totalPrice + (0.029*Session::get('cart')->totalPrice) + 1000}} CFA
                                    @else
                                        0 CFA
                                    @endif
								</span>
							</div>
						</div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            <a href="{{ route('checkout') }}">Passer au paiement</a>
                        </button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection
