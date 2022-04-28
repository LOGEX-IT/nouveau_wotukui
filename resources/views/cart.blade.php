@extends('layouts.master')

@section('title', 'Panier')

@section('content')

<div class="page-banner-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-banner-content">
                            <h2>@yield('title')</h2>
                            <ul>
                                <li>
                                    <a href="{{ url('/') }}">Accueil</a>
                                </li>
                                <li>@yield('title')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br/>
        <br/>

    <span id="status"></span>

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Produits</th>
            <th style="width:10%">Prix</th>
            <th style="width:8%">Quantité</th>
            <th style="width:22%" class="text-center">total</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        
    @foreach( Cart::content() as $article)

       

        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="assets/img/top-products/{{$article->options->photo}}" width="100" height="100" class="img-responsive"/></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $article->name }}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">${{ $article->price}}</td>
            
            <td data-th="Quantity">
                <input type="number" id="quantity-{{$article->id }}" value="{{$article->qty }}" class="form-control quantity" />
            </td>
            <td data-th="Subtotal" class="text-center"><span class="product-subtotal">{{ $article->price * $article->qty }} FCFA</span></td>
            <td class="actions" data-th="">
                <form action="{{ url('/remove') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="rowId" value="{{ $article->rowId }}"/>   
                
                
                <button type="submit" class="btn btn-info btn-sm" title="Supprimer"><i class="fa fa-trash" style="font-size: 2em; color: red"></i></button>
                </form>

                <form action="{{ url('/update') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="rowId" value="{{ $article->rowId }}"/>

                <input type="hidden" name="qty" id="qty-{{$article->id }}" value=""/>
                <script type="text/javascript">
                    setInterval(function(){ 
                       
                     document.getElementById('qty-{{$article->id }}').value = document.getElementById('quantity-{{$article->id }}').value;
                    }, 500);

                </script>

                <button type="submit" o class="btn btn-info btn-sm" title="modifier" ><i class="fa fa-refresh"></i></button>
                
                </form>
                {{-- <a href="javascript:void(0);"  title="Supprimer ce produit">
                            <i class="fa fa-trash" style="font-size: 2em; color: red"></i>
                        </a> --}}
             
                <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
            </td>
        </tr>
   


    @endforeach

        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total <span class="cart-total" id="trueGeneralPrice">{{ Cart::subtotal() }} FCFA</span></strong></td>
        </tr>
        <br>
        
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Poursuivre le Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total <span class="cart-total"> {{ Cart::subtotal() }} FCFA</span></strong></td>
        </tr>
        {{-- <tr style="align-items: center;">
            
            <td colspan="2" class="hidden-xs"></td>
            <td><a href="{{ url('/') }}" class="btn btn-success"> Valider ma commande<i class="fa fa-angle-right"></i></a></td>
            
        </tr> --}}

        </tfoot>
    </table>
    <h3 style="text-align: center;">Validation commande</h3>
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

@endsection


@section('scripts')




@endsection