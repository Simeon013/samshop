@section('title')
    SamShop - Paiement
@endsection

@extends('layout.app1')


@section('contenu')

    <!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Paiement
			</span>
		</div>
	</div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{Session::get('status')}}
        </div>
    @endif
    @if (Session::has('error'))
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

    <!-- Checkout Start -->
    @if (Session::has('cart') )
    {!! Form::open(['action' => 'App\Http\Controllers\ClientController@buy' , 'method' => 'POST' , 'id'=>'checkout-form']) !!}
    {{ csrf_field() }}
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                    <div class="col-lg-8">
                        <div class="mb-4">
                            <h4 class="font-weight-semi-bold mb-4">Information de facturation</h4>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Prénom</label>
                                        {{-- <input class="form-control" type="text" placeholder="John"> --}}
                                        {!! Form::text('firstname', '', ['class' => 'form-control' , 'placeholder' => 'John']) !!}
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Nom</label>
                                        {{-- <input class="form-control" type="text" placeholder="Doe"> --}}
                                        {!! Form::text('lastname', '', ['class' => 'form-control' , 'placeholder' => 'Doe']) !!}
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>E-mail</label>
                                        {{-- <input class="form-control" type="text" placeholder="example@email.com"> --}}
                                        {!! Form::email('email', Auth::user()->email, ['class' => 'form-control' , 'placeholder' => 'example@email.com' , 'readonly']) !!}
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Adresse</label>
                                        {{-- <input class="form-control" type="text" placeholder="Segbeya"> --}}
                                        {!! Form::text('adress', '', ['class' => 'form-control' , 'placeholder' => 'Segbeya']) !!}
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Mode de paiement</label>
                                        <select class="custom-select" name="mode">
                                            <option value="mtn">MTN</option>
                                            {{-- <option value="moov">Moov</option> --}}
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Mobile No</label>
                                        {{-- <input class="form-control" type="tel" name="number" placeholder="+123 456 789"> --}}
                                        {!! Form::text('number', '66000001', ['class' => 'form-control' , 'placeholder' => '+22966000001' , 'readonly']) !!}
                                    </div>
                                </div>
                        </div>
                    </div>
                <div class="col-lg-4">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Commande Total</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="font-weight-medium mb-3">Produits</h5>
                                @foreach ($cart_products as $product)
                                <div class="d-flex justify-content-between">
                                    <p>{{$product['product_name']}} x {{$product[ 'qty']}}</p>
                                    <p>{{$product['product_price']*$product['qty']}} CFA</p>
                                </div>
                                @endforeach
                                <hr class="mt-0">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Sous total</h6>
                                    <h6 class="font-weight-medium">{{Session::get('cart')->totalPrice}} CFA</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Frais de transaction (3%)</h6>
                                    <h6 class="font-weight-medium">{{$frais = Session::get('cart')->totalPrice * 0.03}}  CFA</h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold">{{Session::get('cart')->totalPrice + $frais}} CFA</h5>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                {!! Form::submit("Payer", ['class'=>'btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3']) !!}
                            </div>
                        </div>
                        {{-- <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Payment</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                        <label class="custom-control-label" for="paypal">Paypal</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                        <label class="custom-control-label" for="directcheck">Direct Check</label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                        <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                {!! Form::submit("Payer", ['class'=>'btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3']) !!}
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        {!!Form::close()!!}
    @endif
    <!-- Checkout End -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
@endsection
