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
				Checkout
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
                                        <li>Erreur: Cette catégorie existe déjà.</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

    <!-- Checkout Start -->
    @if (Session::has('cart') )
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                {!! Form::open(['action' => 'App\Http\Controllers\ClientController@buy' , 'method' => 'POST' , 'id'=>'checkout-form']) !!}
                {{ csrf_field() }}
                    <div class="col-lg-8">
                        <div class="mb-4">
                            <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>First Name</label>
                                        {{-- <input class="form-control" type="text" placeholder="John"> --}}
                                        {!! Form::text('firstname', '', ['class' => 'form-control' , 'placeholder' => 'John']) !!}
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Last Name</label>
                                        {{-- <input class="form-control" type="text" placeholder="Doe"> --}}
                                        {!! Form::text('lastname', '', ['class' => 'form-control' , 'placeholder' => 'Doe']) !!}
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>E-mail</label>
                                        {{-- <input class="form-control" type="text" placeholder="example@email.com"> --}}
                                        {!! Form::email('email', '', ['class' => 'form-control' , 'placeholder' => 'example@email.com']) !!}
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Mobile No</label>
                                        {{-- <input class="form-control" type="tel" name="number" placeholder="+123 456 789"> --}}
                                        {!! Form::text('number', '66000001', ['class' => 'form-control' , 'placeholder' => '+22966000001' , 'readonly']) !!}
                                    </div>
                                    {{-- <div class="col-md-6 form-group">
                                        <label>Address Line 1</label>
                                        <input class="form-control" type="text" placeholder="123 Street">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Address Line 2</label>
                                        <input class="form-control" type="text" placeholder="123 Street">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Country</label>
                                        <select class="custom-select">
                                            <option selected>United States</option>
                                            <option>Afghanistan</option>
                                            <option>Albania</option>
                                            <option>Algeria</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>City</label>
                                        <input class="form-control" type="text" placeholder="New York">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>State</label>
                                        <input class="form-control" type="text" placeholder="New York">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>ZIP Code</label>
                                        <input class="form-control" type="text" placeholder="123">
                                    </div> --}}
                                    <div class="col-md-12 form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="newaccount">
                                            <label class="custom-control-label" for="newaccount">Create an account</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="shipto">
                                            <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- <div class="collapse mb-4" id="shipping-address">
                        <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="+123 456 789">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select class="custom-select">
                                    <option selected>United States</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123">
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-4">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="font-weight-medium mb-3">Products</h5>
                                @foreach ($cart_products as $product)
                                <div class="d-flex justify-content-between">
                                    <p>{{$product['product_name']}} x {{$product[ 'qty']}}</p>
                                    <p>{{$product['product_price']*$product['qty']}}F CFA</p>
                                </div>
                                @endforeach
                                <hr class="mt-0">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Subtotal</h6>
                                    <h6 class="font-weight-medium">{{Session::get('cart')->totalPrice}}F CFA</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Shipping</h6>
                                    <h6 class="font-weight-medium">1000 F CFA</h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold">{{Session::get('cart')->totalPrice + 1000}}F CFA</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card border-secondary mb-5">
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
                        </div>
                    </div>
                {!!Form::close()!!}
            </div>
        </div>
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
