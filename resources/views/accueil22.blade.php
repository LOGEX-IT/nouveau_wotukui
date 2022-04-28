@extends('layouts.master')

@section('title', 'accueil')
@section('accueilactive', 'active')

@section('content')

        <!-- Start Main Banner Area -->
        <div class="main-banner">
            <div class="main-banner-item">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="main-banner-content">
                               <!--  rgba(0, 0, 255, 0.5) -->
                                
                                <h1 style="text-shadow: black 0.1em 0.1em 0.2em">Vendez ou achetez à crédit</h1>
                                <div style="background-color: rgba(238,230,238,0.5)" class="col-lg-8 col-md-8">
                                    <p style="color: #0d47a1">Oui! C'est possible. WOTUKUI est la plate forme togolaise qui vous permet d'acheter des articles à crédit ou d' en mettre en vente</p>
                                </div>
                                
                                <div class="banner-btn">
                                    <a href="#" class="default-btn">Notre Boutique</a>
                                    <a href="#" class="optional-btn">Ajouter ses produits </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Banner Area -->
        <!-- Start Detox Water Area -->
        <section class="detox-water-area ptb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Achetez à tarif exceptionnel et en plus à crédit</h2>
                    <p>Vous avez bésoin d'acquerir un bien, mais vous êtes à court d'argent? WOTUKUI est la plate forme qui vous propose un payement par tranche </p>
                </div>

                <div class="detox-water-image">
                    <img src="assets/img/detox-water/online-shopping.png" alt="image">
                </div>
            </div>

            <div class="detox-water-shape">
                <div class="shape1">
                    <img src="assets/img/detox-water/detox-water-1.png" alt="image">
                </div>

                <div class="shape2">
                    <img src="assets/img/detox-water/detox-water-2.png" alt="image">
                </div>

                <div class="shape3">
                    <img src="assets/img/detox-water/detox-water-3.png" alt="image">
                </div>

                <div class="shape4">
                    <img src="assets/img/detox-water/detox-water-4.png" alt="image">
                </div>
            </div>
        </section>

        <!-- Start Top Products Area -->
        <section class="top-products-area pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <h2>Les articles de notre Boutique</h2>
                    <p>N' hésitez plus ! Faites votre choix parmis nos articles. </p>
                </div>

               

                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-3 col-md-6">
                        <span id="status{{$product->id}}"></span>

                        <div class="top-products-item">
                            <div class="products-image">
                                <a href="{{asset('/details') }}"><img src="assets/img/top-products/{{$product->photo}}" alt="image"></a>


                                <form action="{{ url('/add-to-cart') }}" method="POST">
                                                {{ csrf_field() }}
                                <ul class="products-action">
                                    
                                    <li>
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="produit_id" value="{{ $product->id }}"/>
                                        <button type="submit" id="submitBtn{{ $product->id }}" style="display:none;" data-validate="contact-form">Hidden Button</button>
                                        <a href="javascript:;" role="button" class="btn btn-warning btn-block text-center" onclick="$('#submitBtn{{ $product->id }}').click();" data-tooltip="tooltip" data-placement="top" title="Ajouter au panier" ><i class="flaticon-shopping-cart"></i></a>

                                       {{--  <a href="" type="submit" class="btn btn-warning btn-block text-center" role="button" data-tooltip="tooltip" data-placement="top" title="Ajouter au panier"><i class="flaticon-shopping-cart"></i></a> --}}
                                        
                                        
                                    </li>
                                    
                                   {{--  <li>
                                        <a href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="flaticon-heart"></i></a>
                                    </li> --}}
                                    <li>
                                        <a href="#" data-tooltip="tooltip" data-placement="top" title="aperçu" data-toggle="modal" data-target="#productsQuickView{{$product->id}}">
                                            <i class="flaticon-search"></i>
                                        </a>
                                    </li>

                                </ul>
                                </form>

                                <div class="sale">
                                    <span>{{$product->price}} FCFA</span>
                                </div>
                            </div>

                            <div class="products-content">
                                <h3>
                                    <a href="#">{{ $product->nameP }}</a>
                                </h3>
                                
                                <div class="price">
                                    <span class="new-price">{{ $product->price / $product->echeance }} FCFA / Mois</span>
                                    {{-- <span class="old-price">$125.00</span> --}}
                                </div>
                                {{-- <div class="input-counter">
                                        <span class="minus-btn">
                                            <i class='bx bx-minus'></i>
                                        </span>
                                        <input type="text" id="quantity_value" value="1">
                                        <span class="plus-btn">
                                            <i class='bx bx-plus'></i>
                                        </span>
                                    </div> --}}
                                <ul class="rating">
                                    <li>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bx-star'></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    

    <!-- Start QuickView Modal Area -->
        <div class="modal fade productsQuickView" id="productsQuickView{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="flaticon-cancel"></i></span>
                    </button>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="products-image"><img src="assets/img/top-products/{{$product->photo}}" alt="image"></div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="product-content">
                                <h3>{{ $product->nameP }}</h3>
                                <div class="price">
                                    <span class="new-price">{{ $product->price / $product->echeance }} FCFA / Mois</span>
                                    {{-- <span class="old-price">$652.00</span> --}}
                                </div>
                                <div class="product-review">
                                    <div class="rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                    <a href="#" class="rating-count">5 commentaires</a>
                                </div>
                                <p>{{ $product->description }}</p>
                                <i id="anim{{ $product->id }}" class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; "></i>

                                <form action="{{ url('/add-to-cart') }}" method="POST">
                                                {{ csrf_field() }}
                                <div class="product-add-to-cart">
                                    <div class="input-counter">
                                        <span class="minus-btn">
                                            <i class='bx bx-minus'></i>
                                        </span>
                                        <input type="text" name="quantity" id="quantity_value{{ $product->id }}" value="1">
                                        <span class="plus-btn">
                                            <i class='bx bx-plus'></i>
                                        </span>
                                    </div>

                                    <input type="hidden" name="produit_id" value="{{ $product->id }}"/>
                                                <p>
                                                    <button type="submit" class="btn btn-warning btn-block text-center"> <i class="icon-shopping-cart"> Ajouter au panier</i> </button> 
                                                </p>
                                
                                    
                                 {{-- <a href="javascript:void(0);" data-id="{{ $product->id }}" class="btn btn-warning btn-block text-center add-to-cart{{$product->id}}" role="button" data-tooltip="tooltip" data-placement="top" title="Ajouter au panier">Ajouter au panier</i></a> --}}

                                 <span id="statu{{$product->id}}"></span>

                                </div>
                                </form>
    
                                <div class="buy-checkbox-btn">
                                    <div class="item">
                                        <input class="inp-cbx" id="cbx" type="checkbox">
                                        <label class="cbx" for="cbx">
                                            <span>
                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                             <span style="color: red">Prix Total: {{$product->price}} FCFA</span>
                                        </label>
                                    </div>
                                    {{-- <div class="item">
                                        <a href="#" class="btn btn-light">Acheter mauntenant!</a>
                                    </div>
 --}}                                </div>
    
                                <div class="products-share">
                                    <ul class="social">
                                        <li><span>partager:</span></li>
                                        <li>
                                            <a href="#" class="facebook" target="_blank"><i class='bx bxl-facebook'></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter" target="_blank"><i class='bx bxl-twitter'></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="linkedin" target="_blank"><i class='bx bxl-linkedin'></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="instagram" target="_blank"><i class='bx bxl-instagram'></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                    $('#anim{{$product->id}}').hide(); 
                    
        $(".add-to-cart{{ $product->id }}").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading{{ $product->id }}').show();
                var quantity = document.getElementById("quantity_value{{ $product->id }}").value;
             // let quantite = parseInt($('#quantity_value').text());
              // let quantity = parseInt($('#quantity_value{{ $product->id }}').text());



            $.ajax({ 
                url: '{{ url('add-to-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
                dataType: "json",
                success: function (response) {
                    setTimeout($('#anim{{$product->id}}').show(), 1000);

                    ele.siblings('.btn-loading{{ $product->id }}').hide();

                    $("span#statu{{$product->id}}").html('<div id="alert" class="alert alert-success">'+response.msg+'</div>');
                    $("#header-ba").html(response.data);

                     

                    setInterval(function(){ 
                    $('#alert').hide(); 
                    }, 3000);
                    setInterval(function(){ 
                    $('#anim{{$product->id}}').hide(); 
                    }, 2000);
                }
            });
        });
    </script>
                </div>
                
            </div>



        </div>
        <!-- End QuickView Modal Area -->




                    @endforeach

                    

                    

                    
                </div>
            </div>
        </section>
        <!-- End Top Products Area -->

        
        
        
        
        

        <!-- Start Why Choose Area -->
       
        

       


        <!-- Start Overview Area -->
        <section class="overview-area ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6">
                        <div class="overview-content">
                            <h3 style="color: #ffffff">Vous pouvez également vendre</h3>
                            <p style="color: #ffffff">Vous êtes artisans, commerçant ou Homme d'affaire et vous avez envie de vite ecouler vos articles?</p>
        
                            <div class="overview-btn">
                                <a href="#" class="default-btn">Rejoignez nous Maintenant</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6">
                        <div class="overview-video">
                            <a href="https://www.youtube.com/watch?v=ALpCJELhDRA" class="video-btn popup-youtube">
                                <i class='bx bxl-youtube'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Overview Area -->

     

   

        <!-- Start Newsletter Area -->
        <div class="newsletter-area ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="newsletter-content">
                            <h2>Souscrire à notre Newsletter</h2>
                            <p>Soyez informé à temps réel sur nos nouveaux produits</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form class="newsletter-form">
                            <input type="email" class="input-newsletter" placeholder="Entrer votre Email" name="EMAIL" required autocomplete="off">

                            <button type="submit">Souscrire</button>
                            
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Newsletter Area -->

        @stop

        
