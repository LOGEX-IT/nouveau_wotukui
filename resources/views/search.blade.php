<!doctype html>
<html class="no-js" lang="en">

<head> 
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>WOTUKUI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta name="description" content="WOTUKUI, la plateforme de vente et d'achat à crédit qui vous facilite la vie.">
    <meta name="keywords" content="Meubles de bureau, Meubles de maison, Electromenager, Auto-Moto,Materiels Informatiques, IT">

    <!--OGP-->
    <meta property="og:title" content="WOTUKUI" />
    <meta property="og:url" content="https://www.wotukui.com" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="wotukui.com" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:description" content="WOTUKUI, la plateforme de vente et d'achat à crédit qui vous facilite la vie." />
    <meta property="og:image" content="{{asset('template/assets/images/about/wotukui.png')}}" />

    <!--End OGP-->

    <!--Twitter Card-->
    <meta property="twitter:title" content="WOTUKUI" />
    <meta property="twitter:url" content="https://www.wotukui.com" />
    <meta property="twitter:card" content="WOTUKUI, la plateforme de vente et d'achat à crédit qui vous facilite la vie." />
    <meta property="twitter:description" content="WOTUKUI, la plateforme de vente et d'achat à crédit qui vous facilite la vie." />
    <meta property="twitter:image" content="{{asset('template/assets/images/about/wotukui.png')}}" /> 
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('template/assets/images/about/wotukui.png')}}">

    <!-- All CSS is here
    ============================================ -->

    <link rel="stylesheet" href="{{asset('template/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/vendor/signericafat.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/vendor/cerebrisans.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/vendor/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/vendor/elegant.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/vendor/linear-icon.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/plugins/easyzoom.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/plugins/slick.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/plugins/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/style.css')}}">

    <!-- Use the minified version files listed below for better performance and remove the files listed above
    <link rel="stylesheet" href="{{asset('template/')}}assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="{{asset('template/')}}assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="{{asset('template/')}}assets/css/style.min.css"> -->

</head>
<body>

    <div class="main-wrapper">
        <header class="header-area section-padding-1">
            <div class="container-fluid">
                <div class="header-large-device">
                    <div class="header-top header-top-ptb-1 border-bottom-1">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5">
                                <div class="header-offer-wrap">
                                    <p><i class="icon-paper-plane"></i> 262 BKK, Bè Klikamé Lomé-Togo, 05 BP 757 </p>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7">
                                <div class="header-top-right">
                                    <div class="same-style-wrap">
                                        <div class="same-style same-style-border track-order">
                                            <i class="icon-envelope-open "></i> infos@logexit.com
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="social-style-1 social-style-1-mrg">
                                        <a href="#"><i class="icon-social-twitter"></i></a>
                                        <a href="#"><i class="icon-social-facebook"></i></a>
                                        <a href="#"><i class="icon-social-instagram"></i></a>
                                        <a href="#"><i class="icon-social-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-bottom">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{url('/')}}"><img src="{{asset('template/assets/images/about/wotukui.png')}}" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7">
                                <div class="main-menu main-menu-padding-1 main-menu-lh-1">
                                    <nav>
                                        <ul>
                                            <li><a href="{{url('/categorie/1')}}">Meubles de maison </a></li>
                                            <li><a href="{{url('/categorie/2')}}">{{ __('Meubles de bureau') }}</a></li>
                                            <li><a href="{{url('/categorie/3')}}">Electroménager</a></li>
                                            <li><a href="{{url('/categorie/4')}}">Auto-Moto</a></li>
                                            <li><a href="{{url('/categorie/5')}}">TIC</a></li>                                             
                                            {{-- <li><a href="{{url('/condition')}}">Condition</a></li>  --}}
                                                    
                                                    
                                                    @if(Auth::check())
                                                <li>
                                                    <a>
                                                        {{ Auth::user()->name }} <span class="caret"></span>
                                                    </a>
                                                    {{--
                                                    <div>
                                                        <a href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                    --}}
                                                </li> 
                                            @endif
                                            
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3">
                                <div class="header-action header-action-flex header-action-mrg-right">
                                    <div class="same-style-2 header-search-1">
                                        <a class="search-toggle" href="#">
                                            <i class="icon-magnifier s-open"></i>
                                            <i class="icon_close s-close"></i>
                                        </a>
                                        <div class="search-wrap-1">
                                            <form action="#">
                                                <input placeholder="Search products…" type="text">
                                                <button class="button-search"><i class="icon-magnifier"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <div class="same-style-2 header-cart">
                                        @include('_menu2')
                                                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-small-device small-device-ptb-1">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <div class="mobile-logo">
                                    <a href="{{asset('/')}}">
                                        <img alt="" src="{{asset('template/assets/images/about/wotukui.png')}}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="header-action header-action-flex">
                                    <!-- <div class="same-style-2 same-style-2-white same-style-2-font-inc">
                                        <a href="{{asset('/')}}"><i class="icon-user"></i></a>
                                    </div>
                                    <div class="same-style-2 same-style-2-white same-style-2-font-inc">
                                        <a href="{{asset('/')}}"><i class="icon-heart"></i><span class="pro-count black">03</span></a>
                                    </div>
                                    <div class="same-style-2 same-style-2-white same-style-2-font-inc header-cart">
                                        <a class="cart-active" href="{{asset('/')}}">
                                            <i class="icon-basket-loaded"></i><span class="pro-count black">02</span>
                                        </a>
                                    </div> -->
                                    <div class="same-style-2 same-style-2-white main-menu-icon">
                                        <a class="mobile-header-button-active" href="{{asset('/')}}"><i class="icon-menu"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>



