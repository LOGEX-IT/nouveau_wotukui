@extends('root.template')
@section('title', 'DASHBOARD | Agbana ADMIN')
@section('sectionTitle', 'Ajout Produit')
@section('sectionDescription')
	
@endsection
 
@section('mainContent')
    <style type="text/css">
    ::placeholder{
        text-transform: uppercase !important;
        font-size: 0.8em;
    }
    </style>
    <div class="row align-items-center justifiy-content-center">
        <div class="col-md">
            <div class="main-card mb-3 card" style="padding:  0 20px 50px 20px">
                <div class="card-body">
                    <h5 class="card-title">Ajouter un produit</h5>
                    {{-- enctype="multipart/form-data" id="productForm" autocomplete="off" --}}
                    <form enctype="multipart/form-data" action="{{asset('/ajoute')}}" method="POST" >
                        @if (@$success != Null)<br>
                            <div class="alert alert-success">Produit ajouté avec succès</div> 
                        @endif     
                        {{-- <input type="hidden" name="idclient" id="idclient" value="{{$client->IdClient}}"> --}}
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="libelle" style="text-transform: uppercase; font-size: 0.7em;">
                                    Libellé Produit
                                </label>
                                <input required type="text" class="form-control" name="libelle" id="libelle" placeholder="Libellé Produit" >
                            </div>
                            <div class="col-md-4">
                                <label for="description" style="text-transform: uppercase; font-size: 0.7em;">
                                    description Produit
                                </label>
                                <input required type="text" class="form-control" name="description" id="description" placeholder="description Produit" >
                            </div>
                            <div class="col-md-4">
                                <label for="prix" style="text-transform: uppercase; font-size: 0.7em;">
                                    Prix Produit
                                </label>
                                <input requiredtype="number" class="form-control" name="prix" id="prix" placeholder="Prix du Produit" >
                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categorie"> Catégorie du Produit</label>
                                    <select class="form-control" name="categorie" id="categorie">
                                        @foreach ($categorie as $cat)
                                        <option>{{$cat->LibelleCategorie}}</option>                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <label for="infosvendeur" style="text-transform: uppercase; font-size: 0.7em;"> 
                                    Infos Vendeur
                                </label>
                                <input type="" class="form-control" name="infosvendeur" id="infosvendeur" value="" placeholder="" >
                            </div>
                        </div>  
                        <br>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="echeance" style="text-transform: uppercase; font-size: 0.7em; margin-top: 20px">
                                    Echéance (Délai de payement en mois)
                                </label>
                                <input required type="number" class="form-control" name="echeance" id="echeance" placeholder="echeance" >
                            </div>
                            <div class="col-md-6 align-items-center text-center">
                                 <label for="trainerAvatar" style="cursor: pointer; margin-top: 20px">
                                    <img class="" src="{{ URL::to('root/assets/images/standard.png') }}" id="coverPreview" style="display: block; width: 150px; height: 150px;">
                                    <p class="center-align" style="display: block; text-transform: uppercase; font-size: 0.6em; margin-top: 5px; margin-left: 15px">Cliquez ici</p>
                                </label>
                                <input required type="file"  name="trainerAvatar" id="trainerAvatar" style="z-index: -9999; position: absolute; display: none;visibility: hidden; opacity: 0; ">
                            </div> 
                                 
                        </div><br>
                        <div class="form-row justify-content-center">
                            <div class="col-md-1">
                                <div style="margin: 0px 0 0 30px;">
                                    <input type="submit" id="submitFor" class="btn btn-primary" value="VALIDER">
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </div>
                    </form>
            </div>

        </div>
    </div>
@endsection

