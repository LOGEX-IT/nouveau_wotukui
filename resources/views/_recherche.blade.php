<div class="shop-bottom-area" id="recherches">
    @if(isset($recherche))
    <div class="tab-content jump">
        <div id="shop-1" class="tab-pane active">
            <div class="row">
                
                @foreach($recherche as $article)
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
                                <span>{{ number_format($article->price / $article->echeance,0,",",".")  }} FCFA / Mois </span>
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
                                <span>{{ number_format($article->price,0,",",".")  }} FCFA  </span>
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
        {{ $recherche->links() }}
        <!-- <ul>
            <li><a class="prev" href="#"><i class="icon-arrow-left"></i></a></li>
            <li><a class="active" href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a class="next" href="#"><i class="icon-arrow-right"></i></a></li>
        </ul> -->
    </div>
    @endif
</div>