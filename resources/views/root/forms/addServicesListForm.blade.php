@extends('root.template')
@section('title', 'AJOUT SERVICE | AEC ADMIN')
@section('styleSheets')
	<style type="text/css">
		::placeholder{
			text-transform: uppercase !important;
			font-size: 0.8em;
		}
	</style>
@endsection
@section('sectionTitle', 'Ajout d\'un nouveau service')
@section('sectionDescription')
	Ajouter un nouveau service
@endsection

@section('mainContent')

	<div class="row align-items-center justifiy-content-center">
        <div class="col-md">
            <div class="main-card mb-3 card" style="padding:  0 20px 50px 20px">
                <div class="card-body">
                	<h5 class="card-title">ajout Service</h5>
                    <p>Ajouter un nouveau service</p></div>
                    <form action="#" method="POST" autocomplete="off" id="serviceListForm">
	                    <div class="form-row justifiy-content-center">
	                    	<div class="col-md-6">
	                        	<label for="idServiceCat" style="text-transform: uppercase; font-size: 0.7em;">Veuillez choisir la catégorie de service</label>

	                            <select name="idServiceCat" class="form-control" id="idServiceCat">
	                            	<option selected="" disabled="">Choisissez catégorie service</option>
	                            	@foreach($servicesCats as $servicesCat)
	                            		<option value="{{  $servicesCat->idServiceCat }}">
	                            			{{ $servicesCat->serviceCatName }}
	                            		</option>
	                            	@endforeach
	                            </select>
	                        </div>

	                        <div class="col-md-6">
	                            <label for="serviceName" style="text-transform: uppercase; font-size: 0.7em;">
	                            	nom du nouveau service
	                            </label>
	                            <input type="text" class="form-control" name="serviceName" id="serviceName" placeholder="Nom nouveau service" >
	                        </div>
	                    </div>
	                    <br>

	                    <div class="form-row">
	                    	<div class="col-md-8 align-items-center justify-content-center">
	                        	<label style="text-transform: uppercase; font-size: 0.7em; margin-top: 10px" for="serviceDescription">Description du service</label>
	                        	<textarea class="form-control" name="serviceDescription" id="serviceDescription" placeholder="Description service"></textarea>
	                        </div>
	                        <div class="col-md-4">
	                        	<div style="margin: 50px 0 0 35px; display: inline-block;">
		                        	<input type="checkbox" name="serviceStatus" id="serviceStatus">
		                        	<label for="serviceStatus" style="text-transform: uppercase; font-size: 0.8em;">activer</label>
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

            $('#serviceListForm').on('submit', function(e){
            	e.preventDefault();
            })

			$('#submitForm').on('click', function(){
				
            	var idServiceCat = $('#idServiceCat');
            	var serviceName = $('#serviceName');
            	var serviceDescription = $('#serviceDescription');
				var serviceStatus = $('#serviceStatus');
            	var _token = $('input[name="_token"]').val();

	            if (idServiceCat.val()!==null && $.isNumeric(idServiceCat.val())) {
	            	if(serviceName.val().length >3){
	            		if(serviceDescription.val().length >3){
			                showWaitingMask(true);
			                //AJAX REQUEST
			                $.ajax({
			                    type: 'POST',
			                    url: '{{ route("storeServiceList") }}',
			                    data: { 
			                    	idServiceCat:idServiceCat.val(),
			                    	serviceName:serviceName.val(),
			                        serviceDescription:serviceDescription.val(),
			                        serviceStatus:serviceStatus.prop("checked")?1:0,
			                        _token:_token
			                    },

			                    success:function(result) {
			                        showWaitingMask(false);
			                        if(result == '1'){
			                            swalWithBootstrapButtons.fire({
			                                title: 'Good Job',
			                                text: 'Nouveau service ajouté avec succès !',
			                                type: 'success',
			                                showConfirmButton: true,
			                                confirmButtonText: 'Super'
			                            })
			                			serviceName.val('');
										serviceDescription.val('');
			                        }
			                        else if (result == '-1') {
			                            swalWithBootstrapButtons.fire({
			                                title: 'Oops',
			                                text: 'Ce service existe déjà',
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
			                    text: 'Description de service invalide !',
			                    type: 'error',
			                    showCancelButton: true,
			                    showConfirmButton: false,
			                    cancelButtonText: 'Réessayez'
			                })
			            }	
			        } else{
			        	swalWithBootstrapButtons.fire({
		                    title: 'Oops',
		                    text: 'Nom de service invalide !',
		                    type: 'error',
		                    showCancelButton: true,
		                    showConfirmButton: false,
		                    cancelButtonText: 'Réessayez'
		                })
			        }
	                
	            } else{
	                swalWithBootstrapButtons.fire({
	                    title: 'Oops',
	                    text: 'Veuillez choisir la catégorie de service !',
	                    type: 'error',
	                    showCancelButton: true,
	                    showConfirmButton: false,
	                    cancelButtonText: 'D\'accord'
	                })
	            }
        	});
		
	</script>

@endsection