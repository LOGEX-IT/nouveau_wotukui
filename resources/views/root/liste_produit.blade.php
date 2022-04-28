@extends('root.template')
@section('title', 'DASHBOARD | Wotukui ADMIN')
@section('title', 'DASHBOARD | Agbana ADMIN')
@section('sectionTitle', 'Tableau de bord')
@section('sectionDescription')
	
@endsection
 
@section('mainContent')
	<!-- <div class="row"></div>
    <div class="row"></div> -->
   
        
            <div class="">
                <div class="card-header">Liste des Produits</div>
                <div class="table-responsive">
                     <table id='tableau' class='table'> 
                    <thead> 
                        <tr>
                            <th>Categorie</th> <th>Nom</th> <th>Description</th>
                            <th>Prix</th> <th>Echéance</th>                             
                             <th>Photo</th>
                             <th>InfosVendeur</th>
                            <th>Modifier</th>
                             {{-- <th>Supprimer</th></tr>  --}}
                    </thead>
                    <tbody> 
                        @foreach($products2 as $products1) 
                            <tr>
                                <td>{{$products1->categorie}}</td>
                                <td>{{$products1->nameP}}</td>
                                <td>{{$products1->description}}</td>
                                <td>{{$products1->price}}</td>
                                <td>{{$products1->echeance}}</td>
                                {{-- <td>{{$products1->name}}</td> --}}
                                <td><img src="{{$products1->photo}}" style="width: 100px">  </td>
                                {{-- <td onclick="window.location.href = '{{ url('/modification_'.($products1->idP))}}' "> --}}
                                <td>{{$products1->InfosVendeur}}</td>
                                <td onclick="window.location.href='{{url('/update_'.($products1->idP))}}'"> 
                                    <button type="submit" class="btn btn-outline-primary">Modifier</button>
                                </td>

                                {{-- <td>
                                    <form method="post" action="{{ asset('Delete_'.$products1->idP) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$products1->idP}} "/>
                                        <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                    </form>
                                </td> --}}

                            </tr>

                        @endforeach
                         
                    </tbody> 
            </table>
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
                                }) })
    </script>


@endsection