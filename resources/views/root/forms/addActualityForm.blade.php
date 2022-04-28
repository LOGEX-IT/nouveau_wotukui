@extends('root.template')
@section('title', 'AJOUT ACTUALITE | AEC ADMIN')
@section('sectionTitle', 'Ajout d\'une actualité')
@section('sectionDescription')
	Ajouter une nouvelle actualité
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
                	<h5 class="card-title">Nouvelle actualité</h5>
                    <p>Ajouter une nouvelle actualité</p></div>

                    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id="actualityForm">
	                    <div class="form-row">
	                        <div class="col-md-4 align-items-center">
	                            <label for="actualityName" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Nom attribué à l'actualité
	                            </label>
	                            <input type="text" class="form-control" name="actualityName" id="actualityName" placeholder="Nom actualité" >
	                       
	                        	<label for="actualityCover" style="cursor: pointer; margin-top: 20px; margin-left: 20px; display: inline-block;">
			            			<img class="img-fluid animated infinite pulse" src="{{ URL::to('/storage/defaultCovers/default_1.jpg') }}" id="coverPreview" style="display: block; width: 150px; height: auto; border-radius: 6px;">
		              				<p class="center-align" style="display: block; text-transform: uppercase; font-size: 0.6em; margin-top: 5px; margin-left: 20px">Couverture de l'actualité</p>
			            		</label>

		            			<input type="file" accept="image/*" name="actualityCover" id="actualityCover" style="z-index: -9999; position: absolute; display: none;visibility: hidden; opacity: 0; ">

		            			<div class="" style="position: absolute; margin: 60px 0 0 30px; display: inline-block; ">
		                        	<div>
			                        	<input type="checkbox" name="actualityStatus" id="actualityStatus">
			                        	<label for="actualityStatus" style="text-transform: uppercase; font-size: 0.8em;">Activer</label>
			                        </div>

		                        	<div>
		                        		<input type="submit" id="submitForm" class="btn btn-primary" value="VALIDER">
		                        	</div>
			                       
		                        </div>

		                        {{ csrf_field() }}
		            		</div>
	                    
	                    	<div class="col-md-8">
	                            <label style="text-transform: uppercase; font-size: 0.7em;" for="actualityDescription">Contenu de l'actualité</label>
	                        	<textarea class="form-control" name="actualityDescription" id="actualityDescription" placeholder="Contenu actualité" rows="10"></textarea>
	                        </div>
	                    </div>

	                   
	                </form>
            </div>

        </div>
    </div>
@endsection


@section('jsSheets')

	<script type="text/javascript">

			$("#actualityCover").on('change', function(){
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
                        $('#coverPreview').attr('src', '{{ URL::to("/storage/defaultCovers/default_1.jpg") }}').fadeIn('slow');
                    }
                }
                else{
                    $('#coverPreview').attr('src', '{{ URL::to("/storage/defaultCovers/default_1.jpg") }}').fadeIn('slow');
                }
            }

            $('#actualityForm').on('submit', function(e){
            	e.preventDefault();
            })

			$('#submitForm').on('click', function(){
				
            	var actualityName = $('#actualityName');
            	var actualityDescription = $('#actualityDescription');
				var actualityStatus = $('#actualityStatus');
				var actualityCover = $("#actualityCover").get(0).files;
            	var _token = $('input[name="_token"]').val();

	            if(actualityName.val().length >3){
	            	if(actualityDescription.val().length>3){
        				if (actualityCover.length == 0) {
			                swalWithBootstrapButtons.fire({
			                    title: 'Oops',
			                    text: "Sélectionner une couverture pour l'actualité !",
			                    type: 'error',
			                    showCancelButton: true,
			                    showConfirmButton: false,
			                    confirmButtonText: 'D\'accord'
			                })

						} else{
			                showWaitingMask(true);

			                var form = $('#actualityForm')[0];
							var data = new FormData(form);
			                //AJAX REQUEST
			                $.ajax({
			                    type: 'POST',
								enctype: 'multipart/form-data',
								url: '{{ route("storeActuality") }}',
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
			                                text: 'Actualité ajoutée avec succès !',
			                                type: 'success',
			                                showConfirmButton: true,
			                                confirmButtonText: 'Super'
			                            })
			                
			                            actualityName.val('');
						            	actualityDescription.val('');
			                            readPictureURL($('#actualityCover'));
			                        }
			                        else if (result == '-1') {
			                            swalWithBootstrapButtons.fire({
			                                title: 'Oops',
			                                text: 'Actualité existante',
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
		                    text: 'Contenu actualité invalide !',
		                    type: 'error',
		                    showCancelButton: true,
		                    showConfirmButton: false,
		                    cancelButtonText: 'Réessayez'
		                })
		            } 
	            } else{
	                swalWithBootstrapButtons.fire({
	                    title: 'Oops',
	                    text: 'Nom actualité trop court !',
	                    type: 'error',
	                    showCancelButton: true,
	                    showConfirmButton: false,
	                    cancelButtonText: 'Réessayez'
	                })
	            }
        	});
		
	</script>

@endsection