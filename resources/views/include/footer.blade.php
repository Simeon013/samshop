    	<!-- Footer -->
        <footer class="bg3 p-t-75 p-b-32">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3 p-b-50">
                        <h4 class="stext-301 cl0 p-b-30">
                            Categories
                        </h4>

                        <ul>
                            @foreach ($categories as $category)
                                <li class="p-b-10">
                                    <a href="{{route('shop')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                        {{$category->category_name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-sm-6 col-lg-3 p-b-50">
                        <h4 class="stext-301 cl0 p-b-30">
                            Help
                        </h4>

                        <ul>
                            <li class="p-b-10">
                                <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                    Track Order
                                </a>
                            </li>

                            <li class="p-b-10">
                                <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                    Returns
                                </a>
                            </li>

                            <li class="p-b-10">
                                <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                    Shipping
                                </a>
                            </li>

                            <li class="p-b-10">
                                <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                    FAQs
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-6 col-lg-3 p-b-50">
                        <h4 class="stext-301 cl0 p-b-30">
                            CONTACTEZ-NOUS
                        </h4>

                        <p class="stext-107 cl7 size-201">
                            Des questions? Faites-le nous savoir au (+229) 61418980
                        </p>

                        <div class="p-t-27">
                            <a href="https://www.facebook.com/profile.php?id=100070015101976&mibextid=ZbWKwL" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                                <i class="fa fa-facebook"></i>
                            </a>

                            {{-- <a href="https://vm.tiktok.com/ZMYxCBMUf/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                                <i class="fa fa-instagram"></i>
                            </a> --}}

                            <a href="https://www.snapchat.com/add/nabichou091?share_id=MTLSS9R5h2E&locale=fr-FR" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                                <i class="fa fa-snapchat"></i>
                            </a>

                            <a href="https://wa.me/22961418980" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 p-b-50">
                        <h4 class="stext-301 cl0 p-b-30">
                            Newsletter
                        </h4>

                        <form>
                            <div class="wrap-input1 w-full p-b-4">
                                <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
                                <div class="focus-input1 trans-04"></div>
                            </div>

                            <div class="p-t-18">
                                <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="p-t-40">
                    {{-- <div class="flex-c-m flex-w p-b-18">
                        <a href="#" class="m-all-1">
                            <img src="{{asset('frontend/images/icons/icon-pay-01.png')}}" alt="ICON-PAY">
                        </a>

                        <a href="#" class="m-all-1">
                            <img src="{{asset('frontend/images/icons/icon-pay-02.png')}}" alt="ICON-PAY">
                        </a>

                        <a href="#" class="m-all-1">
                            <img src="{{asset('frontend/images/icons/icon-pay-03.png')}}" alt="ICON-PAY">
                        </a>

                        <a href="#" class="m-all-1">
                            <img src="{{asset('frontend/images/icons/icon-pay-04.png')}}" alt="ICON-PAY">
                        </a>

                        <a href="#" class="m-all-1">
                            <img src="{{asset('frontend/images/icons/icon-pay-05.png')}}" alt="ICON-PAY">
                        </a>
                    </div> --}}

                    <p class="stext-107 cl6 txt-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script>
                            Tous droits réservés | Réaliser avec
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            par <a href="#" target="_blank">Siméon DAOUDA</a>
                            &amp; ditribué par
                            <a href="#" target="_blank">LAYER-TEC</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                    </p>
                </div>
            </div>
        </footer>


        <!-- Back to top -->
        <div class="btn-back-to-top" id="myBtn">
            <span class="symbol-btn-back-to-top">
                <i class="zmdi zmdi-chevron-up"></i>
            </span>
        </div>
