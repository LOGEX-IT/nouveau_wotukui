@extends('root.template')
@section('title', 'DASHBOARD | Agbana ADMIN')
@section('sectionTitle', 'Tableau de bord')
@section('sectionDescription')
	
@endsection
 
@section('mainContent')


	<!-- <div class="row"></div>
    <div class="row"></div> -->


    <div >
           @if($client->IdClient != $id)
           <div class="" style="margin-left: 40px; margin-right: 40px;">
               <div class="card-header">Liste des Produits</div>
               <div class="table-responsive">

                    <table id='tableau' class='display' style="margin-left: 40px; margin-right: 40px;"> 
                   <thead> 
                       <tr><th>Libellé</th><th>Description</th><th>Prix</th><th>Echéance</th><th>Vendeur</th><th>Aperçu</th><th>Modifier</th><th>Supprimer</th></tr> 
                   </thead>
                   <tbody> 
                       @foreach($products as $products1)
                       <tr>
                           <td>{{$products1->nameP}}</td>
                           <td>{{$products1->description}}</td>
                           <td>{{$products1->price}}</td>
                           <td>{{$products1->echeance}}</td>
                           <td>{{$products1->name}}</td>
                           <td><img src="assets/img/top-products/{{$products1->photo}}" style="width: 100px">  </td>
                           <td onclick="window.location.href = '{{ url('/modificationP/'.($products1->idP))}}' "><button  o class="btn btn-info btn-sm" title="modifier" ><i class="fa fa-refresh"></i></button></td>
                           <td><button class="btn" title="Supprimer" id="supprimer{{$products1->idP}}"><i class="fa fa-trash" style="font-size: 2em; color: red"></i></button></td>

                            <!-- onclick="window.location.href = '{{ url('/suppressionP/'.($products1->idP))}}' " -->
                       </tr>

                       <script type="text/javascript">
                           
                           $('#supprimer{{$products1->idP}}').on('click', function(){


                               let idproduit = {{$products1->idP}};
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
                                       url: '{{ route("supprimer_produit") }}',
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

                       


                       @endforeach
                        
                   </tbody> 
           </table>
               </div>
           </div>
           @endif

           @if($client->IdClient == $id)
           <div class="">
               <div class="card-header">Liste des Produits</div>
               <div class="table-responsive">

                    <table id='tableau' class='display'> 
                   <thead> 
                       <tr><th>Libellé</th><th>Description</th><th>Prix</th><th>Echéance</th><th>Vendeur</th><th>Aperçu</th><th>Modifier</th><th>Supprimer</th></tr> 
                   </thead>
                   <tbody> 
                       @foreach($products2 as $products1)
                       <tr>
                           <td>{{$products1->nameP}}</td>
                           <td>{{$products1->description}}</td>
                           <td>{{$products1->price}}</td>
                           <td>{{$products1->echeance}}</td>
                           <td>{{$products1->name}}</td>
                           <td><img src="assets/img/top-products/{{$products1->photo}}" style="width: 100px">  </td>
                           <td onclick="window.location.href = '{{ url('/modificationP/'.($products1->idP))}}' "><button  o class="btn btn-info btn-sm" title="modifier" ><i class="fa fa-refresh"></i></button></td>
                           <td><button class="btn" title="Supprimer" id="supprimer{{$products1->idP}}"><i class="fa fa-trash" style="font-size: 2em; color: red"></i></button></td>

                            <!-- onclick="window.location.href = '{{ url('/suppressionP/'.($products1->idP))}}' " -->
                       </tr>

                       <script type="text/javascript">
                           
                           $('#supprimer{{$products1->idP}}').on('click', function(){


                               let idproduit = {{$products1->idP}};
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
                                       url: '{{ route("supprimer_produit") }}',
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

                       


                       @endforeach
                        
                   </tbody> 
           </table>
               </div>
           </div>
           @endif

    </div>
@endsection