<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{asset('/')}}">Accueil</a>
                </li>
                <li class="active"> {{$category->LibelleCategorie}}</li>
            </ul>
        </div>
    </div>
</div>

<div class="shop-area pt-120 pb-120">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                @foreach($categories as $article)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="single-product-wrap mb-35">
                                        <div class="product-img product-img-zoom mb-15">
                                            <a href="{{url('/detail/'.$article->id)}}">
                                                <img src="{{asset($article->photo)}}" alt="">
                                            </a>
                                            <!-- <div class="product-action-2 tooltip-style-2">
                                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                                <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                <button title="Compare"><i class="icon-refresh"></i></button>
                                            </div> -->
                                        </div>
                                        <div class="product-content-wrap-3" align="center">
                                            <div class="product-content-categories">
                                                <a class="blue" href="{{asset('/')}}">{{ $article->nameP }}</a>
                                            </div> 
                                            <h3><a class="blue" href="{{asset('/')}}">{{ $article->LibelleCategorie }}</a></h3>
                                            <div class="product-rating-wrap-4" align="center" style="text-align: center !important;">
                                                <div class="product-rating-4" align="center"style="text-align: center !important;">
                                                    <i class="icon_star" style="text-align: center !important;"></i>
                                                    <i class="icon_star" style="text-align: center !important;"></i>
                                                    <i class="icon_star" style="text-align: center !important;"></i>
                                                    <i class="icon_star" style="text-align: center !important;"></i>
                                                    <i class="icon_star" style="text-align: center !important;"></i>
                                                </div>
                                                <span>({{$article->echeance}})tranches</span>
                                            </div>
                                            <div class="product-price-4">
                                                <span>{{ number_format($article->price / $article->echeance, 2)  }} FCFA / Mois </span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap-3 product-content-position-2 pro-position-2-padding-dec" align="center">
                                            <div class="product-content-categories">
                                                <a class="blue" href="{{asset('/')}}">{{ $article->nameP }}</a>
                                            </div>
                                            <h3><a class="blue" href="{{asset('/')}}">{{ $article->LibelleCategorie }}</a></h3>
                                            <div class="product-rating-wrap-1"style="text-align: center !important;">
                                                <div class="product-rating-4" style="text-align: center !important;">
                                                    <i class="icon_star" style="text-align: center !important;"></i>
                                                    <i class="icon_star" style="text-align: center !important;"></i>
                                                    <i class="icon_star" style="text-align: center !important;"></i>
                                                    <i class="icon_star" style="text-align: center !important;"></i>
                                                    <i class="icon_star" style="text-align: center !important;"></i>
                                                </div>
                                                <span>({{$article->echeance}})tranches</span>
                                            </div>
                                            <div class="product-price-4">
                                                <span>{{ number_format($article->price, 2)  }} FCFA  </span>
                                            </div>
                                            <div class="pro-add-to-cart-2" onclick="window.location.href='{{url('/detail/'.$article->id)}}'">
                                                <button title="Commander">Commander</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                @endforeach 
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="pro-pagination-style text-center mt-10">
                        {{ $categories->links() }}
                        <!-- <ul>
                            <li><a class="prev" href="#"><i class="icon-arrow-left"></i></a></li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a class="next" href="#"><i class="icon-arrow-right"></i></a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sidebar-wrapper sidebar-wrapper-mrg-right">
                    <div class="sidebar-widget mb-40">
                        <h4 class="sidebar-widget-title">Search </h4>
                        <div class="sidebar-search">
                            <form class="sidebar-search-form" action="#">
                                <input type="text" placeholder="Search here...">
                                <button>
                                    <i class="icon-magnifier"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
                        <h4 class="sidebar-widget-title">Categories </h4>
                        <div class="shop-catigory">
                            <ul>
                                <li><a href="{{url('/categorie/1')}}">Meubles de maison </a>
                                <li><a href="{{url('/categorie/2')}}">{{ __('Meubles de bureau') }}</a></li>
                                <li><a href="{{url('/categorie/2')}}">{{ __('Meubles de bureau') }}</a></li>
                                <li><a href="{{url('/categorie/4')}}">Auto-Moto</a></li>
                                <li><a href="{{url('/categorie/5')}}">TIC </a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>





         <footer class="footer-area bg-gray-4">
            <div class="footer-top border-bottom-4 pb-55">
                <div class="container">
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="footer-widget mb-40">
                                <h3 class="footer-title"></h3>
                                <div class="footer-info-list info-list-50-parcent">
                                    <ul>
                                        <img src="{{asset('template/assets/images/about/wotukui.png')}}" width="200px" height="81" alt=""><br>
                                        Le marché des produits vendus à crédit <br>
                                        <i class="fa fa-check"></i>Meubles de maison <br>
                                        <i class="fa fa-check"></i>Meubles de bureau <br>
                                        <i class="fa fa-check"></i>Electroménager
                                        <br>
                                        <i class="fa fa-check"></i>Auto-Moto
                                        <br>
                                        <i class="fa fa-check"></i>TIC
                                        
                                    </ul>
                                    <hr>
                                    <ul>
                                        <li><a href="{{asset('/condition')}}" >Conditions à Remplir</a></li>                                       
                                        <li><a href="{{asset('/mesure')}}">Commande sur MESURE</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="footer-widget ml-70 mb-40">
                                <h3 class="footer-title">Nos autres Marketplaces</h3>
                                <div class="footer-info-list">
                                    <ul>
                                        <li><a href="https://afriquelitecompetence.com//" target="_blank">AEC  </a></li>
                                        <li><a href="https://www.ia-funding.com/" target="_blank">IA-FUNDING</a></li>
                                        <li><a href="https://kesinonu.com//" target="_blank">KESINONU  </a></li>
                                        <li><a href="http://www.africaprofarmer.com/" target="_blank">PROFARMER  </a></li>
                                        <li><a href="http://www.yesokaz.com/" target="_blank">YESOKAZ </a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="footer-widget mb-40 ">
                                <h3 class="footer-title">Contact Us</h3>
                                <div class="contact-info-2">
                                    <div class="single-contact-info-2">
                                        <div class="contact-info-2-icon">
                                            <i class="icon-call-end"></i>
                                        </div>
                                        <div class="contact-info-2-content">
                                            <p>Appelez nous</p>
                                            <h3 class="blue" style="color: #0d47a1 !important">(228) 93 05 53 53</h3>
                                            <h3 class="blue" style="color: #0d47a1 !important">(228) 96 05 53 53</h3>
                                        </div>
                                    </div>
                                    <div class="single-contact-info-2">
                                        <div class="contact-info-2-icon">
                                            <i class="icon-cursor icons"></i>
                                        </div>
                                        <div class="contact-info-2-content">
                                            <p>262 BKK, Bè Klikamé Lomé-Togo, 05 BP 757</p>
                                        </div>
                                    </div>
                                    <div class="single-contact-info-2">
                                        <div class="contact-info-2-icon">
                                            <i class="icon-envelope-open "></i>
                                        </div>
                                        <div class="contact-info-2-content">
                                            <p>infos@logexit.com</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="social-style-1 social-style-1-font-inc social-style-1-mrg-2">
                                    <a href="{{asset('template/')}}#"><i class="icon-social-twitter"></i></a>
                                    <a href="{{asset('template/')}}#"><i class="icon-social-facebook"></i></a>
                                    <a href="{{asset('template/')}}#"><i class="icon-social-instagram"></i></a>
                                    <a href="{{asset('template/')}}#"><i class="icon-social-youtube"></i></a>
                                    <a href="{{asset('template/')}}#"><i class="icon-social-pinterest"></i></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom pt-30 pb-30 ">
                <div class="container">
                    <div class="row flex-row-reverse">
                        <!-- <div class="col-lg-6 col-md-6">
                            <div class="payment-img payment-img-right">
                                <a href="{{asset('template/')}}#"><img src="{{asset('template/assets/images/icon-img/payment.png')}}" alt=""></a>
                            </div>
                        </div> -->
                        <div class="col-lg-6 col-md-6">
                            <div class="copyright copyright-center">
                                <p>&copy; Copyright 2008-2021 - Tous drois réservés | Conçu par <a href="http://logexit.com/">LOGEX</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Modal -->
        
       
        <!-- Modal end -->
      
    </div>


    <!-- All JS is here
============================================ -->

    <script src="{{asset('template/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('template/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('template/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('template/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/slick.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/jquery.instagramfeed.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/jquery-ui-touch-punch.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/sticky-sidebar.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/easyzoom.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/ajax-mail.js')}}"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above  
<script src="{{asset('template/assets/')}}js/vendor/vendor.min.js"></script>
<script src="{{asset('template/assets/')}}js/plugins/plugins.min.js"></script>  -->
    <!-- Main JS -->
    <script src="{{asset('template/assets/js/main.js')}}"></script>

</body>

</html>