@section('jsSheets')

    <script type="text/javascript">

            $("#trainerAvatar").on('change', function(){
                readPictureURL(this);
            });

            function readPictureURL(input) {
                if (input.files && input.files[0]) {
                    if(input.files.length==1){
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#coverPreview').attr('src', e.target.result).fadeIn('slow');
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                    else{
                        $('#coverPreview').attr('src', '{{ URL::to("root/assets/images/standard.png") }}').fadeIn('slow');
                    }
                }
                else{
                    $('#coverPreview').attr('src', '{{ URL::to("root/assets/images/standard.png") }}').fadeIn('slow');
                }
            }

            $('#productForm').on('submit', function(e){
                e.preventDefault();
            })

            $('#submitForm').on('click', function(){
                
                var libelle = $('#libelle');
                var description = $('#description');
                var prix = $('#prix');
                var echeance = $('#echeance');
                var trainerAvatar = $("#trainerAvatar").get(0).files;
                var _token = $('input[name="_token"]').val();

                // var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                if(libelle.val().length >3){
                        if ($.isNumeric(prix.val())) {
                                if (description.val().length>4) {
                                    if (trainerAvatar.length == 0) {

                                        swalWithBootstrapButtons.fire({
                                            title: 'Erreur',
                                            text: "Veuillez choisir une photo!",
                                            type: 'error',
                                            showCancelButton: true,
                                            showConfirmButton: false,
                                            cancelButtonText: 'D\'accord'
                                        })

                                    } else{
                                        showWaitingMask(true);

                                        var form = $('#productForm')[0];
                                        var data = new FormData(form);
                                        //AJAX REQUEST
                                        $.ajax({
                                            type: 'POST',
                                            enctype: 'multipart/form-data',
                                            url: '',
                                            // {{ route('ajout_produit') }}
                                            data:data,
                                            processData: false,  // Important!
                                            contentType: false,
                                            cache: false,
                                            timeout: 600000,

                                            success:function(result) {
                                                showWaitingMask(false);
                                                if(result == '1'){
                                                    swalWithBootstrapButtons.fire({
                                                        title: 'Succès',
                                                        text: 'Produit ajouté avec succès !',
                                                        type: 'success',
                                                        showConfirmButton: true,
                                                        confirmButtonText: 'Super'
                                                    })
                                        
                                                    libelle.val('');
                                                    description.val('');
                                                    prix.val('');
                                                    echeance.val('');
                                                    readPictureURL($('#trainerAvatar'));
                                                }
                                                else if (result == '-1') {
                                                    swalWithBootstrapButtons.fire({
                                                        title: 'Erreur',
                                                        text: ' existant',
                                                        type: 'warning',
                                                        showCancelButton: true,
                                                        showConfirmButton: false,
                                                        cancelButtonText: 'D\'accord'
                                                    })
                                                }
                                                else{
                                                    console.log(result)
                                                    swalWithBootstrapButtons.fire({
                                                        title: 'Erreur',
                                                        text: 'Echec de l\'opération',
                                                        type: 'error',
                                                        showCancelButton: true,
                                                        showConfirmButton: false,
                                                        cancelButtonText: 'Hummmm'
                                                    })
                                                }
                                            },

                                            error:function(result){
                                                showWaitingMask(false);
                                                console.log(result)
                                                swalWithBootstrapButtons.fire({
                                                    title: 'Erreur',
                                                    text: 'Echec de l\'opération',
                                                    type: 'error',
                                                    showCancelButton: true,
                                                    showConfirmButton: false,
                                                    cancelButtonText: 'Réessayez'
                                                })
                                            }
                                        });
                                    }
                                } else{
                                    swalWithBootstrapButtons.fire({
                                        title: 'Erreur',
                                        text: 'Description invalide!',
                                        type: 'error',
                                        showCancelButton: true,
                                        showConfirmButton: false,
                                        cancelButtonText: 'Réessayez'
                                    })
                                }
                           
                        } else{
                            swalWithBootstrapButtons.fire({
                                title: 'Erreur',
                                text: 'Prix invalide !',
                                type: 'error',
                                showCancelButton: true,
                                showConfirmButton: false,
                                cancelButtonText: 'Réessayez'
                            })
                        }
                   
                } else{
                    swalWithBootstrapButtons.fire({
                        title: 'Erreur',
                        text: 'Libellé trop court !',
                        type: 'error',
                        showCancelButton: true,
                        showConfirmButton: false,
                        cancelButtonText: 'Réessayez'
                    })
                }
            });
        
    </script>

@endsection