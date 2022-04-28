@extends('root.template')
@section('title', 'AJOUT WEBMINAIRE | AEC ADMIN')
@section('sectionTitle', 'Ajout d\'un webminaire')
@section('sectionDescription')
	Ajouter un nouveau webminaire
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
                	<h5 class="card-title">Nouveau webminaire</h5>
                    <p>Ajouter un nouveau webminaire</p></div>

                    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id="webminForm">
	                    <div class="form-row">
	                        <div class="col-md-4 align-items-center">
	                            <label for="webminName" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Nom attribué au webminaire
	                            </label>
	                            <input type="text" class="form-control" name="webminName" id="webminName" placeholder="Nom webminaire" >
	                        </div>

	                        <div class="col-md-4 align-items-center">
	                            <label for="webminDate" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Date du webminaire
	                            </label>
	                            <input type="date" class="form-control" name="webminDate" id="webminDate" placeholder="date webminaire" >
	                        </div>

	                        <div class="col-md-4 align-items-center">
	                            <label for="webminLocation" style="text-transform: uppercase; font-size: 0.7em;">
	                            	Adresse du webminaire
	                            </label>
	                            <input type="text" class="form-control" name="webminLocation" id="webminLocation" placeholder="Adresse webminaire" >
	                        </div>

	                    </div>

	                    <br>
	                    <div class="form-row">
	                      	<div class="col-md-8">
	                            <label style="text-transform: uppercase; font-size: 0.7em;" for="webminDescription">Description du webminaire</label>
	                        	<textarea class="form-control" name="webminDescription" id="webminDescription" placeholder="Description webminaire" rows="5"></textarea>
	                        </div>

	                       <div class="col-md-4">
	                        	<label for="webminCover" style="cursor: pointer; margin-top: 30px; margin-left: 20px; display: inline-block;">
			            			<img class="img-fluid animated infinite pulse" src="{{ URL::to('/storage/defaultCovers/default_1.jpg') }}" id="coverPreview" style="display: block; width: 150px; height: auto; border-radius: 6px;">
		              				<p class="center-align" style="display: block; text-transform: uppercase; font-size: 0.6em; margin-top: 5px; margin-left: 20px">Couverture du webminaire</p>
			            		</label>

		            			<input type="file" accept="image/*" name="webminCover" id="webminCover" style="z-index: -9999; position: absolute; display: none;visibility: hidden; opacity: 0; ">

		            			<div class="" style="position: absolute; margin: 60px 0 0 30px; display: inline-block; ">
		                        	<div>
			                        	<input type="checkbox" name="webminStatus" id="webminStatus">
			                        	<label for="webminStatus" style="text-transform: uppercase; font-size: 0.8em;">Activer</label>
			                        </div>

		                        	<div>
		                        		<input type="submit" id="submitForm" class="btn btn-primary" value="VALIDER">
		                        	</div>
			                       
		                        </div>

		                        {{ csrf_field() }}
		            		</div>
	                    </div>

	                   
	                </form>
            </div>

        </div>
    </div>
@endsection


@section('jsSheets')

	<script type="text/javascript">

			$("#webminCover").on('change', function(){
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

            $('#webminForm').on('submit', function(e){
            	e.preventDefault();
            })

			$('#submitForm').on('click', function(){
				
            	var webminName = $('#webminName');
            	var webminDate = $('#webminDate');
            	var webminLocation = $('#webminLocation');
            	var webminDescription = $('#webminDescription');
				var webminStatus = $('#webminStatus');
				var webminCover = $("#webminCover").get(0).files;
            	var _token = $('input[name="_token"]').val();

	            if(webminName.val().length >3){
	            	if (webminDate.val().length==10) {
	            		if(webminLocation.val().length >3){
			            	if(webminDescription.val().length>3){
		        				if (webminCover.length == 0) {
					                swalWithBootstrapButtons.fire({
					                    title: 'Oops',
					                    text: "Sélectionner une couverture pour le webminaire !",
					                    type: 'error',
					                    showCancelButton: true,
					                    showConfirmButton: false,
					                    confirmButtonText: 'D\'accord'
					                })

								} else{
					                showWaitingMask(true);

					                var form = $('#webminForm')[0];
									var data = new FormData(form);
					                //AJAX REQUEST
					                $.ajax({
					                    type: 'POST',
										enctype: 'multipart/form-data',
										url: '{{ route("storeWebmin") }}',
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
					                                text: 'Webminaire ajouté avec succès !',
					                                type: 'success',
					                                showConfirmButton: true,
					                                confirmButtonText: 'Super'
					                            })
					                
					                            eventName.val('');
					                            eventDate.val('');
					                            eventLocation.val('');
								            	eventDescription.val('');
					                            readPictureURL($('#webminCover'));
					                        }
					                        else if (result == '-1') {
					                            swalWithBootstrapButtons.fire({
					                                title: 'Oops',
					                                text: 'Webminaire existant',
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
				                    text: 'Description webminaire invalide !',
				                    type: 'error',
				                    showCancelButton: true,
				                    showConfirmButton: false,
				                    cancelButtonText: 'Réessayez'
				                })
			            	}
			            } else{
			            	swalWithBootstrapButtons.fire({
			                    title: 'Oops',
			                    text: 'Adresse webminaire invalide !',
			                    type: 'error',
			                    showCancelButton: true,
			                    showConfirmButton: false,
			                    cancelButtonText: 'Réessayez'
			                })
			            }
			        } else{
			        	swalWithBootstrapButtons.fire({
		                    title: 'Oops',
		                    text: 'Date webminaire invalide !',
		                    type: 'error',
		                    showCancelButton: true,
		                    showConfirmButton: false,
		                    cancelButtonText: 'Réessayez'
		                })
			        }
	            } else{
	                swalWithBootstrapButtons.fire({
	                    title: 'Oops',
	                    text: 'Nom webminaire trop court !',
	                    type: 'error',
	                    showCancelButton: true,
	                    showConfirmButton: false,
	                    cancelButtonText: 'Réessayez'
	                })
	            }
        	});
		
	</script>

@endsection