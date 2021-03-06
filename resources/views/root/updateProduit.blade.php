@extends('root.template')
@section('title', 'DASHBOARD | Wotukui ADMIN')
@section('sectionTitle', 'Modification Commande')
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
                    <h5 class="card-title">Modification de Commande</h5>
                        
  
                        <form enctype="multipart/form-data" action="{{asset('/produit_'.$idLigne)}}" method="POST" >
                                {{ csrf_field() }}
                              
                            <input type="hidden" name="idproduit" id="idproduit" value="{{$commande2->idLigne}}">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="libelle" style="text-transform: uppercase; font-size: 0.7em;">
                                        Nom Produit
                                    </label><textarea name="lunes" id="" cols="10" rows="6">{{$commande2->nameP}}"> --}}</textarea>
                                    {{-- <input type="text" class="form-control" name="libelle" id="libelle" value="" placeholder="{{$take->nameP}}" > --}}
                                </div>
                                <div class="col-md-4">
                                    <label for="description" style="text-transform: uppercase; font-size: 0.7em;">
                                        Description Produit
                                    </label>
                                    {{-- <input type="" class="form-control" name="description" id="description" value="" placeholder="{{$take->description}}" > --}}
                                </div>
                                <div class="col-md-4">
                                    <label for="prix" style="text-transform: uppercase; font-size: 0.7em;">
                                        Prix Produit ( CFA )
                                    </label>
                                    {{-- <input type="number" class="form-control" name="prix" id="prix" value="" placeholder="{{$take->price}}" > --}}
                                </div>
                            </div><br>
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="echeance" style="text-transform: uppercase; font-size: 0.7em; margin-top: 20px">
                                        Ech??ance (D??lai de payement en mois)
                                    </label>
                                    <input type="number" class="form-control" name="echeance" value="" id="echeance" placeholder="{{$take->echeance}}" >
                                </div>
                                <div class="col-md-3 align-items-center text-center">
                                    <label for="trainerAvatar" style="cursor: pointer; margin-top: 20px">
                                        <img class="" src="{{URL::to($take->photo) }}" id="coverPreview" style="display: block; width: 150px; height: 150px;">
                                        <input type="file"  name="trainerAvatar" id="trainerAvatar" style="z-index: -9999; position: absolute; display: none;visibility: hidden; opacity: 0; ">
                                        <p class="center-align" style="display: block; text-transform: uppercase; font-size: 0.6em; margin-top: 5px; margin-left: 15px">Cliquez ici</p>
                                    </label>
                                </div>                  
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-md-3">
                                    <div style="margin: 0px 0 0 30px;">                                    
                                        <input type="hidden" name="id" value="{{$take->id}} "/>
                                        <button type="submit" class="btn btn-outline-success">Modifier</button>
                                    </div>
                                </div>                       
                            </div> <br><br>
                               
                        </form>              
                                
                </div>
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
                        $('#coverPreview').attr('src', '{{ URL::to('assets/img/top-products/'.$take->photo) }}').fadeIn('slow');
                    }
                }
                else{
                    $('#coverPreview').attr('src', '{{ URL::to('assets/img/top-products/'.$take->photo) }}').fadeIn('slow');
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
                                    if (trainerAvatar.length >= 50000) {

                                        swalWithBootstrapButtons.fire({
                                            title: 'Erreur',
                                            text: "Erreur image!",
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
                                            data:data,
                                            processData: false,  // Important!
                                            contentType: false,
                                            cache: false,
                                            timeout: 600000,

                                            success:function(result) {
                                                showWaitingMask(false);
                                                if(result == '1'){
                                                    swalWithBootstrapButtons.fire({
                                                        title: 'Succ??s',
                                                        text: 'Produit ajout?? avec succ??s !',
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
                                                        text: 'Echec de l\'op??ration',
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
                                                    text: 'Echec de l\'op??ration',
                                                    type: 'error',
                                                    showCancelButton: true,
                                                    showConfirmButton: false,
                                                    cancelButtonText: 'R??essayez'
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
                                        cancelButtonText: 'R??essayez'
                                    })
                                }
                           
                        } else{
                            swalWithBootstrapButtons.fire({
                                title: 'Erreur',
                                text: 'Prix invalide !',
                                type: 'error',
                                showCancelButton: true,
                                showConfirmButton: false,
                                cancelButtonText: 'R??essayez'
                            })
                        }
                   
                } else{
                    swalWithBootstrapButtons.fire({
                        title: 'Erreur',
                        text: 'Libell?? trop court !',
                        type: 'error',
                        showCancelButton: true,
                        showConfirmButton: false,
                        cancelButtonText: 'R??essayez'
                    })
                }
            });
        
    </script>

@endsection