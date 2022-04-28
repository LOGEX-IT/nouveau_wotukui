<!doctype html>
<html class="no-js" lang="en">

<head> 
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>WOTUKUI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta name="description" content="WOTUKUI, la plateforme de vente et d'achat à crédit qui vous facilite la vie.">
    <meta name="keywords" content="Vente à crédit, Achat à crédit, wotukui, togo, Meubles de bureau, Meubles de maison, Electromenager, Auto-Moto,Materiels Informatiques, IT">

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
        <header class="header-area">
            <div class="container">
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
                            <div class="col-xl-9 col-lg-8">
                                <div class="main-menu main-menu-padding-1 main-menu-lh-1">
                                    <nav>
                                        <ul>
                                            <li><a href="{{url('/categorie/1')}}">Meubles de maison </a></li>
                                            <li><a href="{{url('/categorie/2')}}">{{ __('Meubles de bureau') }}</a></li>
                                            <li><a href="{{url('/categorie/3')}}">Electroménager</a></li>
                                            <li><a href="{{url('/categorie/4')}}">Auto-Moto</a></li>
                                            <li><a href="{{url('/categorie/5')}}">TIC</a></li>
                                            <li><a href="{{url('/categorie/6')}}">Made In Africa</a></li>                                             
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
                            <div class="col-xl-1 col-lg-2">
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
                        <li class="active">Panier </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="cart-main-area pt-115 pb-120">
            <div class="container">
                    @if (@$success != Null)
                    <br>
                <div class="alert alert-success">Commande bien enrégistrée. Vous serrez contacté très bientôt</div> 
                @endif
                <h3 class="cart-page-title">Votre Panier</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Libelle</th>
                                            <th>Prix</th>
                                            <th>Quantité</th>
                                            <th>Subtotal</th>
                                            <th>Modifier</th>
                                            <th>Suppression</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( Cart::content() as $article)
                                        {{ csrf_field() }}
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="{{asset($article->options->photo)}}" alt="" width="100" height="100" class="img-responsive"></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{ $article->name }}</a></td>
                                            <td class="product-price-cart"><span class="amount">{{ $article->price}}</span></td>
                                            <form method="POST" action="{{ url('/update') }}">
                                                {{ csrf_field() }}
                                            <td class="product-quantity pro-details-quality">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="{{$article->qty }}">
                                                </div>
                                            </td>
                                            <td class="product-subtotal">{{ $article->price * $article->qty }} FCFA</td>
                                            <td>
                                            
                                            
                                            <input type="hidden" name="rowId" value="{{ $article->rowId }}"/>
                                            <button type="submit" class="btn btn-info btn-sm" title="Modifier"><i class="icon_refresh"></i></button>
                                              
                                            </td>
                                            </form>
                                            <td>
                                                
                                                <form method="POST" action="{{ url('/remove') }}">
                                                    {{ csrf_field() }}
                                                
                                                <input type="hidden" name="rowId" value="{{ $article->rowId }}"/>
                                                <button type="submit" class="btn btn-info btn-sm" title="Supprimer"><i class="icon_close"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="{{url('/')}}">Continuer le shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                            <!-- <button>Update Cart</button> -->
                                            <form method="POST" action="{{ url('/removeAll') }}">
                                                {{ csrf_field() }}
                                            
                                            <button type="submit" class="btn btn-primary" title="Supprimer tout">Clear Cart</button>
                                            </form>
                                            <!-- <a href="{{url('/removeAll')}}"></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <div class="cart-tax">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gray">Validation commande</h4>
                                    </div>
                                    <div class="tax-wrapper">
                                        <form action="{{ route('commande.store') }}" method="POST">
                                                                    {{ csrf_field() }}

                                                                    <div class="row col-md-12">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="nom"><span>Nom</span></label>
                                                                            <input type="text" name="nom" placeholder="Votre nom "class="form-control" required/>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="prenom"><span>Prénoms</span></label>
                                                                            <input type="text" name="prenom" placeholder="Votre prénom" class="form-control" required/> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="row col-md-12">
                                                                    
                            <div class="form-group col-md-6">
                                <label for="numero"><span>Numero</span></label>
                                                                            <input type="text" name="numero" placeholder="Votre numero" class="form-control" required/>
                                                                        </div>     
                                                                        <div class="form-group col-md-6">
                                                                            <label for="adresse"><span>Adresse</span></label>
                                                                            <input type="text" name="adresse" placeholder="Votre adresse" class="form-control" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12" align="center">
                                                                        <button type="{{ Cart::count() > 0 ? 'submit' : 'button' }}" class="btn btn-primary">Valider la commande</button>
                                                                    </div>
                                                            </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                    </div>
                                    <!-- <h5>Total <span>{{ Cart::subtotal() }} FCFA</span></h5> -->
                                    <h4 class="grand-totall-title">Grand Total <span>{{ Cart::subtotal() }} FCFA</span></h4>
                                    <!-- <a href="#">Proceed to Checkout</a> -->
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
                     <div class="row">
                         <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                             <div class="footer-widget mb-40">
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
                                         {{-- Technologies de l'information et de la communication --}}
                                         
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
                             <div class="footer-widget ml-70 mb-40" style="padding-top: 30px">
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
                             <div class="footer-widget mb-40 " style="padding-top: 30px">
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
                         <div class="col-lg-12 col-md-12" style="text-align: center !important">
                             <div class="copyright copyright-center" style="text-align: center !important;">
                                 <p>&copy; Copyright 2008 - 2022 - Tous drois réservés | Conçu par <a href="http://logexit.com/">LOGEX</a>.</p>
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