@extends('root.template')
@section('title', 'DASHBOARD | WOTUKUI ADMIN')
@section('sectionTitle', 'Detail Commande')
@section('sectionDescription')
	
@endsection
 
@section('mainContent')
    <style type="text/css">
        ::placeholder{
            text-transform: uppercase !important;
            font-size: 0.8em;
            }
    </style> 

    <style type="text/css">
        @media print {
            .bg-body-light{
                display: none;
            }
            
           

        }
    </style>


        <!-- Hero -->

        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Info -->
            
            <!-- END Info -->

            <!-- Dynamic Table Full -->
            
            <!-- END Dynamic Table Full -->

            <!-- Dynamic Table with Export Buttons -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Détails <small>Commande</small></h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="content">
                        <!-- Quick Overview -->
                        {{ csrf_field() }}
                        <form action="{{ route('valid_commande') }}" method="POST" enctype="" id="commandeForm" autocomplete="off">
                            
                            <input type="hidden" name="idcommande" id="idcommande" value="{{$comm}}">
                            <input type="hidden" name="etat1" id="etat1" value="Validée">
                            <input type="hidden" name="etat2" id="etat2" value="Annulée">
                        <div class="row row-deck">
                            @if($commande2->EtatCommande == "Validée")
                            <div class="col-6 col-lg-3" id="Imprimer" onclick="imprimer()">
                                <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)" >
                                    <div class="block-content py-5">
                                        <div class="item rounded-lg bg-xeco-lighter mx-auto mb-3">
                                            <i class="fa fa-check text-xeco-dark"></i>
                                        </div>
                                        <p class="font-w600 font-size-sm text-muted text-uppercase mb-0">
                                            Imprimer
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @endif
                            
                            <div class="col-6 col-lg-3" id="annulerForm">
                                <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                                    <div class="block-content py-5"style="background-color: #f7b924 !important">
                                        <div class="item rounded-lg bg-body mx-auto mb-3" >
                                            <i class="fa fa-times text-muted"></i>
                                        </div>
                                        <p class="font-w600 font-size-sm text-muted text-uppercase mb-0" style="color: #fff !important">Annuler
                                        </p>
                                    </div>
                                </a>
                            </div>
                        {{ csrf_field() }}
                        </div>
                        <!-- END Quick Overview -->
                        </form>

                        <!-- Products -->
                        <div class="block block-rounded" id="facture">

                            <div class="block-header block-header-default">
                                <h3 class="block-title">Facture N° {{$comm}}</h3>
                                <img class="pull-right" src="{{ asset('root/assets/images/wotukui.png')}}" alt="logo">
                            </div>
                            <div class="block-content">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-striped table-vcenter font-size-sm">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 100px;">ID</th>
                                                <th>Libelle Produit</th>
                                                <th class="text-center">Photo</th>
                                                <th class="text-center">Quantité</th>
                                                <th class="text-right" style="width: 15%;">Prix Achat</th>
                                                <th class="text-right" style="width: 10%;">Prix total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @dd($commande) --}}
                                            @foreach($commande as $command)
                                            <tr>
                                                <td class="text-center"><strong>{{$command->idP}}</strong></td>
                                                <td><a href="javascript:void(0)"><strong>{{$command->nameP}}</strong></a></td>
                                                <td class="text-center"><img src="{{asset($command->photo)}}" width="50px"></td>
                                                <td class="text-center"><strong>{{$command->QteProd}}</strong></td>
                                                <td class="text-right">{{$command->price}} FCFA</td>
                                                <?php
                                                $cout=($command->QteProd)*($command->price);
                                                ?>
                                                <td class="text-right">{{$cout}} FCFA</td>
                                            </tr>
                                            @endforeach
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Total facture:</strong></td>
                                                <td class="text-right">{{$commande2->PrixTotal}} FCFA</td>
                                            </tr>
                                            @if ($commande2->EtatCommande == "En attente de validation")

                                                <tr>
                                                    <td colspan="5" class="text-right"><strong>Total Payé:</strong></td>
                                                    <td class="text-right">0 FCFA</td>
                                                </tr>
                                                <tr class="table-active">
                                                    <td colspan="5" class="text-right text-uppercase"><strong>Total restant:</strong></td>
                                                    <td class="text-right"><strong>{{$commande2->PrixTotal}} FCFA</strong></td>
                                                </tr>
                                                
                                            @endif

                                            @if ($commande2->EtatCommande == "Validée")

                                            <?php
                                                $paiement = DB::table('paiement')
                                                ->where('paiement.IdCommande','=', $command->IdCommande)
                                                ->get();
                                                $s=0;
                                             ?>
                                             @foreach($paiement as $somme)
                                             <?php 
                                             $s=$s+$somme->MontantPaiement; 
                                              ?>
                                             
                                             @endforeach


                                             
                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Total Payé:</strong></td>
                                                <td class="text-right"><strong>{{$s}} FCFA</strong></td>
                                            </tr>
                                            <tr class="table-active">
                                                <td colspan="5" class="text-right "><strong>Reliquat:</strong></td>
                                                <td class="text-right">{{$s-$commande2->PrixTotal}} FCFA</td>
                                            </tr>
                                                
                                            @endif

                                            @if ($commande2->EtatCommande == "Paiement en cours")

                                            <?php
                                                $paiement = DB::table('paiement')
                                                ->where('paiement.IdCommande','=', $command->IdCommande)
                                                ->get();
                                                $s=0;
                                             ?>
                                             @foreach($paiement as $somme)
                                             <?php 
                                             $s=$s+$somme->MontantPaiement; 
                                              ?>
                                             
                                             @endforeach


                                             
                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Total Payé:</strong></td>
                                                <td class="text-right"><strong>{{$s}} FCFA</strong></td>
                                            </tr>
                                            <tr class="table-active">
                                                <td colspan="5" class="text-right "><strong>Reste à payer:</strong></td>
                                                <td class="text-right">{{$commande2->PrixTotal-$s}} FCFA</td>
                                            </tr>
                                                
                                            @endif
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Products -->

                        <!-- Customer -->
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Billing Address -->
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Informations Client</h3>
                                    </div>
                                    <div class="block-content">
                                        <div class="font-size-h4 mb-1"><i class="fa fa-id"></i> <strong> Nom & Prenom :</strong>{{$commande2->Nom}} {{$commande2->Prenom}} <br>
                                            <strong> Téléphone :</strong> {{$commande2->Telephone}}  <br>
                                            <strong> Adresse :</strong> {{$commande2->Adresse}}
                                         </div>
                                        
                                    </div>
                                </div>
                                <!-- END Billing Address -->
                            </div>
                            <div class="col-sm-6">
                                <!-- Shipping Address -->
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default" align="center">
                                        <h3 class="block-title"> Paiement</h3>
                                    </div>
                                    <div class="block-content">
                                        {{ csrf_field() }}
                                        <form action="{{ route('valid_commande') }}" method="POST" enctype="" id="valideForm" autocomplete="off">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="etatt" id="etatt" value="Paiement en cours">
                                            
                                            <input type="hidden" name="idcmd" id="idcmd" value="{{$comm}}">
                                            <input type="hidden" name="ttcmd" id="ttcmd" value="{{$commande2->PrixTotal}}">

                                            <label>Montant remis</label>
                                            <input type="number" name="montantremis" id="montantremis">
                                            
                                             <div id="submitForm">
                                                 <input type="submit" class="btn btn-success" value="Payer">
                                             </div>
                                            

                                        </form>
                                        
                                                                      
                                    </div>
                                </div>
                                <!-- END Shipping Address -->
                            </div>
                        </div>
                        <!-- END Customer -->

                    </div>
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->
        </div>
        <!-- END Page Content -->


            <script type="text/javascript">

                 function imprimer(){

                    print();
                //   var partiImrimer = document.getElementById('facture');  
                // var newFenetre = window.open('','Print-Window');
                // newFenetre.document.open();

                // newFenetre.document.write('<html><head><link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}"> </head><body onload="print()">'+partiImrimer.innerHTML+'</body></html>');
                // newFenetre.document.close();
                 }

               

                // $('#commandeForm').on('submit', function(e){
                //     e.preventDefault();
                // })

                // $('#valideForm').on('submit', function(e){
                //     e.preventDefault();
                // })

                // $('#submitForm').on('click', function(){
                    
                //     var idcmd = $('#idcmd');
                //     var etatt = $('#etatt');
                //     var ttcmd = $('#ttcmd');
                //     var montantremis = $('#montantremis');
                //     var _token = $('input[name="_token"]').val();

                    
                //                             var form = $('#valideForm')[0];
                //                             var data = new FormData(form);
                                            
                //                             $.ajax({
                //                                 type: 'POST',
                //                                 url: '{{ route('valid_commande') }}',
                //                                 data:data,
                //                                 processData: false,
                //                                 contentType: false,
                //                                 cache: false,
                //                                 timeout: 600000,

                //                                 success:function(result) {
                                                    
                //                                     if(result == '1'){
                //                                         swalWithBootstrapButtons.fire({
                //                                             title: 'Succès',
                //                                             text: 'Commande validée avec succès !',
                //                                             type: 'success',
                //                                             showConfirmButton: true,
                //                                             confirmButtonText: 'Super'
                //                                         })

                //                                         window.location.replace('{{ url('detailC/'.$comm) }}');
                                            
                                                      
                //                                     }
                //                                     else if (result == '-1') {
                //                                         swalWithBootstrapButtons.fire({
                //                                             title: 'Erreur',
                //                                             text: 'Le montant entré est inférieur au montant de la commande',
                //                                             type: 'warning',
                //                                             showCancelButton: true,
                //                                             showConfirmButton: false,
                //                                             cancelButtonText: 'D\'accord'
                //                                         })
                //                                     }
                //                                     else{
                //                                         console.log(result)
                //                                         swalWithBootstrapButtons.fire({
                //                                             title: 'Erreur',
                //                                             text: 'Echec de l\'opération',
                //                                             type: 'error',
                //                                             showCancelButton: true,
                //                                             showConfirmButton: false,
                //                                             cancelButtonText: 'Hummmm'
                //                                         })
                //                                     }
                //                                 },

                                               
                //                             });
                //                         })






                //      $('#annulerForm').on('click', function(){
                    
                //     var idcommande = $('#idcommande');
                //     var etat2 = $('#etat2');
                //                             var form = $('#commandeForm')[0];
                //                             var data = new FormData(form);
                                            
                //                             $.ajax({
                //                                 type: 'POST',
                //                                 url: '{{ route('annuler_commande') }}',
                //                                 data:data,
                //                                 processData: false,  
                //                                 contentType: false,
                //                                 cache: false,
                //                                 timeout: 600000,

                //                                 success:function(result) {
                //                                     showWaitingMask(false);
                //                                     if(result == '1'){
                //                                         swalWithBootstrapButtons.fire({
                //                                             title: 'Succès',
                //                                             text: 'Commande annulée avec succès !',
                //                                             type: 'success',
                //                                             showConfirmButton: true,
                //                                             confirmButtonText: 'Super'
                //                                         })

                //                                         window.location.replace('{{ url('detailC/'.$comm) }}');
                                            
                                                      
                //                                     }
                //                                     else if (result == '-1') {
                //                                         swalWithBootstrapButtons.fire({
                //                                             title: 'Erreur',
                //                                             text: ' existant',
                //                                             type: 'warning',
                //                                             showCancelButton: true,
                //                                             showConfirmButton: false,
                //                                             cancelButtonText: 'D\'accord'
                //                                         })
                //                                     }
                //                                     else{
                //                                         console.log(result)
                //                                         swalWithBootstrapButtons.fire({
                //                                             title: 'Erreur',
                //                                             text: 'Echec de l\'opération',
                //                                             type: 'error',
                //                                             showCancelButton: true,
                //                                             showConfirmButton: false,
                //                                             cancelButtonText: 'Hummmm'
                //                                         })
                //                                     }
                //                                 },

                                               
                //                             });
                //                         })
                                    
                               
                            
                       
                   
                
            
        </script>
@endsection







@section('jsSheets')



@endsection