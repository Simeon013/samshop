	<!-- Header -->
	<header  class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					{{-- <div class="left-top-bar">
						Free shipping for standard order over $100
					</div> --}}

					<div class="right-top-bar flex-w h-full">
						{{-- <a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							FR
						</a> --}}

                        <a href="mailto:byatrends@gmail.com" class="flex-c-m trans-04 p-lr-25">
							byatrends@gmail.com
						</a>

						<a href="tel:+22961418980" class="flex-c-m trans-04 p-lr-25">
							+22961418980
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop  how-shadow1" >
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="{{route('home')}}" class="logo">
						<img src="{{asset('all/BYA.gif')}}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="{{ request()->routeIs('home') ? 'active-menu' : '' }}">
                                <a href="{{route('home')}}">Home</a>
                            </li>

                            <li class="{{ request()->routeIs('shop') ? 'active-menu' : '' }}">
                                <a href="{{route('shop')}}">Shop</a>
                            </li>

                            <li class="{{ request()->routeIs('about') ? 'active-menu' : '' }}">
                                <a href="{{route('about')}}">A propos</a>
                            </li>

                            <li class="{{ request()->routeIs('contact') ? 'active-menu' : '' }}">
                                <a href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						{{-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div> --}}


						{{-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                            <i class="zmdi zmdi-favorite-outline"></i>
						</a> --}}

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify={{Session::has('cart') ? Session::get('cart')->totalQty:0}}>
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 dropdown">
                            <div class="dropdown-toggle-no-arrow" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="zmdi zmdi-account"></i>
                            </div>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <!-- Liens du menu déroulant -->
                              @if (Route::has('login'))
                                @auth
                                <a href="" class="dropdown-item">{{ Auth::user()->name }}</a>
                                @if (auth()->user()->admin == 1)
                                    <a href="{{ route('admin') }}" class="dropdown-item">Administration</a>
                                @endif
                                <a href="{{ route('history') }}" class="dropdown-item">Historique</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Déconnexion') }}
                                    </x-dropdown-link>
                                </form>
                                @else
                                    <a href="{{ route('login') }}" class="dropdown-item">Connexion</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="dropdown-item">Inscription</a>
                                    @endif
                                @endauth
                              @endif
                            </div>
                        </div>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="{{route('home')}}"><img src="{{asset('all/BYA.gif')}}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				{{-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div> --}}

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify={{Session::has('cart') ? Session::get('cart')->totalQty:0}}>
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 dropdown">
                    <div class="dropdown-toggle-no-arrow" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="zmdi zmdi-account"></i>
                    </div>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <!-- Liens du menu déroulant -->
                      @if (Route::has('login'))
                        @auth
                        <a href="" class="dropdown-item">{{ Auth::user()->name }}</a>
                        @if (auth()->user()->admin == 1)
                            <a href="{{ route('admin') }}" class="dropdown-item">Administration</a>
                        @endif
                        <a href="{{ route('history') }}" class="dropdown-item">Historique</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="dropdown-item"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Déconnexion') }}
                            </x-dropdown-link>
                        </form>
                        @else
                            <a href="{{ route('login') }}" class="dropdown-item">Connexion</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="dropdown-item">Inscription</a>
                            @endif
                        @endauth
                      @endif
                    </div>
                </div>

				{{-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a> --}}
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				{{-- <li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li> --}}

				<li>
					<div class="right-top-bar flex-w h-full">
						{{-- <a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a> --}}
                        <a href="mailto:byatrends@gmail.com" class="flex-c-m p-lr-10 trans-04">
							byatrends@gmail.com
						</a>
                        <a href="tel:+22961418980" class="flex-c-m p-lr-10 trans-04">
							+22961418980
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="{{route('home')}}">Home</a>
					{{-- <span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span> --}}
				</li>

				<li>
					<a href="{{route('shop')}}">Shop</a>
				</li>

				{{-- <li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li> --}}

				<li>
					<a href="{{route('about')}}">A propos</a>
				</li>

				<li>
					<a href="{{route('contact')}}">Contact</a>
				</li>

                {{-- <li>
					<a href="#">Compte</a>
                    <ul class="sub-menu-m">
                        @if (Route::has('login'))
                                @auth
                                    <li><a href="">{{ Auth::user()->name }}</a></li>
                                    @if (auth()->user()->admin == 1)
                                        <li><a href="{{ route('admin') }}">Administration</a></li>
                                    @endif
                                    <li><a href="{{ route('history') }}">Historique</a></li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Déconnexion') }}
                                        </x-dropdown-link>
                                        </form>
                                        @else
                                            <li><a href="{{ route('login') }}">Connexion</a></li>

                                            @if (Route::has('register'))
                                                <li><a href="{{ route('register') }}">Inscription</a></li>
                                            @endif
                                @endauth
                        @endif
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li> --}}
			</ul>
		</div>

		<!-- Modal Search -->
		{{-- <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{asset('frontend/images/icons/icon-close2.png')}}" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div> --}}
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Panier
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
                @if (Session::has('cart'))
                    <ul class="header-cart-wrapitem w-full">
                        @foreach ($cart_products as $product)
                            <li class="header-cart-item flex-w flex-t m-b-12">
                                <a href="/retirer_produit/{{$product['product_id']}}">
                                    <div class="header-cart-item-img">
                                        <img src="{{asset('/storage/' . $product['product_image'])}}" alt="IMG">
                                    </div>
                                </a>

                                <div class="header-cart-item-txt p-t-8">
                                    <span href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        {{$product['product_name']}}
                                    </span>

                                    <span class="header-cart-item-info">
                                        {{$product['qty']}} x {{$product['product_price']}} CFA
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="w-full">
                        <div class="header-cart-total w-full p-tb-40">
                            Total: {{Session::get('cart')->totalPrice}} CFA
                        </div>

                        <div class="header-cart-buttons flex-w w-full">
                            <a href="{{route('cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                                Voir panier
                            </a>

                            <a href="{{route('checkout')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                                Effectuer Paiement
                            </a>
                        </div>
                    </div>
                @endif
            </div>
		</div>
	</div>
