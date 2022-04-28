@extends('root.template')
    @section('title', 'DASHBOARD | Sur_Mesure')
    @section('sectionTitle', 'Commande sur mesure')
    @section('sectionDescription')
@endsection

    @section('mainContent')
        <div class="row"></div>
        <div class="row"></div>
        <div class="row">
            <div class="col-md-12">

                {{-- @if($client->IdClient == $id) --}}
                <div class="main-card mb-3 card">
                    <div class="card-header">Liste des Commandes sur mesure</div>
                    <div class="table-responsive">
                        <table id='tableau' class='display'> 
                            <thead>                                         
                                <tr>
                                    <th>Libelle</th><th>Nom</th><th>Numéro</th>
                                    <th>Description</th><th>Photo</th>                                    
                                    <th>Etat</th>
                                </tr>     
                            </thead>
                            <tbody> 
                                @foreach($mesure as $products1)
                                <tr>
                                    <td>{{$products1->idMesure}}</td>
                                    <td>{{$products1->Nom}}</td>
                                    <td>{{$products1->Numéro}}</td>
                                    <td>{{$products1->Description}}</td>
                                    <td><img src="{{$products1->Photo}}" style="width: 100px">  </td>
                                    
                                        @if (($products1->etat_commande) == "En attente de traitement" )
                                        <td><span style="font-family: Verdana, 'Times New Roman', Times, serif; font-size: 12px; background-color: red; color: #ffffff; text-align: center;" class="badge badge-pill badge-warning">{{$products1->etat_commande}}</span></td>
                                        @else
                                        <td><span style="font-family: Verdana; font-size: 12px; background-color: green; color: #ffffff; text-align: center;" class="badge badge-pill badge-warning">{{$products1->etat_commande}}</span></td>
                                        @endif
                                  
                                </tr>
                                @endforeach
                                
                                <script type="text/javascript">
                                    
                                    $('#supprimer{{$products1->idMesure}}').on('click', function(){
                                        let idproduit = {{$products1->idMesure}};
                                        console.log(idproduit);

                                    swalWithBootstrapButtons.fire({
                                    title: 'Etes vous sûr ?',
                                    text: "Voulez vous vraiment supprimer ce produit ?",
                                    type: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Oui, supprimer',
                                    cancelButtonText: 'Non, abandonner',
                                    reverseButtons: true
                                    }).then((result) => {
                                        if (result.value) {
                                            showWaitingMask();
                                            $.ajax({
                                                type: 'POST',
                                                url: '',
                                                data: {
                                                    idproduit:idproduit,
                                                    "_token":"{{ csrf_token() }}"
                                                },

                                                success:function(result) {
                                                    showWaitingMask(false);
                                                    if(result === '1'){
                                                        swalWithBootstrapButtons.fire({
                                                            title: 'Good Job',
                                                            text: 'Produit supprimé avec succès',
                                                            type: 'success',
                                                            showConfirmButton: true,
                                                            confirmButtonText: 'D\'accord'
                                                        });
                                                        window.location = 'liste_produit';
                                                    }
                                                    else{
                                                        swalWithBootstrapButtons.fire({
                                                            title: 'Ooops',
                                                            text: 'Echec de l\'opération',
                                                            type: 'error',
                                                            showCancelButton: true,
                                                            showConfirmButton:false,
                                                            cancelButtonText: 'Hummmm'
                                                        });
                                                    }
                                                },

                                                error:function(result){
                                                    showWaitingMask(false);
                                                    console.log(result);
                                                    swalWithBootstrapButtons.fire({
                                                        title: 'Ooops',
                                                        text: 'Echec de l\'opération',
                                                        type: 'error',
                                                        showCancelButton: true,
                                                        showConfirmButton:false,
                                                        cancelButtonText: 'Hummmm'
                                                    });

                                                }
                                            })    }

                                        })

                                    })
                                </script>
                            </tbody> 
                        </table>
                    </div>
                </div>
                {{-- @endif          --}}
            </div>
        </div>
    @endsection

    @section('jsSheets')

    <script type="text/javascript">
                            
                            $('#supprimer').on('click', function(){

                                swalWithBootstrapButtons.fire({
                                                        title: 'Succès',
                                                        text: 'Voulez vous vraiment supprimer ce produit? !',
                                                        type: 'warning',
                                                        showConfirmButton: true,
                                                        confirmButtonText: 'Oui'
                                                    })


                                  


                                                })
    </script>
    @endsection