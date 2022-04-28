@extends('root.template')
@section('title', 'AJOUT CATEGORIE SERVICE | AEC ADMIN')
@section('styleSheets')
	<style type="text/css">
		::placeholder{
			text-transform: uppercase !important;
			font-size: 0.8em;
		}
	</style>
@endsection
@section('sectionTitle', 'Ajout de Catégorie Service')
@section('sectionDescription')
	Ajouter un nouvelle categorie de service
@endsection

@section('mainContent')

	<div class="row align-items-center justifiy-content-center">
        <div class="col-md">
            <div class="main-card mb-3 card" style="padding:  0 20px 50px 20px">
                <div class="card-body">
                	<h5 class="card-title">Service categorie</h5>
                    <p>Ajouter un nouvelle categorie de service</p></div>
                    <form action="#" method="POST" autocomplete="off" id="serviceCatForm">
	                    <div class="form-row justifiy-content-center">
	                        <div class="col-md-8">
	                            <label for="serviceCatName" style="text-transform: uppercase; font-size: 0.7em;">
	                            	nom de la categorie de service
	                            </label>
	                            <input type="text" class="form-control" name="serviceCatName" id="serviceCatName" placeholder="Nom categorie service" >
	                        </div>
	                    
	                        <div class="col-md-4">
	                        	<div style="margin: 35px 0 0 35px; display: inline-block;">
		                        	<input type="checkbox" name="serviceCatStatus" id="serviceCatStatus">
		                        	<label for="serviceCatStatus" style="text-transform: uppercase; font-size: 0.8em;">activer</label>
		                        </div>
	                    
	                        	<div style="margin: 0px 0 0 30px; display: inline-block;">
	                        		<input type="submit" id="submitForm" class="btn btn-primary" value="VALIDER">
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

            $('#serviceCatForm').on('submit', function(e){
            	e.preventDefault();
            })

			$('#submitForm').on('click', function(){
				
            	var serviceCatName = $('#serviceCatName');
				var serviceCatStatus = $('#serviceCatStatus');
            	var _token = $('input[name="_token"]').val();

	            if(serviceCatName.val().length >3){
	                showWaitingMask(true);
	                //AJAX REQUEST
	                $.ajax({
	                    type: 'POST',
	                    url: '{{ route("storeServiceCategorie") }}',
	                    data: { 
	                        serviceCatName:serviceCatName.val(),
	                        serviceCatStatus:serviceCatStatus.prop("checked")?1:0,
	                        _token:_token
	                    },

	                    success:function(result) {
	                        showWaitingMask(false);
	                        if(result == '1'){
	                            swalWithBootstrapButtons.fire({
	                                title: 'Good Job',
	                                text: 'Catégorie service ajoutée avec succès !',
	                                type: 'success',
	                                showConfirmButton: true,
	                                confirmButtonText: 'Super'
	                            })
	                
	                            serviceCatName.val('');
	                        }
	                        else if (result == '-1') {
	                            swalWithBootstrapButtons.fire({
	                                title: 'Oops',
	                                text: 'Catégorie est déjà existante',
	                                type: 'warning',
	                                showCancelButton: true,
	                                showConfirmButton: false,
	                                cancelButtonText: 'D\'accord'
	                            })
	                        }
	                        else{
	                            console.log(result)
	                            swalWithBootstrapButtons.fire({
	                                title: 'Oops',
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
	                            title: 'Oops',
	                            text: 'Echec de l\'opération',
	                            type: 'error',
	                            showCancelButton: true,
	                            showConfirmButton: false,
	                            cancelButtonText: 'Hummmm'
	                        })
	                    }
	                });
	                
	            } else{
	                swalWithBootstrapButtons.fire({
	                    title: 'Oops',
	                    text: 'Le nom de la catégorie est trop court !',
	                    type: 'error',
	                    showCancelButton: true,
	                    showConfirmButton: false,
	                    cancelButtonText: 'Réessayez'
	                })
	            }
        	});
		
	</script>

@endsection