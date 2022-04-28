@extends('layouts.master')

@section('title', 'accueil')
@section('accueilactive', 'active')

@section('content')
        <div class="slider-area bg-gray">
            <div class="hero-slider-active-1 hero-slider-pt-1 nav-style-1 dot-style-1">
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="hero-slider-content-1 hero-slider-content-1-pt-1 slider-animated-1">
                                    <!-- <h4 class="animated">New Arrivals</h4> -->
                                    <h1 class="animated">Vendez ou achetez à crédit</h1>
                                    <p class="animated">Oui! C'est possible. WOTUKUI est la plate forme togolaise qui vous permet d'acheter des articles à crédit ou d' en mettre en vente</p>
                                    <div class="btn-style-1">
                                        <a class="animated btn-1-padding-1" href="{{asset('/mesure')}}">Commande sur Mesure</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="hero-slider-img-1 slider-animated-1">
                                    <img class="animated" src="{{asset('template/assets/images/slider/canape moderne.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="hero-slider-content-1 hero-slider-content-1-pt-1 slider-animated-1">
                                    <!-- <h4 class="animated">New Arrivals</h4> -->
                                    <h1 class="animated">Processus sûr et sécurisé </h1>
                                    <p class="animated">Profitez de nos offres et de nos meilleurs tarifs</p>
                                    <div class="btn-style-1">
                                        <a class="animated btn-1-padding-1" href="{{asset('/condition')}}">Condition à Remplir</a>
                                        {{-- product-details.html --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="hero-slider-img-1 slider-animated-1">
                                    <img class="animated" src="{{asset('template/assets/images/slider/lampe.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-area">
            <div class="container">
                <div class="service-wrap">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="single-service-wrap mb-30">
                                <div class="service-icon">
                                    <i class="icon-cursor"></i>
                                </div>
                                <div class="service-content">
                                    <h3>Livraison gratuite</h3>
                                    <span>Commandes > 700000 CFA</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="single-service-wrap mb-30">
                                <div class="service-icon">
                                    <i class="icon-reload"></i>
                                </div>
                                <div class="service-content">
                                    <h3>Garantie</h3>
                                    <span>30 jours</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="single-service-wrap mb-30">
                                <div class="service-icon">
                                    <i class="icon-lock"></i>
                                </div>
                                <div class="service-content">
                                    <h3>100% Securisé</h3>
                                    <span>Paiement</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="single-service-wrap mb-30">
                                <div class="service-icon">
                                    <i class="icon-tag"></i>
                                </div>
                                <div class="service-content">
                                    <h3>Meilleurs Prix</h3>
                                    <span>+ Bonus</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="about-us-area pt-85">
            <div class="container">
                <div class="border-bottom-1 about-content-pb">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="about-us-logo">
                                <img src="{{asset('template/assets/images/about/wotukui.png')}}" alt="logo">
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="about-us-content">
                                <h3>Introduce</h3>
                                <p>Norda store is a business concept is to offer fashion and quality at the best price. It has since it was founded in 2018 grown into one of the best WooCommerce Fashion Theme. The content of this site is copyright-protected and is the property of David Moye Creative.</p>
                                <div class="signature">
                                    <h2>David Moye</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="product-categories-area pt-115 pb-115">
            <div class="container">
                <div class="section-title-btn-wrap border-bottom-3 mb-50 pb-20">
                    <div class="section-title-6">
                        <h2>Nos Categories produits</h2>
                    </div>
                    <!-- <div class="btn-style-7 btn-style-7-blue">
                        <a href="{{asset('/')}}">All Product</a>
                    </div> -->
                </div>
                <div class="product-categories-slider-1 nav-style-3">
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border border-blue mb-20">
                                <a href="{{url('/categorie/1')}}">
                                    <img src="{{asset('template/assets/images/product/maison.png')}}" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 product-content-blue text-center">
                                <h5><a href="{{url('/categorie/1')}}">Meubles de maison</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border border-blue mb-20">
                                <a href="{{url('/categorie/2')}}">
                                    <img src="{{asset('template/assets/images/product/bureau.png')}}" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 product-content-blue text-center">
                                <h5><a href="{{url('/categorie/2')}}">Meubles de bureau</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border border-blue mb-20">
                                <a href="{{url('/categorie/3')}}">
                                    <img src="{{asset('template/assets/images/product/electroménager.png')}}" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 product-content-blue text-center">
                                <h5><a href="{{url('/categorie/3')}}">Electroménager</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border border-blue mb-20">
                                <a href="{{url('/categorie/4')}}">
                                    <img src="{{asset('template/assets/images/product/moto.png')}}" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 product-content-blue text-center">
                                <h5><a href="{{url('/categorie/4')}}">Auto-Moto</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border border-blue mb-20">
                                <a href="{{asset('/categorie/5')}}">
                                    <img src="{{asset('template/assets/images/product/product-52.png')}}" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 product-content-blue text-center">
                                <h5><a href="{{asset('/categorie/5')}}">TIC</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border border-blue mb-20">
                                <a href="{{asset('/categorie/6')}}">
                                    <img src="{{asset('template/assets/images/product/madeinafrica.png')}}" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 product-content-blue text-center">
                                <h5><a href="{{asset('/categorie/6')}}">Made In Africa</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="product-area pb-110">
            <div class="container">
                <div class="section-title-tab-wrap border-bottom-3 mb-30 pb-20">
                    <div class="section-title-6">
                        <h2><i class="icon-apple"></i> Meubles de maison</h2>
                    </div>
                    <!-- <div class="tab-style-8 nav tab-res-mrg">
                        <a class="active" href="{{asset('template/')}}#product-6" data-toggle="tab">Televisions </a>
                        <a href="{{asset('template/')}}#product-7" data-toggle="tab"> Air Conditions </a>
                    </div> -->
                </div>
                <div class="tab-content jump"> 
                    <div id="product-6" class="tab-pane active">
                        
                        <div class="product-slider-active-3 nav-style-3">
                            @foreach($meublemaison as $meublemaisons)

                            <div class="">
                                <div class="single-product-wrap">
                                    <div class="product-img product-img-zoom mb-15">
                                        <a href="{{url('/detail/'.$meublemaisons->id)}}">
                                            <img src="{{asset($meublemaisons->photo)}}" alt="">
                                        </a>
                                        <div class="product-action-2 tooltip-style-2">
                                            <!-- <button title="Wishlist"><i class="icon-heart"></i></button> -->
                                            <!-- <button title="Quick View" data-toggle="modal" data-target="#detail" ><i class="icon-size-fullscreen icons"></i></button> -->
                                            <!-- <button title="Compare"><i class="icon-refresh"></i></button> -->
                                        </div>
                                    </div>

                                    <div class="product-content-wrap-3" align="center">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $meublemaisons->nameP }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">Meuble de maison</a></h3>
                                        <div class="product-rating-wrap-4" align="center" style="text-align: center !important;">
                                            <div class="product-rating-4" align="center"style="text-align: center !important;">
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                            </div>
                                            <span>({{$meublemaisons->echeance}})tranches</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($meublemaisons->price / $meublemaisons->echeance, 0,",",".")  }} FCFA / Mois </span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap-3 product-content-position-2 pro-position-2-padding-dec" align="center">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $meublemaisons->nameP }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">Meuble de maison</a></h3>
                                        <div class="product-rating-wrap-1"style="text-align: center !important;">
                                            <div class="product-rating-4" style="text-align: center !important;">
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                            </div>
                                            <span>({{$meublemaisons->echeance}})tranches</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($meublemaisons->price, 0,",",".")  }} FCFA  </span>
                                        </div>
                                        <div class="pro-add-to-cart-2" onclick="window.location.href='{{url('/detail/'.$meublemaisons->id)}}'">
                                            <button title="Commander">Commander</button>
                                        </div>
                                    </div>

                                </div>


                            </div>



                            
                            @endforeach
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area pb-110">
            <div class="container">
                <div class="section-title-tab-wrap border-bottom-3 mb-30 pb-20">
                    <div class="section-title-6">
                        <h2><i class="icon-"></i> Meubles de bureau</h2>
                    </div>
                </div>
                <div class="tab-content jump">
                    <div id="product-11" class="tab-pane active">
                        
                        <div class="product-slider-active-3 nav-style-3">
                            @foreach($meublebureau as $meublebureaux)
                            <div class="">
                                <div class="single-product-wrap">
                                    <div class="product-img product-img-zoom mb-15">
                                        <a href="{{url('/detail/'.$meublebureaux->id)}}">
                                            <img src="{{asset($meublebureaux->photo)}}" alt="">
                                        </a>
                                        <div class="product-action-2 tooltip-style-2">
                                            <!-- <button title="Wishlist"><i class="icon-heart"></i></button> -->
                                            <!-- <button title="Quick View" data-toggle="modal" data-target="#detail" ><i class="icon-size-fullscreen icons"></i></button> -->
                                            <!-- <button title="Compare"><i class="icon-refresh"></i></button> -->
                                        </div>
                                    </div>

                                    <div class="product-content-wrap-3" align="center">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $meublebureaux->nameP }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">Meuble de bureau</a></h3>
                                        <div class="product-rating-wrap-4" align="center" style="text-align: center !important;">
                                            <div class="product-rating-4" align="center"style="text-align: center !important;">
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                            </div>
                                            <span>({{$meublebureaux->echeance}})tranches</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($meublebureaux->price / $meublebureaux->echeance, 0,",",".")  }} FCFA / Mois </span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap-3 product-content-position-2 pro-position-2-padding-dec" align="center">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $meublebureaux->nameP }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">Meuble de bureau</a></h3>
                                        <div class="product-rating-wrap-1"style="text-align: center !important;">
                                            <div class="product-rating-4" style="text-align: center !important;">
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                            </div>
                                            <span>({{$meublebureaux->echeance}})tranches</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($meublebureaux->price, 0,",",".")  }} FCFA  </span>
                                        </div>
                                        <div class="pro-add-to-cart-2" onclick="window.location.href='{{url('/detail/'.$meublebureaux->id)}}'">
                                            <button title="Commander">Commander</button>
                                        </div>
                                    </div>

                                </div>


                            </div>


                            @endforeach
                            
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
        <div class="product-area pb-115">
            <div class="container">
                <div class="section-title-tab-wrap border-bottom-3 mb-30 pb-20">
                    <div class="section-title-6">
                        <h2><i class="icon-"></i> Electroménager</h2>
                    </div>
                </div>
                <div class="tab-content jump">
                    <div id="product-16" class="tab-pane active">
                        
                        <div class="product-slider-active-3 nav-style-3">
                            @foreach($electro as $electros)
                            <div class="">
                                <div class="single-product-wrap">
                                    <div class="product-img product-img-zoom mb-15">
                                        <a href="{{url('/detail/'.$electros->id)}}">
                                            <img src="{{asset($electros->photo)}}" alt="">
                                        </a>
                                        <div class="product-action-2 tooltip-style-2">
                                            <!-- <button title="Wishlist"><i class="icon-heart"></i></button> -->
                                            <!-- <button title="Quick View" data-toggle="modal" data-target="#detail" ><i class="icon-size-fullscreen icons"></i></button> -->
                                            <!-- <button title="Compare"><i class="icon-refresh"></i></button> -->
                                        </div>
                                    </div>

                                    <div class="product-content-wrap-3" align="center">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $electros->nameP }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">Electroménager</a></h3>
                                        <div class="product-rating-wrap-4" align="center" style="text-align: center !important;">
                                            <div class="product-rating-4" align="center"style="text-align: center !important;">
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                            </div>
                                            <span>({{$electros->echeance}})tranches</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($electros->price / $electros->echeance, 0,",",".")  }} FCFA / Mois </span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap-3 product-content-position-2 pro-position-2-padding-dec" align="center">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $electros->nameP }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">Electroménager</a></h3>
                                        <div class="product-rating-wrap-1"style="text-align: center !important;">
                                            <div class="product-rating-4" style="text-align: center !important;">
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                            </div>
                                            <span>({{$electros->echeance}})tranches</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($electros->price, 0,",",".")  }} FCFA  </span>
                                        </div>
                                        <div class="pro-add-to-cart-2" onclick="window.location.href='{{url('/detail/'.$electros->id)}}'">
                                            <button title="Commander">Commander</button>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            @endforeach
                            
                        </div>
                        

                    </div>
                    
                </div>
            </div>
        </div>
        {{--
        <div class="product-area pb-110">
            <div class="container">
                <div class="section-title-tab-wrap border-bottom-3 mb-30 pb-20">
                    <div class="section-title-6">
                        <h2><i class="icon-"></i> Meubles de bureau</h2>
                    </div>
                </div>
                <div class="tab-content jump">
                    <div id="product-11" class="tab-pane active">
                        
                        <div class="product-slider-active-3 nav-style-3">
                            @foreach($imprimantes as $imprimante)
                            <div class="product-plr-1">
                                <div class="single-product-wrap">
                                    <div class="product-img product-img-zoom mb-15">
                                        <a href="{{ url ('send_to_form', Crypt::encryptString($imprimante->id_products))}}">
                                            <img src="{{asset($imprimante->product_image)}}" alt="">
                                        </a>
                                        <!-- <div class="product-action-2 tooltip-style-2">
                                            <button title="Wishlist"><i class="icon-heart"></i></button>
                                            <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                            <button title="Compare"><i class="icon-refresh"></i></button>
                                        </div> -->
                                    </div>
                                    <div class="product-content-wrap-3">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $imprimante->name }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">Imprimante</a></h3>
                                        <div class="product-rating-wrap-2">
                                            <div class="product-rating-4">
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                            </div>
                                            <span>(4)</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($imprimante->price, 0,",",".")  }} FCFA </span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap-3 product-content-position-2 pro-position-2-padding-dec">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $imprimante->name }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">Imprimante</a></h3>
                                        <div class="product-rating-wrap-2">
                                            <div class="product-rating-4">
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                            </div>
                                            <span>(4)</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($imprimante->price, 0,",",".")  }} FCFA  </span>
                                        </div>
                                        <div class="pro-add-to-cart-2" onclick="window.location.href='{{ url ('send_to_form', Crypt::encryptString($o->id_products))}}'">
                                            <button title="Commander">Commander</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
        --}}
        <div class="product-area pb-115">
            <div class="container">
                <div class="section-title-tab-wrap border-bottom-3 mb-30 pb-20">
                    <div class="section-title-6">
                        <h2><i class="icon-"></i> Auto-moto</h2>
                    </div>
                </div>
                <div class="tab-content jump">
                    <div id="product-16" class="tab-pane active">
                        
                        <div class="product-slider-active-3 nav-style-3">
                            @foreach($auto as $autos)
                            <div class="">
                                <div class="single-product-wrap">
                                    <div class="product-img product-img-zoom mb-15">
                                        <a href="{{url('/detail/'.$autos->id)}}">
                                            <img src="{{asset($autos->photo)}}" alt="">
                                        </a>
                                        <div class="product-action-2 tooltip-style-2">
                                            <!-- <button title="Wishlist"><i class="icon-heart"></i></button> -->
                                            <!-- <button title="Quick View" data-toggle="modal" data-target="#detail" ><i class="icon-size-fullscreen icons"></i></button> -->
                                            <!-- <button title="Compare"><i class="icon-refresh"></i></button> -->
                                        </div>
                                    </div>

                                    <div class="product-content-wrap-3" align="center">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $autos->nameP }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">Auto-Moto</a></h3>
                                        <div class="product-rating-wrap-4" align="center" style="text-align: center !important;">
                                            <div class="product-rating-4" align="center"style="text-align: center !important;">
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                            </div>
                                            <span>({{$autos->echeance}})tranches</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($autos->price / $autos->echeance, 0,",",".")  }} FCFA / Mois </span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap-3 product-content-position-2 pro-position-2-padding-dec" align="center">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $autos->nameP }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">Auto-Moto</a></h3>
                                        <div class="product-rating-wrap-1"style="text-align: center !important;">
                                            <div class="product-rating-4" style="text-align: center !important;">
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                            </div>
                                            <span>({{$autos->echeance}})tranches</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($autos->price, 0,",",".")  }} FCFA  </span>
                                        </div>
                                        <div class="pro-add-to-cart-2" onclick="window.location.href='{{url('/detail/'.$autos->id)}}'">
                                            <button title="Commander">Commander</button>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            @endforeach
                            
                        </div>
                        

                    </div>
                    
                </div>
            </div>
        </div>

        <div class="product-area pb-115">
            <div class="container">
                <div class="section-title-tab-wrap border-bottom-3 mb-30 pb-20">
                    <div class="section-title-6">
                        <h2><i class="icon-"></i> TIC </h2>
                    </div>
                </div>
                <div class="tab-content jump">
                    <div id="product-16" class="tab-pane active">
                        
                        <div class="product-slider-active-3 nav-style-3">
                            @foreach($ordi as $ordis)
                            <div class="">
                                <div class="single-product-wrap">
                                    <div class="product-img product-img-zoom mb-15">
                                        <a href="{{url('/detail/'.$ordis->id)}}">
                                            <img src="{{asset($ordis->photo)}}" alt="">
                                        </a>
                                        <div class="product-action-2 tooltip-style-2">
                                            <!-- <button title="Wishlist"><i class="icon-heart"></i></button> -->
                                            <!-- <button title="Quick View" data-toggle="modal" data-target="#detail" ><i class="icon-size-fullscreen icons"></i></button> -->
                                            <!-- <button title="Compare"><i class="icon-refresh"></i></button> -->
                                        </div>
                                    </div>

                                    <div class="product-content-wrap-3" align="center">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $ordis->nameP }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">TIC</a></h3>
                                        <div class="product-rating-wrap-4" align="center" style="text-align: center !important;">
                                            <div class="product-rating-4" align="center"style="text-align: center !important;">
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                            </div>
                                            <span>({{$ordis->echeance}})tranches</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($ordis->price / $ordis->echeance, 0,",",".")  }} FCFA / Mois </span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap-3 product-content-position-2 pro-position-2-padding-dec" align="center">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $ordis->nameP }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">TIC</a></h3>
                                        <div class="product-rating-wrap-1"style="text-align: center !important;">
                                            <div class="product-rating-4" style="text-align: center !important;">
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                            </div>
                                            <span>({{$ordis->echeance}})tranches</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($ordis->price, 0,",",".")  }} FCFA  </span>
                                        </div>
                                        <div class="pro-add-to-cart-2" onclick="window.location.href='{{url('/detail/'.$ordis->id)}}'">
                                            <button title="Commander">Commander</button>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            @endforeach
                            
                        </div>
                        

                    </div>
                    
                </div>
            </div>
        </div>


        <div class="product-area pb-115">
            <div class="container">
                <div class="section-title-tab-wrap border-bottom-3 mb-30 pb-20">
                    <div class="section-title-6">
                        <h2><i class="icon-"></i> Made In Africa </h2>
                    </div>
                </div>
                <div class="tab-content jump">
                    <div id="product-16" class="tab-pane active">
                        
                        <div class="product-slider-active-3 nav-style-3">
                            @foreach($africa as $africas)
                            <div class="">
                                <div class="single-product-wrap">
                                    <div class="product-img product-img-zoom mb-15">
                                        <a href="{{url('/detail/'.$africas->id)}}">
                                            <img src="{{asset($africas->photo)}}" alt="">
                                        </a>
                                        <div class="product-action-2 tooltip-style-2">
                                        </div>
                                    </div>

                                    <div class="product-content-wrap-3" align="center">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $africas->nameP }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">Made In Africa</a></h3>
                                        <div class="product-rating-wrap-4" align="center" style="text-align: center !important;">
                                            <div class="product-rating-4" align="center"style="text-align: center !important;">
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                            </div>
                                            <span>({{$africas->echeance}})tranches</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($africas->price / $africas->echeance, 0,",",".")  }} FCFA / Mois </span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap-3 product-content-position-2 pro-position-2-padding-dec" align="center">
                                        <div class="product-content-categories">
                                            <a class="blue" href="{{asset('/')}}">{{ $africas->nameP }}</a>
                                        </div>
                                        <h3><a class="blue" href="{{asset('/')}}">Made In Africa</a></h3>
                                        <div class="product-rating-wrap-1"style="text-align: center !important;">
                                            <div class="product-rating-4" style="text-align: center !important;">
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                                <i class="icon_star" style="text-align: center !important;"></i>
                                            </div>
                                            <span>({{$africas->echeance}})tranches</span>
                                        </div>
                                        <div class="product-price-4">
                                            <span>{{ number_format($africas->price, 0,",",".")  }} FCFA  </span>
                                        </div>
                                        <div class="pro-add-to-cart-2" onclick="window.location.href='{{url('/detail/'.$africas->id)}}'">
                                            <button title="Commander">Commander</button>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            @endforeach
                            
                        </div>
                        

                    </div>
                    
                </div>
            </div>
        </div>
       
        <!-- Modal -->
        
       
        
        
        <!-- Modal end -->

 @stop