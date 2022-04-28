@extends('root.template')
@section('title', 'AJOUT SOUS CATEGORIE FORMATION | AEC ADMIN')

@section('styleSheets')
	<style type="text/css">
		::placeholder{
			text-transform: uppercase !important;
			font-size: 0.8em;
		}
	</style>
@endsection

@section('sectionTitle', 'Ajout de Sous Catégorie Formation')
@section('sectionDescription')
	Ajouter une nouvelle sous-categorie de formation
@endsection

@section('mainContent')
	<div class="row align-items-center justifiy-content-center">
        <div class="col-md">
            <div class="main-card mb-3 card" style="padding:  0 20px 50px 20px">
                <div class="card-body">
                	<h5 class="card-title">Nom de la sous categorie</h5>
                    <p>Ajouter une nouvelle sous-categorie de formation</p>
                </div>
                <form id="trainingSubCatForm" action="#" method="POST" autocomplete="off">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="idTrainingCat" style="text-transform: uppercase; font-size: 0.7em;">Veuillez choisir la catégorie principale</label>

                            <select name="idTrainingCat" class="form-control" id="idTrainingCat">
                            	<option selected="" disabled="">Choisissez la catégorie principale</option>
                            	@foreach($trainingCats as $trainingCat)
                            		<option value="{{  $trainingCat->idTrainingCat }}">
                            			{{ $trainingCat->trainingCatName }}
                            		</option>
                            	@endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="trainingSubCatName" style="text-transform: uppercase; font-size: 0.7em;">Veuillez renseigner le nom de la catégorie</label>
                            <input type="text" class="form-control" name="trainingSubCatName"  id="trainingSubCatName" placeholder="Nom Sous categorie">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-8 align-items-center justify-content-center">
                        	<label style="text-transform: uppercase; font-size: 0.7em; margin-top: 10px" for="trainingSubCatDescription">Description de la sous catégorie</label>
                        	<textarea class="form-control" name="trainingSubCatDescription" id="trainingSubCatDescription" placeholder="Description Sous Categorie"></textarea>
                        </div>
                        <div class="col-md-2">
                        	<label for="trainingSubCatCover" style="cursor: pointer; margin-left: 20px">
		            			<img class="img-fluid animated infinite pulse" src="{{ URL::to('/storage/defaultCovers/default_7.jpg') }}" id="coverPreview" style="display: block; width: 200px; height: auto;border-radius: 5px;">
	              				<p class="center-align" style="display: block; text-transform: uppercase; font-size: 0.6em; margin-top: 5px; margin-left: 20px">couverture principale</p>
		            		</label>

	            			<input type="file" accept="image/*" name="trainingSubCatCover" id="trainingSubCatCover" style="z-index: -9999; position: absolute; display: none;visibility: hidden; opacity: 0; ">
                        </div>
                        <div class="col-md-2">
                        	<div style="margin: 30px 0 0 35px; display: inline-block;">
	                        	<input type="checkbox" name="trainingSubCatStatus" id="trainingSubCatStatus">
	                        	<label for="trainingSubCatStatus" style="text-transform: uppercase; font-size: 0.8em;">activer</label>
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
		$("#trainingSubCatCover").on('change', function(){
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
                    $('#coverPreview').attr('src', '{{ URL::to("/storage/defaultCovers/default_7.jpg") }}').fadeIn('slow');
                }
            }
            else{
                $('#coverPreview').attr('src', '{{ URL::to("/storage/defaultCovers/default_7.jpg") }}').fadeIn('slow');
            }
        }

        $('#trainingSubCatForm').on('submit', function(e){
        	e.preventDefault();
        })

		$('#submitForm').on('click', function(){

			var idTrainingCat = $('#idTrainingCat');
			var trainingSubCatName = $('#trainingSubCatName');
        	var trainingSubCatDescription = $('#trainingSubCatDescription');
			var trainingSubCatStatus = $('#trainingSubCatStatus');
			var trainingSubCatCover = $("#trainingSubCatCover").get(0).files;
        	var _token = $('input[name="_token"]').val();

        	if (idTrainingCat.val()!==null && $.isNumeric(idTrainingCat.val())) {
	            if(trainingSubCatName.val().length >3){
        			if (trainingSubCatDescription.val().length>4) {
        				if (trainingSubCatCover.length == 0) {
			                swalWithBootstrapButtons.fire({
			                    title: 'Oops',
			                    text: "Veuillez choisir la couverture de la sous catégorie !",
			                    type: 'error',
			                    showCancelButton: true,
			                    showConfirmButton: false,
			                    cancelButtonText: 'D\'accord'
			                })
						} else{
			                showWaitingMask(true);

			                var form = $('#trainingSubCatForm')[0];
							var data = new FormData(form);
			                //AJAX REQUEST
			                $.ajax({
			                    type: 'POST',
								enctype: 'multipart/form-data',
								url: '{{ route("storeTrainingSubCategorie") }}',
								data:data,
								processData: false,  // Important!
						        contentType: false,
						        cache: false,
						        timeout: 600000,

			                    success:function(result) {
			                        showWaitingMask(false);
			                        if(result == '1'){
			                            swalWithBootstrapButtons.fire({
			                                title: 'Good Job',
			                                text: 'Sous catégorie ajoutée avec succès !',
			                                type: 'success',
			                                showConfirmButton: true,
			                                confirmButtonText: 'Super'
			                            })
			                
			                            trainingSubCatName.val('');
						            	trainingSubCatDescription.val('');
			                            readPictureURL($('#trainingSubCatCover'));
			                        }
			                        else if (result == '-1') {
			                            swalWithBootstrapButtons.fire({
			                                title: 'Oops',
			                                text: 'Sous catégorie existante',
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
				        }
				    } else{
				    	swalWithBootstrapButtons.fire({
		                    title: 'Oops',
		                    text: 'Description sous catégorie invalide !',
		                    type: 'error',
		                    showCancelButton: true,
		                    showConfirmButton: false,
		                    cancelButtonText: 'Réessayez'
		                })
				    }
						
	            } else{
	                swalWithBootstrapButtons.fire({
	                    title: 'Oops',
	                    text: 'Nom de la sous catégorie trop court !',
	                    type: 'error',
	                    showCancelButton: true,
	                    showConfirmButton: false,
	                    cancelButtonText: 'Réessayez'
	                })
	            }
            } else{
            	swalWithBootstrapButtons.fire({
                    title: 'Oops',
                    text: 'Veuillez choisir une catégorie principale !',
                    type: 'error',
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonText: 'D\'accord'
                })
            }	
        });
		
	</script>

@endsection